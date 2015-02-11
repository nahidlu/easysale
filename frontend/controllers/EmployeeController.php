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
		return $this->render('index',['model'=>$model]);
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
		
		if($model->save()){
		$arr = array('msg' => "User Created Successfully !!!", 'error' => '');
        $jsn = json_encode($arr);
        print_r($jsn);
		}
	}
	
	public function actionView(){
		
			$data = User::find()->asArray()->all();
			//print_r($datass);exit;
			//$data = array()$datass;
			//print_r($data[]);exit;
			print json_encode($data);
	}

}

?>