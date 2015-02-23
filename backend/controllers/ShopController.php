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
	
	
	

}
