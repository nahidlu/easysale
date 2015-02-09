<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Employee;

class EmployeesController extends \yii\web\Controller
{
    public function actionIndex()
    {
		$model = new Employee();
		$empList = $model->getEmployeeList();
		
        return $this->render('index',[
			'model'=>$model,
			'empList'=>$empList
		]);
    }
	
	public function actionCreate()
	{
		$model = new Employee();
		$model->attributes = $_POST['Employee'];
		if($model->save())
		{
			Yii::$app->getSession()->setFlash('success','Employee has been added successfully');
			return $this->redirect(['index']);
		}
	}
	
	public function actionUpdatename()
	{
		$value=$_POST['value'];
		$id=$_POST['pk'];
		$update=Employee::updateAll(['name' => $value], 'empID ='.$id);
	}
	public function actionUpdatefathersname()
	{
		$value=$_POST['value'];
		$id=$_POST['pk'];
		$update=Employee::updateAll(['fathersName' => $value], 'empID ='.$id);
	}
	public function actionUpdatecellno()
	{
		$value=$_POST['value'];
		$id=$_POST['pk'];
		$update=Employee::updateAll(['cellNo' => $value], 'empID ='.$id);
	}
	public function actionUpdateaddress()
	{
		$value=$_POST['value'];
		$id=$_POST['pk'];
		$update=Employee::updateAll(['address' => $value], 'empID ='.$id);
	}
	public function actionUpdateposition()
	{
		$value=$_POST['value'];
		$id=$_POST['pk'];
		$update=Employee::updateAll(['position' => $value], 'empID ='.$id);
	}
	public function actionUpdateskills()
	{
		$value=$_POST['value'];
		$id=$_POST['pk'];
		$update=Employee::updateAll(['skills' => $value], 'empID ='.$id);
	}
	
	

}
