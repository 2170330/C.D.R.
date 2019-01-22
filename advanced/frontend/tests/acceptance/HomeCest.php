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
       // $I->wait(2);
        $I->fillField('Username', 'asd');
       // $I->wait(2);
        $I->fillField('Password', 123456);
       // $I->wait(2);
        $I->click('Login');

        // Página Home Logado
        $I->see('C.D.R.');

        $I->amOnPage('index');
        $I->wait(2);
        $I->see('Reservas', '.descricao');
        $I->see('reservar', '.btn-reservar');
        $I->see('1 pessoa', '#reserva-npessoas');

        //Reservar mesa
        $I->selectOption('Reserva[nPessoas]', '2');
        $I->wait(2);

        $I->fillField('Reserva[data]', '2019-01-23 12:30');

        $I->click('Reservar');
        $I->wait(2);


        $I->click('Voltar');
        $I->wait(2);

        $I->click('MENU');
        $I->wait(2);

        // Página Menu
            // Menus
        $I->see('Menus');
        $I->click('Menu');
        $I->wait(2);
            // Prato Carne
        $I->moveMouseOver('.sidebar-menuPratos');
        $I->wait(2);
        $I->see('Carne');
        $I->wait(2);
        $I->click('Carne');
        $I->wait(2);
            // Prato Peixe
        $I->moveMouseOver('.sidebar-menuPratos');
        $I->wait(2);
        $I->see('Peixe');
        $I->wait(2);
        $I->click('Peixe');
        $I->wait(2);
            // Prato Vegetariano
        $I->moveMouseOver('.sidebar-menuPratos');
        $I->wait(2);
        $I->see('Vegetariano');
        $I->wait(2);
        $I->click('Vegetariano');
        $I->wait(2);
            // Prato Vegan
        $I->moveMouseOver('.sidebar-menuPratos');
        $I->wait(2);
        $I->see('Vegan');
        $I->wait(2);
        $I->click('Vegan');
        $I->wait(2);
            // Bebidas Sumos
        $I->moveMouseOver('.sidebar-menuBebidas');
        $I->wait(2);
        $I->moveMouseOver('.sidebar-menuBebidas');
        $I->wait(2);
        $I->see('Sumos');
        $I->wait(2);
        $I->click('Sumos');
        $I->wait(2);
            // Bebidas Vinhos
        $I->moveMouseOver('.sidebar-menuBebidas');
        $I->wait(2);
        $I->see('Vinhos');
        $I->wait(2);
        $I->click('Vinhos');
        $I->wait(2);
            // Bebidas Outras Bebidas
        $I->moveMouseOver('.sidebar-menuBebidas');
        $I->wait(2);
        $I->see('Outras Bebidas');
        $I->wait(2);
        $I->click('Outras Bebidas');
        $I->wait(2);

        $I->moveMouseOver('.sidebar-menu');
        $I->wait(1);

        $I->moveMouseOver('.sidebar-menu');
        $I->wait(1);

        $I->see('Sobremesas');

        $I->click('Sobremesas');
        $I->wait(2);

        $I->see('COMENTARIOS');
        $I->click('COMENTARIOS');
        $I->wait(2);

        $I->see('Comentários');
        $I->click(['name'=>'star5']);
        $I->wait(2);

        $I->fillField('Comentario[mensagem]', 'Muito Bom Serviço');
        $I->wait(2);
        $I->click('Comentar');
        $I->wait(2);
        $I->click('Voltar');
        $I->wait(2);

        $I->click('CONTACTO');
        $I->wait(2);

        $I->fillField('Mensagem[nome]', 'ASD');
        $I->fillField('Mensagem[email]', '111@111.com');
        $I->fillField('Mensagem[assunto]', 'Encomenda');
        $I->fillField('Mensagem[mensagem]', 'Teste');
        $I->click('Save');
        $I->wait(2);
        $I->click('Voltar');
        $I->wait(2);
    }
}
