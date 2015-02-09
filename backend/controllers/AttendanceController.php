<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\Employee;
use app\models\EmployeeAttendance;

class AttendanceController extends \yii\web\Controller
{
    public function actionIndex()
    {
		$model = new EmployeeAttendance();
		$empModel = new Employee();
		$empList = $empModel->getEmployeeList();
		$todaysList = $model->getTodaysList();
		
        return $this->render('index',[
			'model'=>$model,
			'empList'=>$empList,
			'todaysList'=>$todaysList
		]);
    }
	
	public function actionCreate()
	{
		$model = new EmployeeAttendance();
		$model->attributes = $_POST['EmployeeAttendance'];
		$model->date = date('Y-m-d',strtotime($_POST['EmployeeAttendance']['date']));
		//echo $model->startTime = $_POST['EmployeeAttendance']['startTime'];exit;
		if($model->save())
		{
			Yii::$app->getSession()->setFlash('success','Attendance has been added successfully');
			return $this->redirect(['index']);
		}
		
	}
	
	public function actionUpdateendtime()
	{
		$endTime = $_POST['EmployeeAttendance']['endTime'];
		$id = $_POST['EmployeeAttendance']['ID'];
		$update=EmployeeAttendance::updateAll(['endTime' => $endTime], 'ID='.$id);
		if($update)
		{
			Yii::$app->getSession()->setFlash('success','Ending time has been updated successfully');
			return $this->redirect(['index']);
		}
	}
	
	

}
