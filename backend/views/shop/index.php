<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\bootstrap\ActiveForm;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use backend\models\Shop;
use yii\db\Query;
use yii\web\session;

?>
<div class="row">

<div class="col-md-6">
<h3>Create Shop</h3><hr>
<?php if (Yii::$app->session->hasFlash('success')):?>
			<h5>
				<div class="alert in alert-block fade alert-success" style="margin-right: 2%;">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?= Yii::$app->session->getFlash('success'); ?>
				</div>
			</h5>
<?php endif;?>
<?php $form = ActiveForm::begin();?>

<div class="form-group">
		<?= $form->field($model, 'ShopName')->textInput(['placeholder' => 'Name']) ?>
</div>
<div class="form-group">
	 <?= $form->field($model, 'Address1')->textArea(['placeholder' => 'Address1','cols'=>'4','rows' => '6']) ?>
</div>
<div class="form-group">
	<?= $form->field($model, 'Address2')->textArea(['placeholder' => 'Address2','cols'=>'4','rows' => '6']) ?>
</div>
<div class="form-group">
	 <?= $form->field($model, 'ContactNo')->textInput(['placeholder' => 'Contact No']) ?>
</div>
<div class="form-group">
	 <?= $form->field($model, 'ContactPerson')->textInput(['placeholder' => 'Contact Person']) ?>
</div>
<div class="form-group">
	 <?= $form->field($model, 'username')->textInput(['placeholder' => 'Username']) ?>
</div>
<div class="form-group">
	 <?= $form->field($model, 'password')->textInput(['placeholder' => 'Password']) ?>
</div>
<div class="form-group">
	 <?= $form->field($model, 'usertype')->dropDownList(['2' => 'Shop Admin','3'=>'Manager']) ?>
</div>
<div class="form-group">
	 <?= $form->field($model, 'Logo')->textInput(['placeholder' => 'Contact Person']) ?>
</div>
<div class="form-group">
	 <?= $form->field($model, 'Slogan')->textInput(['placeholder' => 'Slogan']) ?>
</div>
<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>



</div>

<div class="col-md-6">
<h3>Manage Shop</h3><hr>
<table class="table table-bordered">
	<tr><td>Shop Name</td><td>Conatct Person</td><td>Contact No</td><td>Username</td><td>Action</td></tr>
<?php foreach($users as $value){
echo "<tr><td>".$value['ShopName']."</td><td>".$value['ContactPerson']."</td><td>".$value['ContactNo']."</td><td>".
									 \mcms\xeditable\XEditableText::widget([
										'model' => $value,
										'placement' => 'right',
										'url'=>'updateusername',
										'pluginOptions' => [
											'name' => $value['username'],
											'id'=> $value['ShopID'],
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
									])."</td><td><a href='".Yii::$app->urlManager->createUrl(['shop/edit', 'id' =>$value['id']])."'><i class='glyphicon glyphicon-edit'></i></a></td></tr>"; 
									} ?>
</table>
</div>
</div>
