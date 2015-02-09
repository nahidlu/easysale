<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Invoice;

class InvoiceController extends \yii\web\Controller
{
    public function actionIndex()
    {
		$model = new Invoice();
		if(isset($_POST['Invoice']))
		{
			$model->attributes = $_POST['Invoice'];
			$description = $_POST['description'];
			$qty = $_POST['quantity'];
			$unitPrice = $_POST['unitPrice'];
			//$cost = $_POST['cost'];
			
			$invoice = array();
			foreach ( $description as $key=>$name ) {
				$invoice[] = array( 'description' => $name, 'qty' => $qty[$key], 'unitPrice' => $unitPrice[$key]);
			}
			
			return $this->renderPartial('view',[
			'model'=>$model,
			'invoice'=>$invoice
			]);
			/* return $this->renderPartial('view',[
			'model'=>$model
			]); */
		}
		
        return $this->render('index',[
			'model'=>$model
		]);
    }
	
	
	public function actionTest()
	{
		/* $fhandle = fopen("test_print.php","rb");
		$contents = fread($fhandle, filesize("test_print.php"));
		$output = eval($contents);

		$handle = printer_open("Dell Laser Printer M5200");
		printer_set_option($handle,PRINTER_MODE,"raw");
		printer_write($handle,$output);
		printer_close($handle); */
		
		
		/*  $handle = printer_open("HP Deskjet 930c");
			$handle = printer_open(); */
			
			
		
		
	}
	

}
