<?php
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Invoice;
?>

<section class="content">
<div class="row">
<div class="col-md-12">

<?php if (Yii::$app->session->hasFlash('success')):?>
	<h5>
		<div class="alert in alert-block fade alert-success" style="margin-right: 2%;">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?= Yii::$app->session->getFlash('success'); ?>
		</div>
	</h5>
<?php endif;?>

<h2>Invoice Form</h2><br/>

<?php //$form = ActiveForm::begin();?>
<?php $form = ActiveForm::begin(['layout' => 'horizontal'],['options' => ['target'=>'_blank']])?>
	
	<div class="form-group">
		<?= $form->field($model, 'attentionName')->textInput(['placeholder' => 'Select attention name']) ?>
	</div>
	<div class="form-group">
		<?= $form->field($model, 'title')->textInput(['placeholder' => 'Select company name']) ?>
	</div>
	<div class="form-group">
		<?= $form->field($model, 'address')->textArea(['placeholder' => 'Address','cols'=>'4','rows' => '6']) ?>
	</div>
	<div class="form-group">
		<?= $form->field($model, 'date')->widget(DatePicker::classname(), [
				'options' => ['placeholder' => 'Enter date'],
				'pluginOptions' => [
					'todayHighlight' => true,
					'todayBtn' => true,
					'format' => 'dd-mm-yyyy',
					'autoclose'=>true
				]
			]);
		?>
	</div>
	<div class="form-group">
		<?= $form->field($model, 'service')
			->dropDownList([
							'Software maintenance'=>'Software maintenance'
						],['prompt'=>'Select Service']);
			?>
	</div>
	<div class="form-group">
		<?= $form->field($model, 'invoiceNumber')->textInput(['placeholder' => 'Invoice number']) ?>
	</div>
	<div class="form-group">
		<?= $form->field($model, 'terms')
			->dropDownList([
							'monthly'=>'monthly',
							'yearly'=>'yearly'
						],['prompt'=>'Select terms']);
			?>
	</div>
	
	<hr>
	
	<div id="aaa" >
		<div class="form-group">
			<?= $form->field($model, 'description')->textArea(['placeholder' => 'Description','cols'=>'4','rows' => '6','name'=>'description[]']) ?>
		</div>
		<div class="form-group">
			<?= $form->field($model, 'quantity')->textInput(['placeholder' => 'Enter quantity','name'=>'quantity[]']) ?>
		</div>
		<div class="form-group">
			<?= $form->field($model, 'unitPrice')->textInput(['placeholder' => 'Enter unitPrice','name'=>'unitPrice[]']) ?>
		</div>
		
		<a class="remove"><span class="glyphicon glyphicon-minus-sign" aria-hidden="true" style="    float: right;margin-top: -225px;font-size: 30px; margin-right: 75px;"></span></a>
		
	</div>
	
		<div class="bbb"></div>
  
		<a id="a"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="float: right;    padding-left: -1px;margin-right: 145px;margin-top: -225px;font-size: 30px;"></span></a>
	
	<div class="col-md-offset-3">
		<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
	</div>
<?php ActiveForm::end(); ?>
</div>
</div>
</section>





<?php 
$this->registerJs(
'
$(document).ready(function(){
    $("#a").click(function(){
        $("#aaa").clone().appendTo(".bbb");
    });
});

$(document).on("click", ".remove", function() {
    $(this).parent().remove();
});

');
?>

