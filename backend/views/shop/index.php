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
<script src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/js/angular.min.js"></script>
<!-- Libraries -->
<script src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/js/ui-bootstrap-tpls-0.11.2.min.js"></script>
<script src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/js/angular-route.min.js"></script>
<script src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/js/angular-animate.min.js"></script>
<link rel="stylesheet" href="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/css/custom.css" type="text/css" />
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<!-- Shop owner app section starts here  -->
<div ng-cloak="" ng-app="shopOwner" class="row">

	<div class="col-md-12">
		<h3>Shop Owners</h3><hr>
	    <div class="page-content">
	      <div ng-view="" id="ng-view"></div>
	    </div>
	</div>
</div>
<!-- shop owner app ends here -->

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
<!-- AngularJS custom codes -->
<script src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/app/shops/app.js"></script>
<script src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/app/shops/data.js"></script>
<script src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/app/shops/directives.js"></script>
<script src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/app/shops/productsCtrl.js"></script>

<!-- Some Bootstrap Helper Libraries -->

<script src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/js/underscore.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/js/ie10-viewport-bug-workaround.js"></script>

