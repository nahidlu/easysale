<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
/* @var $this yii\web\View */
/* @var $model common\models\salesinvinfo */
/* @var $customer common\models\Customer */
/* @var $form yii\widgets\ActiveForm */

?>
<div class="row" style="border : 1px solid black">
	<div class="form-inline" >
		<div class="col-md-4">
			<strong>Advance Amount:</strong>
		</div>
		<div class="col-md-4">
			<strong>Total:</strong>
		</div>
		<div class="col-md-4">
			<strong>Available Qty:</strong>
		</div>
	</div>
</div><br>
<div class="sale-form">
	<?php $form = ActiveForm::begin(); ?>	
	<div class="row">
		<div class="form-inline">
				<?= $form->field($model, 'SalesInvoiceNo')->textInput(['maxlength' => 100]) ?>
				<?= $form->field($model, 'CounterNo')->dropdownlist(['COUNTER 1','COUNTER 2','COUNTER 3']) ?>
				<?= $form->field($model, 'SalesDate')->widget(DatePicker::classname(), [
'options' => ['placeholder' => 'Enter Sales date ...'],
'pluginOptions' => [
'autoclose'=>true
]
]);?>
				
		</div>		
	
	</div><br>
	<div class="row" >
		<div class="col-md-6">
			<strong>Product ID</strong> <br><input type="text" name = "ProductID" style="width:250px;"> <input type="button" value="+" ><input type="button" value="-">	
		</div>
		<div class="col-md-6">
			<div class="col-md-4" style="border : 1px solid black">
				<strong>Advance Booking</strong> <br>
				<select>
					<option >154484454545</option>
					
				</select> 
				<input type="checkbox" name = "checkbox1"> 
			</div>
			<div class="col-md-4">
				<strong>Product Remove</strong> <br><input type="text" name = "ProductRemove" style="width:250px;"> 
			</div>
		</div>
	</div><br>
	<div class="row" style="border : 1px solid black">
		Datagrid Here.......	<br>
		Datagrid Here.......	<br>
		Datagrid Here.......	<br>
		Datagrid Here.......	<br>
		Datagrid Here.......	<br>
		Datagrid Here.......	<br>
		Datagrid Here.......	<br>
	</div><br>
	<div class="row">
		<div class="col-md-4">
			<div style="border : 1px solid black">
				<strong>Customer Information</strong> <br>
				<div class="form-inline">
					<?= $form->field($customer, 'MobileNo')->textInput(['maxlength' => 100]) ?>
				</div>
				<div class="form-inline">
					<?= $form->field($customer, 'CustomerName')->textInput(['maxlength' => 100]) ?>
				</div>
				<strong>Discount Card No :</strong>&nbsp&nbsp<input type="text" name="customercardno" style="width:200px;"><br><br>
			</div><br>
			<div style="border : 1px solid black">
				<strong>Product Return</strong> <br>
				<strong>Product ID :</strong>&nbsp&nbsp<input type="text" name="productreturn" style="width:250px;"><br>&nbsp			
			</div><br>
			<strong>Sales By:</strong>&nbsp&nbsp<input type="text" name="salesby"><br>
		</div>
		<div class="col-md-4">
			<div>
				<input type="button" value="Save" name="save">
				<input type="button" value="Clear" name="clear">
				<input type="button" value="Cancel" name="cancel">
			</div><br><br>
			<div>
				<strong>Discount Given BY</strong><br>
				<select>
					<option >Ruhul Amin</option>
				</select> 
			</div>
		</div>
		<div class="col-md-4">
			<?= $form->field($model, 'CartTotal')->textInput() ?>
			<?= $form->field($model, 'Discount')->textInput() ?>
			<?= $form->field($model, 'Vat')->textInput() ?>
			<?= $form->field($model, 'GrandTotal')->textInput() ?>
			<br><strong>Paid</strong><br><input type="text" name="paid">
			<br><strong>Return</strong><br><input type="text" name="paid">
			<?= $form->field($model, 'DueAmount')->textInput() ?>
			<?= $form->field($model, 'PaymentMode')->dropdownlist(['Cash','Cheque','Credit']) ?>
		</div>
	
	</div>
	<?php ActiveForm::end(); ?>
</div>


    

    

    
