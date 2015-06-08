/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var dependencies = [
    //Angular Modules.
    'ngRoute', 'ngAnimate', 'ngLodash', 'dotjem.angular.tree', 'slick',
    //Photo App modules.
    'PhotoApp.services', 'PhotoApp.controllers', 'PhotoApp.directives'
];
angular.module('PhotoApp', dependencies);

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
angular.module('PhotoApp.directives', []);
angular.module('PhotoApp.controllers', []);