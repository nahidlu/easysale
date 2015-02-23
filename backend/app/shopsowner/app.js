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
    