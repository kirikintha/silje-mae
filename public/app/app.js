/**
 * Silje's Photo App.
 *  This is the main file for setting up the app. This takes into account having
 *  services, controllers, filters and directives.
 *  Using this as a guide: https://github.com/mgechev/angularjs-style-guide#modules
 */

angular.module('PhotoApp', [
    //Angular Modules.
    'ngRoute', 'ngAnimate', 'ngLodash', 'dotjem.angular.tree', 'slick',
    //Photo App modules.
    'PhotoApp.services', 'PhotoApp.filters', 'PhotoApp.directives', 'PhotoApp.controllers'
]);

//Route Configuration.
angular.module('PhotoApp')
        .config(['$routeProvider', '$locationProvider',
            function ($routeProvider, $locationProvider) {
                //Photo config.
                var photosConfig = {
                    templateUrl: '/partials/photos.html',
                    controller: 'PhotoCtrl',
                    controllerAs: 'photo',
                    resolve: {
                        detect: function (Detect) {
                            return Detect.fetch();
                        }
                    }
                };
                //Routes.
                $routeProvider
                        .when('/home', {
                            templateUrl: '/partials/home.html',
                            controller: 'HomeCtrl',
                            controllerAs: 'home',
                            resolve: {
                                detect: function (Detect) {
                                    return Detect.fetch();
                                }
                            }
                        })
                        .when('/photos', photosConfig)
                        .when('/photos/:path*', photosConfig)
                        .otherwise({
                            redirectTo: '/home'
                        });
                //Set HTML 5 mode.
                $locationProvider.html5Mode(true);
            }]);


//Modules
angular.module('PhotoApp.services', []);
angular.module('PhotoApp.filters', []);
angular.module('PhotoApp.directives', []);
angular.module('PhotoApp.controllers', []);