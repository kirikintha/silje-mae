//Menus for Photo.
angular.module('PhotoApp.directives')
        .directive('menuPhotos', function () {
            return {
                restrict: 'E',
                replace: true,
                templateUrl: '/partials/menus/menu-photos.html'
            };
        });