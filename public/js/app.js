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

//Query String Factory.
PhotoApp.factory('qs', ['lodash',
    function (lodash) {
        return {
            make: function (obj, prefix) {
                var str = [];
                for (var p in obj) {
                    var k = prefix ? prefix + "[" + p + "]" : p,
                            v = obj[p];
                    str.push(angular.isObject(v) ? qs(v, k) : (k) + "=" + encodeURIComponent(v));
                }
                return '?' + str.join("&");
            }
        }
    }]);

//Directives

//Loading directive.
PhotoApp.directive('loader', ['$rootScope', function ($rootScope) {
        return {
            restrict: 'A',
            link: function (scope, element, attr) {
                $rootScope.$watch('loading', function (val) {
                    if (val === true) {
                        element.addClass('loading');
                    } else {
                        element.removeClass('loading');
                    }
                });
            }
        };
    }]);

//Menus for Photo.
PhotoApp.directive('menuPhotos', function () {
    return {
        restrict: 'E',
        replace: true,
        templateUrl: '/views/menus/menu-photos.html'
    };
});

//Breadcrumbs.
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

//Control Buttons for layout.
PhotoApp.directive('layoutBtnGroup', function () {
    return {
        restrict: 'E',
        replace: true,
        templateUrl: '/views/common/layout-btngroup.html'
    };
});

//Photo Layout.
PhotoApp.directive('layoutPhotos', function () {
    return {
        restrict: 'E',
        replace: true,
        templateUrl: function (elem, attr) {
            return '/views/photos/layout.' + attr.type + '.html';
        }
    };
});

//Lightbox.
PhotoApp.directive('lightbox', ['$animate', function ($animate) {
        return {
            restrict: 'E',
            replace: true,
            templateUrl: '/views/common/lightbox.html',
            link: function (scope, element, attr) {
                //Removal.
                element.on('click', function () {
                    scope.$apply(function () {
                        $animate.removeClass(element, 'in').then(function () {
                            var current = angular.element('#lightbox > img');
                            $animate.leave(current);
                            $animate.addClass(element, 'hidden');
                        });
                    });
                });
            },
            controller: function ($scope) {
                //Image urls.
                $scope.image = {
                    base: 'https://s3.amazonaws.com/silje-mae/',
                    thumbnail: function (file_name) {
                        return this.image(file_name, 'thumbnails');
                    },
                    full: function (file_name) {
                        return this.image(file_name, 'full');
                    },
                    image: function (file_name, type) {
                        if (file_name !== undefined && type !== undefined) {
                            return this.base + type + '/' + file_name;
                        }
                        return '';
                    }
                };
                $scope.lightbox = function (delta) {
                    if (delta !== undefined) {
                        //Trigger lightbox animation, to open.
                        var lightbox = angular.element('#lightbox');
                        var image = angular.element('<img src="' + delta + '" />');
                        $animate.enter(image, lightbox);
                        $animate.removeClass(lightbox, 'hidden').then(function () {
                            $animate.addClass(lightbox, 'in');
                        });
                    }
                };
            }
        };
    }]);

//Photo Layout.
PhotoApp.directive('pager', ['$location', '$routeParams', 'qs', function ($location, $routeParams, qs) {
        return {
            restrict: 'E',
            replace: true,
            templateUrl: function (elem, attr) {
                return '/views/common/pager.html';
            },
            link: function (scope, element, attr) {
                scope.$watch('pager', function (pager) {
                    var path = $location.path();
                    var total = 0, limit = 10, current = 1;
                    pager = pager || {total: 0};
                    if (pager.total > 0) {
                        total = pager.total || total;
                        limit = pager.limit || limit;
                        current = pager.current || current;
                        scope.totalPages = Math.ceil(total / limit);
                        //Create pages.
                        var pages = [];
                        for (var i = 1; i <= scope.totalPages; i++) {
                            //Get our parameters.
                            var qryString = {
                                layout: $routeParams.layout || scope.layout,
                                page: i
                            };
                            pages.push({
                                url: path + qs.make(qryString),
                                name: i,
                                current: current
                            });
                        }
                        scope.pages = pages;
                    }
                });
            }
        };
    }]);

//Detect.
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


PhotoApp.controller('PhotoCtrl', ['$rootScope', '$scope', '$http', '$routeParams', '$animate', '$timeout', '_', 'detect',
    function ($rootScope, $scope, $http, $routeParams, $animate, $timeout, _, detect) {
        $scope.limit = 50;
        $scope.current = _.isUndefined($routeParams.page) ? 1 : parseInt($routeParams.page);
        $scope.layout = _.isUndefined($routeParams.layout) ? 'tile' : $routeParams.layout;
        //Make breacrumb.
        $scope.path = _.isUndefined($routeParams.path) ? '' : $routeParams.path;
        $scope.photos = [];
        $scope.detect = detect.data;
        //Look for photos path.
        var path = _.isUndefined($routeParams.path) ? '/api/photos' : '/api/photos/' + $routeParams.path;
        //Get Photos.
        $rootScope.loading = true;
        $scope.dataLoaded = false;
        $scope.total = 0;
        //Load Photos. Delay 1 sec.
        $timeout(function () {
            $http.get(path, {cache: true})
                    .success(function (data) {
                        //@TODO - put me back into the pager directive.
                        //All this now, can basically be a part of the pager mechanism.
                        $scope.total = _.size(data);
                        var offset = ($scope.current - 1) * $scope.limit;
                        var end = $scope.current * $scope.limit;
                        $scope.photos = _.slice(data, offset, end);
                        $scope.dataLoaded = true;
                        $rootScope.loading = false;
                        $scope.pager = {
                            total: $scope.total,
                            current: $scope.current,
                            limit: $scope.limit
                        };
                    });
        }, 1000);
    }]);