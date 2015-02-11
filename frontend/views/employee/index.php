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
use yii\web\session;
$session = Yii::$app->session;
$session->open();
echo $session['shopid'];exit;
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
<div id='dv1'>
<form ng-app ng-controller="FrmController">
			
  <div class="form-group">
    <label >Username</label>
    <input type="text" class="form-control"  ng-model="username"  placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label >Password</label>
    <input type="password" class="form-control"  ng-model="password" placeholder="Password">
  </div>
  <div class="form-group">
    <label >User Type</label>
    <select class="form-control" ng-model="usertype" ><option value="3">Manager</option><option value="4">Sales Man</option></select>
  </div>
  <button class="btn btn-success" ng-click='Send();' type="button">Submit</button>
 </form>
</div>
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
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.0/angular.min.js"></script>
<script type="text/javascript">
    
	function FrmController($scope, $http) {
                $scope.errors = [];
                $scope.msgs = [];
 
                $scope.Send = function() {
 
                    $scope.errors.splice(0, $scope.errors.length); // remove all error messages
                    $scope.msgs.splice(0, $scope.msgs.length);
 
                    $http.post("<?php echo Yii::$app->getUrlManager()->createUrl('employee/save') ?>", {"uname": $scope.username, "pswd": $scope.password, "type": $scope.usertype}
                    ).success(function(data, status, headers, config) {
                        if (data.msg != "")
                        {
                            $scope.msgs.push(data.msg);
                        }
                        else
                        {
                            $scope.errors.push(data.error);
                        }
                    }).error(function(data, status) { 
                        $scope.errors.push(status);
                    });
                }
            }
			
</script>	

 
