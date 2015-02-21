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
    public function actionIndex()
    {
        //return $this->render('index',['model'=>$model,'users'=>$users]);
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
