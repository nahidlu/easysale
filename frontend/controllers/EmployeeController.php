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
		if(@$data->sn){
			$model = User::findOne($data->sn);
			$model->sn = $data->sn;
		}else{
			$model = new User();
		}
		$model->username =  $data->uname;
		$model->password =  md5($data->pswd);
		$model->type =  $data->type;
		$model->shop_id = Yii::$app->session->get('shopid');
		if($model->save()){
		$arr = array('msg' => "User Created Successfully !!!", 'error' => '');
		//sleep(5);
        $jsn = json_encode($arr);
        print_r($jsn);
		
		}
		
	}
	
	public function actionView(){
		
			$data = User::find()->asArray()->all();
			print json_encode($data);
	}
	
	public function actionDelete(){
		$data = json_decode(file_get_contents("php://input"));
		$user = User::findOne($data->id);
		$user->delete();
		$arr = array('msg' => "User deleted Successfully !!!", 'error' => '');
        $jsn = json_encode($arr);
        print_r($jsn);
		
		
	}
	
	

}

?>