//Breadcrumbs.
angular.module('MediaApp.directives')
        .directive('breadcrumbs', ['$location', function ($location) {
        return {
            restrict: 'E',
            replace: true,
            templateUrl: '/partials/common/breadcrumbs.html',
            link: function (scope, element, attr) {
                var path = $location.path().replace(/^\//, '');
                scope.breadcrumbs = path.split('/');
            }
        };
    }]);