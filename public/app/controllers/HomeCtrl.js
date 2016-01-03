/**
 * Home Controller.
 * @param {type} $scope
 * @param {type} $routeParams
 * @param {type} detect
 * @returns {undefined}
 */

'use strict';

angular.module('MediaApp.controllers')
    .controller('HomeCtrl', ['$scope', '$routeParams', 'detect', '$timeout', '$interval', '_', function($scope, $routeParams, detect, $timeout, $interval, _) {
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
            //Enable Elements.
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
            //Start Random Bubbles.
            bubbles();
        }, 600);

        function bubbles() {
            var threshold = 12;
            var container = angular.element('.home');
            var target = angular.element('<section class="stage"><figure class="ball bubble"></figure></section>');
            //Interval for adding.
            $interval(function() {
                var current = angular.element('.stage');
                if (_.size(current) <= threshold) {
                    //Randomly place.
                    var x = _.random(10, 170);
                    var left = Math.round(_.random(0, 100));
                    var delay = Math.round(_.random(0, 5));
                    var speed = Math.round(_.random(3, 7));
                    var bubble = target.clone();
                    var z = Math.round(_.random(1020, 1040));
                    var style = {
                        width: x + 'px',
                        height: x + 'px',
                        left: left + '%',
                        zIndex: z,
                        '-webkit-animation-delay': delay + 's',
                        'animation-delay': delay + 's',
                        '-webkit-animation-duration': speed + 's',
                        'animation-duration': speed + 's',
                    };
                    bubble.css(style);
                    container.append(bubble);
                } else {
                    var elements = _.sample(current, 3);
                    _.each(elements, function(element) {
                        $timeout(function() {
                            element.remove();
                        }, 100);
                    });
                }
            }, 1000);
        }
    }]);
