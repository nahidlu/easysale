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
	
	
	 public function actionEmplist()
    {
	
		$response =array();
		$query = User::find()
			//->orderBy('ID DESC')
			->asArray()
			->all();
			//print_r($query);exit;
			
			$response["status"]="success";
			$response["message"] = "Product listed successfully.";
			$response["data"]=$query;
			header('Content-type: application/json');
			echo json_encode($response);
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
	
	public function actionDeleteemployee()
	{
		$data = json_decode(file_get_contents("php://input"));
		$query = User::deleteAll('sn='.$data->sn);
		if($query)
		{
			$response["status"]='success';
			$response["message"] = 'Owner deleted successfully.';
			//$response["data"]=(int)$model->id;
			http_response_code(200);
			header('Content-type: application/json');
			echo json_encode($response,JSON_NUMERIC_CHECK);
		}
	}
	
	public function actionChangestatus()
	{
		$data = json_decode(file_get_contents("php://input"));
		$query = User::updateAll(['status' => $data->status], 'sn = '.$data->id);
		
		if($query)
		{
			$response["status"]='success';
			$response["message"] = 'Status changed successfully.';
			//$response["data"]=(int)$model->id;
			http_response_code(200);
			header('Content-type: application/json');
			echo json_encode($response,JSON_NUMERIC_CHECK);
		}
	}
	
	

}

?>