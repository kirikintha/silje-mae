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
                //If our layout is carousel, then attach the carousel before change event.
                if ($scope.layout === 'carousel') {
                    $timeout(function() {
                        angular.element('.slider-nav, .slider-for')
                            .on('beforeChange', function() {
                                console.debug('I am before change.');
                            });
                    }, 0);
                }
            }
        };
    }]);
