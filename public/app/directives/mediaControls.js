//Control Buttons for layout.
angular.module('MediaApp.directives')
    .directive('mediaControls', function() {
        return {
            restrict: 'E',
            replace: true,
            templateUrl: '/partials/common/media-controls.html'
        };
    });
