<?php

/* @var $this yii\web\View */
/* @var $model backend\models\Encomenda */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\Html;
use backend\models\Prato;
use backend\models\Sobremesa;
use backend\models\Bebida;
use backend\models\Menu;
use backend\models\Encomenda;
use backend\controllers\PratoController;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Encomendas';

/*public function __construct(){
    parent::__construct();
    $this->load->helper('url');
}*/
?>



<?php
$menus =  Menu::find()->all();
$pratos = Prato::find()->all();
$bebidas = Bebida::find()->all();
$sobremesas = Sobremesa::find()->all();
?>

<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script>
    $(function() {
        $('a[href*=#]:not([href=#])').click(function(e) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.substr(1) +']');
            if (target.length) {
                $('html,body').animate({
                        scrollBot: target.offset().top},
                    'slow');
                e.preventDefault();
            }
        });
    });
</script>

<div class="site-menu row menu-image">
    <?= $this->render('@frontend/views/layouts/submenu.php'); ?>

    <div class="site-menu-2 clearfix col-lg-9">
        <p id="menu" class="titulo-menu"> Menus </p>
        <p class="line"> _____</p>
        <?php
        $count = 1;
        foreach ($menus as $menu): ?>
            <?= ($count % 3 == 0) ? '<div class="row">' : ''; ?>
            <div class="site-menu-2-1 col-lg-4">
                <div class="opacity">
                    <form action="<?= Url::to(['encomendas']) ?>" method="post" >
                        <input type="image" class="site-encomenda-2-image" src="<?php echo Yii::getAlias('@pratoImgUrlMenus') . '/' . $menu->imagem; ?>" alt="Submit Form">
                    </form>
                    <div class="middle">
                        <form action="<?= Url::to(['encomendas']) ?>" method="post" >

                            <button class="btn-encomenda"><i class="fas fa-shopping-cart"></i></button>
                        </form>
                    </div>
                </div>

                <h1 class="site-menu-2-titulo"> <?= $menu->prato->descricao ?> </h1>
                <p class="line-grey"> ____________</p>
                <p class="site-menu-2-paragrafo"> <?= 'Bebida: '.$menu->bebida->descricao ?> </p>
                <p class="site-menu-2-paragrafo"> <?= 'Sobremesa: '.$menu->sobremesa->descricao ?> </p>
                <p class="site-menu-2-preco"> <?= $menu->preco ?> €</p>

            </div>
            <?= ($count % 3 == 0) ? '</div>' : ''; ?>
            <?php $count++; ?>
        <?php endforeach; ?>
    </div>


    <div class="site-menu-2 clearfix col-lg-9">
        <p id="carne" class="titulo-menu"> Carne </p>
        <p class="line"> _____</p>
        <?php
        $count = 1;
        foreach ($pratos as $prato):
            if ($prato->id_tipo_prato == 1) { ?>
                <?= ($count % 3 == 0) ? '<div class="row">' : ''; ?>
                <div class="site-menu-2-1 col-lg-4">
                    <div class="opacity">
                        <img class="site-encomenda-2-image"
                             src="<?php echo Yii::getAlias('@pratoImgUrlCarne') . '/' . $prato->imagem; ?>">
                        <div class="middle">
                            <form action="<?= Url::to(['encomendas']) ?>" method="post" >
                                <button class="btn-encomenda"><i class="fas fa-shopping-cart"></i></button>
                            </form>
                        </div>
                    </div>

                    <h1 class="site-menu-2-titulo"> <?= $prato->descricao ?> </h1>
                    <p class="line-grey"> ____________</p>
                    <p class="site-menu-2-preco"> <?= $prato->preco ?> €</p>

                </div>
                <?= ($count % 3 == 0) ? '</div>' : ''; ?>
                <?php $count++;
            } ?>
        <?php endforeach; ?>
    </div>



    <div class="site-menu-2 clearfix col-lg-9">
        <p id="peixe" class="titulo-menu"> Peixe </p>
        <p class="line"> _____</p>
        <?php
        $count = 1;
        foreach ($pratos as $prato):
            if ($prato->id_tipo_prato == 2) { ?>
                <?= ($count % 3 == 0) ? '<div class="row">' : ''; ?>
                <div class="site-menu-2-1 col-lg-4">
                    <div class="opacity">
                        <img class="site-encomenda-2-image"
                             src="<?php echo Yii::getAlias('@pratoImgUrlPeixe') . '/' . $prato->imagem; ?>">
                        <div class="middle">
                            <form action="<?= Url::to(['encomendas']) ?>" method="post" >
                                <button class="btn-encomenda"><i class="fas fa-shopping-cart"></i></button>
                            </form>
                        </div>
                    </div>
                    <h1 class="site-menu-2-titulo"> <?= $prato->descricao ?> </h1>
                    <p class="line-grey"> ____________</p>
                    <!-- <p class="site-menu-2-paragrafo"> Esse é um item do seu menu. Adicione uma breve descrição </p> -->
                    <p class="site-menu-2-preco"> <?= $prato->preco ?> €</p>
                </div>
                <?= ($count % 3 == 0) ? '</div>' : ''; ?>
                <?php $count++;
            } ?>
        <?php endforeach; ?>
    </div>

    <div class="site-menu-2 clearfix col-lg-9">
        <p id="vegetariano" class="titulo-menu"> Vegetariano </p>
        <p class="line"> _____</p>
        <?php
        $count = 1;
        foreach ($pratos as $prato):
            if ($prato->id_tipo_prato == 3) { ?>
                <?= ($count % 3 == 0) ? '<div class="row">' : ''; ?>
                <div class="site-menu-2-1 col-lg-4">
                    <div class="opacity">
                        <img class="site-encomenda-2-image"
                             src="<?php echo Yii::getAlias('@pratoImgUrlVegetariano') . '/' . $prato->imagem; ?>">
                        <div class="middle">
                            <form action="<?= Url::to(['encomendas']) ?>" method="post" >
                                <button class="btn-encomenda"><i class="fas fa-shopping-cart"></i></button>
                            </form>
                        </div>
                    </div>
                    <h1 class="site-menu-2-titulo"> <?= $prato->descricao ?> </h1>
                    <p class="line-grey"> ____________</p>
                    <!-- <p class="site-menu-2-paragrafo"> Esse é um item do seu menu. Adicione uma breve descrição </p> -->
                    <p class="site-menu-2-preco"> <?= $prato->preco ?> €</p>
                </div>
                <?= ($count % 3 == 0) ? '</div>' : ''; ?>
                <?php $count++;
            } ?>
        <?php endforeach; ?>
    </div>



    <div class="site-menu-2 clearfix col-lg-9">
        <p id="vegan" class="titulo-menu"> Vegan </p>
        <p class="line"> _____</p>
        <?php
        $count = 1;
        foreach ($pratos as $prato):
            if ($prato->id_tipo_prato == 4) { ?>
                <?= ($count % 3 == 0) ? '<div class="row">' : ''; ?>
                <div class="site-menu-2-1 col-lg-4">
                    <div class="opacity">
                        <img class="site-encomenda-2-image"
                             src="<?php echo Yii::getAlias('@pratoImgUrlVegan') . '/' . $prato->imagem; ?>">
                        <div class="middle">
                            <form action="<?= Url::to(['encomendas']) ?>" method="post" >
                                <button class="btn-encomenda"><i class="fas fa-shopping-cart"></i></button>
                            </form>
                        </div>
                    </div>
                    <h1 class="site-menu-2-titulo"> <?= $prato->descricao ?> </h1>
                    <p class="line-grey"> ____________</p>
                    <!-- <p class="site-menu-2-paragrafo"> Esse é um item do seu menu. Adicione uma breve descrição </p> -->
                    <p class="site-menu-2-preco"> <?= $prato->preco ?> €</p>
                </div>
                <?= ($count % 3 == 0) ? '</div>' : ''; ?>
                <?php $count++;
            } ?>
        <?php endforeach; ?>
    </div>

    <div class="site-menu-2 clearfix col-lg-9">
        <p id="sumos" class="titulo-menu"> Sumos </p>
        <p class="line"> _____</p>
        <?php
        $count = 1;
        foreach ($bebidas as $bebida):
            if ($bebida->id_tipo_bebida == 1) { ?>
                <?= ($count % 3 == 0) ? '<div class="row">' : ''; ?>
                <div class="site-menu-2-1 col-lg-4">
                    <div class="opacity">
                        <img class="site-encomenda-2-image"
                             src="<?php echo Yii::getAlias('@pratoImgUrlSumos') . '/' . $bebida->imagem; ?>">
                        <div class="middle">
                            <form action="<?= Url::to(['encomendas']) ?>" method="post" >
                                <button class="btn-encomenda"><i class="fas fa-shopping-cart"></i></button>
                            </form>
                        </div>
                    </div>
                    <h1 class="site-menu-2-titulo"> <?= $bebida->descricao ?> </h1>
                    <p class="line-grey"> ____________</p>
                    <!-- <p class="site-menu-2-paragrafo"> Esse é um item do seu menu. Adicione uma breve descrição </p> -->
                    <p class="site-menu-2-preco"> <?= $bebida->preco ?> €</p>
                </div>
                <?= ($count % 3 == 0) ? '</div>' : ''; ?>
                <?php $count++;
            } ?>
        <?php endforeach; ?>
    </div>

    <div class="site-menu-2 clearfix col-lg-9">
        <p id="vinhos" class="titulo-menu"> Vinhos </p>
        <p class="line"> _____</p>
        <?php
        $count = 1;
        foreach ($bebidas as $bebida):
            if ($bebida->id_tipo_bebida == 2) { ?>
                <?= ($count % 3 == 0) ? '<div class="row">' : ''; ?>
                <div class="site-menu-2-1 col-lg-4">
                    <div class="opacity">
                        <img class="site-encomenda-2-image"
                             src="<?php echo Yii::getAlias('@pratoImgUrlVinhos') . '/' . $bebida->imagem; ?>">
                        <div class="middle">
                            <form action="<?= Url::to(['encomendas']) ?>" method="post" >
                                <button class="btn-encomenda"><i class="fas fa-shopping-cart"></i></button>
                            </form>
                        </div>
                    </div>
                    <h1 class="site-menu-2-titulo"> <?= $bebida->descricao ?> </h1>
                    <p class="line-grey"> ____________</p>
                    <!-- <p class="site-menu-2-paragrafo"> Esse é um item do seu menu. Adicione uma breve descrição </p> -->
                    <p class="site-menu-2-preco"> <?= $bebida->preco ?> €</p>
                </div>
                <?= ($count % 3 == 0) ? '</div>' : ''; ?>
                <?php $count++;
            } ?>
        <?php endforeach; ?>
    </div>

    <div class="site-menu-2 clearfix col-lg-9">
        <p id="sumos" class="titulo-menu"> Outras Bebidas </p>
        <p class="line"> _____</p>
        <?php
        $count = 1;
        foreach ($bebidas as $bebida):
            if ($bebida->id_tipo_bebida == 3) { ?>
                <?= ($count % 3 == 0) ? '<div class="row">' : ''; ?>
                <div class="site-menu-2-1 col-lg-4">
                    <div class="opacity">
                        <img class="site-encomenda-2-image"
                             src="<?php echo Yii::getAlias('@pratoImgUrlOutros') . '/' . $bebida->imagem; ?>">
                        <div class="middle">
                            <form action="<?= Url::to(['encomendas']) ?>" method="post" >
                                <button class="btn-encomenda"><i class="fas fa-shopping-cart"></i></button>
                            </form>
                        </div>
                    </div>
                    <h1 class="site-menu-2-titulo"> <?= $bebida->descricao ?> </h1>
                    <p class="line-grey"> ____________</p>
                    <!-- <p class="site-menu-2-paragrafo"> Esse é um item do seu menu. Adicione uma breve descrição </p> -->
                    <p class="site-menu-2-preco"> <?= $bebida->preco ?> €</p>
                </div>
                <?= ($count % 3 == 0) ? '</div>' : ''; ?>
                <?php $count++;
            } ?>
        <?php endforeach; ?>
    </div>


    <div class="site-menu-2 clearfix col-lg-9">
        <p id="sobremesas" class="titulo-menu"> Sobremesas </p>
        <p class="line"> _____</p>
        <?php
        $count = 1;
        foreach ($sobremesas as $sobremesa): ?>
            <?= ($count % 3 == 0) ? '<div class="row">' : ''; ?>
            <div class="site-menu-2-1 col-lg-4">
                <div class="opacity">
                    <img class="site-encomenda-2-image"
                         src="<?php echo Yii::getAlias('@pratoImgUrlSobremesas') . '/' . $sobremesa->imagem; ?>">
                    <div class="middle">
                        <form action="<?= Url::to(['encomendas']) ?>" method="post" >
                            <button class="btn-encomenda"><i class="fas fa-shopping-cart"></i></button>
                        </form>
                    </div>
                </div>
                <h1 class="site-menu-2-titulo"> <?= $sobremesa->descricao ?> </h1>
                <p class="line-grey"> ____________</p>
                <!-- <p class="site-menu-2-paragrafo"> Esse é um item do seu menu. Adicione uma breve descrição </p> -->
                <p class="site-menu-2-preco"> <?= $sobremesa->preco ?> €</p>
            </div>
            <?= ($count % 3 == 0) ? '</div>' : ''; ?>
            <?php $count++; ?>
        <?php endforeach; ?>
    </div>

