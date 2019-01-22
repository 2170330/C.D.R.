<?php
/**
 * Created by PhpStorm.
 * User: Utilizador
 * Date: 22/01/2019
 * Time: 11:18
 */
use yii\helpers\Html;

$this->title = 'Mensagem';

?>

<div class="mensagem-form">
    <h1 class="comentarios"> Sucesso </h1> <br><br><br>

    <p class="mensagem-texto"> O seu pedido foi enviado com sucesso.</p> <br><br><br>

    <div class="mensagem-align">
        <?= Html::a('Voltar', ['/site/index'], ['class'=>'btn-mensagem ']) ?>
    </div>
    <br><br><br><br><br><br>
</div>