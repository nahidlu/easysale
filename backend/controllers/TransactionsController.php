<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;

use app\models\LedgerSubhead;
use app\models\LedgerHead;
use app\models\Ledger;


class TransactionsController extends \yii\web\Controller
{
    public function actionIndex()
    {
		$ledgerModel = new Ledger();
		$subheadModel = new LedgerSubhead();
		$incomeSubheadList = LedgerSubhead::find()
				->select('subHeadID,name')
				->where(['generalLedgerID'=>LedgerSubhead::INCOME])
				->all();
		$expenseSubheadList = LedgerSubhead::find()
				->select('subHeadID,name')
				->where(['generalLedgerID'=>LedgerSubhead::EXPENSE])
				->all();		
		$allLedgerData = $ledgerModel->getLedgerData();	
		
        return $this->render('index',[
			'ledgerModel'=>$ledgerModel,
			'incomeSubheadList'=>$incomeSubheadList,
			'expenseSubheadList'=>$expenseSubheadList,
			'allLedgerData'=>$allLedgerData
		]);
    }
	
	public function actionCreateincome()
	{
		$model = new Ledger();
		$model->attributes = $_POST['Ledger'];
		$referenceNO = substr(md5(microtime()),rand(0,26),6);

		$model->generalLedgerID = LedgerSubhead::INCOME;
		$model->refNO = $referenceNO;
		$model->transactionDate = date('Y-m-d',strtotime($_POST['Ledger']['transactionDate']));
		$model->debit = 0;
		$model->credit = $_POST['Ledger']['amount'];
		if($model->save())
		{
			$model = new Ledger();
			$model->attributes = $_POST['Ledger'];
			$model->generalLedgerID = LedgerSubhead::INCOME;
			$model->subHeadID = LedgerSubhead::CASH_IN_HAND;
			$model->refNO = $referenceNO;
			$model->transactionDate = date('Y-m-d',strtotime($_POST['Ledger']['transactionDate']));
			$model->debit = 0;
			$model->credit = $_POST['Ledger']['amount'];
			if($model->save())
			{
				Yii::$app->getSession()->setFlash('success','Income has been added successfully');
				return $this->redirect(['index']);
			}
		}
	}
	
	public function actionCreateexpense()
	{
		$model = new Ledger();
		$model->attributes = $_POST['Ledger'];
		$referenceNO = substr(md5(microtime()),rand(0,26),6);

		$model->generalLedgerID = LedgerSubhead::EXPENSE;
		$model->refNO = $referenceNO;
		$model->transactionDate = date('Y-m-d',strtotime($_POST['Ledger']['transactionDate']));
		$model->debit = $_POST['Ledger']['amount'];
		$model->credit = 0;
		if($model->save())
		{
			$model = new Ledger();
			$model->attributes = $_POST['Ledger'];
			$model->generalLedgerID = LedgerSubhead::EXPENSE;
			$model->subHeadID = LedgerSubhead::CASH_IN_HAND;
			$model->refNO = $referenceNO;
			$model->transactionDate = date('Y-m-d',strtotime($_POST['Ledger']['transactionDate']));
			$model->debit = $_POST['Ledger']['amount'];
			$model->credit = 0;
			if($model->save())
			{
				Yii::$app->getSession()->setFlash('success','Expense has been added successfully');
				return $this->redirect(['index']);
			}
		}
	}
	
	
	public function actionUpdatelgdescription()
	{
		$value=$_POST['value'];
		$id=$_POST['pk'];
		$refNo=Ledger::find()
				->select('refNO')
				->where(['ID'=>$id])
				->one();
		$update=Ledger::updateAll(['particular' => $value], 'refNO ="'.$refNo->refNO.'"');
	}
	
	public function actionUpdateamount()
	{
		$value=$_POST['value'];
		$id=$_POST['pk'];
		$lginfo=Ledger::find()
				->select('refNO,debit,credit')
				->where(['ID'=>$id])
				->one();
		if($lginfo->debit != 0)
		{
			$update=Ledger::updateAll(['debit' => $value], 'refNO= "'.$lginfo->refNO.'"');
		}
		elseif($lginfo->credit != 0)
		{
			$update=Ledger::updateAll(['credit' => $value], 'refNO= "'.$lginfo->refNO.'"');
		}
		
	}
	
	public function actionUpdatevoucherno()
	{
		$value=$_POST['value'];
		$id=$_POST['pk'];
		$refNo=Ledger::find()
				->select('refNO')
				->where(['ID'=>$id])
				->one();
		$update=Ledger::updateAll(['voucherNO' => $value], 'refNO ="'.$refNo->refNO.'"');
	}
	
	public function actionUpdatehead()
	{
		$value=$_POST['value'];
		$id=$_POST['pk'];
		$refNo=Ledger::find()
				->select('refNO')
				->where(['ID'=>$id])
				->one();
		$update=Ledger::updateAll(['headID' => $value], 'refNO ="'.$refNo->refNO.'"');
	}
	
	public function actionSearch()
	{
		$model = new Ledger();
		$glID=$_POST['glid'];
		$searchData=$model->searchGLwise($glID);
		return $this->renderPartial('search',[
			'searchData'=>$searchData
		],false,true);
		Yii::$app()->end();
	}
	
	
	
	

}
