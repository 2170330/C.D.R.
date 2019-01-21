<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;

class ReservaCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage(\Yii::$app->homeUrl);
        $I->amOnRoute('site/login');
        $I->fillField('Username', 'TesteAdmin');
        $I->fillField('Password', 'teste123');
        $I->click('Login', '.login-button');
        $I->amOnRoute('reserva/create');
    }

    // tests
    public function tryToReserva(FunctionalTester $I)
    {
        $I->selectOption("Número de pessoas", 3); // Numero de pessoas -> 3 pessoas
        $I->fillField('Data', "2019-04-10 18:01:01");
        $I->selectOption("Utilizador", 62); // Utilizador -> Teste, option 62 = id do utilizador
        $I->click('Criar');

        $I->see(3, 'td');
        $I->see('2019-04-10 18:01:01', 'td');
        $I->see('Teste', 'td');
    }

    public function tryEmptyReserva(FunctionalTester $I)
    {
        $I->seeInTitle('Criar Reserva');
        $I->seeInField('Número de pessoas', null);
        $I->seeInField('Data', null);
        $I->seeInField('Utilizador', null);

    }
}
