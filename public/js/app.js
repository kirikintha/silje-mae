/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var dependencies = ['ngRoute', 'ngAnimate', 'ngLodash', 'dotjem.angular.tree', 'slick'];
var PhotoApp = angular.module('PhotoApp', dependencies);

//Include lodash as factory, with underscore.
PhotoApp.factory('_', ['lodash',
    function (lodash) {
        return lodash;
    }]);

//Directives
PhotoApp.directive('loading', function () {
    return {
        restrict: 'E',
        replace: true,
        template: '<div class="center-block text-center loader"><img src="/images/loader.gif"/></div>',
        link: function (scope, element, attr) {
            scope.$watch('loading', function (val) {
                if (val)
                    $(element).show();
                else
                    $(element).hide();
            });
        }
    }
});

//Services
PhotoApp.service('Menus', ['$http',
    function ($http) {
        return {
            // get all the comments
            fetch: function () {
                return $http.get('/api/menus', {cache: true});
            }
        };
    }]);

//@TODO - change me, to the piece that is in the controller.
PhotoApp.service('Photos', ['$http', '$route', '_',
    function ($http, $route, _) {
        return {
            // get all the comments
            fetch: function () {
                var path = _.isUndefined($route.current.params.path) ? '/api/photos' : '/api/photos/' + $route.current.params.path;
                return $http.get(path, {cache: true});
            }
        };
    }]);

//Route Configuration.
PhotoApp.config(['$routeProvider', '$locationProvider',
    function ($routeProvider, $locationProvider) {
        //Photo config.
        var photosConfig = {
            templateUrl: '/views/photos.html',
            controller: 'PhotoCtrl',
            controllerAs: 'photo',
            resolve: {
                menus: function (Menus) {
                    return Menus.fetch();
                }
            }
        };
        //Routes.
        $routeProvider
                .when('/home', {
                    templateUrl: '/views/home.html',
                    controller: 'HomeCtrl',
                    controllerAs: 'home'
                })
                .when('/photos', photosConfig)
                .when('/photos/:path*', photosConfig)
                .otherwise({
                    redirectTo: '/home'
                });
        //Set HTML 5 mode.
        $locationProvider.html5Mode(true);
    }]);

//Ctrls.

PhotoApp.controller('MainCtrl', ['$route', '$routeParams', '$location',
    function ($route, $routeParams, $location) {
        //Nothing here.
        this.viewAnimate = function () {
            var path = $location.path();
            if (path === '/home') {
                return 'view-animate';
            }
            return 'view-no-animate';
        };
    }]);

PhotoApp.controller('HomeCtrl', ['$scope', '$routeParams',
    function ($scope, $routeParams) {
        //Start the video.
        var player_settings = {example_option: true, width: "auto", height: "auto", techOrder: ["html5", "flash"]};
        var player = videojs('video-silje-mae', player_settings);
        $scope.$on('$destroy', function () {
            player.dispose();
        });
    }]);

PhotoApp.controller('PhotoCtrl', ['$scope', '$timeout', '$http', '$routeParams', '_', 'menus', 'Photos',
    function ($scope, $timeout, $http, $routeParams, _, menus, Photos) {
        $scope.layout = _.isUndefined($routeParams.layout) ? 'tile' : $routeParams.layout;
        $scope.menus = menus.data;
        $scope.photos = [];
        //Make breacrumb.
        $scope.path = _.isUndefined($routeParams.path) ? '' : $routeParams.path;
        $scope.breadcrumb = function (string) {
            return string
                    //replace the begining
                    .replace(/^\//, '')
                    .replace('/', ' - ');
        };
        //Look for photos path.
        var path = _.isUndefined($routeParams.path) ? '/api/photos' : '/api/photos/' + $routeParams.path;
        //Get Photos.
        $scope.loading = true;
        $scope.dataLoaded = false;
        $scope.total = 0;
        //Timeout Loading.
        $timeout(function () {
            $http.get(path, {cache: true})
                    .success(function (data) {
                        $scope.loading = false;
                        $scope.photos = data;
                        $scope.dataLoaded = true;
                        $scope.total = _.size(data);
                    });
        }, 1000);
        //Image urls.
        $scope.image = {
          base: 'https://s3.amazonaws.com/silje-mae/',
          thumbnail: function (file_name) {
              return this.base + 'thumbnails/' + file_name
          },
          full: function (file_name) {
              return this.base + 'full/' + file_name
          }  
        };
        //Links.
        $scope.link = function (path) {
            return 'photos/' + path + '?layout=' + $scope.layout;
        };
    }]);