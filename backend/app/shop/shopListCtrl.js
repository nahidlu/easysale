app.controller('shopListCtrl', function ($scope, $modal, $filter, Data) {
    $scope.product = {};
	//$scope.title =null;
	$scope.config = {
	    itemsPerPage: 5,
	    fillLastPage: true
	  }

    Data.get('shoplist').then(function(data){
        $scope.products = data.data;
    });
    $scope.changeProductStatus = function(product){
        product.status = (product.status=="1" ? "0" : "1");
        Data.post("changestatus",{status:product.status,id:product.shopid});
    };
    $scope.deleteProduct = function(product){
        if(confirm("Are you sure to remove the product")){
            Data.post("deleteowner",product).then(function(result){
                $scope.products = _.without($scope.products, _.findWhere($scope.products, {shopid:product.shopid}));
            });
        }
    };
    $scope.open = function (p,size) {
	      var modalInstance = $modal.open({
          templateUrl: '../app/shopsowner/partials/shopEdit.html',
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
				$scope.products.push(selectedObject);
                $scope.products = $filter('orderBy')($scope.products, 'shopid', 'reverse');
				
            }else if(selectedObject.save == "update"){
                p.address = selectedObject.address;
                p.phone = selectedObject.phone;
                p.business_name = selectedObject.business_name;
            }
        });
    };
    
 $scope.columns = [
                    {text:"Shop ID",predicate:"shopid",sortable:true,dataType:"number"},
                    {text:"Shop Name",predicate:"ShopName",sortable:true},
                    {text:"Address",predicate:"address1",sortable:true},
                    {text:"Contact No",predicate:"ContactNo",sortable:true},
                    {text:"Owner Name",predicate:"owner_name",sortable:true},
                    {text:"Logo",predicate:"logo",sortable:true},
                    {text:"Slogan",predicate:"slogan",sortable:true},
                    {text:"Owner ID",predicate:"owner_id",sortable:true},
                    {text:"Shop Type",predicate:"shop_type",sortable:true},
                    {text:"Status",predicate:"status",sortable:true},
                    {text:"Action",predicate:"",sortable:false}
                ];

});


app.controller('shopEditCtrl', function ($scope, $modalInstance, item, Data) {

  $scope.product = angular.copy(item);
        
        $scope.cancel = function () {
            $modalInstance.dismiss('Close');
        };
        $scope.title = (item.owner_id > 0) ? 'Edit Shop' : 'Add Shop';
        $scope.buttonText = (item.owner_id > 0) ? 'Update Shop' : 'Add New Shop';

        var original = item;
        $scope.isClean = function() {
            return angular.equals(original, $scope.product);
        }
        $scope.saveProduct = function (product) {
            product.uid = $scope.uid;
            if(product.owner_id > 0){
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
