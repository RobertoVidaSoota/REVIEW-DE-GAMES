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
            "name_user" => ['required', 'min:8','max:40'],
            "email" => ['required', 'email'],
            "password" => ['required', 'min:6', 'same:password_confirmation'],
            "password_confirmation" => ['min:6']
        ]);
        $user = DB::table('users')->insert([
            'name' => $req->name_user,
            'role' => 'normal',
            'email' => $req->email,
            'password' => bcrypt($req->password),
            'image_user' => '',
            'about' => '',
        ]);
        if(Auth::attempt($req->only('email', 'password')))
        {
            return "Cadastro efetuado";
        }
        else
        {
            return "Email ou senha invalidos";
        }
    }



    public function getProfileData(Request $req)
    {
        $id_user = $req->id_user;
        $user = DB::table('users')
        ->where('users.id', '=', $id_user)->get();
        return Inertia::render('Auth/Perfil', ['userData' => $user]);
    }



    public function updateProfileData(Request $req)
    {
        if($req->name_user){$this->updateName($req);}
        if($req->email){$this->updateEmail($req);}
        if($req->role){$this->updateRole($req);}
        if($req->about){$this->updateAbout($req);}
        return "Alteração realizada.";
    }



    private function updateName($req)
    {
        $validateData = $req->validate([
            'name_user' => ['required', 'max:30'],
            'id_user' => ['required', 'integer']
        ]);
        $user = DB::table('users')->where('id', $req->id_user)->update([
            'name' => $req->name_user,
        ]);
        return "Nome atualizado.";
    }



    private function updateEmail($req)
    {
        $validateData = $req->validate([
            'email' => ['required', 'email'],
            'id_user' => ['required', 'integer']
        ]);
        $user = DB::table('users')->where('id', $req->id_user)->update([
            'email' => $req->email,
        ]);
        return "E-mail atualizado.";
    }



    private function updateRole($req)
    {
        $validateData = $req->validate([
            'role' => ['required', 'max:30'],
            'id_user' => ['required', 'integer']
        ]);
        $user = DB::table('users')->where('id', $req->id_user)->update([
            'role' => $req->role,
        ]);
        return "Papel atualizado.";
    }



    private function updateAbout($req)
    {
        $validateData = $req->validate([
            'about' => ['required'],
            'id_user' => ['required', 'integer']
        ]);
        $user = DB::table('users')->where('id', $req->id_user)->update([
            'about' => $req->about,
        ]);
        return "Sobre atualizado.";
    }
}
