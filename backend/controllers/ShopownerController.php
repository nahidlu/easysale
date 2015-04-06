<?php

namespace backend\controllers;
use backend\models\AdminUser;
use backend\models\Shop;
use backend\models\Shopuser;
use backend\models\Shopowner;
use yii\web\session;
use yii;
use yii\db\Query;

class ShopownerController extends \yii\web\Controller
{
	public $enableCsrfValidation = false;
	public function actionIndex(){
		
		$model = new Shop();
		$connection = \Yii::$app->db;
		return $this->render('index',['model'=>$model]);
	}
    public function actionCreateowner()
    {
		$model = new Shopowner();
		$data = json_decode(file_get_contents("php://input"));
		$model->name = $data->name;
		$model->address = $data->address;
		$model->phone = $data->phone;
		$model->business_name = @$data->business_name;
		$model->status = $data->status;
		$model->created_at = date('Y-m-d');
		if($model->save())
		{
			$response["status"]='success';
			$response["message"] = 'Product added successfully.';
			$response["data"]=(int)$model->owner_id;
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
	
	 public function actionListowners()
    {
		$response =array();
		$query = Shopowner::find()
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
	
	public function actionChangestatus()
	{
		$data = json_decode(file_get_contents("php://input"));
		$query = Shopowner::updateAll(['status' => $data->status], 'owner_id = '.$data->id);
		
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
	
	public function actionDeleteowner()
	{
		$data = json_decode(file_get_contents("php://input"));
		$query = Shopowner::deleteAll('owner_id='.$data->owner_id);
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
	
	public function actionUpdateowner()
	{
		
		$data = json_decode(file_get_contents("php://input"));
		//echo $data->id;exit;
		$model = Shopowner::findOne($data->owner_id);
		$model->name = $data->name;
		$model->address = $data->address;
		$model->phone = $data->phone;
		$model->business_name = @$data->business_name;
		$model->status = $data->status;
		$model->updated_at = date('Y-m-d');
		if($model->save())
		{
			$response["status"]='success';
			$response["message"] = 'Owner updated successfully.';
			$response["data"]=(int)$model->owner_id;
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
	
	public function actionDetails($OwnerId){
		
		$model = Shopowner::findOne($OwnerId);
		
		$shopmodel = Shop::find()
    	->where(['owner_id' =>$OwnerId])
    	->all();
		//$connection = \Yii::$app->db;
		//echo $model->name;
		//exit;
		return $this->render('details',['model'=>$model,'shopmodel'=>$shopmodel]);
	}
	
}
