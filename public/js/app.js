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

//Detect
PhotoApp.service('Detect', ['$http',
    function ($http) {
        return {
            // get all the comments
            fetch: function () {
                return $http.get('/api/detect', {cache: false});
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
                },
                detect: function (Detect) {
                    return Detect.fetch();
                }
            }
        };
        //Routes.
        $routeProvider
                .when('/home', {
                    templateUrl: '/views/home.html',
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

//Ctrls.

PhotoApp.controller('MainCtrl', ['$scope', '$route', '$routeParams', '$location',
    function ($scope, $route, $routeParams, $location) {
        //Animate a view, if we are on the home page.
        //@TODO - would love to be able to make this a param on a page.
        this.viewAnimate = function () {
            var path = $location.path();
            if (path === '/home') {
                return 'view-animate';
            }
            return 'view-no-animate';
        };
        //Look for active menu.
        this.checkNavActive = function (modifier) {
            var path = $location.path();
            var pattern = '^\/' + modifier;
            var regex = new RegExp(pattern, 'ig');
            return (regex.test(path) === true) ? 'active' : '';
        };
    }]);

PhotoApp.controller('HomeCtrl', ['$scope', '$routeParams', 'detect',
    function ($scope, $routeParams, detect) {
        $scope.detect = detect.data;
        //Start the video.
        var player_settings = {example_option: true, width: "auto", height: "auto", techOrder: ["html5", "flash"]};
        var player = videojs('video-silje-mae', player_settings);
        $scope.$on('$destroy', function () {
            player.dispose();
        });
    }]);

//@TODO - clean me up.
PhotoApp.controller('PhotoCtrl', ['$scope', '$http', '$routeParams', '_', 'menus', 'detect',
    function ($scope, $http, $routeParams, _, menus, detect) {
        //Reset vars
        $scope.menus = menus.data;
        $scope.photos = [];
        $scope.detect = detect.data;
        //Set layout.
        $scope.layout = _.isUndefined($routeParams.layout) ? 'tile' : $routeParams.layout;
        //Make breacrumb.
        $scope.path = _.isUndefined($routeParams.path) ? '' : $routeParams.path;
        //Look for photos path.
        var path = _.isUndefined($routeParams.path) ? '/api/photos' : '/api/photos/' + $routeParams.path;
        //Get Photos.
        $scope.loading = true;
        $scope.dataLoaded = false;
        $scope.total = 0;
        //Load Photos
        $http.get(path, {cache: true})
                .success(function (data) {
                    $scope.total = _.size(data);
                    //Look at results to define mobile scope.
                    if ($scope.detect.isMobile === true && $scope.total > 1) {
                        //Go to carousel, for anything other than one photo result.
                        $scope.layout = 'carousel';
                    } else {
                        $scope.layout = 'tile';
                    }
                    $scope.loading = false;
                    $scope.photos = data;
                    $scope.dataLoaded = true;
                });
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
        //Breacrumbs.
        $scope.breadcrumb = function (string) {
            return string
                    //replace the begining
                    .replace(/^\//, '')
                    .replace('/', ' - ');
        };
    }]);