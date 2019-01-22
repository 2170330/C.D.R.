<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;

class ComentarioCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage(\Yii::$app->homeUrl);
        $I->amOnRoute('site/login');
        $I->fillField('Username', 'TesteAdmin');
        $I->fillField('Password', 'teste123');
        $I->click('Login', '.login-button');
        $I->amOnRoute('comentario/create');
    }

    public function tryCreateComment(FunctionalTester $I)
    {
        $I->selectOption("Avaliacao", 5); // Avaliacao -> 1 estrela
        $I->fillField("Mensagem", "Gostei muito");
        $I->selectOption("Utilizador", 62); // Utilizador -> Teste, option 62 = id do utilizador
        $I->click("Criar");

        $I->see(5);
        $I->see("Gostei muito");
        $I->see("Teste");
    }

    public function tryEmptyComment(FunctionalTester $I)
    {
        $I->seeInTitle("Criar Comentario");
        $I->seeInField("Avaliacao", null);
        $I->seeInField("Mensagem", null);
        $I->seeInField("Utilizador", null);
    }
}
