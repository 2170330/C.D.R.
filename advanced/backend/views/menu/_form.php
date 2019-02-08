<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Bebida;
use backend\models\Sobremesa;
use backend\models\Prato;

/* @var $this yii\web\View */
/* @var $model backend\models\Menu */
/* @var $form yii\widgets\ActiveForm */
/* @var $prato @backend/views/menu/create */
/* @var $bebida @backend/views/menu/create */
/* @var $sobremesa @backend/views/menu/create */

?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_prato')->dropDownList(
        ArrayHelper::map($prato, 'id', 'descricao')
    )->label('Prato') ?>

    <?= $form->field($model, 'id_bebida')->dropDownList(
        ArrayHelper::map($bebida, 'id', 'descricao')
    )->label('Bebida') ?>

    <?= $form->field($model, 'id_sobremesa')->dropDownList(
        ArrayHelper::map($sobremesa, 'id', 'descricao')
    )->label('Sobremesa') ?>

    <?= $form->field($model, 'preco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imagem')->fileInput(); ?>

    <div class="form-group">
        <?= Html::submitButton('Criar', ['class' => 'backend-criar']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
