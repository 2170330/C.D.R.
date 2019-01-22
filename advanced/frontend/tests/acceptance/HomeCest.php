<?php
namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class HomeCest
{
    public function checkHome(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/index'));
        $I->see('C.D.R.');

        // Página Login
        $I->click('LOGIN');
        //$I->wait(2); // wait for page to be opened

        $I->see('Iniciar sessão');
        $I->click('registe aqui');
        //$I->wait(2);

        // Página Registar
        $I->see('Registar');
        $I->fillField('Username', 'asd');
        //$I->wait(2);
        $I->fillField('Password', 123456);
        //$I->wait(2);
        $I->fillField('Email', 'asd@asd.asd');
        //$I->wait(2);
        $I->fillField('Nome', 'ASD');
        //$I->wait(2);
        $I->fillField('Morada', 'Rua 123 nº3');
        //$I->wait(2);
        $I->fillField('Nif', 123456789);
        //$I->wait(2);
        $I->click('Signup');
        $I->wait(2);

        // Página Home
        $I->see('C.D.R.');
        $I->click('Logout');
        //$I->wait(2);
        $I->click('LOGIN');
        //$I->wait(2);

        // Página Login
        $I->see('Iniciar sessão');
        $I->wait(2);
        $I->fillField('Username', 'asd');
        $I->wait(2);
        $I->fillField('Password', 123456);
        $I->wait(2);
        $I->click('Login');

        // Página Home Logado
        $I->see('C.D.R.');
        $I->submitForm('reservasForm', ['data' => '2019-01-25', 'nPessoas' => '2']);
       /* $I->selectOption('#reserva-npessoas', '2');
        $I->wait(2);
        $I->fillField('Reserva[data]', '2019-01-23 12:30');
        $I->wait(2);

        $I->click('Reservar');*/

        $I->wait(2);

    }
}
