<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
//use yii\bootstrap\ActiveForm;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use backend\models\Shop;
use yii\db\Query;

?>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.0/angular.min.js"></script>

<script src="<?php echo Yii::$app->request->baseUrl.'/js/jquery.dataTables.min.js' ?>"></script>



<script src="<?php echo Yii::$app->request->baseUrl.'/js/angular-datatables.min.js' ?>"></script>
<div ng-app="manageEmployee">
<div class="row" ng-controller="FrmController">

<div class="col-md-6">
<h3>Manage Employee</h3><hr>
<span ng-show="loading">Loading.......</span>
    
<?php if (Yii::$app->session->hasFlash('success')):?>
			<h5>
				<div class="alert in alert-block fade alert-success" style="margin-right: 2%;">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?= Yii::$app->session->getFlash('success'); ?>
				</div>
			</h5>
<?php endif;?>
<div id='dv1'>
<form  name="frmRegister" novalidate >
	 <ul>
                    <li class="alert in alert-block fade alert-success" ng-repeat="msg in msgs"> {{ msg}} </li>
                </ul>
	
  <div class="form-group" ng-class="{true: 'error'}[submitted && frmRegister.username.$invalid]">
    <label >Username</label>
    <input type="text" class="form-control"  ng-model="username" name="name"  placeholder="Enter Username" required>
	<span ng-show="frmRegister.name.$dirty && frmRegister.name.$error.required" style="color:red">Name is required</span>
  </div>
  <div class="form-group" ng-class="{true: 'error'}[submitted && frmRegister.password.$invalid]">
    <label >Password</label>
    <input type="password" class="form-control" name="pass"  ng-model="password" placeholder="Password" required>
	<span ng-show="frmRegister.pass.$dirty && frmRegister.pass.$error.required" style="color:red">Password is required</span>
    <input type="hidden" class="form-control"  ng-model="sn" >
   
  </div>
  <div class="form-group" ng-class="{true: 'error'}[submitted && frmRegister.usertype.$invalid]">
    <label >User Type</label>
    <select class="form-control" name="type" ng-model="usertype" required><option value="3">Manager</option><option value="4">Sales Man</option></select>
	<span ng-show="frmRegister.type.$dirty && frmRegister.type.$error.required" style="color:red">Usertype is required</span>
  </div>
 <button class="btn btn-success" ng-click='Send();'    ng-disabled="frmRegister.$invalid"  type="button" >Submit</button>
   <!--<input type="Submit" class="btn btn-success" ng-click='Send();'>-->
 </form>
</div>
</div>
<div class="col-md-6">
<h3>Manage Shop</h3><hr>

<div >
<table datatable="ng" class="table table-striped">
	<thead><tr><th>Username</th><th>User Type</th><th>Action</th></tr></thead>
	<tr ng-repeat="x in data">
                        <td>{{x.username}}</td>
                        <td><span ng-if="x.type === '3'">
						Manager
						</span><span ng-if="x.type === '4'">
						Sales Man
						</span></td>
						<td>
						
							  <i class="glyphicon glyphicon-pencil" ng-click="editUser(x.sn)"></i>
							
							  <i ng-click="deleteUser(x.sn)" ng-confirm-click="Are you sure you want to delete this?" class="glyphicon glyphicon-trash" ></i>
							
						</td>
                       
                    </tr>
</table>
</div>
</div>
</div>
</div>

<script type="text/javascript">
var employeeModule = angular.module('manageEmployee', ['datatables']);
 employeeModule.controller('FrmController', ['$scope', '$http', function($scope, $http) {
 
				$scope.errors = [];
                $scope.msgs = [];
				$scope.loading = false;
					 $http.get("<?php echo Yii::$app->getUrlManager()->createUrl('employee/view') ?>")
					.success(function(response) {$scope.data = response;});
				
				
                $scope.Send = function() {
					
					submitted=true;
                    $scope.errors.splice(0, $scope.errors.length); // remove all error messages
                    $scope.msgs.splice(0, $scope.msgs.length);
					$scope.loading = true;
						
                    $http.post("<?php echo Yii::$app->getUrlManager()->createUrl('employee/test') ?>", {"uname": $scope.username, "pswd": $scope.password, "type": $scope.usertype,"sn": $scope.sn}
					
                    ).success(function(data, status, headers, config) {
                        if (data.msg != "")
                        {
							
								$scope.loading = false;
                            $scope.msgs.push(data.msg);
							  $http.get("<?php echo Yii::$app->getUrlManager()->createUrl('employee/view') ?>")
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
								if(jdata.sn == id)
								{
									$scope.username = jdata.username;
									$scope.password = jdata.password; 
									$scope.usertype = jdata.type;
									$scope.sn = jdata.sn;
									keepGoing = false;
										
								
								}
							}
							
						} 
						
					)
			}
			
			$scope.deleteUser = function(id) {					
				 $http.post("<?php echo Yii::$app->getUrlManager()->createUrl('employee/delete') ?>", {"id": id}
                    ).success(function(data, status, headers, config) {
                        $scope.msgs.push(data.msg);
							  $http.get("<?php echo Yii::$app->getUrlManager()->createUrl('employee/view') ?>")
								.success(function(response) {$scope.data = response;});  	
			})
				
            }
 
 }]);
	
employeeModule.directive('ngConfirmClick', [
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

 
