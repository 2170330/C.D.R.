<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mensagem".
 *
 * @property int $id
 * @property string $nome
 * @property string $email
 * @property string $assunto
 * @property string $mensagem
 */
class Mensagem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mensagem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'email', 'assunto', 'mensagem'], 'required'],
            [['nome'], 'string', 'max' => 100],
            [['assunto'], 'string', 'max' => 50],
            [['mensagem'], 'string', 'max' => 255],

            ['email', 'trim'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este email já foi utilizado.'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'email' => 'Email',
            'assunto' => 'Assunto',
            'mensagem' => 'Mensagem',
        ];
    }
}
