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
        $I->amOnRoute('comentario/create');
    }

    public function tryCreateComent(FunctionalTester $I)
    {

    }

    public function tryEmptyComent(FunctionalTester $I)
    {

    }
}
