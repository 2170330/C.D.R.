<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Sobremesa */

$this->title = 'Criar Sobremesa';
?>
<?= $this->render('@backend/views/layouts/submenu.php'); ?>

<div class="sobremesa-create, backend-form">

    <h1 class="backend-titulo"><?= Html::encode($this->title) ?></h1>

    <i>  <?= Html::a('', ['/sobremesa/index'], ['class'=>'fas fa-arrow-left  voltar-button']) ?> </i>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
