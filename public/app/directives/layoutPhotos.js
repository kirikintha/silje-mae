//Photo Layout.
angular.module('PhotoApp.directives')
        .directive('layoutPhotos', function () {
            return {
                restrict: 'E',
                replace: true,
                templateUrl: function (elem, attr) {
                    return '/partials/photos/layout.' + attr.type + '.html';
                }
            };
        });
