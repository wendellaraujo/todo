angular.module("todo").service("mainAPI", function ($http, config, $rootScope) {
    var _adiciona = function (lst) {
        return $http.post(config.baseUrl + "/adicionalista", lst);
    }

    var _getlista = function (id) {
        return $http.get(config.baseUrl + "/lista/" + id);
    }

    var _registrar = function (user) {

        return $http.post(config.baseUrl + "/newlogin", user);
    }
    var _login = function (user) {

        return $http.post(config.baseUrl + "/login", user);
    }

    var _dologout = function () {
        return $http.get(config.baseUrl + "/logout");
    }

    return {
        adiciona: _adiciona,
        getlista: _getlista,
        registrar: _registrar,
        dologout: _dologout,
        login: _login
    };
});