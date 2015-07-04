//Photo Switcher.
//@TODO - need to make this use the attributes image-style to adjust style.
angular.module('MediaApp.directives')
        .directive('photos', function () {
            return {
                restrict: 'E',
                replace: true,
                templateUrl: '/partials/common/photos.html'
            };
        });