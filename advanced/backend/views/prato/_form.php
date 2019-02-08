<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\DiasSemana;
use backend\models\TipoPrato;

/* @var $this yii\web\View */
/* @var $model backend\models\Prato */
/* @var $form yii\widgets\ActiveForm */
/* @var $id_tipo_prato @backend/views/prato/create */
/* @var $id_dia_semana @backend/views/prato/create */
?>

<div class="prato-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'preco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_tipo_prato')->dropDownList(
        ArrayHelper::map($id_tipo_prato, 'id', 'descricao')
    )->label('Tipo de Prato') ?>

    <?= $form->field($model, 'imagem')->fileInput() ?>

    <?= $form->field($model, 'id_dia_semana')->dropDownList(
        ArrayHelper::map($id_dia_semana, 'id', 'descricao'),
        ['prompt' => '']
    )->label('Dia de Semana')  ?>

    <div class="form-group">
        <?= Html::submitButton('Criar', ['class' => 'backend-criar']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
