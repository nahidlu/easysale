app.controller('shopListCtrl', function ($http,$scope, $modal, $filter, Data) {
   
	 
	$scope.product = {};
	//$scope.title =null;

	   Data.get('shoplist').then(function(data){
        $scope.products = data.data;

        $scope.currentPage = 1; //current page
        $scope.entryLimit = 5; //max no of items to display in a page
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
	   Data.get('ownerlist').then(function(data){
        $scope.dt = data.data;
		});

  /*   Data.get('shoplist').then(function(data){
        $scope.products = data.data;
    }); */
    $scope.changeProductStatus = function(product){
        product.status = (product.status=="1" ? "0" : "1");
        Data.post("changestatus",{status:product.status,shopid:product.shopid});
    };
    $scope.deleteProduct = function(product){
        if(confirm("Are you sure to remove the product")){
            Data.post("deleteshop",product).then(function(result){
                $scope.products = _.without($scope.products, _.findWhere($scope.products, {shopid:product.shopid}));
            });
        }
    };
    $scope.open = function (p,size) {
		
	      var modalInstance = $modal.open({
          templateUrl: '../app/shop/partials/shopEdit.html',
          controller: 'shopEditCtrl',
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
                //$scope.products = $filter('orderBy')($scope.products, 'shopid', 'reverse');
				
            }else if(selectedObject.save == "update"){
                p.ShopName = selectedObject.ShopName;
                p.Address1 = selectedObject.Address1;
                p.ContactNo = selectedObject.ContactNo;
                p.owner_name = selectedObject.owner_name;
                p.Logo = selectedObject.Logo;
                p.Slogan = selectedObject.Slogan;
                p.owner_id = selectedObject.owner_id;
                p.shop_type = selectedObject.shop_type;
                p.status = selectedObject.status;
               
            }
        });
    };
	
	
    
 $scope.columns = [
                    {text:"Shop ID",predicate:"shopid",sortable:true,dataType:"number"},
                    {text:"Shop Name",predicate:"ShopName",sortable:true},
                    {text:"Address",predicate:"Address1",sortable:true},
                    {text:"Contact No",predicate:"ContactNo",sortable:true},
                    {text:"Owner Name",predicate:"owner_name",sortable:true},
                    {text:"Logo",predicate:"Logo",sortable:true},
                    {text:"Slogan",predicate:"Slogan",sortable:true},
                    {text:"Owner ID",predicate:"owner_id",sortable:true},
                    {text:"Shop Type",predicate:"shop_type",sortable:true},
                    {text:"Status",predicate:"status",sortable:true},
                    {text:"Action",predicate:"",sortable:false}
                ];

});


app.controller('shopEditCtrl', function ($http,$scope, $modalInstance, item, Data) {

  $scope.product = angular.copy(item);
        
		   Data.get('ownerlist').then(function(data){
        $scope.dt = data.data;
    });
        $scope.cancel = function () {
            $modalInstance.dismiss('Close');
        };
        $scope.title = (item.shopid > 0) ? 'Edit Shop' : 'Add Shop';
        $scope.buttonText = (item.shopid > 0) ? 'Update Shop' : 'Add New Shop';

        var original = item;
        $scope.isClean = function() {
            return angular.equals(original, $scope.product);
        }
        $scope.saveProduct = function (product) {
            product.uid = $scope.uid;
            if(product.shopid > 0){
                Data.post('updateshop', product).then(function (result) {
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
                Data.post('createshop', product).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(product);
                        x.save = 'insert';
                        x.shopid = result.data;						
                        $modalInstance.close(x);
                    }else{
                        //console.log(result);
						$scope.suberr=result.error;
                    }
                });
            }
        };
});
