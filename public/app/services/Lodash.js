//Include lodash as factory, with underscore.
angular.module('MediaApp.services')
        .factory('_', ['lodash',
            function (lodash) {
                return lodash;
            }]);
