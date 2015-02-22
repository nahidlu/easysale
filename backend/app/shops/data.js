app.factory("Data", ['$http', '$location',
    function ($http, $q, $location) {

        var serviceBase = 'ngdemolist';

        var obj = {};

        obj.get = function (q) {
            return $http.get(q).then(function (results) {
                return results.data;
            });
        };
        obj.post = function (q, object) {
            return $http.post(q, object).then(function (results) {
                return results.data;
            });
        };
        obj.delete = function (q) {
            return $http.post(q).then(function (results) {
                return results.data;
            });
        };
        return obj;
}]);
