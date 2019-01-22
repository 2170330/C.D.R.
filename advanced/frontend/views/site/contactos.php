<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\Models\Mensagem */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Contactos';
?>

<div class="site-contato">
    <br>
    <h1 class="contato"> Contato </h1>
    <p class="line"> _____</p>


    <div class="row">
        <div class="map-contato-div col-lg-6">
            <iframe class="map-contato" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2348.875403049507!2d-8.82088734495151!3d39.7354353225667!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcfaf619f4450fa76!2sPolit%C3%A9cnico+de+Leiria+%7C+ESTG+-+Escola+Superior+de+Tecnologia+e+Gest%C3%A3o_Edif%C3%ADcio+D!5e0!3m2!1spt-PT!2spt!4v1540287971315" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="form-contato col-lg-6">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'assunto')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'mensagem')->textarea(['maxlength' => true, 'rows' => '5']) ?>

            <div class="login">
                <?= Html::submitButton('Save', ['class' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>









</div>
