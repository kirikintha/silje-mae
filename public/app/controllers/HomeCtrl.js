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

        //Player element.
        $scope.player = {
            threshold: 0,
            score: 0,
            timer: {},
            opened: false,
            active: false,
            elements: [
                //Bubble.
                '<figure class="ball bubble"></figure>',
                //Unicorn.
                '<figure class="unicorn"></figure>',
                //Walrus
                '<figure class="walrus"></figure>',
                //Yak
                '<figure class="yak"></figure>',
                //Lion
                '<figure class="lion"></figure>'
            ],
            current_level: 0,
            level_message: 'Paused',
            levels: [
                {
                    message: 'Level 1!',
                    delay: [1, 5],
                    speed: [4, 10]
                },
                {
                    message: 'Level 2!',
                    delay: [1, 4],
                    speed: [3, 8]
                },
                {
                    message: 'Level 3!',
                    delay: [1, 4],
                    speed: [2, 7]
                },
                {
                    message: 'Level 4!',
                    delay: [1, 4],
                    speed: [1, 5]
                }
            ],
            init: function () {
                $scope.player.level_message = $scope.player.levels[$scope.player.current_level].message;
                $('.player-start').on('click', function () {
                    startGame($(this));
                });
            },
            finish: function () {
                finishGame($('.player-start'));
            }
        };

        //Delay home page animation until page has loaded
        $timeout(function() {
            //Initialize Player.
            $scope.player.init();
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
            var star = angular.element('.star');
            star.addClass('in');
            var player_start = angular.element('.player-start');
            player_start.addClass('in').css({opacity: 0.9});
            //Start Random Bubbles.
            bubbles();
        }, 500);

        /**
         * Create elements.
         * @return {[type]} [description]
         */
        function bubbles() {
            var threshold = 12;
            var container = angular.element('.home');
            //Interval for adding.
            $interval(function() {
                var current = angular.element('.stage:not(.marked)');
                if (_.size(current) <= threshold) {
                    //Get current level.
                    var current_level = $scope.player.levels[$scope.player.current_level];
                    //Create game piece.
                    var gamePiece = getElement();
                    var target = angular.element(gamePiece);
                    //Randomly place.
                    var x = _.random(15, 175);
                    var left = Math.round(_.random(1, 99));
                    var delay = Math.round(_.random(current_level.delay[0], current_level.delay[1]));
                    var speed = Math.round(_.random(current_level.speed[0], current_level.speed[1]));
                    var bubble = angular.extend(target);
                    var z = Math.round(_.random(1020, 1040));
                    //Container style.
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
                    $('figure', bubble).css({width: x, height: x});
                    //If we hover over, then we can score the item and pop it.
                    bubble.on('mouseenter', function(e) {
                        var target = e.target || e.currentTarget;
                        if ($scope.player.active === true) {
                            bubblePop(target, true);
                        }
                    });
                    bubble.css(style);
                    container.append(bubble);
                } else {
                    var elements = _.sampleSize(current, 4);
                    _.each(elements, function (el) {
                        //If we are removing items, then we don't score them.
                        bubblePop(el, false);
                    });
                }
            }, 1500);
        }

        /**
         * Pop the bubble.
         * @param  {[type]} el [description]
         * @return {[type]}    [description]
         */
        function bubblePop(el, can_score = false) {
            //Make sure we are acting on the section tag.
            var item = angular.element(el);
            if (!item.is('figure')) {
                item = $('figure', item);
            }
            var container = item.closest('section');
            if (!item.hasClass('marked') && can_score === true) {
                //Set it as marked.
                item.addClass('marked');
                //Score the item.
                score(item);
            }
            item.css({
                '-webkit-animation': 'bubble-pop 1.4s ease-out infinite',
                'animation': 'bubble-pop 1.4s ease-out infinite',
                '-webkit-animation-delay': '0.1s',
                'animation-delay': '0.1s',
            });
            $timeout(function(item) {
                container.remove();
            }, 300, false, item);
        }

        /**
         * Set the players score, and update.
         * @return {[type]} [description]
         */
        function score(item) {
            $timeout(function() {
                //Open
                var target = angular.element('.player-score');
                if ($scope.player.opened === false) {
                    $scope.player.opened = true;
                    target.addClass('bounceInUp');
                    target.removeClass('bounceOutDown');
                    target.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                        target.addClass('opened');
                        target.removeClass('bounce');
                    });
                } else {
                    //We already have the target opened, just make it bounce.
                    target.removeClass('bounceInUp');
                    target.addClass('bounce');
                    target.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                        target.addClass('opened');
                        target.removeClass('bounce');
                    });
                }
                //Up the players score.
                var grade = 1;
                if (item.width() <= 25) {
                    grade = 20;
                } else if (item.width() > 25 && item.width() <= 50) {
                    grade = 15;
                } else if (item.width() > 50 && item.width() <= 75) {
                    grade = 10;
                } else if (item.width() > 75 && item.width() <= 100) {
                    grade = 5;
                }

                //Grade the score.
                $scope.player.score += grade;

                //Set a reward.
                reward();

                //Set timeout.
                $timeout.cancel($scope.player.timer);
                $scope.player.timer = $timeout(function() {
                    $scope.player.opened = false;
                    //Close the element. 
                    target.addClass('bounceOutDown');
                    target.removeClass('bounceInUp');
                    target.removeClass('bounce');
                    target.removeClass('opened');
                }, 10000);
            }, 0);
        }

        /**
         * Make a cool reward.
         * @return {[type]} [description]
         */
        function reward() {
            //Look at current score, change the level and give a fun reward.
            var current_level = $scope.player.current_level;
            if ($scope.player.score >= 250 && $scope.player.score < 500) {
                $scope.player.current_level = 1;
            } else if ($scope.player.score >= 500 && $scope.player.score < 750) {
                $scope.player.current_level = 2;
            } else if ($scope.player.score >= 750 && $scope.player.score < 1000) {
                $scope.player.current_level = 3;
            }
            //Show the level up overlay, if we change ot a higher level.
            if (current_level < $scope.player.current_level) {
                $scope.player.level_message = $scope.player.levels[$scope.player.current_level].message;
                showGameLevel();
            }
        }

        /**
         * Show the game level overlay, and it will pause for a few seconds the game.
         * @return {[type]} [description]
         */
        function showGameLevel(reset = false) {
            var container = $('.game-level');
            $timeout(function () {
                container.removeClass('hide')
                    .fadeIn('slow');
            });
            $timeout(function () {
                container.fadeOut('fast', function () {
                    container.addClass('hide');
                    if (reset = true) {
                        $scope.player.current_level = 0;
                        $scope.player.score = 0;
                    }
                });
            }, 2500);
        }

        /**
         * Start the game!
         * @return {[type]} [description]
         */
        function startGame(container) {
            if ($scope.player.active === true) {
                container.html('Start');
                $scope.player.active = false;
                $scope.player.level_message = 'Paused';
            } else {
                container.html('Pause');
                $scope.player.level_message = $scope.player.levels[$scope.player.current_level].message;
                $scope.player.active = true;
            }
            showGameLevel();
            container.blur();
        }

        /**
         * When you finish the game, tell the user and finish!
         * @param  {[type]} container [description]
         * @return {[type]}           [description]
         */
        function finishGame(container) {
            container.html('Start');
            $scope.player.active = false;
            $scope.player.level_message = 'You Won!';
            showGameLevel();
        }

        /**
         * Get a sample of elements, and update the elements on the page.
         * @return {[type]} [description]
         */
        function getElement() {
            var modulus = 5;
            var item = '';
            //Modulus by X number.
            if ($scope.player.score % modulus === 1) {
                var updated = Math.round($scope.player.score / modulus);
                if (updated > $scope.player.threshold) {
                    $scope.player.threshold = updated;
                }
            }
            //Return elements.
            if ($scope.player.threshold === 0) {
                item = $scope.player.elements[0];
            } else {
                item = _.first(_.shuffle(_.sampleSize($scope.player.elements, $scope.player.threshold)));
            }
            return '<section class="stage">' + item + '</section>';
        }
    }]);
