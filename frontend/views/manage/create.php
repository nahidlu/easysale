<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.0/angular.min.js"></script>

<script src="<?php echo Yii::$app->request->baseUrl.'/js/jquery.dataTables.min.js' ?>"></script>


<script src="<?php echo Yii::$app->request->baseUrl.'/js/angular-datatables.min.js' ?>"></script>

<div ng-app="Testmd" ng-controller="AngularWayCtrl">
    <table  datatable="ng" class="table table-striped">
        <thead>
        <tr>
           <th>Category Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="person in persons">
            <td>{{ person.CategoryName }}</td>
            <td>Action</td>
        </tr>
        </tbody>
    </table>
</div>





<script type="text/javascript">

angular.module('Testmd', ['datatables'])
.controller('AngularWayCtrl', AngularWayCtrl);

function AngularWayCtrl($http,$scope) {
 
   $http.get("<?php echo Yii::$app->getUrlManager()->createUrl('manage/productcategorylist') ?>")
								.success(function(response) {$scope.persons = response;});
}


</script>