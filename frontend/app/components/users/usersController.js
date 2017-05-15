
app.controller('usersController', function ($scope, $http, $timeout) {
    //default values
    $scope.size = 5;
    $scope.perpage = 20;
    $scope.users = [];
    $scope.total = 0;
    $scope.page = 1;
    $scope.query = '';

    $scope.reloadPaging = function (page) {
            $http.get('/api/users?perpage=20&page=' + page + '&query=' + $scope.query).then(function(response) {
                $scope.users = response.data.data;
                $scope.total = response.data.total;
            });
    };

    $scope.reloadPaging(1);
});