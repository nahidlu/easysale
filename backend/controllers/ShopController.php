<?php

namespace backend\controllers;
use backend\models\AdminUser;
use backend\models\Shop;
use backend\models\Shopuser;
use backend\models\Shopowner;
use yii\web\session;
use yii;
use yii\db\Query;

class ShopController extends \yii\web\Controller
{
	public $enableCsrfValidation = false;
    public function actionIndex()
    {
		
		$model = new Shop();
		$connection = \Yii::$app->db;
        return $this->render('index',['model'=>$model]);
    }
	
	 public function actionShoplist()
    {
		$response =array();
		$query = Shop::find()
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
	
	public function actionCreateshop(){
		
		$model = new Shop();
		$data = json_decode(file_get_contents("php://input"));
		$model->ShopName = $data->ShopName;
		$model->Address1 = $data->Address1;
		$model->ContactNo = $data->ContactNo;
		$model->owner_name = $data->owner_name;
		$model->Logo = $data->Logo;
		$model->Slogan = $data->Slogan;
		$model->owner_id = $data->owner_id;
		$model->shop_type = $data->shop_type;
		$model->status = $data->status;
		//$model->created_at = date('Y-m-d');
		if($model->save())
		{
			$model2 = new Shopuser();
			$model2->username = $data->username;
			$model2->password = $data->password;
			$model2->shop_id = $model->shopid;
			$model2->emp_id = $data->owner_id;
			$model2->created_at = date('Y-m-d');
			$model2->status = '1';
			$model2->save();
			$response["status"]='success';
			$response["message"] = 'Product added successfully.';
			$response["data"]=(int)$model->shopid;
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
	
	public function actionOwnerlist(){
		
		$response =array();
		$query = Shopowner::find()
			//->orderBy('ID DESC')
			->asArray()
			->all();
		
			$response["data"]=$query;
			header('Content-type: application/json');
			echo json_encode($response);
	}
	
	public function actionChangestatus()
	{
		$data = json_decode(file_get_contents("php://input"));
		$query = Shop::updateAll(['status' => $data->status], 'shopid = '.$data->shopid);
		
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
	
	public function actionDeleteshop()
	{
		$data = json_decode(file_get_contents("php://input"));
		$query = Shop::deleteAll('shopid='.$data->shopid);
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
	
	public function actionUpdateshop()
	{
		
		$data = json_decode(file_get_contents("php://input"));
		//print_R($data);exit;
		//echo $data->id;exit;
		$model = Shop::findOne($data->shopid);
		$model->ShopName = $data->ShopName;
		$model->Address1 = $data->Address1;
		$model->ContactNo = $data->ContactNo;
		$model->owner_name = $data->owner_name;
		$model->Logo = $data->Logo;
		$model->Slogan = $data->Slogan;
		$model->owner_id = $data->owner_id;
		$model->shop_type = $data->shop_type;
		$model->status = $data->status;
		if($model->save())
		{
			$response["status"]='success';
			$response["message"] = 'Shop updated successfully.';
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
	

}
