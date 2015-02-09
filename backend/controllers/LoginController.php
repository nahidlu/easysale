<?php

namespace backend\controllers;

use Yii;
//use app\models\Admin;
use yii\web\Controller;
use yii\filters\AccessControl;
use backend\models\AdminLoginForm;
use yii\filters\VerbFilter;
use yii\web\session;

class LoginController extends \yii\web\Controller
{
	
    public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'actions' => ['index'],
						'allow' => true,
					],
					[
						'actions' => ['logout'],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'logout' => ['post'],
				],
			], 
		];
	} 
	
    public function actionIndex()
    {	
		$session = new Session;
		$session->open();
		
    	if (!\Yii::$app->user->isGuest) {
            //return $this->goHome();
    		return $this->render('dashboard');
        }

        $model = new AdminLoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
		  
        return $this->render('dashboard');
		
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
	
	public function actionLogout()
    {
    	Yii::$app->user->logout();
    
    	return $this->goHome();
    }
	
	
	

}
