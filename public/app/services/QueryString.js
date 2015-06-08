//Query String Factory.
angular.module('PhotoApp.services').factory('qs', ['lodash',
    function (lodash) {
        return {
            make: function (obj, prefix) {
                var str = [];
                for (var p in obj) {
                    var k = prefix ? prefix + "[" + p + "]" : p,
                            v = obj[p];
                    str.push(angular.isObject(v) ? qs(v, k) : (k) + "=" + encodeURIComponent(v));
                }
                return '?' + str.join("&");
            }
        }
    }]);