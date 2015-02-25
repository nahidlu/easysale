<?php

namespace frontend\controllers;
use yii;
use yii\filters\AccessControl;
use common\models\User;
use frontend\models\Role;
use yii\web\Session;

class EmployeeController extends \yii\web\Controller
{
	public $enableCsrfValidation = false;
	
    public function actionIndex()
    {
		
		$model = new User;
		
		return $this->render('index',['model'=>$model]);
    }
	
	public function actionCreateemployee(){
		
		$model = new User();
		$data = json_decode(file_get_contents("php://input"));
		$model->username = $data->username;
		$model->password = md5($data->password);
		$model->type = $data->type;
		$model->emp_id = strtotime(date("Y-m-d H:i:s"));
		$model->status = $data->status;
		$model->shop_id = Yii::$app->session->get('shopid');
		$model->created_at = date('Y-m-d');
		if($model->save())
		{
			echo "yes";exit;
			$response["status"]='success';
			$response["message"] = 'Employee added successfully.';
			$response["data"]=(int)$model->shop_id;
			http_response_code(200);
			header('Content-type: application/json');
			echo json_encode($response,JSON_NUMERIC_CHECK);
		}
		else
		{
			$response["status"]='error';
			$response["message"] = '';
			$response["error"] = $model->getErrors();
			header('Content-type: application/json');
			echo json_encode($response,JSON_NUMERIC_CHECK);
		}
	}
	
	public function actionUpdateemployee()
	{
		
		$data = json_decode(file_get_contents("php://input"));
		//print_R($data);exit;
		//echo $data->id;exit;
		$model = User::findOne($data->sn);
		$model->username = $data->username;
		$model->password = md5($data->password);
		$model->type = $data->type;
		$model->status = $data->status;
		
		if($model->save())
		{
			$response["status"]='success';
			$response["message"] = 'Shop updated successfully.';
			$response["data"]=(int)$model->shop_id;
			http_response_code(200);
			header('Content-type: application/json');
			echo json_encode($response,JSON_NUMERIC_CHECK);
		}
		else
		{
			$response["status"]='error';
			$response["message"] = '';
			$response["error"] = $model->getErrors();
			header('Content-type: application/json');
			echo json_encode($response,JSON_NUMERIC_CHECK);
		}
	}
	
	public function actionRolelist(){
		
		$response =array();
		$query = Role::find()
			//->orderBy('ID DESC')
			->asArray()
			->all();
		
			$response["data"]=$query;
			header('Content-type: application/json');
			echo json_encode($response);
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