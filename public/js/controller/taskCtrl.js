angular.module("todo").controller("taskCtrl", function ($scope, $routeParams, taskAPI, task, login) {
    login.check();

    $scope.tarefa = task.data;

    var d = new Date();
    $scope.t = d.getFullYear() + "-" + d.getMonth() + "-" + d.getDate();

    $scope.addtarefa = function (tsk) {
        $scope.tsk.lista_id = $routeParams.id;
        taskAPI.adicionatarefa(tsk).then(function (response) {
            delete $scope.tsk;
            $scope.tarefa.push(response.data);
            notifyOk("Tarefa adicionada.");
        }, function (response) {
            notifyError(response);
        });
    }

    $scope.deletar = function (id) {
        taskAPI.remover(id).then(function (response) {
            $scope.tarefa = $scope.tarefa.filter(function (tarf) {
                if (tarf.id != id) return tarf;
            });
            notifyOk("Tarefa excluida.");
        }, function (response) {
            notifyError(response);
        });
    }

    $scope.finaliza = function (id) {
        taskAPI.finalizar(id).then(function (response) {
            angular.forEach($scope.tarefa, function (element) {
                if (element.id == id) {
                    element.completa = 1;
                }
            }, this);
            notifyOk("Tarefa finalizada.");
        }, function (response) {
            notifyError(response);
        });
    }

});
