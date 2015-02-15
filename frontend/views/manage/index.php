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
	<span ng-show="loading">Loading.......</span>
	<div class="supplier-form">
	<form name="supForm" novalidate>
	<ul>
                    <li class="alert in alert-block fade alert-success" ng-repeat="msg in msgs"> {{ msg}} </li>
                </ul>
	<div class="form-group" ng-class="{true: 'error'}[submitted && supForm.sname.$invalid]">
		<label >Supplier Name</label>
		<input type="text" class="form-control"  ng-model="sname" name="sname"  placeholder="Supplier name" required>
		<span ng-show="supForm.sname.$dirty && supForm.sname.$error.required" style="color:red">Name is required</span>
	  </div>
	<div class="form-group" ng-class="{true: 'error'}[submitted && supForm.address.$invalid]">
		<label >Address</label>
		<textarea class="form-control" rows="3" ng-model="address" name="address" required></textarea>
		<span ng-show="supForm.address.$dirty && supForm.address.$error.required" style="color:red">Address is required</span>
	  </div>
	 <div class="form-group" ng-class="{true: 'error'}[submitted && supForm.contact.$invalid]">
		<label >Contact No</label>
		<input type="text" class="form-control"  ng-model="contact" name="contact"  placeholder="Contact No" required>
		<span ng-show="supForm.contact.$dirty && supForm.contact.$error.required" style="color:red">Contact is required</span>
	  </div>
	 <div class="form-group" ng-class="{true: 'error'}[submitted && supForm.contactPerson.$invalid]">
		<label >Contact Person</label>
		<input type="text" class="form-control"  ng-model="contactPerson" name="contactPerson"  placeholder="Contact Person" required>
		<span ng-show="supForm.contactPerson.$dirty && supForm.contactPerson.$error.required" style="color:red">Contact Person is required</span>
	  </div>
	  <input type="hidden" class="form-control"  ng-model="id" >
	 <button class="btn btn-success" ng-click='Send();'  ng-disabled="supForm.$invalid"  type="button" >Submit</button>
	</form>	
	</div>
	</div>
	<div class="col-md-6">
	<h3>Supplier List</h3><hr>
	<table class="table table-striped" at-table at-paginated at-list="list" at-config="config">
	<thead><tr><th>Supplier Name</th><th>Address</th><th>Contact No</th><th>Contact No</th><th>Action</th></tr></thead>
	<tr ng-repeat="x in data">
                        <td at-implicit at-sortable at-attribute="SupplierName">{{x.SupplierName}}</td>
                        <td at-implicit at-sortable at-attribute="Address">{{x.Address}}</td>
                        <td at-implicit at-sortable at-attribute="ContactNo">{{x.ContactNo}}</td>
                        <td at-implicit at-sortable at-attribute="ContactPerson">{{x.ContactPerson}}</td>
                        <td>
						
							  <i class="glyphicon glyphicon-pencil" ng-click="editUser(x.SupplierID)"></i>
							
							  <i ng-click="deleteUser(x.SupplierID)" ng-confirm-click="Are you sure you want to delete this?" class="glyphicon glyphicon-trash" ></i>
							
						</td>
                       
                    </tr>
</table>
<at-pagination at-list="list" at-config="config"></at-pagination>
	</div>
</div>
</div>
    <div role="tabpanel" class="tab-pane" id="profile">How</div>
    <div role="tabpanel" class="tab-pane" id="messages">Are</div>
    <div role="tabpanel" class="tab-pane" id="settings">You</div>
  </div>

</div>

<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.0/angular.min.js"></script>
<script type="text/javascript">
var manageModule = angular.module('manage', []);
 manageModule.controller('supplierController', ['$scope', '$http', function($scope, $http) {
 
				$scope.errors = [];
                $scope.msgs = [];
				$scope.loading = false;
					 $http.get("<?php echo Yii::$app->getUrlManager()->createUrl('manage/supplierlist') ?>")
					.success(function(response) {$scope.data = response;});
				
				
                $scope.Send = function() {
					
					submitted=true;
                    $scope.errors.splice(0, $scope.errors.length); // remove all error messages
                    $scope.msgs.splice(0, $scope.msgs.length);
					$scope.loading = true;
						
                    $http.post("<?php echo Yii::$app->getUrlManager()->createUrl('manage/supplier') ?>", {"sname": $scope.sname, "address": $scope.address, "contact": $scope.contact,"contactperson": $scope.contactPerson,"sn": $scope.id}
					
                    ).success(function(data, status, headers, config) {
                        if (data.msg != "")
                        {
							
								$scope.loading = false;
                            $scope.msgs.push(data.msg);
							  $http.get("<?php echo Yii::$app->getUrlManager()->createUrl('manage/supplierlist') ?>")
								.success(function(response) {$scope.data = response;});
                        }
                        else
                        {
                             $scope.emsgs.push(data.ermsg);
                        }
                    }).error(function(data, status) { 
                        $scope.errors.push(status);
                    });
                }
				
				 $scope.edit = true;
				$scope.error = false;
				$scope.incomplete = false; 
				//$scope.data = [];

				$scope.editUser = function(id) {					
					$scope.edit = false;
					var keepGoing =true;
						 angular.forEach($scope.data,function(jdata)
						{
							if(keepGoing){
								if(jdata.SupplierID == id)
								{
									$scope.sname = jdata.SupplierName;
									$scope.address = jdata.Address; 
									$scope.contact = jdata.ContactNo;
									$scope.contactPerson = jdata.ContactPerson;
									$scope.id = jdata.SupplierID;
									keepGoing = false;
										
								
								}
							}
							
						} 
						
					)
			}
			
			$scope.deleteUser = function(id) {					
				 $http.post("<?php echo Yii::$app->getUrlManager()->createUrl('manage/supplierdelete') ?>", {"id": id}
                    ).success(function(data, status, headers, config) {
                        $scope.msgs.push(data.msg);
							  $http.get("<?php echo Yii::$app->getUrlManager()->createUrl('manage/supplierlist') ?>")
								.success(function(response) {$scope.data = response;});  	
			})
				
            }
			
			
			
 
 }]);
angular.module("manageModule").controller("supplierController", ["$scope", function($scope) {
  $scope.list = $scope.$parent.personList
  $scope.config = {
    itemsPerPage: 5,
    fillLastPage: true
  }
}]);	
manageModule.directive('ngConfirmClick', [
function(){
 return {
  priority: 1,
  terminal: true,
  link: function (scope, element, attr) {
   var msg = attr.ngConfirmClick || "Are you sure?";
   var clickAction = attr.ngClick;
   element.bind('click',function (event) {
    if ( window.confirm(msg) ) {
     scope.$eval(clickAction)
    }
   });
  }
 };
}])
</script>