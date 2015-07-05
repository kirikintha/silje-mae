//Lightbox.
angular.module('MediaApp.directives')
        .directive('lightbox', ['$animate', '$document', function ($animate, $document) {
                return {
                    restrict: 'E',
                    replace: true,
                    templateUrl: '/partials/common/lightbox.html',
                    link: function (scope, element, attr) {
                        $document.bind('keydown', function (e) {
                            //Look for the escape key, and close if we are open.
                            if (e.which === 27 && scope.lightbox.opened === true) {
                                scope.lightbox.close();
                            }
                            //@TODO - Toggle next.
                        });
                    },
                    controller: function ($scope) {
                        //@TODO - this should probably be in the link function,
                        // proper separation of concerns.
                        angular.extend($scope, {
                            //Image options for lightbox.
                            //@TODO - move me into my own directive.
                            image: {
                                //@TODO - Convert static elements into constants that can be added in the main app.
                                base: 'https://s3.amazonaws.com/silje-mae/',
                                thumbnail: function (file_name) {
                                    return this.image(file_name, 'thumbnails');
                                },
                                full: function (file_name) {
                                    return this.image(file_name, 'full');
                                },
                                image: function (file_name, type) {
                                    if (file_name !== undefined && type !== undefined) {
                                        return this.base + type + '/' + file_name;
                                    }
                                    return '';
                                }
                            },
                            //Lightbox methods.
                            lightbox: {
                                open: function (delta) {
                                    if (delta !== undefined) {
                                        //Trigger lightbox animation, to open.
                                        var lightbox = angular.element('#lightbox');
                                        var image = angular.element('<img src="' + delta + '" />');
                                        $animate.enter(image, lightbox);
                                        $animate.removeClass(lightbox, 'hidden').then(function () {
                                            $animate.addClass(lightbox, 'in');
                                            $scope.lightbox.opened = true;
                                        });
                                    }
                                },
                                close: function () {
                                    //@TODO - more testing on how to make the element in one place.
                                    var lightbox = angular.element('#lightbox');
                                    $animate.removeClass(lightbox, 'in').then(function () {
                                        var current = angular.element('#lightbox > img');
                                        $animate.leave(current);
                                        $animate.addClass(lightbox, 'hidden').then(function () {
                                            $scope.lightbox.opened = false;
                                        });
                                    });
                                },
                                opened : false
                            }
                        });
                    }
                };
            }]);