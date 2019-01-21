<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;

class SobremesaCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage(\Yii::$app->homeUrl);
        $I->amOnRoute('site/login');
        $I->fillField('Username', 'TesteAdmin');
        $I->fillField('Password', 'teste123');
        $I->click('Login', '.login-button');
        $I->amOnRoute('sobremesa/create');
    }

    public function tryCreateComent(FunctionalTester $I)
    {
        $I->amOnPage(\Yii::$app->homeUrl);
        $I->amOnRoute('sobremesa/create');

        $I->fillField('Descricao', 'Gelado de morango');
        $I->fillField('Preco', 2.45);
<<<<<<< HEAD
        //$I->attachFile('Imagem', 'gelado-de-morango.png'); FAZER IMAGEM
=======
        $I->attachFile('Imagem', 'gelado-de-morango.png'); //Imagem na "_data"
>>>>>>> master
        $I->click('Criar');

        $I->see('Gelado de morango', 'td');
        $I->see(2.45, 'td');
        $I->see('gelado-de-morango.png', 'td');
    }

    public function tryEmptySobremesa(FunctionalTester $I)
    {
        $I->seeInTitle('Criar Sobremesa');
        $I->seeInField('Descricao',null);
        $I->seeInField('Preco', null);
        //$I->seeInField('Imagem', null); FAZER IMAGEM
    }
}
