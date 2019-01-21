<?php namespace frontend\tests;

use backend\models\Prato;

class UnitPratoTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
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
        $prato = new Prato();

        $prato->descricao = null;
        $this->assertFalse($prato->validate(['descricao']));

        $prato->preco = null;
        $this->assertFalse($prato->validate(['preco']));

        $prato->preco = 1234567890;
        $this->assertTrue($prato->validate(['preco']));

        $prato->id_tipo_prato = null;
        $this->assertTrue($prato->validate(['id_tipo_prato']));

        $prato->id_tipo_prato = 'abc';
        $this->assertFalse($prato->validate('id_tipo_prato'));

        $prato->imagem = null;
        $this->assertFalse($prato->validate(['imagem']));

        $prato->id_dia_semana = 'abc';
        $this->assertFalse($prato->validate(['id_dia_semana']));

        $prato->id_dia_semana = null;
        $this->assertTrue($prato->validate(['id_dia_semana']));
    }
    /*public function TrySave()
    {
        $prato = new Prato();

        $prato->descricao = 'Chouriça';
        $this->assertTrue($prato->validate(['descricao']));

        $prato ->preco = 2.3;
        $this->assertFalse($prato->validate(['preco']));

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

        //$this->teste->seeInDatabase('prato',['descricao' => 'Chouriça' , 'preco' =>'2.3', 'id_tipo_prato' =>'1', 'imagem' => 'chouriça.png', 'id_dia_semana' => '1']);
    }*/
}