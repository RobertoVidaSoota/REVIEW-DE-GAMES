<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class UserController extends Controller
{
    public function makeLogin(Request $req)
    {
        $validateData = $req->validate([
            'email' => ['email', 'required'],
            'password' => ['required', 'min:6']
        ]);
        if(Auth::attempt($req->only('email', 'password')))
        {
            return "login efetuado";
        }
        else
        {
            return "Email ou senha invalidos";
        }

    }



    public function makeRegister(Request $req)
    {
        $validateData = $req->validate([
            "name_user" => ['required', ['max:40']],
            "email" => ['required', 'email'],
            "password" => ['required']
        ]);
        $user = DB::table('users')
        ->insert([
            'name' => $req->name_user,
            'role' => 'normal',
            'email' => $req->email,
            'password' => bcrypt($req->password)
        ]);
        dd($user);
    }



    public function getProfileData(Request $req)
    {
        $id_user = $req->id_user;
        $user = DB::table('users')
        ->where('users.id', '=', $id_user)->get();
        return Inertia::render('Auth/Perfil', ['userData' => $user]);
    }
}
