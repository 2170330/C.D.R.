<?php

use yii\helpers\Html;
use backend\models\Prato;

$pratos = Prato::find()->all();
?>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/v4-shims.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<div id="sidebar">
    <h1 class="sidebar-titulo"> <?= Html::a(' C.D.R.', ['/site/index'], ['class'=>'']) ?></h1>
    <ul class="nav-fall">
        <li class="sidebar-menu"> <a href="#menu"><i class="fas fa-users"></i> Menu</a> </li>
        <li class="sidebar-menu"><i class="fas fa-utensils"></i> Pratos
            <ul class="sidebar-submenu">
                <li><i class="fas fa-drumstick-bite"><a href="#carne"></i> Carne</a></li>
                <li><i class="fas fa-fish"><a href="#peixe"></i> Peixe</a></li>
                <li><i class="fas fa-cannabis"><a href="#vegetariano"></i> Vegetariano</a></li>
                <li><i class="fas fa-apple-alt"><a href="#vegan"></i> Vegan</a></li>
            </ul>
        </li>
        <li class="sidebar-menu"><i class="fas fa-wine-glass-alt"></i> Bebidas
            <ul class="sidebar-submenu">
                <li><a href=""><i class="fas fa-glass-martini"><a href="#sumos"></i> Sumos</a></li>
                <li><a href=""><i class="fas fa-wine-bottle"><a href="#vinhos"></i> Vinhos</a></li>
                <li><a href=""><i class="fas fa-beer"><a href="#outros"></i> Outras Bebidas</a></li>
            </ul>
        </li>
        <li class="sidebar-menu"> <i class="fas fa-cookie"><a href="#sobremesas"></i> Sobremesas</a></li>
    </ul>
</div>

