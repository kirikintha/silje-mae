//Lightbox.
angular.module('MediaApp.directives')
    .directive('lightbox', ['$animate', '$document', '$timeout', 'SYSTEM', '_', function($animate, $document, $timeout, SYSTEM, _) {
        return {
            restrict: 'E',
            replace: true,
            templateUrl: '/partials/common/lightbox.html',
            link: function(scope, element, attr) {
                //Key bindings.
                $document.bind('keyup', function(e) {
                    //Look for if the lightbox is open.
                    if (scope.lightbox.opened === true) {
                        scope.$apply(function() {
                            // console.log('LIGHTBOX KEYPRESS', e.which);
                            switch (e.which) {
                                case 27:
                                    //ESC.
                                    scope.lightbox.close();
                                    break;
                                case 37:
                                    //Previous.
                                    scope.lightbox.previous();
                                    break;
                                case 39:
                                    //Next.
                                    scope.lightbox.next();
                                    break;
                            }
                        });
                    }
                });
                //Close lightbox.
                element.on('click', function(e) {
                    var target = e.target || e.currentTarget;
                    var el = angular.element(target);
                    if (el.prop('id') === 'lightbox') {
                        scope.lightbox.close();
                    }
                });
            },
            controller: function($scope) {
                //Destroy timer.
                $scope.$on('$destroy', function() {
                    $timeout.cancel($scope.lightbox.timer);
                    $scope.$broadcast('videoPlayerDisposeAll');
                });
                //@TODO - this should probably be in the link function,
                // proper separation of concerns.
                angular.extend($scope, {
                    //Image options for lightbox.
                    //@TODO - move me into my own directive.
                    image: {
                        //@TODO - Convert static elements into constants that can be added in the main app.
                        base: SYSTEM.AWS_BASE_URL,
                        thumbnail: function(file_name) {
                            return this.image(file_name, 'thumbnails');
                        },
                        full: function(file_name) {
                            return this.image(file_name, 'full');
                        },
                        image: function(file_name, type) {
                            if (file_name !== undefined && type !== undefined) {
                                return this.base + type + '/' + file_name;
                            }
                            return '';
                        }
                    },
                    //Lightbox methods.
                    lightbox: {
                        container: {},
                        opened: false,
                        current: null,
                        timer: {},
                        item: {},
                        open: function(item, current) {
                            if (_.isObject(item)) {
                                //Get the container.
                                $scope.lightbox.container = angular.element('#lightbox');
                                //Set current index.
                                $scope.lightbox.current = angular.copy(current);
                                //Open me up.
                                $animate.removeClass($scope.lightbox.container, 'hidden').then(function() {
                                    $animate.addClass($scope.lightbox.container, 'in').then(function() {
                                        //Set the item.
                                        $scope.lightbox.item = angular.copy(item);
                                        $scope.lightbox.opened = true;
                                    });
                                });
                            }
                        },
                        close: function() {
                            $timeout(function() {
                                $animate.removeClass($scope.lightbox.container, 'in').then(function() {
                                    $animate.addClass($scope.lightbox.container, 'hidden').then(function() {
                                        $scope.lightbox.item = {};
                                        $scope.lightbox.opened = false;
                                    });
                                });
                            });
                        },
                        previous: function() {
                            if ($scope.lightbox.current > 0) {
                                $scope.lightbox.set();
                                $scope.lightbox.current--;
                            }
                        },
                        next: function() {
                            var next = $scope.lightbox.current + 1;
                            if (next < _.size($scope.media)) {
                                $scope.lightbox.set();
                                $scope.lightbox.current++;
                            }
                        },
                        set: function() {
                            $scope.lightbox.item = {};
                            $timeout.cancel($scope.lightbox.timer);
                            $scope.lightbox.timer = $timeout(function() {
                                if (!_.isEmpty($scope.media)) {
                                    var item = $scope.media[$scope.lightbox.current];
                                    // console.log(item);
                                    //Set the item.
                                    if (!_.isUndefined(item)) {
                                        $scope.lightbox.item = angular.copy(item);
                                    }
                                }
                            }, 300);
                        }
                    }
                });
            }
        };
    }]);
