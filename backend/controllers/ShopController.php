<?php

namespace backend\controllers;
use backend\models\AdminUser;
use backend\models\Shop;
use backend\models\Shopuser;
use yii\web\session;
use yii;
use yii\db\Query;

class ShopController extends \yii\web\Controller
{
    public function actionIndex()
    {
		$model = new Shop();
		$connection = \Yii::$app->db;
		$data = $connection->createCommand('SELECT tbl_shop.ShopID,ShopName,ContactPerson,ContactNo,tbl_shopuser.shop_id,username from tbl_shop,tbl_shopuser where tbl_shop.ShopID = tbl_shopuser.shop_id');
		$users = $data->queryAll();
		
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
	
	public function actionEdit(){
	$id= $_GET['id'];	
	echo $id;exit;	
	}
	

}
