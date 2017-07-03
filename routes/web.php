<?php



Route::get('/lista/{id}', 'ListaController@listar');
Route::get('/tarefa/{id}', 'TarefaController@tarefas');
Route::post('/adicionalista', 'ListaController@insereLista');
Route::post('/adicionatarefa', 'TarefaController@insereTarefa');
Route::delete('/deletartarefa/{id}', 'TarefaController@removeTarefa');
Route::put('/finalizartarefa/{id}', 'TarefaController@concluirTarefa');

Route::post('/newlogin', 'UserController@createLogin');
Route::get('/logout', 'UserController@doLogout');
Route::post('/login', 'UserController@doLogin');
Route::get('/login', 'UserController@getLogin');

Route::get('/', function () {
        return Redirect::to('/index.html');
});

