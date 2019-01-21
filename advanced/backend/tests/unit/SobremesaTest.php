<?php namespace backend\tests;

use backend\models\Menu;
use backend\models\Sobremesa;

class SobremesaTest extends \Codeception\Test\Unit
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
        $sobremesa = new Sobremesa();

        $sobremesa->descricao = null;
        $this->assertFalse($sobremesa->validate(['descricao']));

        $sobremesa ->preco = null;
        $this->assertFalse($sobremesa->validate(['preco']));

        $sobremesa ->preco = 'asdasd';
        $this->assertFalse($sobremesa->validate(['preco']));

        $sobremesa ->imagem = null;
        $this->assertFalse($sobremesa->validate(['imagem']));

        $sobremesa ->imagem = 123456;
        $this->assertFalse($sobremesa->validate(['imagem']));
    }


    public function testSave(){
        $sobremesa =  new Sobremesa();

        $sobremesa->descricao = 'Cheesecake';
        $this->assertTrue($sobremesa->validate(['descricao']));

        $sobremesa ->preco = 2.3;
        $this->assertTrue($sobremesa->validate(['preco']));

        $sobremesa->imagem = 'cheesecake.png';
        $this->assertTrue($sobremesa->validate(['imagem']));

        $sobremesa->save();

        $this->assertEquals('Cheesecake',$sobremesa->descricao);
        $this->assertEquals(2.3,$sobremesa->preco);
        $this->assertEquals('cheesecake.png',$sobremesa->imagem);

        $this->tester->seeInDatabase('sobremesa',['descricao' => 'Cheesecake' , 'preco' =>'2.3',  'imagem' => 'cheesecake.png']);
    }

    public function testUpdate(){

        $id = $this->tester->grabRecord('backend\models\Sobremesa', ['descricao' => 'Cheesecake']);
        $sobremesa = Sobremesa::findOne($id);
        $sobremesa->descricao = 'Pudim';
        $sobremesa->update();

       $this->tester->seeRecord('backend\models\Sobremesa', ['descricao' => 'Cheesecake']);

    }

   function testDelete(){
        Menu::deleteAll();
        Sobremesa::deleteAll(['descricao' => 'Pudim']);
        $conta = Sobremesa::find()->where(['descricao' => 'Pudim'])->Count();
        $this->assertEquals(0, $conta);

    }
}