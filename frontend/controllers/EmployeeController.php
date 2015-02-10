<?php

namespace frontend\controllers;
use yii;
use yii\filters\AccessControl;
use frontend\models\Shopuser;
use yii\filters\VerbFilter;
use yii\web\Session;

class EmployeeController extends \yii\web\Controller
{
    public function actionIndex()
    {
		$session = new Session;
		$session->open();
		$model = new Shopuser;
		$data = Shopuser::find()->all();
		if(isset($_POST['Shopuser'])){
			$model->attributes = $_POST['Shopuser'];
			$model->password = md5($_POST['Shopuser']['password']);
			$model->shop_id = $session['shopid'];
			$model->save();
			return $this->redirect(['index']);
		}
        return $this->render('index',['model'=>$model,'data'=>$data]);
    }

}

?>