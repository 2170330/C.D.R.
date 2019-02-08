<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Prato */
/* @var $id_tipo_prato backend\models\TipoPrato */
/* @var $id_dia_semana backend\models\DiasSemana */

$this->title = 'Criar Prato';
?>
<?= $this->render('@backend/views/layouts/submenu.php'); ?>

<div class="prato-create backend-form">

    <h1 class="backend-titulo"><?= Html::encode($this->title) ?></h1>

    <i> <?= Html::a('', ['/prato/index', 'id' => 0], ['class'=>'fas fa-arrow-left  voltar-button']) ?> </i>

    <?= $this->render('_form', [
        'id_tipo_prato' => $id_tipo_prato,
        'id_dia_semana' => $id_dia_semana,
        'model' => $model,
    ]) ?>

</div>
