<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\Lista;

class ListaController extends Controller
{
    public function listar($id){
        return response()->json(DB::table('listas')->where('user_id', '=', $id)->get());
    }

    public function insereLista(Request $request){
        $id = Auth::id();
        $user = User::find($id);
        $lista = new Lista(['nomelista' => $request->nome]);
        return $user->listas()->save($lista);
        
    }
}

