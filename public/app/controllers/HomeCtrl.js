/**
 * Home Controller.
 * @param {type} $scope
 * @param {type} $routeParams
 * @param {type} detect
 * @returns {undefined}
 */

'use strict';

angular.module('MediaApp.controllers')
    .controller('HomeCtrl', ['$scope', '$routeParams', 'detect', '$timeout', function($scope, $routeParams, detect, $timeout) {
        //Get the device we are using, so we can detect what needs to be shown.
        $scope.detect = detect.data;
        //Player Source.
        $scope.videoSettings = {
            id: 'video-home',
            poster: 'https://s3.amazonaws.com/silje-mae/posters/fish-tank.jpg',
            mp4: 'https://s3.amazonaws.com/silje-mae/videos/fish-tank.mp4',
            flv: 'https://s3.amazonaws.com/silje-mae/videos/fish-tank.flv',
            classes: 'video-home',
            autoplay: true,
            loop: true
        };

        //Delay home page animation until page has loaded
        $timeout(function() {
            var dolphin = angular.element('.dolphin');
            dolphin.addClass('in');
            var shark = angular.element('.shark');
            shark.addClass('in');
            var babelfish = angular.element('.babelfish');
            babelfish.addClass('in');
            var bluefish = angular.element('.bluefish');
            bluefish.addClass('in');
            var fish = angular.element('.fish');
            fish.addClass('in');
            var jellyfish = angular.element('.jelly-fish');
            jellyfish.addClass('in');
        }, 600);
    }]);
