var app = angular.module('shop', ['ngRoute', 'ui.bootstrap', 'ngAnimate']);

app.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
    when('/', {
      title: 'Products',
      templateUrl: '../app/shop/partials/shoplists.html',
      controller: 'shopListCtrl'
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
    