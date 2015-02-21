<?php

namespace backend\controllers;
use backend\models\AdminUser;
use backend\models\Shop;
use backend\models\Shopuser;
use yii\web\session;
use yii;
use yii\db\Query;

class ShopownerController extends \yii\web\Controller
{
    public function actioncreateOwner()
    {
		$model = new Shopowner();
		$data = json_decode(file_get_contents("php://input"));
		$model->name = $data->name;
		$model->description = $data->description;
		$model->price = $data->price;
		$model->stock = $data->stock;
		$model->packing = $data->packing;
		$model->status = $data->status;
		if($model->save())
		{
			$response["status"]='success';
			$response["message"] = 'Product added successfully.';
			$response["data"]=(int)$model->id;
			http_response_code(200);
			header('Content-type: application/json');
			echo json_encode($response,JSON_NUMERIC_CHECK);
		}
		else
		{
			$response["status"]='error';
			$response["message"] = '';
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
}
