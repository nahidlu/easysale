var app = angular.module('shopOwner', ['ngRoute', 'ui.bootstrap', 'ngAnimate']);

app.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
    when('/', {
      title: 'Products',
      templateUrl: '../app/shopsowner/partials/shopowners.html',
      controller: 'shopownerCtrl'
    })
    .otherwise({
      redirectTo: '/'
    });;
}]);
app.filter('startFrom', function() {
    return function(input, start) {
        if(input) {
            start = +start; //parse to int
            return input.slice(start);
        }
        return [];
    }
});