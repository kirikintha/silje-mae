//Photo Layout.
angular.module('MediaApp.directives')
    .directive('pager', ['$location', '$routeParams', 'qs', '_', function($location, $routeParams, qs, _) {
        return {
            restrict: 'E',
            replace: true,
            templateUrl: function(elem, attr) {
                return '/partials/common/pager.html';
            },
            controller: function($scope) {
                $scope.$watch('pager', function(pager) {
                    var path = $location.path();
                    var total = 0,
                        limit = 10,
                        current = 1;
                    pager = pager || {
                        total: 0
                    };
                    if (pager.total > 0) {
                        total = pager.total || total;
                        limit = pager.limit || limit;
                        current = pager.current || current;
                        $scope.totalPages = Math.ceil(total / limit);
                        //Create pages.
                        var pages = [];
                        for (var i = 1; i <= $scope.totalPages; i++) {
                            //Get our parameters.
                            var qryString = {
                                layout: $routeParams.layout || $scope.layout,
                                page: i
                            };
                            if (!_.isUndefined($scope.mediaType)) {
                                qryString.mediaType = $scope.mediaType;
                            }
                            pages.push({
                                url: path + qs.make(qryString),
                                name: i,
                                current: current
                            });
                        }
                        $scope.pages = pages;
                        if (!_.isEmpty(pages)) {
                            //Set previous and next
                            if ($scope.pager.current > 1) {
                                var previous = $scope.pager.current - 2;
                                $scope.pager.previous = $scope.pages[previous]['url'];
                            }
                            if ($scope.pager.current < $scope.totalPages) {
                                $scope.pager.next = $scope.pages[$scope.pager.current]['url'];
                            }
                        }
                    }
                });
            }
        };
    }]);