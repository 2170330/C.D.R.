<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ComentarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comentarios';
?>

<?= $this->render('@backend/views/layouts/submenu.php'); ?>

<div class="comentario-index backend-form">

    <h1 class="backend-titulo"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Criar Comentario', ['create'], ['class' => 'backend-button']) ?>
    </p>

    <div class="backend-cores">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'avaliacao',
                'mensagem',
                //'created_at',
                //'updated_at',
                [
                    'label' => 'Utilizador',
                    'attribute' => 'user.username',
                ],

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
