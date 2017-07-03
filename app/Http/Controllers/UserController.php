<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UserController extends Controller
{
    public function doLogin(Request $request){

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                    return Auth::user();           
        }else{
            throw new \Exception("Nao foi possivel logar. Tente novamente.");
        }
    }

    public function doLogout(){
        Auth::logout();
        return Auth::user(); //tem q ser nulo
    }

    public function getLogin(){
        return Auth::user();
    }

    public function createLogin(Request $request){

        $theUser = User::where('email','=', $request->email)->first();
        if ($theUser)
           throw new \Exception("Este email já esta registrado");
            
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        Auth::login($user);

        return Auth::user();
    }
}
