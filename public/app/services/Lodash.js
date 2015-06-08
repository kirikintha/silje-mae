//Include lodash as factory, with underscore.
angular.module('PhotoApp.services')
        .factory('_', ['lodash',
            function (lodash) {
                return lodash;
            }]);
