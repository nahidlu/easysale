<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\bootstrap\ActiveForm;

?>
<h1>
<button class="btn btn-primary" type="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
  Add Employee
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
<h2>Employee Form</h2><br/>

<?php $form = ActiveForm::begin(['action'=>Yii::$app->getUrlManager()->createUrl('employees/create')]);?>
<?php //$form = ActiveForm::begin(['layout' => 'horizontal'])?>
	<div class="form-group">
		<?= $form->field($model, 'name')->textInput(['placeholder' => 'Name']) ?>
	</div>
  <div class="form-group">
		<?= $form->field($model, 'fathersName')->textInput(['placeholder' => 'Fathers Name']) ?>
  </div>
  <div class="form-group">
	 <?= $form->field($model, 'cellNo')->textInput(['placeholder' => 'Contact No']) ?>
  </div>
  <div class="form-group">
	<?= $form->field($model, 'address')->textArea(['placeholder' => 'Address','cols'=>'4','rows' => '6']) ?>
  </div>
  <div class="form-group">
	 <?= $form->field($model, 'position')->textInput(['placeholder' => 'Position']) ?>
  </div>
  <div class="form-group">
	<?= $form->field($model, 'skills')->textArea(['placeholder' => 'Skills','cols'=>'4','rows' => '6']) ?>
  </div>
  
  <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>
</div>
</div>	

<br/><br/>

<table class="table table-bordered">
	<thead>
	  <tr class="active">
		<th>Name</th>
		<th>Fathers Name</th>
		<th>Contact No</th>
		<th>Address no</th>
		<th>Position</th>
		<th>Skills</th>
		<th>Action</th>
	  </tr>
	</thead>
	<tbody>
	<?php foreach($empList as $val):?>
		<tr>
			<td>
				<?php
				echo \mcms\xeditable\XEditableText::widget([
					'model' => $val,
					'placement' => 'right',
					'url' => 'employees/updatename',
					'pluginOptions' => [
						'name' => 'name',
						'id' => 'empID',
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
				echo \mcms\xeditable\XEditableText::widget([
					'model' => $val,
					'placement' => 'right',
					'url' => 'employees/updatefathersname',
					'pluginOptions' => [
						'name' => 'fathersName',
						'id' => 'empID',
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
				echo \mcms\xeditable\XEditableText::widget([
					'model' => $val,
					'placement' => 'right',
					'url' => 'employees/updatecellno',
					'pluginOptions' => [
						'name' => 'cellNo',
						'id' => 'empID',
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
				echo \mcms\xeditable\XEditableTextArea::widget([
					'model' => $val,
					'placement' => 'right',
					'url' => 'employees/updateaddress',
					'pluginOptions' => [
						'name' => 'address',
						'id' => 'empID',
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
				echo \mcms\xeditable\XEditableText::widget([
					'model' => $val,
					'placement' => 'right',
					'url' => 'employees/updateposition',
					'pluginOptions' => [
						'name' => 'position',
						'id' => 'empID',
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
				echo \mcms\xeditable\XEditableTextArea::widget([
					'model' => $val,
					'placement' => 'right',
					'url' => 'employees/updateskills',
					'pluginOptions' => [
						'name' => 'skills',
						'id' => 'empID',
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
			
			</td>
		</tr> 
	<?php endforeach;?>	
	</tbody>

</table>

