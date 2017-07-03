
angular.module("todo").config(function ($routeProvider) {
    $routeProvider.when("/", {
        templateUrl: "views/home.html",
        controller: "mainCtrl"
       
    });

     $routeProvider.when("/logout", {
        templateUrl: "views/home.html",
        controller: "mainCtrl",
        resolve: {
            function (mainAPI) {
                return mainAPI.dologout();
            }
        }
    });

    $routeProvider.when("/cadastrar", {
        templateUrl: "views/newuser.html",
        controller: "mainCtrl"
    });

    $routeProvider.when("/login", {
        templateUrl: "views/login.html",
        controller: "mainCtrl"
    });

    $routeProvider.when("/tarefas/:id",{
        templateUrl: "views/tarefa/tarefas.html",
        controller: "taskCtrl",
        resolve: {
            task: function ($route, taskAPI) {
                return taskAPI.gettarefa($route.current.params);
            }
        }
    });

    $routeProvider.otherwise({ redirectTo: "/" });
});