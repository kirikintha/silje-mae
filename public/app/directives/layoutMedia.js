//Photo Layout.
angular.module('MediaApp.directives')
    .directive('layoutMedia', ['$timeout', function($timeout) {
        return {
            restrict: 'E',
            replace: true,
            templateUrl: function(elem, attr) {
                return '/partials/media/layout.' + attr.type + '.html';
            },
            controller: function($scope) {
                //Layout Specific Changes
                if ($scope.layout === 'carousel') {
                    $scope.onBeforeSlideChange = function() {
                        console.debug('slide change');
                    };
                }
            }
        };
    }]);
