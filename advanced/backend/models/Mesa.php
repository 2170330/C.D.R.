<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mesa".
 *
 * @property int $id
 * @property string $descricao
 * @property int $nLugares
 *
 * @property Pedido $pedido
 * @property Refeicao[] $refeicaos
 */
class Mesa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mesa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao', 'nLugares'], 'required'],
            [['nLugares'], 'integer'],
            [['descricao'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descricao' => 'Descricao',
            'nLugares' => 'N Lugares',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedido()
    {
        return $this->hasOne(Pedido::className(), ['id_mesa' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefeicaos()
    {
        return $this->hasMany(Refeicao::className(), ['id_mesa' => 'id']);
    }
}
