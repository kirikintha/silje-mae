//Loading directive.
angular.module('MediaApp.directives')
        .directive('loader', ['$rootScope', function ($rootScope) {
                return {
                    restrict: 'A',
                    link: function (scope, element, attr) {
                        $rootScope.$watch('loading', function (val) {
                            if (val === true) {
                                element.addClass('loading');
                            } else {
                                element.removeClass('loading');
                            }
                        });
                    }
                };
            }]);