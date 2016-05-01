//Control Buttons for layout.
angular.module('MediaApp.directives')
    .directive('layoutControls', function() {
        return {
            restrict: 'E',
            replace: true,
            templateUrl: '/partials/common/layout-controls.html'
        };
    });
