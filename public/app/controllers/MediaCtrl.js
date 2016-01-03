angular.module('MediaApp.controllers')
    .controller('MediaCtrl', ['$rootScope', '$scope', '$http', '$routeParams', '$animate', '$timeout', '_', 'detect', '$filter',
        function($rootScope, $scope, $http, $routeParams, $animate, $timeout, _, detect, $filter) {
            $scope.limit = 50;
            $scope.current = _.isUndefined($routeParams.page) ? 1 : parseInt($routeParams.page);
            $scope.layout = _.isUndefined($routeParams.layout) ? 'tile' : $routeParams.layout;
            //Make breacrumb.
            $scope.path = _.isUndefined($routeParams.path) ? '' : $routeParams.path;
            $scope.media = [];
            $scope.mediaType = _.isUndefined($routeParams.mediaType) ? null : $routeParams.mediaType;
            $scope.detect = detect.data;
            //Look for media path.
            var path = _.isUndefined($routeParams.path) ? '/api/media' : '/api/media/' + $routeParams.path;
            //Get Photos.
            $rootScope.loading = true;
            $scope.dataLoaded = false;
            $scope.total = 0;
            //Load Photos. Delay 1 sec.
            $timeout(function() {
                $http.get(path, {
                        cache: true
                    })
                    .success(function(data) {
                        //Filter the data, via the media filter.
                        data = $filter('mediaFilter')(data, $scope.mediaType);
                        $scope.total = _.size(data);
                        var offset = ($scope.current - 1) * $scope.limit;
                        var end = $scope.current * $scope.limit;
                        //@TODO - paging breaks without the filter here.
                        $scope.media = _.slice(data, offset, end);
                        $scope.dataLoaded = true;
                        $rootScope.loading = false;
                        $scope.pager = {
                            total: $scope.total,
                            current: $scope.current,
                            limit: $scope.limit
                        };
                    });
            }, 1000);
        }
    ])
    .filter('mediaFilter', ['_', function(_) {
        return function(media, mediaType) {
            if (!_.isNull(mediaType)) {
                return _.where(media, {
                    type: mediaType
                });
            }
            return media;
        }
    }]);
