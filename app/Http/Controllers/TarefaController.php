<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Lista;
use App\Tarefa;

class TarefaController extends Controller
{
    public function tarefas($id){
        return DB::table('tarefas')->where('lista_id', '=', $id)->get();
    }

    public function insereTarefa(Request $request){
        $data = substr($request->data,0,10);
        $lista = Lista::find($request->lista_id);
        $tarefa = new Tarefa(['nometarefa' => $request->nometarefa, 'comentario' => $request->comentario, 'data' => $data]);
        return $lista->tarefas()->save($tarefa);
        
    }
     public function concluirTarefa($id){
        DB::table('tarefas')
            ->where('id', $id)
            ->update(['completa' => 1]);
        
    }

    public function removeTarefa($id){
       return Tarefa::destroy($id);
        
    }
}
