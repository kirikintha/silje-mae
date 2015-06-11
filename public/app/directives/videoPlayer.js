angular.module('MediaApp.directives')
        .directive('videoPlayer', ['_', '$timeout', function (_, $timeout) {
                var videoPlayers = [];
                return {
                    restrict: 'EA',
                    replace: true,
                    templateUrl: '/partials/common/video-player.html',
                    scope: {
                        videoSettings: "&videoSettings"
                    },
                    link: function (scope, element, attr) {
                        var video_settings = scope.videoSettings();
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
                    },
                    controller: function ($scope) {
                        $scope.$on('$destroy', function () {
                            console.debug('Destroying Players', videoPlayers);
                            _.each(videoPlayers, function (player) {
                                player.dispose();
                            });
                        });
                    }
                };
            }]);