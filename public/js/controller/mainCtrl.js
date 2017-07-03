angular.module("todo").controller("mainCtrl", function ($scope, mainAPI, $rootScope, $location, $http) {

    $scope.$on('$viewContentLoaded', function () {
        $http.get("/login").then(function (response) {
            if (response.data.id) {
                $rootScope.authuser = response.data;
                mainAPI.getlista($rootScope.authuser.id).then(function (response) {
                    $rootScope.list = response.data;
                }, function (response) {
                    notifyError(response);
                });
            } else {
                $rootScope.authuser = null;
            }
        }, function (response) {
            notifyError(response);
        });
    });

    $scope.addlista = function (lst) {
        mainAPI.adiciona(lst).then(function (response) {
            delete $scope.lst;
            $rootScope.list.push(response.data);
            notifyOk("Lista adicionada.");
        }, function (response) {
            notifyError(response);
        });
    }


    $scope.createUser = function (user) {
        mainAPI.registrar(user).then(function (response) {
            $rootScope.authuser = response.data;
            $location.path('/');
            notifyOk("usuario criado.");
        }, function (response) {
            notifyError(response);
        });
    }

    $scope.doLogin = function (user) {
        mainAPI.login(user).then(function (response) {
            $rootScope.authuser = response.data;
            $location.path('/');
            notifyOk("Logado com sucesso.");
        }, function (response) {
            notifyError(response);
        });
    }
});


