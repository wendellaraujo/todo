angular.module("todo").service("taskAPI", function ($http, config, $rootScope) {

    var _adicionatarefa = function (tsk) {
        return $http.post(config.baseUrl + "/adicionatarefa", tsk);
    }

    var _remover = function (id) {
        return $http.delete(config.baseUrl + "/deletartarefa/" + id);
    }
    var _finalizar = function (id) {
        return $http.put(config.baseUrl + "/finalizartarefa/" + id);
    }
    var _gettarefa = function (idi) {
        return $http.get(config.baseUrl + "/tarefa/" + idi.id);
    }

    return {
        adicionatarefa: _adicionatarefa,
        finalizar: _finalizar,
        remover: _remover,
        gettarefa: _gettarefa
    };
});

angular.module("todo").service('login', function ($rootScope) {
    this.check = function () {
        if ($rootScope.authuser == null) {
            window.location.assign('/index.html');
        }
    }
});