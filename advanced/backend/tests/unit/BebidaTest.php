<?php namespace backend\tests;

use backend\models\Bebida;
use backend\models\Menu;
use backend\models\Sobremesa;

class BebidaTest extends \Codeception\Test\Unit
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
        $bebida = new Bebida();

        $bebida->descricao = null;
        $this->assertFalse($bebida->validate(['descricao']));

        $bebida ->preco = null;
        $this->assertFalse($bebida->validate(['preco']));

        $bebida ->preco = 'asdasd';
        $this->assertFalse($bebida->validate(['preco']));

        $bebida->imagem = null;
        $this->assertFalse($bebida->validate(['imagem']));

        $bebida->imagem = 1345;
        $this->assertFalse($bebida->validate(['imagem']));

        $bebida->id_tipo_bebida = null;
        $this->assertFalse($bebida->validate(['id_tipo_bebida']));

        $bebida->id_tipo_bebida = 'abc';
        $this->assertFalse($bebida->validate(['id_tipo_bebida']));
    }


    public function testSave(){

        $bebida = new Bebida();

        $bebida->descricao = 'Ice-tea';
        $this->assertTrue($bebida->validate(['descricao']));

        $bebida ->preco = 1.3;
        $this->assertTrue($bebida->validate(['preco']));

        $bebida->imagem = 'Ice-tea.png';
        $this->assertTrue($bebida->validate(['imagem']));

        $bebida->id_tipo_bebida = 1;
        $this->assertTrue($bebida->validate(['id_tipo_bebida']));

        $bebida->save();

        $this->assertEquals('Ice-tea',$bebida->descricao);
        $this->assertEquals(1.3,$bebida->preco);
        $this->assertEquals('Ice-tea.png',$bebida->imagem);
        $this->assertEquals(1,$bebida->id_tipo_bebida);

        $this->tester->seeInDatabase('bebida',['descricao' => 'Ice-tea' , 'preco' =>'1.3', 'imagem' => 'Ice-tea.png', 'id_tipo_bebida' => '1']);

    }

    public function testUpdate(){
        //$id = $this->tester->grabRecord('backend\models\Bebida', ['descricao' => 'cocacola']);
        $bebida = Bebida::findOne(['descricao' => 'Ice-tea']);
        $bebida->descricao = 'cocacola';
        $bebida->update();

        $this->tester->seeRecord('backend\models\Bebida', ['descricao' => 'cocacola']);
    }

    function testDelete(){
        Menu::deleteAll();
        Bebida::deleteAll(['descricao' => 'cocacola']);
        $conta = Bebida::find()->where(['descricao' => 'cocacola'])->Count();
        $this->assertEquals(0, $conta);

    }
}