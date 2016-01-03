/**
 * Main Controller
 * @param {type} $scope
 * @param {type} $http
 * @param {type} $route
 * @param {type} $routeParams
 * @param {type} $location
 * @param {type} _
 * @returns {undefined}
 */
'use strict';

angular.module('MediaApp.controllers')
    .controller('MainCtrl', ['$scope', '$http', '$route', '$routeParams', '$location', '_',
        function($scope, $http, $route, $routeParams, $location, _) {
            //Animate a view, if we are on the home page.
            //@TODO - would love to be able to make this a param on a page.
            $scope.viewAnimate = function() {
                var path = $location.path();
                if (path === '/home') {
                    return 'view-animate';
                }
                return 'view-no-animate';
            };
            //Look for active menu.
            $scope.checkNavActive = function(modifier) {
                var path = $location.path();
                var pattern = '^\/media\/' + modifier;
                var regex = new RegExp(pattern, 'ig');
                return (regex.test(path) === true) ? 'active' : '';
            };
            //Scope Items.
            $scope.menus = [];
            $http.get('/api/menus', {
                    cache: true
                })
                .success(function(data) {
                    $scope.menus = data;
                });
        }
    ]);
