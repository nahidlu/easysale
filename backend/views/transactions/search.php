<?php
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
//use yii\bootstrap\ActiveForm;
use app\models\LedgerSubhead;
use app\models\LedgerHead;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2
//use mihaildev\ckeditor\CKEditor;
//use kartik\widgets\FileInput;
?>

	<?php foreach($searchData as $val):?>
		<tr>
			<td>
				<?= date('d-m-Y',strtotime($val->transactionDate))?>
			</td>
			<td>
				<?php
				echo \mcms\xeditable\XEditableTextArea::widget([
					'model' => $val,
					'placement' => 'right',
					'url' => 'transactions/updatelgdescription',
					'pluginOptions' => [
						'name' => 'particular',
						'id' => 'ID',
					],
					
				]);
				?>
			</td>
			<td>
				<?php
					if($val->debit==0){
						$val->amount=number_format($val->credit);
						echo \mcms\xeditable\XEditableText::widget([
							'model' => $val,
							'placement' => 'right',
							'url' => 'transactions/updateamount',
							'pluginOptions' => [
								'name' => 'amount',
								'id' => 'ID',
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
					}else{
						$val->amount=number_format($val->debit);
						echo \mcms\xeditable\XEditableText::widget([
							'model' => $val,
							'placement' => 'right',
							'url' => 'transactions/updateamount',
							'pluginOptions' => [
								'name' => 'amount',
								'id' => 'ID',
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
					}	
				?>
			</td>
			<td>
				<?php
				echo \mcms\xeditable\XEditableText::widget([
					'model' => $val,
					'placement' => 'right',
					'url' => 'transactions/updatevoucherno',
					'pluginOptions' => [
						'name' => 'voucherNO',
						'id' => 'ID',
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
				$list = LedgerHead::GetHeadList($val->subHeadID);
				echo \mcms\xeditable\XEditableSelect::widget([
					'model' => $val,
					'placement' => 'right',
					'url' => 'transactions/updatehead',
					'pluginOptions' => [
						'name' => 'headID',
						'id' => 'ID',
						'source'=>$list,
					],
				]); ?>
				
				<?php // $val->headID?>
			</td>
			<td>
			
			</td>
		</tr> 
	<?php endforeach;?>	
	