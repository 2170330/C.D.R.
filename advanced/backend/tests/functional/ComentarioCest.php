<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;

class ComentarioCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage(\Yii::$app->homeUrl);
        $I->amOnRoute('site/login');
        $I->fillField('Username', 'Carlitos');
        $I->fillField('Password', 'asda123');
        $I->click('Login', '.login-button');
        $I->amOnRoute('mensagem/create');
    }

    public function tryCreateComent(FunctionalTester $I)
    {
        $I->selectOption('Avaliacao', 4);
        $I->fillField('Mensagem', 'Gostei muito. Obrigado');
        $I->fillField('Assunto', 'Avaliacao do restaurante');
        $I->selectOption('Utilizador', 'Carlitos');
        $I->click('Criar');


        $I->see(4, 'td');
        $I->see('Gostei muito. Obrigado', 'td');
        $I->see('Avaliacao do restaurante', 'td');
        $I->see('Carlitos', 'td');
    }

    public function tryEmptyComent(FunctionalTester $I)
    {
        $I->seeInTitle('Criar Mensagem');
        $I->seeInField('Avaliacao',null);
        $I->seeInField('Mensagem', null);
        $I->seeInField('Assunto', null);
        $I->seeInField('Utilizador',null);
    }
}
