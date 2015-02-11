<?php

namespace frontend\controllers;
use yii;
use yii\filters\AccessControl;
use common\models\User;

class EmployeeController extends \yii\web\Controller
{
	public $enableCsrfValidation = false;
	
    public function actionIndex()
    {
		
		$model = new User;
		$data = User::find()->all();
		
	
        return $this->render('index',['model'=>$model,'data'=>$data]);
    }
	
	
	
	public function actionTest(){
		
		$data = json_decode(file_get_contents("php://input"));
		$username = $data->uname;
		$password = $data->pswd;
		$usertype = $data->type;
		$model = new User();
		$model->username =  $username;
		$model->password =  md5($password);
		$model->type =  $usertype;
		
		$model->shop_id = Yii::$app->session->get('shopid');
		
		$model->save();
		
	}

}

?>