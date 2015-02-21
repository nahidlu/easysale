var app = angular.module('shopOwner', ['ngRoute', 'ui.bootstrap', 'ngAnimate']);

app.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
    when('/', {
      title: 'Products',
      templateUrl: '../app/shops/partials/products.html',
      controller: 'productsCtrl'
    })
    .otherwise({
      redirectTo: '/'
    });;
}]);
    