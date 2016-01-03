/**
 * Silje's Media App.
 *  This is the main file for setting up the app. This takes into account having
 *  services, controllers, filters and directives.
 *  Using this as a guide: https://github.com/mgechev/angularjs-style-guide#modules
 */

angular.module('MediaApp', [
    //Angular Modules.
    'ngRoute', 'ngAnimate', 'ngLodash', 'dotjem.angular.tree', 'slick',
    //Photo App modules.
    'MediaApp.services', 'MediaApp.filters', 'MediaApp.directives', 'MediaApp.controllers'
]);

//Route Configuration.
angular.module('MediaApp')
    .config(['$routeProvider', '$locationProvider', '$sceDelegateProvider',
        function($routeProvider, $locationProvider, $sceDelegateProvider) {
            //Photo config.
            var mediaConfig = {
                templateUrl: '/partials/media.html',
                controller: 'MediaCtrl',
                controllerAs: 'media',
                resolve: {
                    detect: function(Detect) {
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
                        detect: function(Detect) {
                            return Detect.fetch();
                        }
                    }
                })
                .when('/media', mediaConfig)
                .when('/media/:path*', mediaConfig)
                .otherwise({
                    redirectTo: '/home'
                });
            //Set HTML 5 mode.
            $locationProvider.html5Mode(true);
            //Delegate S3 as a trusted source.
            $sceDelegateProvider.resourceUrlWhitelist([
                // Allow same origin resource loads.
                'self',
                // Allow loading from our assets domain.  Notice the difference between * and **.
                'http://s3.amazonaws.com/silje-mae/**',
                'https://s3.amazonaws.com/silje-mae/**'
            ]);
        }
    ]);


//Modules
angular.module('MediaApp.services', []);
angular.module('MediaApp.filters', []);
angular.module('MediaApp.directives', []);
angular.module('MediaApp.controllers', []);
