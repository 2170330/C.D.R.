<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Bebida */

$this->title = 'Update Bebida: ' . $model->id;
?>

<?= $this->render('@backend/views/layouts/submenu.php'); ?>

<div class="bebida-update backend-form">

    <h1 class="backend-titulo"><?= Html::encode($this->title) ?></h1>

    <i> <?= Html::a('', ['/bebida/index', 'id' => 0], ['class'=>'fas fa-arrow-left  voltar-button']) ?> </i>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
