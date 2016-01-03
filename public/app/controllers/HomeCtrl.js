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
            var threshold = 10;
            var added = [];
            var container = angular.element('.home');
            var target = angular.element('<section class="stage"><figure class="ball bubble"></figure></section>');
            //Interval for adding.
            $interval(function() {
                if (_.size(added) <= threshold) {
                    //Rnadomly place.
                    var x = _.random(10, 100);
                    var y = Math.round(_.random(0, 100));
                    var z = Math.round(_.random(0, 5));
                    var speed = Math.round(_.random(2, 7));
                    var bubble = target.clone();
                    var style = {
                        width: x + 'px',
                        height: x + 'px',
                        left: y + '%',
                        '-webkit-animation-delay': z + 's',
                        'animation-delay': z + 's',
                        '-webkit-animation-duration': speed + 's',
                        'animation-duration': speed + 's'
                    };
                    bubble.css(style);
                    container.append(bubble);
                    added.push(bubble);
                }
                //Pull a random item off the stack.
                if (_.size(added) > threshold) {
                    var targets = _.sample(added, 3);
                    _.each(targets, function(target) {
                        target.remove();
                    });
                }
            }, 1000);
        }
    }]);
