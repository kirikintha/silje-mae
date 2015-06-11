/**
 * Detect a device type.
 * @param {type} param1
 * @param {type} param2
 */

'use strict';

angular.module('MediaApp.services')
        .service('Detect', ['$http',
            function ($http) {
                return {
                    // get all the comments
                    fetch: function () {
                        return $http.get('/api/detect', {cache: false});
                    }
                };
            }]);