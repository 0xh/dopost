
app.controller('userController', function ($scope, $routeParams, localStorageService, $http) {
    $scope.isPageOwner = $routeParams.userId == localStorageService.get('activeUser').id;
    $scope.name = '';

    $http.get('/api/users/' + $routeParams.userId).then(function (response) {
        $scope.name = response.data.name;
    });
});