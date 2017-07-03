<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    protected $fillable = ['nomelista'];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function tarefas()
    {
        return $this->hasMany('App\Tarefa');
    }

    public static $rules = [
        'nomelista' => 'required|min:2|max:150|unique:listas',
    ];
}
