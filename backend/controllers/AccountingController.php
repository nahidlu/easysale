<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\LedgerSubhead;
use app\models\LedgerHead;

class AccountingController extends \yii\web\Controller
{
    public function actionIndex()
    {
		$subheadModel = new LedgerSubhead();
		$headModel = new LedgerHead();
		$subheadList = $subheadModel->getSubheadList();
		
        return $this->render('index',[
			'subheadModel'=>$subheadModel,
			'headModel'=>$headModel,
			'subheadList'=>$subheadList
		]);
    }
	
	public function actionCreatesubhead()
	{
		$subheadModel = new LedgerSubhead();
		$subheadModel->attributes = $_POST['LedgerSubhead'];
		if($subheadModel->save())
		{
			Yii::$app->getSession()->setFlash('success','Subhead has been added successfully');
			return $this->redirect(['index']);
		}
	}
	
	public function actionCreatehead()
	{
		$headModel = new LedgerHead();
		$headModel->attributes = $_POST['LedgerHead'];
		if($headModel->save())
		{
			Yii::$app->getSession()->setFlash('success','Ledger Head has been added successfully');
			return $this->redirect(['index']);
		}
	}
	
	public function actionGetglwisesubheadlist()
	{
		$subheadModel = new LedgerSubhead();
		$glID = $_POST['glid'];
		$subheadList = $subheadModel->GeneralLedgerWiseSubheadList($glID);
		$data = array(
				'success'=>'success',
				'subheadList'=>$subheadList
		);
		echo json_encode($data);
	}
	
	public function actionGetsubheadwiseheadlist()
	{
		$headModel = new LedgerHead();
		$subHeadID = $_POST['subHeadID'];
		$headList = $headModel->Getsubheadwiseheadlist($subHeadID);
		$data = array(
				'success'=>'success',
				'headList'=>$headList
		);
		echo json_encode($data);
	}
	

}
