angular.module('PhotoApp.controllers')
        .controller('PhotoCtrl', ['$rootScope', '$scope', '$http', '$routeParams', '$animate', '$timeout', '_', 'detect',
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