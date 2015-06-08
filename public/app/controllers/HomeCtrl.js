/**
 * Home Controller.
 * @param {type} $scope
 * @param {type} $routeParams
 * @param {type} detect
 * @returns {undefined}
 */

'use strict';

angular.module('PhotoApp.controllers')
        .controller('HomeCtrl', ['$scope', '$routeParams', 'detect', function ($scope, $routeParams, detect) {
                //Get the device we are using, so we can detect what needs to be shown.
                $scope.detect = detect.data;
                //Start the video.
                var player_settings = {example_option: true, width: "auto", height: "auto", techOrder: ["html5", "flash"]};
                var player = videojs('video-silje-mae', player_settings);
                $scope.$on('$destroy', function () {
                    player.dispose();
                });
            }]);