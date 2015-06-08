//Control Buttons for layout.
angular.module('PhotoApp.directives')
        .directive('layoutControls', function () {
            return {
                restrict: 'E',
                replace: true,
                templateUrl: '/partials/common/layout-controls.html'
            };
        });