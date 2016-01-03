//Photo Layout.
angular.module('MediaApp.directives')
    .directive('navLink', ['$location', '$routeParams', 'qs', '_', function($location, $routeParams, qs, _) {
        return {
            restrict: 'E',
            replace: true,
            scope: {
                path: '=',
                name: '='
            },
            templateUrl: function(elem, attr) {
                return '/partials/common/link.html';
            },
            link: function(scope, elem, attr) {
                scope.layout = scope.$parent.layout;
                scope.mediaType = scope.$parent.mediaType;
            },
            controller: function($scope) {
                $scope.$watch(function() {
                    return $location.search()
                }, function(params) {
                    //Set layout.
                    $scope.layout = _.isUndefined(params.layout) ? 'tile' : params.layout;
                    $scope.mediaType = _.isUndefined(params.mediaType) ? null : params.mediaType;
                });

            }
        };
    }]);
