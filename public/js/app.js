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
    };
});

PhotoApp.directive('menuPhotos', function () {
    return {
        restrict: 'E',
        replace: true,
        templateUrl: '/views/menus/menu-photos.html'
    };
});

PhotoApp.directive('breadcrumbs', ['$location', function ($location) {
        return {
            restrict: 'E',
            replace: true,
            templateUrl: '/views/common/breadcrumbs.html',
            link: function (scope, element, attr) {
                var path = $location.path().replace(/^\//, '');
                scope.breadcrumbs = path.split('/');
            }
        };
    }]);

PhotoApp.directive('layoutBtnGroup', function () {
    return {
        restrict: 'E',
        replace: true,
        templateUrl: '/views/common/layout-btngroup.html'
    };
});

PhotoApp.directive('layoutPhotos', function () {
    return {
        restrict: 'E',
        replace: true,
        templateUrl: function (elem, attr) {
            return '/views/photos/layout.' + attr.type + '.html';
        }
    };
});

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

//Route Configuration.
PhotoApp.config(['$routeProvider', '$locationProvider',
    function ($routeProvider, $locationProvider) {
        //Photo config.
        var photosConfig = {
            templateUrl: '/views/photos.html',
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

PhotoApp.controller('MainCtrl', ['$scope', '$http', '$route', '$routeParams', '$location', '_',
    function ($scope, $http, $route, $routeParams, $location, _) {
        var layout = $location.search().layout;
        //Set layout.
        $scope.layout = _.isUndefined(layout) ? 'tile' : layout;
        //Animate a view, if we are on the home page.
        //@TODO - would love to be able to make this a param on a page.
        $scope.viewAnimate = function () {
            var path = $location.path();
            if (path === '/home') {
                return 'view-animate';
            }
            return 'view-no-animate';
        };
        //Look for active menu.
        $scope.checkNavActive = function (modifier) {
            var path = $location.path();
            var pattern = '^\/' + modifier;
            var regex = new RegExp(pattern, 'ig');
            return (regex.test(path) === true) ? 'active' : '';
        };
        //Scope Items.
        $scope.menus = [];
        $http.get('/api/menus', {cache: true})
                .success(function (data) {
                    $scope.menus = data;
                });
        //Testing.
        $scope.link = function (path) {
            return 'photos/' + path + '?layout=' + $scope.layout;
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
PhotoApp.controller('PhotoCtrl', ['$scope', '$http', '$routeParams', '_', 'detect',
    function ($scope, $http, $routeParams, _, detect) {
        $scope.layout = _.isUndefined($routeParams.layout) ? 'tile' : $routeParams.layout;
        //Make breacrumb.
        $scope.path = _.isUndefined($routeParams.path) ? '' : $routeParams.path;
        $scope.photos = [];
        $scope.detect = detect.data;
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
                    $scope.photos = data;
                    $scope.dataLoaded = true;
                    $scope.loading = false;
                });
        //Image urls.
        $scope.image = {
            base: 'https://s3.amazonaws.com/silje-mae/',
            thumbnail: function (file_name) {
                return this.base + 'thumbnails/' + file_name;
            },
            full: function (file_name) {
                return this.base + 'full/' + file_name;
            }
        };
    }]);