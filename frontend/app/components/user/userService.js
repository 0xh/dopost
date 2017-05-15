app.factory('userService', function(localStorageService, $http, $location) {
    return {
        redirectToActive: function() {
            var options = {
                headers: {
                    'Authorization' : 'Bearer ' + localStorageService.get('token'),
                }
            };

            $http.get('/api/user', options).then(function (response) {
                var userPath = 'users/' + response.data.id;
                localStorageService.set('activeUser', response.data);
                $location.path(userPath);
            });
        }
    };
});