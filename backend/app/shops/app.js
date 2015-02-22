var app = angular.module('shopOwner', ['ngRoute', 'ui.bootstrap', 'ngAnimate']);

app.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
    when('/', {
      title: 'Products',
      templateUrl: '../app/shops/partials/shopowners.html',
      controller: 'shopownerCtrl'
    })
	.when('/addshop', {
      title: 'Products',
      templateUrl: '../app/shops/partials/shops.html',
      controller: 'shopCtrlr'
    })
    .otherwise({
      redirectTo: '/'
    });;
}]);
    