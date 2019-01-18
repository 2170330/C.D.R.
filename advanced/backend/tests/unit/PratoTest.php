<?php

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

    public function testSomeFeature()
    {


    }

    public  function testInvalidat(){

        $prato = new Prato();

        $prato->descricao = null;
        $this->assertFalse($prato->validate(['descricao']));

        $prato ->preco = null;
        $this->assertFalse($prato->validate(['preco']));

        $prato ->preco = 'asdasd';
        $this->assertFalse($prato->validate(['preco']));

        $prato ->id_tipo_prato = null;
        $this->assertFalse($prato->validate(['id_tipo_prato']));

        $prato ->id_tipo_prato = 'abc';
        $this->assertFalse($prato->validate(['id_tipo_prato']));

        $prato->imagem = null;
        $this->assertFalse($prato->validate(['imagem']));

        $prato->id_dia_semana = 'abc';
        $this->assertFalse($prato->validate(['id_dia_semana']));

        $prato->id_dia_semana = null;
        $this->assertFalse($prato->validate(['id_dia_semana']));

    }


    public function testSave(){

        $prato = new Prato();

        $prato->descricao = 'Chouriça';
        $this->assertTrue($prato->validate(['descricao']));

        $prato ->preco = 2.3;
        $this->assertTrue($prato->validate(['preco']));

        $prato ->id_tipo_prato = 1;
        $this->assertTrue($prato->validate(['id_tipo_prato']));

        $prato->imagem = 'chouriça.png';
        $this->assertTrue($prato->validate(['imagem']));

        $prato->id_dia_semana = 1;
        $this->assertTrue($prato->validate(['id_dia_semana']));

        $prato->save();

        $this->assertEquals('Chouriça',$prato->descricao);
        $this->assertEquals(2.3,$prato->preco);
        $this->assertEquals(1,$prato->id_tipo_prato);
        $this->assertEquals('chouriça.png',$prato->imagem);
        $this->assertEquals(1,$prato->id_dia_semana);

        $this->tester->seeInDatabase('prato',['descricao' => 'Chouriça' , 'preco' =>'2.3', 'id_tipo_prato' =>'1', 'imagem' => 'chouriça.png', 'id_dia_semana' => '1']);

        }

    public function testUpdate()
    {

        $id = $this->tester->grabRecord('backend\models\Prato', ['descricao' => 'Chouriça']);
       $prato = Prato::findOne($id);
        $prato->descricao = 'Alheira';
       $prato->update();

       $this->tester->seeRecord('backend\models\Prato', ['descricao' => 'Chouriça']);
    }

    function testDelete(){


        Menu::deleteAll();
        Prato::deleteAll(['descricao' => 'Alheira']);
        $conta = Prato::find()->where(['descricao' => 'Alheira'])->Count();
        $this->assertEquals(0, $conta);

    }
}