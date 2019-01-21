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
<<<<<<< HEAD
<<<<<<< HEAD
        $I->selectOption('Avaliacao', 4);
        $I->fillField('Mensagem', 'Gostei muito. Obrigado');
        $I->fillField('Assunto', 'Avaliacao do restaurante');
        $I->selectOption('Utilizador', 'Carlitos');
        $I->click('Criar');


        $I->see(4, 'td');
        $I->see('Gostei muito. Obrigado', 'td');
        $I->see('Avaliacao do restaurante', 'td');
        $I->see('Carlitos', 'td');
=======
        $I->selectOption("Avaliacao", 5); // Avaliacao -> 1 estrela
        $I->fillField("Mensagem", "Gostei muito");
        $I->selectOption("Utilizador", 62); // Utilizador -> Teste, option 62 = id do utilizador
        $I->click("Criar");

        $I->see(5);
        $I->see("Gostei muito");
        $I->see("Teste");
>>>>>>> master
=======

>>>>>>> Rafaela
    }

    public function tryEmptyComent(FunctionalTester $I)
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $I->seeInTitle('Criar Mensagem');
        $I->seeInField('Avaliacao',null);
        $I->seeInField('Mensagem', null);
        $I->seeInField('Assunto', null);
        $I->seeInField('Utilizador',null);
=======
        $I->seeInTitle("Criar Comentario");
        $I->seeInField("Avaliacao", null);
        $I->seeInField("Mensagem", null);
        $I->seeInField("Utilizador", null);
>>>>>>> master
=======

>>>>>>> Rafaela
    }
}
