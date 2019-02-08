<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Reserva */
/* @var $utilizador backend\models\Utilizador */


$this->title = 'Criar Reserva';
?>
<?= $this->render('@backend/views/layouts/submenu.php'); ?>

<div class="reserva-create, backend-form">

    <h1 class="backend-titulo"><?= Html::encode($this->title) ?></h1>

    <i>  <?= Html::a('', ['/reserva/index'], ['class'=>'fas fa-arrow-left  voltar-button']) ?> </i>

    <?= $this->render('_form', [
        'utilizador' => $utilizador,
        'model' => $model,
    ]) ?>

</div>
