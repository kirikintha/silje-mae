
//Lightbox.
angular.module('MediaApp.directives')
        .directive('lightbox', ['$animate', function ($animate) {
                return {
                    restrict: 'E',
                    replace: true,
                    templateUrl: '/partials/common/lightbox.html',
                    link: function (scope, element, attr) {
                        //Removal.
                        element.on('click', function () {
                            scope.$apply(function () {
                                $animate.removeClass(element, 'in').then(function () {
                                    var current = angular.element('#lightbox > img');
                                    $animate.leave(current);
                                    $animate.addClass(element, 'hidden');
                                });
                            });
                        });
                    },
                    controller: function ($scope) {
                        //Image urls.
                        $scope.image = {
                            base: 'https://s3.amazonaws.com/silje-mae/',
                            thumbnail: function (file_name) {
                                return this.image(file_name, 'thumbnails');
                            },
                            full: function (file_name) {
                                return this.image(file_name, 'full');
                            },
                            image: function (file_name, type) {
                                if (file_name !== undefined && type !== undefined) {
                                    //Convert videos to their poster thumbnail
                                    file_name = file_name.replace(/\.(mp4|mov)/i, '.jpg');
                                    return this.base + type + '/' + file_name;
                                }
                                return '';
                            }
                        };
                        $scope.lightbox = function (delta) {
                            if (delta !== undefined) {
                                //Trigger lightbox animation, to open.
                                var lightbox = angular.element('#lightbox');
                                var image = angular.element('<img src="' + delta + '" />');
                                $animate.enter(image, lightbox);
                                $animate.removeClass(lightbox, 'hidden').then(function () {
                                    $animate.addClass(lightbox, 'in');
                                });
                            }
                        };
                    }
                };
            }]);