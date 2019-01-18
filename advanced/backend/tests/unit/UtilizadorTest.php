<?php namespace backend\tests;

use backend\models\Utilizador;

class UtilizadorTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {

    }

    public  function testInvalidat(){

        $user = new Utilizador();

        $user->username = null;
        $this->assertFalse($user->validate(['username']));

        $user ->email = null;
        $this->assertFalse($user->validate(['email']));

        $user ->email = 'sadad';
        $this->assertFalse($user->validate(['email']));

        $user ->nif = 'asdfghjkl';
        $this->assertFalse($user->validate(['nif']));

    }
    public function testSaveUser(){
        $user = new Utilizador();

        $user->username = 'Maria';
        $this->assertTrue($user->validate(['username']));

        $user->email = 'Maria@asss.spf';
        $this->assertTrue($user->validate(['email']));

        $user->generateAuthKey();
        $user->generatePasswordResetToken();
        $user->setPassword('123456');

        $user->nome = 'Maria Oliveira';
        $this->assertTrue($user->validate(['nome']));

        $user->morada = 'Asdd s s';
        $this->assertTrue($user->validate(['morada']));

        $user->nif = 12345678;
        $this->assertTrue($user->validate(['nif']));

        $user->save();
    }
}