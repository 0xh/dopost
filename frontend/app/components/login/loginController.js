
app.controller('loginController', function ($scope, $http, localStorageService, $timeout, userService, $window) {
    var clientId = 1;
    var clientSecret = 'IMZWXtLDZHfIK30DCpEulm3O7dRJDYsJ9chUD5mm';
    var grantType =  'password';


    $scope.login = function () {
        var data = {
            client_id: clientId,
            client_secret: clientSecret,
            grant_type: grantType,
            username: $scope.email,
            password: $scope.password
        };

        $http.post('/oauth/token', data).then(function(response) {
            localStorageService.set('token', response.data.access_token);
            console.log(response);

            $timeout(function () {
                if (response.status < 400) {
                    userService.redirectToActive();
                }
            });
        });
    };

    $scope.loginWithGoogle = function () {
        gapi.client.setApiKey('AIzaSyD_kViP9tBVHQZoRLwLDhV_k9cSFu-HIFo');
        gapi.client.load('plus', 'v1', function () {});

        gapi.auth.signIn({
            clientid: '767231447648-5mu0ca11hjun3v18m374025a37mbpthv.apps.googleusercontent.com',
            cookiepolicy: 'single_host_origin',
            approvalprompt: 'force',
            scope: 'https://www.googleapis.com/auth/plus.me',
            callback: function (result) {

                var data = {
                    client_id: clientId,
                    client_secret: clientSecret,
                    grant_type: 'social',
                    network: 'google',
                    access_token: result.access_token
                };

                $http.post('/oauth/token', data).then(function(response) {
                    localStorageService.set('token', response.data.access_token);
                    console.log(response);

                    $timeout(function () {
                        if (response.status < 400) {
                            userService.redirectToActive();
                        }
                    });
                });
            }
        });



    };
});
