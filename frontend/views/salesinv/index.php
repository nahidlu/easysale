<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
/* @var $this yii\web\View */
/* @var $model common\models\salesinvinfo */
/* @var $customer common\models\Customer */
/* @var $form yii\widgets\ActiveForm */

?>
	<div class="container" style=" background-color: AliceBlue;">
		<div class="row" style="border : 1px solid black; background-color: #6495ed; color:white; height:32px; padding-top:5px;margin-bottom:5px;">
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
		</div>
		<div class="sale-form">
			<?php $form = ActiveForm::begin(); ?>	
			<div class="row" style="border: 1px solid black; margin-bottom:5px;">
				
				<div class="form-inline" style="padding:5px 5px 5px 5px;">
					
					<div class="col-md-4">
						<?= $form->field($model, 'SalesInvoiceNo')->textInput(['maxlength' => 100]) ?>
					</div>
					<div class="col-md-3">
						<?= $form->field($model, 'CounterNo')->dropdownlist(['COUNTER 1','COUNTER 2','COUNTER 3']) ?>
					</div>	
					<div class="col-md-4">
						<?= $form->field($model, 'SalesDate')->widget(DatePicker::classname(), [
						'options' => ['placeholder' => 'Enter Sales date ...'],
						'pluginOptions' => [
						'autoclose'=>true
						]
						]);?>
					</div>
				</div>
			</div>
					
		
			
			<div class="row" style="margin-bottom:5px;">
				<div class="col-md-6" >
					<div class="col-md-8" style="border : 1px solid black; padding:5px 0 5px 5px;">
						<strong>Enter Product ID</strong> <br><input type="text" name = "ProductID" style="width:250px;"> <input type="button" value="+" ><input type="button" value="-">	
					</div>
				</div>
				<div class="col-md-6" >
					<div class="col-md-4" style="border : 1px solid black; padding:5px 0 8px 5px; ">
						<strong>Advance Booking</strong> <br>
						<select>
							<option >154484454545</option>
							
						</select> 
						<input type="checkbox" name = "checkbox1"> 
					</div>
					<div class="col-md-6" style="border : 1px solid black; padding:5px 0 5px 5px; margin:0 0 5px 5px; float:right;">
						<strong>Product Remove</strong> <br><input type="text" name = "ProductRemove" style="width:250px;"> 
					</div>
				</div>
			</div>
			<div class="row" >
				<div   style="border : 1px solid black; margin:0px 15px 0px 15px">
					Datagrid Here.......	<br>
					Datagrid Here.......	<br>
					Datagrid Here.......	<br>
					Datagrid Here.......	<br>
					Datagrid Here.......	<br>
					Datagrid Here.......	<br>
					Datagrid Here.......	<br>
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-5" >
					<div  style="border : 1px solid black; padding:5px 0 0 5px;">
						<strong>Customer Information</strong> <br>
						<div class="form-inline">
							<?= $form->field($customer, 'MobileNo')->textInput(['maxlength' => 100,'style'=>'width:365px']) ?>
						</div>
						<div class="form-inline">
							<?= $form->field($customer, 'CustomerName')->textInput(['maxlength' => 100,'style'=>'width:325px']) ?>
						</div>
						<div class="form-inline">
						<strong>Discount Card No</strong>&nbsp&nbsp<input type="text" name="customercardno" style="width:310px;"><br><br>
						</div>
					</div><br>
					<div style="border : 1px solid black; padding:5px 0 0 5px;">
						<strong>Product Return</strong> <br>
						<strong>Product ID :</strong>&nbsp&nbsp<input type="text" name="productreturn" style="width:350px;"><br>&nbsp			
					</div><br>
					<strong>Sales By:</strong>&nbsp&nbsp<input type="text" name="salesby"><br>
				</div>
				<div class="col-md-4" align="center">
					<div>
						<input type="submit" value="Save" class="btn btn-primary" name="save">
						<input type="button" value="Clear" name="clear" class="btn btn-default " style="background-color:LightSlateGray;color:#FFF;">
						<input type="button" value="Cancel" name="cancel" class="btn btn-danger">
					</div><br><br>
					<div style="border : 1px solid black; Padding:5px 0 5px 0" >
						<strong>Discount Given BY</strong><br>
						<select>
							<option>Ruhul Amin</option>
						</select> 
					</div>
				</div>
				<div class="col-md-3">
					<?= $form->field($model, 'CartTotal')->textInput() ?>
					<?= $form->field($model, 'Discount')->textInput() ?>
					<?= $form->field($model, 'Vat')->textInput() ?>
					<?= $form->field($model, 'GrandTotal')->textInput() ?>
					<strong>Paid</strong><br><input type="text" name="paid"><br>
					<strong>Return</strong><br><input type="text" name="paid">
					<?= $form->field($model, 'DueAmount')->textInput() ?>
					<?= $form->field($model, 'PaymentMode')->dropdownlist(['Cash','Cheque','Credit']) ?>
				</div>
			
			</div>
			<?php ActiveForm::end(); ?>
	</div>
</div>



    

    

    
