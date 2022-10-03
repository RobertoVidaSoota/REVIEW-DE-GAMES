<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class UserController extends Controller
{
    public function makeLogin(Request $req)
    {
        $email = $req->email;
        $password = bcrypt($req->password);
        $validateData = $req->validate([
            'email' => ['email', 'required'],
            'password' => ['required']
        ]);
        if(\Auth::attempt(['email' => $email, 'password' => $password]))
        {
            dd(\Auth::user());
        }
        dd(\Auth::user());
    }



    public function makeRegister(Request $req)
    {
        $validateData = $req->validate([
            "name_user" => ['required', ['max' , '40']],
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
        $id_user = $req->id;
        $user = DB::table('users')
        ->where('id', '=', $id_user)->get();
        dd($user);
    }
}
