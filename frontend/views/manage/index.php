<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Supplier */
/* @var $form yii\widgets\ActiveForm */
?>

<div role="tabpanel" ng-app="manage">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
	<div class="row" ng-controller="supplierController">
	<div class="col-md-6">
	<h3>Add Supplier</h3><hr>
	<div class="supplier-form">
	<form name="supForm">
		<div class="form-group" ng-class="{true: 'error'}[submitted && frmRegister.username.$invalid]">
		<label >Supplier Name</label>
		<input type="text" class="form-control"  ng-model="sname" name="sname"  placeholder="Supplier name" required>
		<span ng-show="supForm.sname.$dirty && supForm.sname.$error.required" style="color:red">Name is required</span>
	  </div>
	</form>	
	</div>
	</div>
	<div class="col-md-6">
	<h3>Supplier List</h3><hr>
	
	</div>
</div>
</div>
    <div role="tabpanel" class="tab-pane" id="profile">How</div>
    <div role="tabpanel" class="tab-pane" id="messages">Are</div>
    <div role="tabpanel" class="tab-pane" id="settings">You</div>
  </div>

</div>