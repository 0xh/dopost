
var app = angular.module('app', ['ngRoute', 'ui.bootstrap', 'angular-oauth2', 'ngCookies', 'LocalStorageModule']);

app.config(['$routeProvider', '$locationProvider', 'localStorageServiceProvider', function AppConfig($routeProvider, $locationProvider) {
    $locationProvider.hashPrefix('');



    $routeProvider
        .when('/users', { templateUrl: '/components/users/usersView.html', controller: 'usersController' } )
        .when('/users/:userId', { templateUrl: '/components/user/userView.html', controller: 'userController'} )
        .when('/login', { templateUrl: '/components/login/loginView.html', controller: 'loginController'} )
        .when('/forgot-password', { templateUrl: '/components/login/forgotPasswordView.html', controller: 'forgotPasswordController'} )
        .when('/register', { templateUrl: '/components/register/registerView.html', controller: 'registerController'} )
        .otherwise({redirectTo: '/users/1'});
}]);

app.directive('googleSignInButton', function() {
    return {
        scope: {
            buttonId: '@',
            options: '='
        },
        template: '<div></div>',
        link: function(scope, element, attrs) {
            var div = element.find('div')[0];
            div.id = attrs.buttonId;
            gapi.signin2.render(div.id, scope.options); //render a google button, first argument is an id, second options
        }
    };
});



