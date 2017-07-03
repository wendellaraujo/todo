<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $fillable = ['nometarefa', 'comentario', 'completa', 'data'];

    public function listas()
    {
        return $this->belongsTo('App\Comment');
    }

}
