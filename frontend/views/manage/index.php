<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Supplier */
/* @var $form yii\widgets\ActiveForm */
?>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.0/angular.min.js"></script>

<script src="<?php echo Yii::$app->request->baseUrl.'/js/jquery.dataTables.min.js' ?>"></script>


<script src="<?php echo Yii::$app->request->baseUrl.'/js/angular-datatables.min.js' ?>"></script>
<link rel="stylesheet" type="text/css" href="http://angular-ui.github.com/ng-grid/css/ng-grid.css" />
<div role="tabpanel" ng-app="manage">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Products</a></li>
 
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="home">
	<div class="row" ng-controller="supplierController">
	<div class="col-md-6">
	<h3><i class="glyphicon glyphicon-user"></i> Add Supplier</h3><hr>
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
	<h3> <i class="glyphicon glyphicon-user"></i>  Supplier List</h3><hr>
	<table  datatable="ng" class="table table-striped">
	<thead><tr><th>Supplier Name</th><th>Address</th><th>Contact No</th><th>Contact No</th><th>Action</th></tr></thead>
	<tr ng-repeat="x in data">
                        <td >{{x.SupplierName}}</td>
                        <td >{{x.Address}}</td>
                        <td >{{x.ContactNo}}</td>
                        <td >{{x.ContactPerson}}</td>
                        <td>
						
							  <i class="glyphicon glyphicon-pencil" ng-click="editUser(x.SupplierID)"></i>
							
							  <i ng-click="deleteUser(x.SupplierID)" ng-confirm-click="Are you sure you want to delete this?" class="glyphicon glyphicon-trash" ></i>
							
						</td>
                       
                    </tr>
</table> 
<!--<div class="table table-striped" ng-grid="gridOptions"></div>-->
	</div>
</div>
</div>
 <div role="tabpanel" class="tab-pane fade" id="profile">
<div class="row" >
	<div class="col-md-6">
	<div ng-controller="productController">
	<h4><i class="glyphicon glyphicon-queen"></i> Product Category</h4><hr>
<div class="alert in alert-block fade alert-success" ng-repeat="msg in msgs"> {{ msg}} </div>
            
	<form name="productForm" novalidate>
	
	<div class="form-group" ng-class="{true: 'error'}[submitted && productForm.pname.$invalid]">
		<label >Product Category Name</label>
		<input type="text" class="form-control"  ng-model="pname" name="pname"  placeholder="Product Category Name" required>
		<span ng-show="productForm.pname.$dirty && productForm.pname.$error.required" style="color:red">Product Category Name is required</span>
	  </div>
	 <input type="hidden" class="form-control"  ng-model="id" >
	 <button class="btn btn-success" ng-click='Save();' ng-disabled="productForm.$invalid"  type="button" >Submit</button>
	</form><hr>
	
	<table  datatable="ng" class="table table-striped">
	<thead><tr><th>Product Category Name</th><th>Action</th></tr></thead>
	<tr ng-repeat="x in data">
                        <td >{{x.CategoryName}}</td>
                       <td>
						
							  <i class="glyphicon glyphicon-pencil" ng-click="editUser(x.CategoryID)"></i>
							
							  <i ng-click="deleteUser(x.CategoryID)" ng-confirm-click="Are you sure you want to delete this?" class="glyphicon glyphicon-trash" ></i>
							
						</td>
                       
                    </tr>
</table> 
		</div></div>
	
	<div class="col-md-6">
	<h4><i class="glyphicon glyphicon-queen"></i> Product Name</h4><hr>
	<div ng-controller="productnameController">
		<div class="alert in alert-block fade alert-success" ng-repeat="msg in msgs"> {{ msg}} </div>
    
	<form name="productCategoryForm" novalidate>
	<div class="form-group" ng-class="{true: 'error'}[submitted && productCategoryForm.catname.$invalid]">
		<label >Select Category Name</label>
		<select name="catname" ng-model="catname" class="form-control" required>
			  <?php echo $line; ?>
		</select>
		<span ng-show="productCategoryForm.catname.$dirty && productCategoryForm.catname.$error.required" style="color:red">Product Category Name is required</span>
	</div>
	 <div class="form-group" ng-class="{true: 'error'}[submitted && productCategoryForm.pdname.$invalid]">
		<label >Product Name</label>
		<input type="text" name="pdname" ng-model="pdname" class="form-control"  placeholder="Product Name"  required>
		<input type="hidden" name="id" ng-model="id" class="form-control" >
		<span ng-show="productCategoryForm.pdname.$dirty && productCategoryForm.pdname.$error.required" style="color:red">Product Name is required</span>
	  </div>
	 <div class="form-group" >
		<label for="exampleInputEmail1">Product ID</label><div class="clearfix"></div>
		<input type="text" style="width: 95%;float: left;margin-right: 5px" class="form-control"  ng-model="productid" id="exampleInputEmail1" placeholder="Enter Product ID" disabled>
		<span><input type="checkbox" id="inputSuccess1"></span>
	  </div>
	  
	 <button class="btn btn-success" ng-click='Sendd();' ng-disabled="productCategoryForm.$invalid"  type="button" >Submit</button>
  </form><hr>
  <table  datatable="ng" class="table table-striped">
	<thead><tr><th>Product Name</th><th>Product ID</th><th>Action</th></tr></thead>
	<tr ng-repeat="x in data">
                        <td >{{x.ProductName}}</td>
                        <td >{{x.ProductID}}</td>
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

</div>


<script type="text/javascript">
$("#inputSuccess1").click(function() {

   if ($('#inputSuccess1').is(':checked') == true){
        $("#exampleInputEmail1").removeAttr('disabled');
       
    } else {
        $('#exampleInputEmail1').attr('disabled',!this.checked);
    }
});
var manageModule = angular.module('manage', ['datatables']);
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
  manageModule.controller('productController', ['$scope', '$http', function($scope, $http) {
	$scope.errors = [];
                $scope.msgs = [];
				$scope.loading = false;
					
			
 
   $http.get("<?php echo Yii::$app->getUrlManager()->createUrl('manage/productcategorylist') ?>")
								.success(function(response) {$scope.data = response;});

                $scope.Save = function() {
					
					submitted=true;
                    $scope.errors.splice(0, $scope.errors.length); // remove all error messages
                    $scope.msgs.splice(0, $scope.msgs.length);
					$scope.loading = true;
						
                    $http.post("<?php echo Yii::$app->getUrlManager()->createUrl('manage/productcategory') ?>", {"pname": $scope.pname,"sn": $scope.id}
					
                    ).success(function(data, status, headers, config) {
                        if (data.msg != "")
                        {
							
								$scope.loading = false;
                             $scope.msgs.push(data.msg);
							  $http.get("<?php echo Yii::$app->getUrlManager()->createUrl('manage/productcategorylist') ?>")
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
				
					$scope.editUser = function(id) {					
					$scope.edit = false;
					var keepGoing =true;
						 angular.forEach($scope.data,function(jdata)
						{
							if(keepGoing){
								if(jdata.CategoryID == id)
								{
									$scope.pname = jdata.CategoryName	;
								
									$scope.id = jdata.CategoryID;
									keepGoing = false;
										
								
								}
							}
							
						} 
						
					)
			}
			
			$scope.deleteUser = function(id) {					
				 $http.post("<?php echo Yii::$app->getUrlManager()->createUrl('manage/productcategorydelete') ?>", {"id": id}
                    ).success(function(data, status, headers, config) {
                        $scope.msgs.push(data.msg);
							  $http.get("<?php echo Yii::$app->getUrlManager()->createUrl('manage/productcategorylist') ?>")
								.success(function(response) {$scope.data = response;});  	
			})
				
            }
	
}])
 
 manageModule.controller('productnameController', ['$scope', '$http', function($scope, $http) {
 
				$scope.errors = [];
                $scope.msgs = [];
				$scope.loading = false;
					 $http.get("<?php echo Yii::$app->getUrlManager()->createUrl('manage/productnamelist') ?>")
					.success(function(response) {$scope.data = response;});
				
				
                $scope.Sendd = function() {
					
					submitted=true;
                    $scope.errors.splice(0, $scope.errors.length); // remove all error messages
                    $scope.msgs.splice(0, $scope.msgs.length);
					$scope.loading = true;
						
                    $http.post("<?php echo Yii::$app->getUrlManager()->createUrl('manage/addproductname') ?>", {"cname": $scope.catname, "productname": $scope.pdname, "pid": $scope.productid,"sn":$scope.id}
					
                    ).success(function(data, status, headers, config) {
                        if (data.msg != "")
                        {
							
								$scope.loading = false;
                            $scope.msgs.push(data.msg);
							 $http.get("<?php echo Yii::$app->getUrlManager()->createUrl('manage/productnamelist') ?>")
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
									$scope.catname = jdata.CategoryID;
									$scope.pdname = jdata.ProductName; 
									$scope.productid = jdata.ProductID;
									
									$scope.id = jdata.sn;
									keepGoing = false;
										
								
								}
							}
							
						} 
						
					)
			}
			
			$scope.deleteUser = function(id) {					
				 $http.post("<?php echo Yii::$app->getUrlManager()->createUrl('manage/productnamedelete') ?>", {"id": id}
                    ).success(function(data, status, headers, config) {
                        $scope.msgs.push(data.msg);
							  $http.get("<?php echo Yii::$app->getUrlManager()->createUrl('manage/productnamelist') ?>")
					.success(function(response) {$scope.data = response;});
			})
				
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