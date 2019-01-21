<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "encomenda".
 *
 * @property int $id
 * @property int $id_user
 * @property string $data
 * @property string $hora
 * @property string $descricao
 *
 * @property User $user
 * @property PedidoEncomenda[] $pedidoEncomendas
 */
class Encomenda extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'encomenda';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'data', 'hora'], 'required'],
            [['id_user'], 'integer'],
            [['data', 'hora'], 'safe'],
            [['descricao'], 'string', 'max' => 100],
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
            'id_user' => 'Id User',
            'data' => 'Data',
            'hora' => 'Hora',
            'descricao' => 'Descricao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidoEncomendas()
    {
        return $this->hasMany(PedidoEncomenda::className(), ['id_encomenda' => 'id']);
    }
}
