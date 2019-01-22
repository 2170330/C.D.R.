<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Mensagem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mensagem-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'assunto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mensagem')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'backend-criar']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
