<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Menu */
/* @var $id_prato backend\models\Prato */
/* @var $id_bebida backend\models\Bebida */
/* @var $id_sobremesa backend\models\Sobremesa */

$this->title = 'Criar Menu';

?>

<?= $this->render('@backend/views/layouts/submenu.php'); ?>

<div class="menu-create backend-form">

    <h1 class="backend-titulo"><?= Html::encode($this->title) ?></h1>

    <i> <?= Html::a('', ['/menu/index', 'id' => 0], ['class'=>'fas fa-arrow-left  voltar-button']) ?> </i>

    <?= $this->render('_form', [
        'model' => $model,
        'prato' => $id_prato,
        'bebida' => $id_bebida,
        'sobremesa' => $id_sobremesa
    ]) ?>

</div>
