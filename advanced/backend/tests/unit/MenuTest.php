<?php namespace backend\tests;

use backend\models\Menu;

class MenuTest extends \Codeception\Test\Unit
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

        $menu = new Menu();

        $menu->id_prato = null;
        $this->assertFalse($menu->validate(['id_prato']));

        $menu ->id_bebida = null;
        $this->assertFalse($menu->validate(['id_bebida']));

        $menu ->id_sobremesa = null;
        $this->assertFalse($menu->validate(['id_sobremesa']));

        $menu ->id_prato = 'abc';
        $this->assertFalse($menu->validate(['id_prato']));

        $menu->id_bebida = 'abc';
        $this->assertFalse($menu->validate(['id_bebida']));

        $menu->id_sobremesa = 'abc';
        $this->assertFalse($menu->validate(['id_sobremesa']));

        $menu ->preco = null;
        $this->assertFalse($menu->validate(['preco']));

        $menu ->preco = 'asdasd';
        $this->assertFalse($menu->validate(['preco']));

        $menu ->imagem = null;
        $this->assertFalse($menu->validate(['imagem']));

    }


    public function testSave(){

        $menu = new Menu();

        $menu->id_prato = 1;
        $this->assertTrue($menu->validate(['id_prato']));

        $menu->id_bebida = 1;
        $this->assertTrue($menu->validate(['id_bebida']));

        $menu ->id_sobremesa = 1;
        $this->assertTrue($menu->validate(['id_sobremesa']));

        $menu ->preco = 12.5;
        $this->assertTrue($menu->validate(['preco']));

        $menu->imagem = 'portuguesa.png';
        $this->assertTrue($menu->validate(['imagem']));

        $menu->save();

        $this->assertEquals(1,$menu->id_prato);
        $this->assertEquals(1,$menu->id_bebida);
        $this->assertEquals(1,$menu->id_sobremesa);
        $this->assertEquals('12.5',$menu->preco);
        $this->assertEquals('portuguesa.png',$menu->imagem);

        $this->tester->seeInDatabase('menu',['id_prato' => '1' , 'id_bebida' =>'1', 'id_sobremesa' =>'1', 'preco' => '12.5', 'imagem' => 'portuguesa.png']);

    }

    public function testUpdate()
    {

        $id = $this->tester->grabRecord('backend\models\Menu', ['id_prato' => '1']);
        $menu = Menu::findOne($id);
        $menu->id_prato = '3';
        $menu->update();

        $this->tester->seeRecord('backend\models\Menu', ['id_prato' => '1']);
    }

    function testDelete(){

        Menu::deleteAll(['id_prato' => '1']);
        $conta = Menu::find()->where(['id_prato' => '1'])->Count();
        $this->assertEquals(0, $conta);

    }
}