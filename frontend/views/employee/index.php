<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\bootstrap\ActiveForm;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use backend\models\Shop;
use yii\db\Query;

?>
<div class="row">

<div class="col-md-6">
<h3>Manage Employee</h3><hr>
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
	 <?= $form->field($model, 'username')->textInput(['placeholder' => 'Username']) ?>
</div>
<div class="form-group">
	 <?= $form->field($model, 'password')->textInput(['placeholder' => 'Password']) ?>
</div>
<div class="form-group">
	 <?= $form->field($model, 'type')->dropDownList(['3'=>'Manager','4'=>'Sales Man']) ?>
</div>


<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>



</div>

<div class="col-md-6">
<h3>Manage Shop</h3><hr>
<table class="table table-bordered">
	<tr><td>Username</td><td>User Type</td><td>Action</td></tr>
<?php foreach($data as $value){
echo "<tr><td>".$value['username']."</td><td>".$value['type']."</td><td><a href='".Yii::$app->urlManager->createUrl(['shop/edit', 'id' =>$value['sn']])."'><i class='glyphicon glyphicon-edit'></i></a></td></tr>"; 
									} ?>
</table>
</div>
</div>
