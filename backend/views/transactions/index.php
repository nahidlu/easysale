<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\bootstrap\ActiveForm;
use app\models\LedgerSubhead;
use app\models\LedgerHead;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2
//use mihaildev\ckeditor\CKEditor;
//use kartik\widgets\FileInput;
?>
<h1>
	


<button class="btn btn-primary" type="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
  Add Income
</button>	
	
<!--<button class="btn btn-primary tran-form" type="button">
  Add Income
</button>-->

<button class="btn btn-primary" type="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
  Add Expense
</button>
	
</h1>

<?php if (Yii::$app->session->hasFlash('success')):?>
			<h5>
				<div class="alert in alert-block fade alert-success" style="margin-right: 2%;">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?= Yii::$app->session->getFlash('success'); ?>
				</div>
			</h5>
<?php endif;?>

<br/><br/>

<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">

<div class="panel-body">
<h2>Income Form</h2><br/>

<?php $form = ActiveForm::begin(['action'=>Yii::$app->getUrlManager()->createUrl('transactions/createincome')]);?>
<?php //$form = ActiveForm::begin(['layout' => 'horizontal'])?>
	<div class="form-group">
		<?php echo DatePicker::widget([
			'model' => $ledgerModel, 
			'attribute' => 'transactionDate',
			'options' => ['placeholder' => 'Enter Transactions Date','id'=>'incomeform'],
				'pluginOptions' => [
					'todayHighlight' => true,
					'todayBtn' => true,
					'format' => 'dd-mm-yyyy',
					'autoclose' => true,
				]
			]);
		?>
	</div>
  <div class="form-group">
		<?= $form->field($ledgerModel, 'subHeadID')
			->dropDownList(ArrayHelper::map($incomeSubheadList,'subHeadID', 'name'),['prompt'=>'Select Subhead','id'=>'subHeadID-income']);
			?>
  </div>
  <div class="form-group">
		<span class="loader" style="display: none"></span>
		<?= $form->field($ledgerModel, 'headID')
			->dropDownList(['prompt'=>'Select Subhead','id'=>'ledgerHead-income']);
			?>
  </div>
  <div class="form-group">
	 <?= $form->field($ledgerModel, 'voucherNO')->textInput(['placeholder' => 'Select Voucher No']) ?>
  </div>
  <div class="form-group">
	<?= $form->field($ledgerModel, 'particular')->textArea(['placeholder' => 'Description','cols'=>'4','rows' => '6']) ?>
  </div>
  <div class="form-group">
	 <?= $form->field($ledgerModel, 'amount')->textInput(['placeholder' => 'Select Amount']) ?>
  </div>
  
  <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>
</div>
</div>



<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
<div class="panel-body">
<h2>Expense Form</h2><br/>

<?php $form = ActiveForm::begin(['action'=>Yii::$app->getUrlManager()->createUrl('transactions/createexpense')]);?>
	<div class="form-group">
		<?php echo DatePicker::widget([
			'model' => $ledgerModel, 
			'attribute' => 'transactionDate',
			'options' => ['placeholder' => 'Enter Transactions Date'],
				'pluginOptions' => [
					'todayHighlight' => true,
					'todayBtn' => true,
					'format' => 'dd-mm-yyyy',
					'autoclose' => true,
				]
			]);
		?>
	</div>
  <div class="form-group">
		<?= $form->field($ledgerModel, 'subHeadID')
			->dropDownList(ArrayHelper::map($expenseSubheadList,'subHeadID', 'name'),['prompt'=>'Select Subhead','id'=>'subHeadID-expense']);
			?>
  </div>
  <div class="form-group">
		<?= $form->field($ledgerModel, 'headID')
			->dropDownList([''],['prompt'=>'Select Subhead','id'=>'headID-expense']);
			?>
  </div>
  <div class="form-group">
	 <?= $form->field($ledgerModel, 'voucherNO')->textInput(['placeholder' => 'Select Voucher No']) ?>
  </div>
  <div class="form-group">
	<?= $form->field($ledgerModel, 'particular')->textArea(['placeholder' => 'Description','cols'=>'4','rows' => '6']) ?>
  </div>
  <div class="form-group">
	 <?= $form->field($ledgerModel, 'amount')->textInput(['placeholder' => 'Select Amount']) ?>
  </div>
  
  <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>
</div>
</div>		

<br/><br/>

<div class="row">
	<div class="col-md-4">
		
	</div>
	<div class="col-md-4">
		
	</div>
	<div class="col-md-4">
		<?php 
			$model = new LedgerHead;
			echo Select2::widget([
				'model' => $model, 
				'attribute' => 'headID',
				'data' => [103=>'Income',104=>'Expense'],
				'options' => ['placeholder' => 'Select general ledger','id'=>'lg-head'],
				'pluginOptions' => [
					'allowClear' => true,
					
				],
			]);
		?>
	</div>
</div>
<br/><br/>

<table class="table table-bordered">
	<thead>
	  <tr class="active">
		<th>Date</th>
		<th>Description</th>
		<th>Amount</th>
		<th>Voucher no</th>
		<th>Head</th>
		<th>Actions</th>
	  </tr>
	</thead>
	<tbody id="tabledata">
	<?php foreach($allLedgerData as $val):?>
		<tr>
			<td>
				<?php echo date('d-m-Y',strtotime($val->transactionDate))?>
			</td>
			<td>
				<?php
				echo \mcms\xeditable\XEditableTextArea::widget([
					'model' => $val,
					'placement' => 'right',
					'url' => 'transactions/updatelgdescription',
					'pluginOptions' => [
						'name' => 'particular',
						'id' => 'ID',
					],
					/* 'callbacks' => [
						'validate' => new \yii\web\JsExpression('
							function(value) {
								if($.trim(value) == "") {
									return "This field is required";
								}
							}
						')
					] */
				]);
				?>
			</td>
			<td>
				<?php
					if($val->debit==0){
						$val->amount=number_format($val->credit);
						echo \mcms\xeditable\XEditableText::widget([
							'model' => $val,
							'placement' => 'right',
							'url' => 'transactions/updateamount',
							'pluginOptions' => [
								'name' => 'amount',
								'id' => 'ID',
							],
							'callbacks' => [
								'validate' => new \yii\web\JsExpression('
									function(value) {
										if($.trim(value) == "") {
											return "This field is required";
										}
									}
								')
							]
						]);
					}else{
						$val->amount=number_format($val->debit);
						echo \mcms\xeditable\XEditableText::widget([
							'model' => $val,
							'placement' => 'right',
							'url' => 'transactions/updateamount',
							'pluginOptions' => [
								'name' => 'amount',
								'id' => 'ID',
							],
							'callbacks' => [
								'validate' => new \yii\web\JsExpression('
									function(value) {
										if($.trim(value) == "") {
											return "This field is required";
										}
									}
								')
							]
						]);
					}	
				?>
			</td>
			<td>
				<?php
				echo \mcms\xeditable\XEditableText::widget([
					'model' => $val,
					'placement' => 'right',
					'url' => 'transactions/updatevoucherno',
					'pluginOptions' => [
						'name' => 'voucherNO',
						'id' => 'ID',
					],
					'callbacks' => [
						'validate' => new \yii\web\JsExpression('
							function(value) {
								if($.trim(value) == "") {
									return "This field is required";
								}
							}
						')
					]
				]);
				?>
			</td>
			<td>
				<?php
				$list = LedgerHead::GetHeadList($val->subHeadID);
				echo \mcms\xeditable\XEditableSelect::widget([
					'model' => $val,
					'placement' => 'right',
					'url' => 'transactions/updatehead',
					'pluginOptions' => [
						'name' => 'headID',
						'id' => 'ID',
						'source'=>$list,
					],
				]); ?>
				
				<?php // $val->headID?>
			</td>
			<td>
			
			</td>
		</tr> 
	<?php endforeach;?>	
	</tbody>
</table>

<?php 
$this->registerJs(
'
$(".tran-form").on("click", function(e){
if ($("#inc-form").is(":visible") == true)
{
	$("#inc-form").hide("slow");
}else{
	$(".all-form").hide("slow");
	$("#exp-form").show("slow");
}		  
e.preventDefault();			
});
');
?>


<?php 
$searchListUrl=Yii::$app->getUrlManager()->createUrl('transactions/search');
$this->registerJs(
'
$("#lg-head").on("change", function(e){
	var glid = $("#lg-head").val();
	$.ajax({
		type:"POST",
		url:"'.$searchListUrl.'",
		data:{"glid":glid},
		beforeSend: function (){   
			//$(".loader").show();     		   		    		 		
			//$(".loader").html("<img src=\'"+img+"/images/dataloader.gif\'/>");     		 			
		},
		success:function(data){
			/* var obj = jQuery.parseJSON(data);
			if(obj.success == "success"){
			$(".loader").hide();  
			$(".search-data").html(data);*/
			$("#tabledata").html("");
			$("#tabledata").html(data);
		}
	});
e.preventDefault();			
});
');
?>





<?php 
$subHeadUrl=Yii::$app->getUrlManager()->createUrl('accounting/getsubheadwiseheadlist');
$this->registerJs(
'$("#subHeadID-income").on("change", function(){
	var img = "'.Yii::$app->getUrlManager()->getBaseUrl().'"; 	
	var subHeadID=$("#subHeadID-income").val();
	$.ajax({
		type:"POST",
		url:"'.$subHeadUrl.'",
		data:{"subHeadID":subHeadID},
		beforeSend: function (){   
			$(".loader").show();     		   		    		 		
			$(".loader").html("<img src=\'"+img+"/images/dataloader.gif\'/>");     		 			
		},
		success:function(data){
			var obj = jQuery.parseJSON(data);
			if(obj.success == "success"){
			$(".loader").hide(); 
			$("#headID-income").html(obj.headList);
		}}
	});
})
$("#subHeadID-expense").on("change", function(){
	var img = "'.Yii::$app->getUrlManager()->getBaseUrl().'"; 	
	var subHeadID=$("#subHeadID-expense").val();
	$.ajax({
		type:"POST",
		url:"'.$subHeadUrl.'",
		data:{"subHeadID":subHeadID},
		beforeSend: function (){   
			$(".loader").show();     		   		    		 		
			$(".loader").html("<img src=\'"+img+"/images/dataloader.gif\'/>");     		 			
		},
		success:function(data){
			var obj = jQuery.parseJSON(data);
			if(obj.success == "success"){
			$(".loader").hide(); 
			$("#headID-expense").html(obj.headList);
		}}
	});
})
'
);
?>
