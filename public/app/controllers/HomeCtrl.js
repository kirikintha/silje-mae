/**
 * Home Controller.
 * @param {type} $scope
 * @param {type} $routeParams
 * @param {type} detect
 * @returns {undefined}
 */

'use strict';

angular.module('MediaApp.controllers')
        .controller('HomeCtrl', ['$scope', '$routeParams', 'detect', function ($scope, $routeParams, detect) {
                //Get the device we are using, so we can detect what needs to be shown.
                $scope.detect = detect.data;
                //Player Source.
                $scope.videoSettings = {
                    id: 'video-silje-mae-laughing',
                    poster: 'https://s3.amazonaws.com/silje-mae/posters/silje-mae-laughing.jpg',
                    mp4: 'https://s3.amazonaws.com/silje-mae/videos/silje-mae-laughing.mp4',
                    flv: 'https://s3.amazonaws.com/silje-mae/videos/silje-mae-laughing.flv'
                };
            }]);