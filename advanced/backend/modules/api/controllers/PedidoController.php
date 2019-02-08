<?php
/**
 * Created by PhpStorm.
 * User: Utilizador
 * Date: 31/12/2018
 * Time: 09:58
 */

namespace backend\modules\api\controllers;

use backend\models\AuthAssignment;
use common\models\User;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;

class PedidoController extends ActiveController
{
    public $modelClass = 'backend\models\Pedido';

    //Utilizadores com admin podem mexer na api
    public function behaviors()
    {
        $model = AuthAssignment::find()->where(['user_id' => $this->id])->one();

        $behaviors = parent::behaviors();

        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'auth' => [$this, 'auth'],

        ];

        return $behaviors;


    }

    //Autenticacao do utilizador
    public function auth($username, $password)
    {
        $user = User::findByUsername($username);
        if ($user && $user->validatePassword($password) && key(Yii::$app->authManager->getRolesByUser($user->id)) == 'admin')
        {
            return $user;
        }
        else{
            throw new \yii\web\NotFoundHttpException("Utilizador não encontrado ou não tem permissões");
        }
    }

    //conta o total de Pedidos que existe
    public function actionTotal()
    {
        $Pedido = new $this->modelClass;
        $contarPedidos = $Pedido::find()->all();
        return ['total' => count($contarPedidos)];
    }

    //Vai mostrando [pedido1 + pedido2 + ...] dependendo do limite escolhido
    public function actionSet($id) {
        $Pedido = new $this->modelClass;
        $recordPedidos = $Pedido::find()->limit($id)->all();
        return ['limite' => $id, 'Records' => $recordPedidos];
    }



}