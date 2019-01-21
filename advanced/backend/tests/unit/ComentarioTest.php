<?php namespace backend\tests;

use backend\models\Comentario;

class ComentarioTest extends \Codeception\Test\Unit
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
       $comentario = new Comentario();

       $comentario->avaliacao = null;
       $this->assertFalse($comentario->validate(['avaliacao']));

       $comentario ->mensagem = null;
       $this->assertFalse($comentario->validate(['mensagem']));

       $comentario ->id_user = null;
       $this->assertFalse($comentario->validate(['id_user']));

       $comentario ->avaliacao = 'asdasd';
       $this->assertFalse($comentario->validate(['avaliacao']));

       $comentario->id_user = 'abc';
       $this->assertFalse($comentario->validate(['id_user']));
   }


   public function testSave(){

       $comentario = new Comentario();

       $comentario->avaliacao = 1;
       $this->assertTrue($comentario->validate(['avaliacao']));

       $comentario ->mensagem = 'na gostei';
       $this->assertTrue($comentario->validate(['mensagem']));

       $comentario->id_user = 1;
       $this->assertTrue($comentario->validate(['id_user']));

       $comentario->save();

       $this->assertEquals(1,$comentario->avaliacao);
       $this->assertEquals('na gostei',$comentario->mensagem);
       $this->assertEquals(1,$comentario->id_user);

       $this->tester->seeInDatabase('$comentario',['avaliacao' => '1' , 'mensagem' =>'na gostei', 'id_user' => '1']);

   }

    public function testUpdate(){
        $id = $this->tester->grabRecord('backend\models\Comentario', ['id_user' => '1']);
        $comentario = Comentario::findOne($id);
        $comentario->mensagem = 'Goste';
        $comentario->update();

        $this->tester->seeRecord('backend\models\Comentario', ['id_user' => '1']);
    }

    function testDelete(){
        Comentario::deleteAll(['id_user' => '1']);
        $conta = Comentario::find()->where(['id_user' => '1'])->Count();
        $this->assertEquals(0, $conta);

    }

}