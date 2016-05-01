angular.module('MediaApp.directives')
    .directive('videoPlayer', ['_', '$timeout', function(_, $timeout) {
        var videoPlayers = [];
        return {
            restrict: 'EA',
            replace: true,
            templateUrl: '/partials/common/video-player.html',
            scope: {
                videoSettings: "&videoSettings"
            },
            link: function(scope, element, attr) {
                var video_settings = scope.videoSettings();
                if (!_.isEmpty(video_settings)) {
                    scope.id = video_settings.id;
                    scope.poster = video_settings.poster;
                    scope.mp4 = video_settings.mp4;
                    scope.flv = video_settings.flv;
                    // scope.classes = _.isUndefined(video_settings.classes) ? '' : video_settings.classes;
                    //Gather the settings.
                    var player_settings = {
                        loop: _.isUndefined(video_settings.loop) ? false : true,
                        example_option: true,
                        width: "auto",
                        height: "auto",
                        techOrder: ["html5", "flash"]
                    };
                    $timeout(function() {
                        var player = videojs(video_settings.id, player_settings);
                        player.on('play', function(el) {
                            var id = this.id();
                            _.each(videoPlayers, function(player) {
                                if (!player.paused()) {
                                    //If the id is not this player, pause it.
                                    if (player.id() !== id) {
                                        player.pause();
                                    }
                                }
                            });
                        });
                        videoPlayers.push(player);
                        if (!_.isUndefined(video_settings.autoplay)) {
                            player.play();
                        }
                    }, 0);
                }
            },
            controller: function($scope) {
                //Dispose of players when destroying the view
                $scope.$on('$destroy', function() {
                    disposeAll();
                });
                $scope.$on('videoPlayerPauseAll', function() {
                    pauseAll();
                });
                $scope.$on('videoPlayerDisposeAll', function() {
                    disposeAll();
                });
                //Destroy all video players.
                function disposeAll() {
                    _.each(videoPlayers, function(player) {
                        player.dispose();
                    });
                    videoPlayers = [];
                }
                //Pause all video players.
                function pauseAll() {
                    _.each(videoPlayers, function(player) {
                        player.pause();
                    });
                }
            }
        };
    }]);
