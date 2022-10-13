<?php

namespace App\Http\Controllers;

use App\Models\Coments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComentsController extends Controller
{
    public function getComentOneReview($id_review)
    {
        $coments = DB::table('coments')
        ->select("*", DB::raw("coments.id as coments_id"))
        ->join('users', 'coments.fk_id_users', '=', 'users.id')
        ->where("coments.fk_id_reviews", "=", $id_review)
        ->orderBy('coments.id', 'desc')->get();
        for($i = 0; $i < count($coments); $i++)
        {
            $coments[$i]->password = "";
        }
        return $coments ? $coments : '';
    }



    public function addComent(Request $req)
    {
        $id_user = $req->id_user;
        $id_review = $req->id_review;
        $text_coment = $req->text_coment;
        $validateData = $req->validate([
            'id_user' => ['required', 'integer'],
            'id_review' => ['required'],
            'text_coment' => ['required', 'max:240']
        ]);
        $coments = Coments::create([
            "text_coment" => $text_coment,
            "fk_id_users" => $id_user,
            "fk_id_reviews" => $id_review
        ]);
        $comentUser = DB::table('coments')
        ->select("*", DB::raw("coments.id as coments_id"))
        ->join('users', 'coments.fk_id_users', '=', 'users.id')
        ->where("coments.id", "=", $coments->id)->get();
        return $comentUser ? $comentUser : '';
    }



    public function updateComent(Request $req)
    {
        $validateData = $req->validate([
            'text_coment' => ['required'],
            'id_user' => ['required'],
            'id_review' => ['required'],
            'id_coment' => ['required'],
        ]);
        $coment = Coments::where("fk_id_users", '=', $req->id_user)
        ->where("fk_id_reviews", '=', $req->id_review)
        ->where('coments.id', $req->id_coment)->update([
            "text_coment" => $req->text_coment,
        ]);
        return "Alteração realizada.";
    }



    public function deleteComent(Request $req)
    {
        $validateData = $req->validate([
            'id_user' => ['required'],
            'id_review' => ['required'],
            'id_coment' => ['required'],
        ]);
        $coment = DB::table('coments')
        ->where("fk_id_users", '=', $req->id_user)
        ->where("fk_id_reviews", '=', $req->id_review)
        ->where('coments.id', $req->id_coment)->detete();
        return "Exclusão realizada.";
    }
}
