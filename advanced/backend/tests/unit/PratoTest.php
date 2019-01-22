<?php namespace backend\tests;

use backend\models\Menu;
use backend\models\Prato;

class PratoTest extends \Codeception\Test\Unit
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
        $prato = new Prato();

        $prato->descricao = null;
        $this->assertFalse($prato->validate(['descricao']));

        $prato ->preco = null;
        $this->assertFalse($prato->validate(['preco']));

        $prato ->id_tipo_prato = null;
        $this->assertTrue($prato->validate(['id_tipo_prato']));

        $prato ->preco = 'asdasd';
        $this->assertFalse($prato->validate(['preco']));

        $prato ->id_tipo_prato = 'asd';
        $this->assertFalse($prato->validate(['id_tipo_prato']));

        $prato ->imagem = null;
        $this->assertFalse($prato->validate(['imagem']));

        $prato ->imagem = 123456;
        $this->assertFalse($prato->validate(['imagem']));

        $prato ->id_dia_semana = 'assddddf';
        $this->assertFalse($prato->validate(['id_dia_semana']));
    }


    public function testSave(){
        $prato =  new Prato();

        $prato->descricao = 'Chourica';
        $this->assertTrue($prato->validate(['descricao']));

        $prato ->preco = 2.3;
        $this->assertTrue($prato->validate(['preco']));

        $prato->id_tipo_prato = 1;
        $this->assertTrue($prato->validate(['id_tipo_prato']));

        $prato->imagem = 'chourica.png';
        $this->assertTrue($prato->validate(['imagem']));

        $prato->id_dia_semana = 1;
        $this->assertTrue($prato->validate(['id_dia_semana']));

        $prato->save();

        $this->assertEquals('Chourica',$prato->descricao);
        $this->assertEquals(2.3,$prato->preco);
        $this->assertEquals(1,$prato->id_tipo_prato);
        $this->assertEquals('chourica.png',$prato->imagem);
        $this->assertEquals(1,$prato->id_dia_semana);

        $this->tester->seeInDatabase('prato',['descricao' => 'Chourica' , 'preco' =>'2.3',  'id_tipo_prato' => '1', 'imagem' => 'chourica.png', 'id_dia_semana' => '1']);
    }

    public function testUpdate(){

        $id = $this->tester->grabRecord('backend\models\Prato', ['descricao' => 'Chourica']);
        $prato = Prato::findOne($id);
        $prato->descricao = 'Alheira';
        $prato->update();

        $this->tester->seeRecord('backend\models\Prato', ['descricao' => 'Alheira']);

    }

    function testDelete(){
        Menu::deleteAll();
        Prato::deleteAll(['descricao' => 'Alheira']);
        $conta = Prato::find()->where(['descricao' => 'Alheira'])->Count();
        $this->assertEquals(0, $conta);

    }
}