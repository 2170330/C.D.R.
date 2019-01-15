<?php

namespace frontend\models;

use common\models\User;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "comentario".
 *
 * @property int $id
 * @property int $avaliacao
 * @property string $mensagem
 * @property int $created_at
 * @property int $updated_at
 * @property int $id_user
 *
 * @property User $user
 */
class Comentario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comentario';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['avaliacao', 'mensagem', 'id_user'], 'required'],
            [['avaliacao', 'created_at', 'updated_at', 'id_user'], 'integer'],
            [['mensagem'], 'string', 'max' => 150],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'avaliacao' => 'Avaliacao',
            'mensagem' => 'Mensagem',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'id_user' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
