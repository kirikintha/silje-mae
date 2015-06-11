//Menus for Photo.
angular.module('MediaApp.directives')
        .directive('menuMedia', function () {
            return {
                restrict: 'E',
                replace: true,
                templateUrl: '/partials/menus/menu-media.html'
            };
        });