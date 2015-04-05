app.controller('employeeListCtrl', function ($scope, $modal, $filter, Data) {
    $scope.product = {};
	//$scope.title =null;
	 Data.get('rolelist').then(function(data){
        $scope.dt = data.data;
		});
    Data.get('emplist').then(function(data){
        $scope.products = data.data;

        $scope.currentPage = 1; //current page
        $scope.entryLimit = 3; //max no of items to display in a page
        $scope.filteredItems = $scope.products.length; //Initially for no filter  
        $scope.totalItems = $scope.products.length;
    });
	
	$scope.setPage = function(pageNo) {
	        $scope.currentPage = pageNo;
	    };
	    
	    $scope.sort_by = function(predicate) {
	        $scope.predicate = predicate;
	        $scope.reverse = !$scope.reverse;
	    };
	
    $scope.changeProductStatus = function(product){
        product.status = (product.status=="1" ? "0" : "1");
        Data.post("changestatus",{status:product.status,id:product.sn});
    };
    $scope.deleteProduct = function(product){
        if(confirm("Are you sure to remove the product")){
            Data.post("deleteemployee",product).then(function(result){
                $scope.products = _.without($scope.products, _.findWhere($scope.products, {sn:product.sn}));
            });
        }
    };
    $scope.open = function (p,size) {
	      var modalInstance = $modal.open({
          templateUrl: '../app/employee/partials/ownerEdit.html',
          controller: 'emplistEditCtrl',
          size: size,
          resolve: {
            item: function () {
              return p;
            }
          }
        });
        modalInstance.result.then(function(selectedObject) {

            if(selectedObject.save == "insert"){
               
			    //$scope.products.splice(0,0,selectedObject);
				$scope.products.unshift(selectedObject);
                //$scope.products = $filter('orderBy')($scope.products, 'owner_id', 'reverse');
				
            }else if(selectedObject.save == "update"){
                p.username = selectedObject.username;
                p.password = selectedObject.password;
                p.type = selectedObject.type;
                p.status = selectedObject.status;
                
            }
        });
    };
    
 $scope.columns = [
                    {text:"ID",predicate:"sn",sortable:true,dataType:"number"},
                    {text:"Username",predicate:"username",sortable:true},
                    {text:"Password",predicate:"password",sortable:true},
                    {text:"User Type",predicate:"type",sortable:true},
                    {text:"Status",predicate:"status",sortable:true},
                    {text:"Action",predicate:"",sortable:false}
                ];

});


app.controller('emplistEditCtrl', function ($scope, $modalInstance, item, Data) {

  $scope.product = angular.copy(item);
  
  Data.get('rolelist').then(function(data){
        $scope.dt = data.data;
		});
        
        $scope.cancel = function () {
            $modalInstance.dismiss('Close');
        };
        $scope.title = (item.sn > 0) ? 'Edit Owner' : 'Add Owner';
        $scope.buttonText = (item.sn > 0) ? 'Update Owner' : 'Add New Owner';

        var original = item;
        $scope.isClean = function() {
            return angular.equals(original, $scope.product);
        }
        $scope.saveProduct = function (product) {
            product.uid = $scope.uid;
            if(product.sn > 0){
                Data.post('updateemployee', product).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(product);
                        x.save = 'update';
                        $modalInstance.close(x);
                    }else{
                        console.log(result);
                    }
                });
            }else{
                product.status = 1;
                Data.post('createemployee', product).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(product);
                        x.save = 'insert';
                        x.owner_id = result.data;						
                        $modalInstance.close(x);
                    }else{
                        //console.log(result);
						$scope.suberr=result.error;
                    }
                });
            }
        };
});
