<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pedido".
 *
 * @property int $id
 * @property int $id_menu
 * @property int $id_prato
 * @property int $id_bebida
 * @property int $id_sobremesa
 * @property int $id_mesa
 *
 * @property EstadoPedido[] $estadoPedidos
 * @property Menu $menu
 * @property Mesa $mesa
 * @property Bebida $bebida
 * @property Prato $prato
 * @property Sobremesa $sobremesa
 * @property PedidoEncomenda[] $pedidoEncomendas
 */
class Pedido extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pedido';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_menu', 'id_prato', 'id_bebida', 'id_sobremesa', 'id_mesa'], 'integer'],
            [['id_menu'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['id_menu' => 'id']],
            [['id_mesa'], 'exist', 'skipOnError' => true, 'targetClass' => Mesa::className(), 'targetAttribute' => ['id_mesa' => 'id']],
            [['id_bebida'], 'exist', 'skipOnError' => true, 'targetClass' => Bebida::className(), 'targetAttribute' => ['id_bebida' => 'id']],
            [['id_prato'], 'exist', 'skipOnError' => true, 'targetClass' => Prato::className(), 'targetAttribute' => ['id_prato' => 'id']],
            [['id_sobremesa'], 'exist', 'skipOnError' => true, 'targetClass' => Sobremesa::className(), 'targetAttribute' => ['id_sobremesa' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_menu' => 'Id Menu',
            'id_prato' => 'Id Prato',
            'id_bebida' => 'Id Bebida',
            'id_sobremesa' => 'Id Sobremesa',
            'id_mesa' => 'Id Mesa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadoPedidos()
    {
        return $this->hasMany(EstadoPedido::className(), ['id_pedido' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenu()
    {
        return $this->hasOne(Menu::className(), ['id' => 'id_menu']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMesa()
    {
        return $this->hasOne(Mesa::className(), ['id' => 'id_mesa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBebida()
    {
        return $this->hasOne(Bebida::className(), ['id' => 'id_bebida']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrato()
    {
        return $this->hasOne(Prato::className(), ['id' => 'id_prato']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSobremesa()
    {
        return $this->hasOne(Sobremesa::className(), ['id' => 'id_sobremesa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidoEncomendas()
    {
        return $this->hasMany(PedidoEncomenda::className(), ['id_pedido' => 'id']);
    }
}
