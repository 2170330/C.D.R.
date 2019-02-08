<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Bebida */
/* @var $id_tipo_bebida backend\models\TipoBebida */

$this->title = 'Criar Bebida';
?>

<?= $this->render('@backend/views/layouts/submenu.php'); ?>

<div class="bebida-create backend-form">

    <h1 class="backend-titulo"><?= Html::encode($this->title) ?></h1>

    <i> <?= Html::a('', ['/bebida/index', 'id' => 0], ['class'=>'fas fa-arrow-left  voltar-button']) ?> </i>

    <?= $this->render('_form', [
        'id_tipo_bebida' => $id_tipo_bebida,
        'model' => $model,
    ]) ?>

</div>
