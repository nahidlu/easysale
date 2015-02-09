<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\Project;
use app\models\ProjectPayment;
use app\models\Employee;
use yii\data\Pagination;

class ProjectController extends \yii\web\Controller
{
	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'createproject', 'createprojectpayment', 'deletepayment', 'deleteproject'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'deleteproject' => ['post'],
					'deletepayment' => ['post']
                ],
            ],
        ];
    }
	
    public function actionIndex()
    {
		$projectModel = new Project();
		$empModel = new Employee();
		$projectPaymentModel = new ProjectPayment();
		$empList = $empModel->getEmployeeList();
		//$projectList = $projectModel->getProjectList();
		
		$projectList = Project::find();
		$countProjestQuery = clone $projectList;
		$projectPages = new Pagination(['totalCount' => $countProjestQuery->count(), 'pageSize'=>10]);
		$projectList = $projectList->offset($projectPages->offset)
			->limit(10)
			->all();  
		
		//$projectPaymentList = $projectPaymentModel->getPaymentList();
		$projectPaymentList = ProjectPayment::find();
		$countProjectPaymentQuery = clone $projectPaymentList;
		$projectPaymentPages = new Pagination(['totalCount' => $countProjectPaymentQuery->count(), 'pageSize'=>10]);
		$projectPaymentList = $projectPaymentList->offset($projectPaymentPages->offset)
			->limit(10)
			->all();
		
        return $this->render('index',[
			'projectModel'=>$projectModel,
			'projectPaymentModel'=>$projectPaymentModel,
			'empList'=>$empList,
			'projectList'=>$projectList,
			'projectPaymentList'=>$projectPaymentList,
			
			'projectPages'=>$projectPages,
			'projectPaymentPages'=>$projectPaymentPages
		]);
    }
	
	public function actionCreateproject()
	{
		$projectModel = new Project();
		$projectModel->attributes = $_POST['Project'];
		$projectModel->startDate = date('Y-m-d',strtotime($_POST['Project']['startDate']));
		$projectModel->endDate = date('Y-m-d',strtotime($_POST['Project']['endDate']));
		$projectModel->delayedDeliveryDate = date('Y-m-d',strtotime($_POST['Project']['delayedDeliveryDate']));
		if($projectModel->save())
		{
			Yii::$app->getSession()->setFlash('success','Project has been added successfully');
			return $this->redirect(['index']);
		}
	}
	
	public function actionCreateprojectpayment()
	{
		$projectPaymentModel = new ProjectPayment();
		$projectPaymentModel->attributes = $_POST['ProjectPayment'];
		$projectPaymentModel->paymentDate = date('Y-m-d',strtotime($_POST['ProjectPayment']['paymentDate']));
		if($projectPaymentModel->save())
		{
			Yii::$app->getSession()->setFlash('success','Project payment has been added successfully');
			return $this->redirect(['index']);
		}
	}
	
	public function actionDeletepayment($id)
	{
		$query = ProjectPayment::deleteAll('ID='.$id);
		if($query)
		{
			Yii::$app->getSession()->setFlash('success','Project payment has been deleted successfully');
			return $this->redirect(['index']);
		}
	}
	
	public function actionDeleteproject($id)
	{
		$deleteProjectQuery = Project::deleteAll('ID='.$id);
		$deletePaymentQuery = ProjectPayment::deleteAll('projectID='.$id);
		if($deleteProjectQuery)
		{
			Yii::$app->getSession()->setFlash('success','Project has been deleted successfully');
			return $this->redirect(['index']);
		}
	}
	
	
	
	
	

}
