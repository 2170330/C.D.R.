<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;

class BebidaCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage(\Yii::$app->homeUrl);
        $I->amOnRoute('site/login');
        $I->fillField('Username', 'TesteAdmin');
        $I->fillField('Password', 'teste123');
        $I->click('Login', '.login-button');
        $I->amOnRoute('bebida/create');
    }

    // tests
    public function tryCreateBebida(FunctionalTester $I)
    {
        $I->fillField("Descricao", 'Vinho Tinto');
        $I->fillField("Preco", 1.65);
        $I->attachFile("Imagem", "vinho-tinto-cocktail.png"); //Imagem na "_data"
        $I->selectOption("Tipo de Bebida", 2); // Option 2 = Vinhos
        $I->click("Criar");

        $I->see("Vinho Tinto");
        $I->see(1.65);
        $I->see("vinho-tinto-cocktail.png");
        $I->see("Vinhos");
    }

    public function tryEmptyBebida(FunctionalTester $I){
        $I->seeInTitle('Criar Bebida');
        $I->seeInField('Descricao', null);
        $I->seeInField('Preco', null);
        $I->seeInField('Tipo de Bebida', null);

    }
}
