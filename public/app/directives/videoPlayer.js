angular.module('MediaApp.directives')
        .directive('videoPlayer', ['_', '$timeout', function (_, $timeout) {
                var videoPlayers = [];
                var carousel = angular.element('.ng-slick');
                return {
                    restrict: 'EA',
                    replace: true,
                    templateUrl: '/partials/common/video-player.html',
                    scope: {
                        videoSettings: "&videoSettings"
                    },
                    link: function (scope, element, attr) {
                        var video_settings = scope.videoSettings();
                        if (!_.isEmpty(video_settings)) {
                            scope.id = video_settings.id;
                            scope.poster = video_settings.poster;
                            scope.mp4 = video_settings.mp4;
                            scope.flv = video_settings.flv;
                            //Gather the settings.
                            var player_settings = {
                                example_option: true,
                                width: "auto",
                                height: "auto",
                                techOrder: ["html5", "flash"]
                            };
                            $timeout(function () {
                                var player = videojs(video_settings.id, player_settings);
                                videoPlayers.push(player);
                            }, 0);
                        }
                    },
                    controller: function ($scope) {
                        //Dispose of players when destroying the view
                        $scope.$on('$destroy', function () {
                            disposeVideoPlayers();
                        })
                        //Look for the carousel, and apply pause to videos when they
                        // change slides.
                        if (!_.isEmpty(carousel)) {
                            console.debug('Carousel Found');
                        }
                        //Privately destroy video players
                        function disposeVideoPlayers() {
                            _.each(videoPlayers, function (player) {
                                player.dispose();
                            });
                            videoPlayers = [];
                        }
                    }
                };
            }]);