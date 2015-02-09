<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\LedgerSubhead;
use app\models\LedgerHead;
//use mihaildev\ckeditor\CKEditor;
//use kartik\widgets\FileInput;
?>
<h1>
	Accounts 
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".subhead-modal" style="margin-left: 115px;">Add Sub Head
	</button>
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".account-modal" >Add an account
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

<div class="tree well">
    <ul>
        <li>
            <span class="glyphicon glyphicon-folder-open" style="height: 28px;
					font-size: 17px;"> Asset </span> <a href="">Goes somewhere</a>
            <ul>
			<?php 
			foreach($subheadList as $subheadval){
				if($subheadval->generalLedgerID == LedgerSubhead::ASSETS){
			?>
                <li>
                	<span><i class="icon-minus-sign"></i> <?= $subheadval->name?></span> <a href="">Goes somewhere</a>
				<?php 
				$ledgerHeadModel = new LedgerHead();
				$headInfo = $ledgerHeadModel->getDataSubheadWise($subheadval->generalLedgerID,$subheadval->subHeadID);
				if($headInfo!=null)
				{
					foreach($headInfo as $headval){
				?>	
                    <ul>
                        <li>
	                        <span><i class="icon-leaf"></i> <?= $headval->accountName?></span> <a href="">Goes somewhere</a>
                        </li>
                    </ul>
					<?php }}?>
                </li>
				
			<?php }}?>	
                <li>
                	<span><i class="icon-minus-sign"></i> Child</span> <a href="">Goes somewhere</a>
                    <ul>
                        <li>
	                        <span><i class="icon-leaf"></i> Grand Child</span> <a href="">Goes somewhere</a>
                        </li>
                        <li>
                        	<span><i class="icon-minus-sign"></i> Grand Child</span> <a href="">Goes somewhere</a>
                            <ul>
                                <li>
	                                <span><i class="icon-minus-sign"></i> Great Grand Child</span> <a href="">Goes somewhere</a>
		                            <ul>
		                                <li>
			                                <span><i class="icon-leaf"></i> Great great Grand Child</span> <a href="">Goes somewhere</a>
		                                </li>
		                                <li>
			                                <span><i class="icon-leaf"></i> Great great Grand Child</span> <a href="">Goes somewhere</a>
		                                </li>
		                             </ul>
                                </li>
                                <li>
	                                <span><i class="icon-leaf"></i> Great Grand Child</span> <a href="">Goes somewhere</a>
                                </li>
                                <li>
	                                <span><i class="icon-leaf"></i> Great Grand Child</span> <a href="">Goes somewhere</a>
                                </li>
                            </ul>
                        </li>
                        <li>
	                        <span><i class="icon-leaf"></i> Grand Child</span> <a href="">Goes somewhere</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <span><i class="icon-folder-open"></i> Parent2</span> <a href="">Goes somewhere</a>
            <ul>
                <li>
                	<span><i class="icon-leaf"></i> Child</span> <a href="">Goes somewhere</a>
		        </li>
		    </ul>
        </li>
    </ul>
</div>


<table class="table table-bordered">
	<thead>
	  <tr class="active">
		<th>Name</th>
		<th>Actions</th>
	  </tr>
	</thead>
	<tbody>
		<tr class="info">
			<td colspan="2">Asset</td>
		</tr> 
		<?php 
			foreach($subheadList as $subheadval){
				if($subheadval->generalLedgerID == LedgerSubhead::ASSETS){
		?>
			<tr class="warning">
				<td><?= $subheadval->name?></td>
				<td></td>
			</tr> 
			<?php 
				$ledgerHeadModel = new LedgerHead();
				$headInfo = $ledgerHeadModel->getDataSubheadWise($subheadval->generalLedgerID,$subheadval->subHeadID);
				if($headInfo!=null)
				{
					foreach($headInfo as $headval){
			?>
					<tr>
						<td><?= $headval->accountName?></td>
						<td></td>
					</tr>
				<?php }}}}?>
		<tr class="info">
			<td colspan="2">Liability/Credit Card</td>
		</tr> 
		<?php 
			foreach($subheadList as $subheadval){
				if($subheadval->generalLedgerID == LedgerSubhead::LIABILITY){
		?>
			<tr class="warning">
				<td><?= $subheadval->name?></td>
				<td></td>
			</tr> 
			<?php 
				$ledgerHeadModel = new LedgerHead();
				$headInfo = $ledgerHeadModel->getDataSubheadWise($subheadval->generalLedgerID,$subheadval->subHeadID);
				if($headInfo!=null)
				{
					foreach($headInfo as $headval){
			?>
					<tr>
						<td><?= $headval->accountName?></td>
						<td></td>
					</tr>
				<?php }}}}?>
		<tr class="info">
			<td colspan="2">Income</td>
		</tr> 
		<?php 
			foreach($subheadList as $subheadval){
				if($subheadval->generalLedgerID == LedgerSubhead::INCOME){
		?>
			<tr class="warning">
				<td><?= $subheadval->name?></td>
				<td></td>
			</tr> 
			<?php 
				$ledgerHeadModel = new LedgerHead();
				$headInfo = $ledgerHeadModel->getDataSubheadWise($subheadval->generalLedgerID,$subheadval->subHeadID);
				if($headInfo!=null)
				{
					foreach($headInfo as $headval){
			?>
					<tr>
						<td><?= $headval->accountName?></td>
						<td></td>
					</tr>
				<?php }}}}?>
		<tr class="info">
			<td colspan="2">Expense</td>
		</tr> 
		<?php 
			foreach($subheadList as $subheadval){
				if($subheadval->generalLedgerID == LedgerSubhead::EXPENSE){
		?>
			<tr class="warning">
				<td><?= $subheadval->name?></td>
				<td></td>
			</tr> 
			<?php 
				$ledgerHeadModel = new LedgerHead();
				$headInfo = $ledgerHeadModel->getDataSubheadWise($subheadval->generalLedgerID,$subheadval->subHeadID);
				if($headInfo!=null)
				{
					foreach($headInfo as $headval){
			?>
					<tr>
						<td><?= $headval->accountName?></td>
						<td></td>
					</tr>
				<?php }}}}?>
		<tr class="info">
			<td colspan="2">Equity</td>
		</tr> 
		<?php 
			foreach($subheadList as $subheadval){
				if($subheadval->generalLedgerID == LedgerSubhead::EQUITY){
		?>
			<tr class="warning">
				<td><?= $subheadval->name?></td>
				<td></td>
			</tr> 
			<?php 
				$ledgerHeadModel = new LedgerHead();
				$headInfo = $ledgerHeadModel->getDataSubheadWise($subheadval->generalLedgerID,$subheadval->subHeadID);
				if($headInfo!=null)
				{
					foreach($headInfo as $headval){
			?>
					<tr>
						<td><?= $headval->accountName?></td>
						<td></td>
					</tr>
				<?php }}}}?>
	</tbody>

</table>



<!-- modal area -->
<div class="modal fade subhead-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
		<div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
           <h4 class="modal-title" id="myLargeModalLabel">Add Subhead</h4>
        </div>
		<?php $form = ActiveForm::begin(['action'=>Yii::$app->getUrlManager()->createUrl('accounting/createsubhead')]);?>
			<div class="modal-body">
				  <div class="form-group">
					<?= $form->field($subheadModel, 'generalLedgerID')
								->dropDownList([
									'101'=>'Assets',
									'102'=>'Liability/Credit Card',
									'103'=>'Income',
									'104'=>'Expense',
									'105'=>'Equity'
								],           
								['prompt'=>'Select General Ledger']    
						);?>
				  </div>
				  <div class="form-group">
					 <?= $form->field($subheadModel, 'name')->textInput(['placeholder' => 'Subhead Name']) ?>
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


<div class="modal fade account-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
		<div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
           <h4 class="modal-title" id="myLargeModalLabel">Add Account</h4>
        </div>
		<?php $form = ActiveForm::begin(['action'=>Yii::$app->getUrlManager()->createUrl('accounting/createhead')]);?>
			<div class="modal-body">
				  <div class="form-group">
					<?= $form->field($headModel, 'generalLedgerID')
								->dropDownList([
									'101'=>'Assets',
									'102'=>'Liability/Credit Card',
									'103'=>'Income',
									'104'=>'Expense',
									'105'=>'Equity'
								],           
								['prompt'=>'Select General Ledger']    
						);?>
				  </div>
				  <div class="form-group">
				  <span class="loader" style="display: none"></span>
					<?= $form->field($headModel, 'subHeadID')
								->dropDownList([
									
								],           
								['prompt'=>'Select Sub Head']    
						);?>
				  </div>
				  <div class="form-group">
					<?= $form->field($headModel, 'accountName')->textInput(['placeholder' => 'Account Name']) ?>
				  </div>
				  <div class="form-group">
					<?= $form->field($headModel, 'description')->textArea(['placeholder' => 'Description','cols'=>'4','rows' => '6']) ?>
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
$glUrl=Yii::$app->getUrlManager()->createUrl('accounting/getglwisesubheadlist');
$this->registerJs(
'$("#ledgerhead-generalledgerid").on("change", function(){
	var img = "'.Yii::$app->getUrlManager()->getBaseUrl().'"; 	
	var glid=$("#ledgerhead-generalledgerid").val();
	$.ajax({
		type:"POST",
		url:"'.$glUrl.'",
		data:{"glid":glid},
		beforeSend: function (){   
			$(".loader").show();     		   		    		 		
			$(".loader").html("<img src=\'"+img+"/images/dataloader.gif\'/>");     		 			
		},
		success:function(data){
			var obj = jQuery.parseJSON(data);
			if(obj.success == "success"){
			$(".loader").hide(); 
			$("#ledgerhead-subheadid").html(obj.subheadList);
		}}
	});
})'
);
?>
