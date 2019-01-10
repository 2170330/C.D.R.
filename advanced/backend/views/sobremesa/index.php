<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SobremesaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sobremesas';

?>
<?= $this->render('@backend/views/layouts/submenu.php'); ?>

<div class="sobremesa-index, backend-form">

    <h1 class="backend-titulo"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Criar Sobremesa', ['create'], ['class' => 'backend-button']) ?>
    </p>

    <div class="backend-cores">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'descricao',
                [
                    'header' => 'Preço (€)',
                    'attribute' => 'preco',

                ],
                'imagem',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
