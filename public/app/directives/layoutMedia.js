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
                console.debug($(document));
                //Layout Specific Changes
            // $(document)
            //     .on('beforeChange', '.ng-slick', function() {
            //         console.debug('before change');
            //     })
            //     .on('afterChange', '.ng-slick', function() {
            //         console.debug('after change');
            //     });

            }
        };
    }]);
