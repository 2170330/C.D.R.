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


        $I->click('LOGIN');
        $I->wait(2); // wait for page to be opened

        $I->see('Iniciar sessão');

        $I->fillField('Username', 123);
        $I->wait(2);
        $I->fillField('Password', 123456);
        $I->wait(2);
        $I->click('Login');
        $I->wait(5);

    }
}
