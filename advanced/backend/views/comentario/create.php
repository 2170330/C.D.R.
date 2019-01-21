<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Comentario */

$this->title = 'Criar Comentario';
?>

<?= $this->render('@backend/views/layouts/submenu.php'); ?>

<div class="comentario-create backend-form">

    <h1 class="backend-titulo"><?= Html::encode($this->title) ?></h1>

    <i> <?= Html::a('', ['/comentario/index'], ['class'=>'fas fa-arrow-left  voltar-button']) ?> </i>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
