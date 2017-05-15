app.controller('forgotPasswordController', function ($scope, $http, localStorageService, $timeout, userService) {
    $scope.email = '';

    $scope.sendResetLink = function () {

        $http.post('/api/forgot-password', {email: $scope.email}).then(function(response) {
            console.log(response);
        });
    }


});
