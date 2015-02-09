<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\bootstrap\ActiveForm;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\widgets\TimePicker;
use app\models\Employee;
?>

<?php if (Yii::$app->session->hasFlash('success')):?>
			<h5>
				<div class="alert in alert-block fade alert-success" style="margin-right: 2%;">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?= Yii::$app->session->getFlash('success'); ?>
				</div>
			</h5>
<?php endif;?>

<div class="col-md-offset-3 col-md-6">
<div class="panel-body">
<h2>Attendance Form</h2><br/>
<?php $form = ActiveForm::begin(['action'=>Yii::$app->getUrlManager()->createUrl('attendance/create')]);?>
<?php //$form = ActiveForm::begin(['layout' => 'horizontal'])?>
	<div class="form-group">
		<?= $form->field($model, 'empID')
			->dropDownList(ArrayHelper::map($empList,'empID', 'name'),['prompt'=>'Select Employee']);
			?>
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
		<?= $form->field($model, 'startTime')->widget(TimePicker::classname(), []);?>
  </div>
  <div class="form-group">
		<?= $form->field($model, 'endTime')->widget(TimePicker::classname(), []);?>
  </div>  
  <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>
</div>
</div>

<div class="col-md-12">
<br/><br/>
<div class="row">
	<table class="table table-bordered">
		<thead >
		  <tr>
			<th colspan="5"><a data-toggle="collapse" data-parent="#accordion" href="#collapseProjectPaymentTable" aria-expanded="true" aria-controls="collapseProjectPaymentTable"><span class="glyphicon glyphicon-th-large" aria-hidden="true"></span> Attendance Table</a></th>
		  </tr>
		</thead>
		<thead>
		  <tr class="active">
			<th>Date</th>
			<th>Employee Name</th>
			<th>Start Time</th>
			<th>End Time</th>
		  </tr>
		</thead>
		
	<tbody id="collapseProjectPaymentTable" class="panel-collapse collapse in" role="tabpanel">
	<?php foreach($todaysList as $val):?>
		<tr>
			<td>
				<?= date('d-m-Y',strtotime($val->date))?>
			</td>
			<td>
				<?= Employee::getEmployeeName($val->empID)?>
			</td>
			<td>
				<?= $val->startTime?>
			</td>
			<td>
				<a href="" data-toggle="modal" data-target=".end-time-modal" class="my-end-time" data-attendanceid=<?= $val->ID?>><?= $val->endTime?></a>
			</td>
		</tr> 
	<?php endforeach;?>	
	</tbody>
</table>
</div>
</div>

		
<div class="modal fade end-time-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
		<div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
           <h4 class="modal-title" id="myLargeModalLabel">Update End Time</h4>
        </div>
		<?php $form = ActiveForm::begin(['action'=>Yii::$app->getUrlManager()->createUrl('attendance/updateendtime')]);?>
			<div class="modal-body">
				  <div class="form-group">
					<?= $form->field($model, 'endTime')->widget(TimePicker::classname(), ['options' => ['id' => 'endTime']]);?>
					<?= $form->field($model, 'ID')->textInput()->label(false) ?>
				  </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
			</div>
		<?php ActiveForm::end(); ?>
    </div>
  </div>
</div>		
		
		
		
<?php 
$this->registerJs(
'
$(".my-end-time").on("click", function(e){
var attendanceID = $(this).data("attendanceid");
$("#employeeattendance-id").val(attendanceID);	
e.preventDefault();			
});
');
?>