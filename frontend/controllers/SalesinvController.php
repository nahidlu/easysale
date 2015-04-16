<?php

namespace frontend\controllers;
use common\models\salesinvinfo;
use common\models\Customer;
class SalesinvController extends \yii\web\Controller
{
    public function actionIndex()
    {
		$model=new salesinvinfo();
		$customer = new Customer();
        return $this->render('index',['model'=>$model, 'customer'=>$customer]);
    }

}
