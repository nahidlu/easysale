<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\bootstrap\ActiveForm;
use app\models\Project;
use app\models\ProjectPayment;
use app\models\Employee;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use \yii\widgets\LinkPager;
?>
<h1>
	


<button class="btn btn-primary" type="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
  Add Project
</button>	
	
<!--<button class="btn btn-primary tran-form" type="button">
  Add Income
</button>-->

<button class="btn btn-primary" type="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
  Project Payment
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
<h2>Add Project Form</h2><br/>

<?php $form = ActiveForm::begin(['action'=>Yii::$app->getUrlManager()->createUrl('project/createproject')]);?>
<?php //$form = ActiveForm::begin(['layout' => 'horizontal'])?>
	
	<div class="form-group">
		<?= $form->field($projectModel, 'projectName')->textInput(['placeholder' => 'Project Name']) ?>
	</div>
	<div class="form-group">
		<?= $form->field($projectModel, 'projectType')
			->dropDownList([
							Project::WEBSITE=>'Website',
							Project::WEB_APPLICATION=>'Web Application',
							Project::GRAPHICS_DESIGN=>'Graphics Design',
							Project::DESKTOP_APPLICATION=>'Desktop Application',
							Project::SEO=>'SEO',
							Project::TRAINING=>'Training'
						],['prompt'=>'Select Project Type']);
			?>
	</div>
	<div class="form-group">
		<?= $form->field($projectModel, 'assignedTo')
			->dropDownList(ArrayHelper::map($empList,'empID', 'name'),['prompt'=>'Select Employee']);
			?>
	</div>
	<div class="form-group">
		<?= $form->field($projectModel, 'startDate')->widget(DatePicker::classname(), [
				'options' => ['placeholder' => 'Enter Start date'],
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
		<?= $form->field($projectModel, 'endDate')->widget(DatePicker::classname(), [
				'options' => ['placeholder' => 'Enter End date'],
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
		<?= $form->field($projectModel, 'delayedDeliveryDate')->widget(DatePicker::classname(), [
				'options' => ['placeholder' => 'Enter Delayed Delivery Date'],
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
		<?= $form->field($projectModel, 'contactPersonName')->textInput(['placeholder' => 'Contact Person Name']) ?>
	</div>
	<div class="form-group">
		<?= $form->field($projectModel, 'contactPersonNumber')->textInput(['placeholder' => 'Contact Person Number']) ?>
	</div>
	<div class="form-group">
		<?= $form->field($projectModel, 'address')->textArea(['placeholder' => 'Address','cols'=>'4','rows' => '6']) ?>
	</div>
	<div class="form-group">
		<?= $form->field($projectModel, 'contractAmount')->textInput(['placeholder' => 'Contract Amount']) ?>
	</div>
	<div class="form-group">
		<?= $form->field($projectModel, 'status')
			->dropDownList([
							Project::STATUS_CLOSED=>'Closed',
							Project::STATUS_PENDING=>'Pending',
							Project::STATUS_WORKING=>'Working'
						],['prompt'=>'Select Status']);
			?>
	</div>
  
  <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>
</div>
</div>


<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
<div class="panel-body">
<h2>Project Payment Form</h2><br/>

<?php $form = ActiveForm::begin(['action'=>Yii::$app->getUrlManager()->createUrl('project/createprojectpayment')]);?>

  <div class="form-group">
		<?= $form->field($projectPaymentModel, 'projectID')
			->dropDownList(ArrayHelper::map($projectList,'ID', 'projectName'),['prompt'=>'Select Project']);
			?>
  </div>
  <div class="form-group">
		<?= $form->field($projectPaymentModel, 'paymentDate')->widget(DatePicker::classname(), [
				'options' => ['placeholder' => 'Payment Date'],
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
	 <?= $form->field($projectPaymentModel, 'amount')->textInput(['placeholder' => 'Amount']) ?>
  </div>
  <div class="form-group">
		<?= $form->field($projectPaymentModel, 'paidBy')
			->dropDownList(ArrayHelper::map($empList,'empID', 'name'),['prompt'=>'Paid By'],['prompt'=>'Select Paid By']);
			?>
  </div>
  
  <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>
</div>
</div>	

<div class="col-md-12">
<div class="row">
	<table class="table table-bordered">
		<thead>
		  <tr>
			<th colspan="13">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseProjectTable" aria-expanded="true" aria-controls="collapseProjectTable"><span class="glyphicon glyphicon-th-large" aria-hidden="true"></span> Project Table</a>
			</th>
		  </tr>
		</thead>
		<thead>
		  <tr class="active">
			<th>Project Name</th>
			<th>Type</th>
			<th>Assigned To</th>
			<th>Start Date</th>
			<th>End Date</th>
			<th>Delayed Delivery Date</th>
			<th>Contact Person Name</th>
			<th>Contact Person Number</th>
			<th>Address</th>
			<th>Contract Amount</th>
			<th>Due Amount</th>
			<th>Status</th>
			<th>Actions</th>
		  </tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="13" class="text-center">
					<?php echo LinkPager::widget([
						'pagination' => $projectPages,
					]);?>
				</td>
			</tr>
		</tfoot>
	<tbody id="collapseProjectTable" class="panel-collapse collapse in" role="tabpanel">
	<?php foreach($projectList as $val):?>
		<tr>
			<td>
				<?= $val->projectName?>
			</td>
			<td>
				<?= Project::typeIdToText($val->projectType)?>
			</td>
			<td>
				<?= Employee::getEmployeeName($val->assignedTo)?>
			</td>
			<td>
				<?= date('d-m-Y',strtotime($val->startDate))?>
			</td>
			<td>
				<?= date('d-m-Y',strtotime($val->endDate))?>
			</td>
			<td>
				<?= date('d-m-Y',strtotime($val->delayedDeliveryDate))?>
			</td>
			<td>
				<?= $val->contactPersonName?>
			</td>
			<td>
				<?= $val->contactPersonNumber?>
			</td>
			<td>
				<?= nl2br($val->address)?>
			</td>
			<td>
				<?= number_format($val->contractAmount)?>
			</td>
			<td>
				<?= number_format($val->contractAmount - ProjectPayment::getProjectWiseTotalPayment($val->ID));?>
			</td>
			<td>
				<?= Project::statusIdToText($val->status)?>
			</td>
			<td>
				<a href="<?= Yii::$app->getUrlManager()->createUrl(['project/deleteproject','id'=>$val->ID])?>" data-method="post"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
			</td>
		</tr> 
	<?php endforeach;?>	
	</tbody>
</table>
</div>

<br/><br/>

<div class="row">
	<table class="table table-bordered">
		<thead >
		  <tr>
			<th colspan="5"><a data-toggle="collapse" data-parent="#accordion" href="#collapseProjectPaymentTable" aria-expanded="true" aria-controls="collapseProjectPaymentTable"><span class="glyphicon glyphicon-th-large" aria-hidden="true"></span> Project Payment Table</a></th>
		  </tr>
		</thead>
		<thead>
		  <tr class="active">
			<th>Project Name</th>
			<th>Payment Date</th>
			<th>Amount</th>
			<th>Paid by</th>
			<th>Actions</th>
		  </tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="5" class="text-center">
					<?php echo LinkPager::widget([
						'pagination' => $projectPaymentPages
					]);?>
				</td>
			</tr>
		</tfoot>
	<tbody id="collapseProjectPaymentTable" class="panel-collapse collapse in" role="tabpanel">
	<?php foreach($projectPaymentList as $val):?>
		<tr>
			<td>
				<?= Project::getProjectName($val->projectID)?>
			</td>
			<td>
				<?= date('d-m-Y',strtotime($val->paymentDate))?>
			</td>
			<td>
				<?= number_format($val->amount)?>
			</td>
			<td>
				<?= Employee::getEmployeeName($val->paidBy)?>
			</td>
			<td>
				<a href="<?= Yii::$app->getUrlManager()->createUrl(['project/deletepayment','id'=>$val->ID])?>" data-method="post"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
			</td>
		</tr> 
	<?php endforeach;?>	
	</tbody>
</table>
</div>
</div>
	
		
		
		
