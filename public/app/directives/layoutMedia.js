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
                //Layout Specific Changes
                if ($scope.layout === 'carousel') {
                    //I could not get this to work any other way than
                    // accessing jQuery directly. Weird.
                    $(document)
                        .on('beforeChange', '.ng-slick', function() {
                            //Broadcast video pause event.
                            $scope.broadcast('videoPlayerPauseAll');
                        });
                }

            }
        };
    }]);
