//Photo Layout.
angular.module('MediaApp.directives')
        .directive('layoutMedia', function () {
            return {
                restrict: 'E',
                replace: true,
                templateUrl: function (elem, attr) {
                    return '/partials/media/layout.' + attr.type + '.html';
                }
            };
        });
