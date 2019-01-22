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
        $I->wait(1); // wait for page to be opened

        $I->see('Iniciar sessão');
        $I->click('registe aqui');
        $I->wait(1);

        // Página Registar
        $I->see('Registar');
        $I->fillField('Username', 'asd');
        $I->wait(1);
        $I->fillField('Password', 123456);
        $I->wait(1);
        $I->fillField('Email', 'asd@asd.asd');
        $I->wait(1);
        $I->fillField('Nome', 'ASD');
        $I->wait(1);
        $I->fillField('Morada', 'Rua 123 nº3');
        $I->wait(1);
        $I->fillField('Nif', 123456789);
        $I->wait(1);
        $I->click('Signup');
        $I->wait(1);

        // Página Home
        //$I->see('C.D.R.');
        $I->click('Logout');
        $I->wait(1);
        $I->click('LOGIN');
        $I->wait(1);

        // Página Login
        $I->see('Iniciar sessão');
        $I->wait(1);
        $I->fillField('Username', 'asd');
        $I->wait(1);
        $I->fillField('Password', 123456);
        $I->wait(1);
        $I->click('Login');
        $I->wait(1);

        // Página Home Logado
        $I->see('C.D.R.');

        $I->amOnPage(Url::toRoute('/site/index'));
        $I->wait(1);
        $I->see('Reservas', '.descricao');
        $I->see('reservar', '.btn-reservar');
        $I->see('1 pessoa', '#reserva-npessoas');

        //Reservar mesa
        $I->selectOption('Reserva[nPessoas]', '2');
        $I->wait(1);

        $I->fillField('Reserva[data]', '2019-01-23 12:30');

        $I->click('Reservar');
        $I->wait(1);


        $I->click('Voltar');
        $I->wait(1);

        $I->click('MENU');
        $I->wait(1);

        // Página Menu
        // Menus
        $I->see('Menus');
        $I->click('Menu');
        $I->wait(1);
        // Prato Carne
        $I->moveMouseOver('.sidebar-menuPratos');
        $I->wait(1);
        $I->see('Carne');
        $I->wait(1);
        $I->click('Carne');
        $I->wait(1);
        // Prato Peixe
        $I->moveMouseOver('.sidebar-menuPratos');
        $I->wait(1);
        $I->see('Peixe');
        $I->wait(1);
        $I->click('Peixe');
        $I->wait(1);
        // Prato Vegetariano
        $I->moveMouseOver('.sidebar-menuPratos');
        $I->wait(1);
        $I->see('Vegetariano');
        $I->wait(1);
        $I->click('Vegetariano');
        $I->wait(1);
        // Prato Vegan
        $I->moveMouseOver('.sidebar-menuPratos');
        $I->wait(1);
        $I->see('Vegan');
        $I->wait(1);
        $I->click('Vegan');
        $I->wait(1);
        // Bebidas Sumos
        $I->moveMouseOver('.sidebar-menuBebidas');
        $I->wait(1);
        $I->moveMouseOver('.sidebar-menuBebidas');
        $I->wait(1);
        $I->see('Sumos');
        $I->wait(1);
        $I->click('Sumos');
        $I->wait(1);
        // Bebidas Vinhos
        $I->moveMouseOver('.sidebar-menuBebidas');
        $I->wait(1);
        $I->see('Vinhos');
        $I->wait(1);
        $I->click('Vinhos');
        $I->wait(1);
        // Bebidas Outras Bebidas
        $I->moveMouseOver('.sidebar-menuBebidas');
        $I->wait(1);
        $I->see('Outras Bebidas');
        $I->wait(1);
        $I->click('Outras Bebidas');
        $I->wait(1);

        $I->moveMouseOver('.sidebar-menu');
        $I->wait(1);

        $I->moveMouseOver('.sidebar-menu');
        $I->wait(1);

        $I->see('Sobremesas');

        $I->click('Sobremesas');
        $I->wait(1);

        $I->see('COMENTARIOS');
        $I->click('COMENTARIOS');
        $I->wait(1);

        $I->see('Comentários');
        $I->click(['name'=>'star5']);
        $I->wait(1);

        $I->fillField('Comentario[mensagem]', 'Muito Bom Serviço');
        $I->wait(1);
        $I->click('Comentar');
        $I->wait(1);
        $I->click('Voltar');
        $I->wait(1);

        $I->click('CONTACTO');
        $I->wait(1);

        $I->fillField('Mensagem[nome]', 'ASD');
        $I->wait(1);
        $I->fillField('Mensagem[email]', '111@111.com');
        $I->wait(1);
        $I->fillField('Mensagem[assunto]', 'Encomenda');
        $I->wait(1);
        $I->fillField('Mensagem[mensagem]', 'Teste');
        $I->wait(1);
        $I->click('Save');
        $I->wait(1);
        $I->click('Voltar');
        $I->wait(1);
    }
}
