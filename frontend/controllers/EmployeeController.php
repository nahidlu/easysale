<?php

namespace frontend\controllers;
use yii;
use yii\filters\AccessControl;
use frontend\models\Shopuser;
use yii\filters\VerbFilter;
use yii\web\Session;

class EmployeeController extends \yii\web\Controller
{
	public $enableCsrfValidation = false;
	
    public function actionIndex()
    {
		
		$model = new Shopuser;
		$data = Shopuser::find()->all();
		
	
        return $this->render('index',['model'=>$model,'data'=>$data]);
    }
	
	public function actionSave(){
	    $session = Yii::$app->session;
		$session->open();
		$data = json_decode(file_get_contents("php://input"));
		$username =$data->uname;
		$password = $data->pswd;
		$usertype = $data->type;
		$model = new Shopuser();
		$model->username =  $username;
		$model->password =  md5($password);
		echo $model->type =  $usertype;
		$model->shop_id =$session->get('shopid');
		echo $session->get('shopid');
		print_r($_SESSION);
		$session['shopid'] = 4444;
		echo $session['shopid'];
		exit;
		$model->save();
	}

}

?>