<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Sobremesa */

$this->title = 'Atualizar Sobremesa: ' . $model->descricao;

?>
<?= $this->render('@backend/views/layouts/submenu.php'); ?>
<div class="sobremesa-update, backend-form">

    <h1 class="backend-titulo"><?= Html::encode($this->title) ?></h1>

    <i>  <?= Html::a('', ['/sobremesa/index'], ['class'=>'fas fa-arrow-left  voltar-button']) ?> </i>


    <div class="backend-cores">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
