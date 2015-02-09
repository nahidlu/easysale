<?php
/* use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\bootstrap\ActiveForm;

use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Invoice; */
?>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/css/bootstrap.min.css" />

<br/><br/><br/>

<div class="col-md-12">
<div class="col-md-3">
	<div style="font-size: 35px;">INVOICE</div><br/>
	<div>+8801721838925</div><br/>
	<div>niloy-60,dorgagate</div>
</div>
<div class="col-md-9">

<div style="height: 28px;">
	<strong>Attention :</strong> <span style="margin-left: 51px;"><?= $model->attentionName?></span>
</div>

<div style="height: 28px;">
	<strong>Title :</strong> <span style="margin-left: 86px;"><?= $model->title?></span>
</div>

<div style="height: 28px;">
	<strong>Address :</strong> <span style="margin-left: 59px;"><?= nl2br($model->address)?></span>
</div>

<div style="height: 28px;">
	<strong>Date :</strong> <span style="margin-left: 86px;"><?= date('d-m-Y',strtotime($model->date))?></span>
</div>

<div style="height: 28px;">
	<strong>Service :</strong> <span style="margin-left: 66px;"><?= $model->service?></span>
</div>

<div style="height: 28px;">
	<strong>Invoice Number :</strong> <span style="margin-left: 8px;"><?= $model->invoiceNumber?></span>
</div>

<div style="height: 28px;">
	<strong>Terms :</strong> <span style="margin-left: 75px;"><?= $model->terms?></span>
</div>

<br/><br/>

<div class="row">
	<table class="table table-bordered">
		<thead>
		  <tr style="background-color: rgb(23, 121, 181);color: white;">
			<th style="padding: 3px;"></th>
			<th style="padding: 3px;"></th>
			<th style="padding: 3px;"></th>
			<th style="padding: 3px;"></th>
		  </tr>
		  <tr>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
		  </tr>
		</thead>
		
		<thead style="background-color: rgb(23, 121, 181);color: white;">
		  <tr>
			<th>Description</th>
			<th>Quantity</th>
			<th>Unit Price</th>
			<th>Cost</th>
		  </tr>
		</thead>
		
	<tbody id="collapseProjectPaymentTable" class="panel-collapse collapse in" role="tabpanel">
	<?php 
		$subTotal = 0;
		foreach($invoice as $val){
	?>
		<tr>
			<td>
				<?= $val['description']?>
			</td>
			<td>
				<?= $val['qty']?>
			</td>
			<td>
				<?= number_format($val['unitPrice'])?>
			</td>
			<td>
				<?= number_format($val['unitPrice']*$val['qty'])?>
			</td>
		</tr> 
		<?php 
			$subTotal+=$val['unitPrice']*$val['qty'];
			} 
		?>	
		<tr>
			<td></td>
			<td></td>
			<td>
				Subtotal
			</td>
			<td>
				BDT	<?= number_format($subTotal)?>
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>
				Total
			</td>
			<td>
				BDT	<?= number_format($subTotal)?>
			</td>
		</tr>
	</tbody>
</table>
</div>

<br/>

<div class="row">
Thank you for your business  
</div>

<br/><br/>

<div class="row">
Sincerely yours, 
</div>

<br/>

<div class="row">
Harunur Rashid 
</div>



</div>
</div>





