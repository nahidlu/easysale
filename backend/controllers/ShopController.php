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
		$data = $connection->createCommand('SELECT tbl_shop.id,ShopID,ShopName,ContactPerson,ContactNo,tbl_shopuser.shop_id,username from tbl_shop,tbl_shopuser where tbl_shop.ShopID = tbl_shopuser.shop_id');
		
		$users = $data->queryAll();
		//echo "<pre>";
		//print_R($users);exit;
		if(isset($_POST['Shop'])){
				
		$model->attributes = $_POST['Shop'];
		$unid = $model->guid();
		$model->ShopID = $unid;
		//echo $model->ShopID;exit;
		if($model->save()){
			$modeluser = new Shopuser();
			$modeluser->type = $_POST['Shop']['usertype'];	
			$modeluser->username = $_POST['Shop']['username'];	
			$modeluser->password = md5($_POST['Shop']['password']);
			$modeluser->shop_id = $unid;
			$modeluser->save();
			Yii::$app->getSession()->setFlash('success','Shop Created successfully');
		}	
		}
        return $this->render('index',['model'=>$model,'users'=>$users]);
    }
	
	//Create shop owner 
    public function actionCreateowner()
    {
		$model = new Shopowner();
		$data = json_decode(file_get_contents("php://input"));
		$model->name = $data->name;
		$model->address = $data->address;
		$model->phone = $data->phone;
		$model->business_name = $data->business_name;
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
			print_r($model->getErrors());exit;
			$response["status"]='error';
			$response["message"] = '';
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
			$response["data"]=$query;
			$response["status"]="success";
			$response["message"] = "Product removed successfully.";
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
	
	
	public function actionEdit(){
		$connection = \Yii::$app->db;
		$data = $connection->createCommand('SELECT tbl_shop.id,ShopID,ShopName,ContactPerson,ContactNo,tbl_shopuser.shop_id,username from tbl_shop,tbl_shopuser where tbl_shop.ShopID = tbl_shopuser.shop_id');
		$users = $data->queryAll();
		
		$id= $_GET['id'];	
		$model = $this->findModel($id);
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('index', [
                'model' => $model,'users'=>$users
            ]);
        }

	}
	protected function findModel($id)
    {
        $model = Shop::find()->where(['id' => $id])->one();
		return $model;
    }
	
	public function actionUpdateusername()
	{
		$value=$_POST['value'];
		$id=$_POST['pk'];
		$update=Shopuser::updateAll(['username' => $value], 'shop_id ="'.$id.'"');
	}
	

}
