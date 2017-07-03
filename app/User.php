<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function listas()
    {
        return $this->hasMany('App\Lista');
    }

    public static $rules = [
        'name' => 'required|min:3|max:150',
        'email' => 'required|email|max:150|unique:users',
        'password' => 'required|min:6|max:60',
    ];
}
