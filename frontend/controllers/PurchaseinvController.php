<?php


namespace frontend\controllers;
use common\models\Purchaseinvinfo;

class PurchaseinvController extends \yii\web\Controller
{
    public function actionIndex()
    {	
		$model = new Purchaseinvinfo();
        return $this->render('index',['model'=>$model]);
    }

}
