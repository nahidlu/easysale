<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\Purchaseinvinfo */
/* @var $form yii\widgets\ActiveForm */

?>
<div class="purchase-form">
	<?php $form = ActiveForm::begin(); ?>	
	<div class="row">
		<div class="col-md-4">
			<?php $form = ActiveForm::begin(); ?>

				<?= $form->field($model, 'SupplierID')->dropdownlist(['SupplierID','SupplierID2']) ?>

				<?= $form->field($model, 'InvoiceNo')->textInput(['maxlength' => 100]) ?>

				<?= $form->field($model, 'InvoiceDate')->textInput() ?>
				<?= $form->field($model, 'ReceivedDate')->textInput() ?>
		</div>
		<div class="col-md-4">
			
		</div>
		<div class="col-md-4">
			Supplier Information :<br>
			Address :<textarea name="address" rows="3"> </textarea><br>
			Contact No :<input type="text" name="contactno"><br>
			Contact Name :<input type="text" name="contactname"><br>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12" align="center">
			<p><b>Enter Product ID</b></p>
			<input type="text" name="ProductId" size="60">
		</div>		
	</div>
	<br>
	<div class="row">
			<div class="col-md-1" >
				<p>Category</p>
				<select>
					<option value="pc">Category Name</option>
					<option value="pc">Category Name</option>
				</select>
			</div>
			
			<div class="col-md-1" >
				<p>Name</p>
				<select>
					<option value="pn">Product Name</option>
					<option value="pn">Product Name</option>
				</select>
			</div>
		
			<div class="col-md-1">
				<p>Product ID</p>
				<input type="text" name="ProductId">
			</div>
			<div class="col-md-1">
				<p>Quantity</p>
				<input type="text" name="quantity" >
			</div>
			<div class="col-md-1">
				<p>Unit Cost</p>
				<input type="text" name="unitcost" >
			</div>		
			<div class="col-md-1">
				<p>Amount</p>
				<input type="text" name="amount" >
			</div>
			<div class="col-md-1">
				<p>%</p>
				<input type="text" name="percent" >
			</div>
			<div class="col-md-1">
				<p>Sales Price</p>
				<input type="text" name="salesprice">
			</div>
			<div class="col-md-1">
				<input type="button" name="add" value="Add">
			</div>
			<div class="col-md-1">
				<input type="button" name="delete" value="Delete">
			</div>
		
	</div>
	<div class="row">

	</div>
	<br>
	<div class="row">
		<div class="col-md-4">
			<input type="button" name="barcode" value="Print Barcode">
		</div>
		
		<div class="col-md-4">
			<div class="form-group">
				<?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
				<input type="button" name="clear" value="Clear">
				
			</div>
		</div>
		<div class="col-md-4">
			<?= $form->field($model, 'SubTotal')->textInput() ?>
			<?= $form->field($model, 'Discount')->textInput() ?>
			<?= $form->field($model, 'CarryingCost')->textInput() ?>
			<?= $form->field($model, 'InvTotal')->textInput() ?>
		</div>
	</div>
	<?php ActiveForm::end(); ?>
</div>


    

    

    
