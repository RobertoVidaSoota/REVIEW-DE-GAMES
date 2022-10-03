<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComentsController extends Controller
{
    public function getComentOneReview($id_review)
    {
        $coments = DB::table('coments')
        ->join("users", 'comments.fk_id_users', "=", "users.id")
        ->where("comments.fk_id_review", "=", $id_review)->get();
        return $coments;
    }



    public function addComent(Request $req)
    {
        $id_user = $req->id_user;
        $id_review = $req->id_review;
        $text_coment = $req->text_coment;
        $coments = DB::table('coments')
        ->insert([
            "text_coment" => $text_coment,
            "fk_id_users" => $id_user,
            "fk_id_review" => $id_review
        ]);
        dd($coments);
    }
}
