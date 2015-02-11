<?php

namespace frontend\controllers;

use Yii;
//use app\models\Admin;
use yii\web\Controller;
use yii\filters\AccessControl;
use frontend\models\LoginForm;
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

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
		$type = $model->userType(); 
		$shop_id = $model->shopid(); 
		$session['type'] = $type;
		$session['shopid'] = $shop_id;
		Yii::$app->session->set('aaa','abir');
        return $this->render('dashboard');
       // $this->redirect('employee/index');
		
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
