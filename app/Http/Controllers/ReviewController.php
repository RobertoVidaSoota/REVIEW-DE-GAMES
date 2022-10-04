<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ReviewController extends Controller
{
    public function getAllReviews()
    {
        $reviews = DB::table('reviews')
        ->join('users', 'fk_id_users', '=', 'users.id')
        ->limit(20)->get();
        for($i = 0; $i < count($reviews); $i++)
        {
            $reviews[$i]->password = "";
        }
        return Inertia::render('Dashboard', ['reviews' => $reviews]);
    }



    public function getReviewsGroup(Request $req)
    {
        $group = $req->group;
        $sub_group = $req->sub_group;
        $reviews = DB::table('reviews')
        ->join('users', 'reviews.fk_id_users', '=', 'users.id')
        ->join('videogames', 'videogames.fk_id_reviews', '=', 'reviews.id')
        ->where($group, '=', $sub_group)
        ->limit(20)->get();
        for($i = 0; $i < count($reviews); $i++)
        {
            $reviews[$i]->password = "";
        }
        return response()->json(['reviews' => $reviews]);
    }



    public function getOneReview(Request $req, ElementsController $element, ComentsController $coment)
    {
        $id_review = $req->id_review;
        $reviews = DB::table('reviews')
        ->where('reviews.id', "=", $id_review)
        ->limit(20)->get();
        $elements = $element->getElementsOneReview($id_review);
        $seeMore = DB::table('reviews')->limit(3)->get();
        $coments = $coment->getComentOneReview($id_review);
        return Inertia::render('ReviewGames/PaginaReview', [ 
            'review' => $reviews,
            'elements' => $elements,
            'seeMore' => $seeMore,
            'coments' => $coments
        ]);
    }



    public function addReview(Request $req)
    {
        $validateData = $req->validate([
            "titulo_pricipal" => ['required', ['max', '180']],
            'thumb' => ['required', ['max', '320']],
            'desc_review' => ['required'],
            'rate' => ['required', 'number'],
            'name_game' => ['required', ['max', '180']],
            'developer' => ['required', ['max', '180']],
            'owner' => ['required', ['max', '180']],
            'gender' => ['required', ['max', '180']],
            'version' => ['required', ['max', '180']],
            'year' => ['required', 'number', ['max' , '4']]
        ]);
        $review = DB::table('review')
        ->insert([
            'name_review' => $req->titulo_pricipal,
            'desc_review' => $req->desc_review,
            'thumb' => $req->thumb,
            'date_review' => date('d/m/Y'),
            'rate' => $req->rate,
            'fk_id_users' => $req->id_user
        ]);
        dd($review);
        $elements = DB::table('elements')
        ->insert([
            'name_element' => $req->name_element,
            'text_element' => $req->text_element,
            'fk_id_reviews' => ''
        ]);
        $videogame = DB::table('review')
        ->insert([
            'name_game' => $req->name_game,
            'developer' => $req->developer,
            'owner' => $req->owner,
            'gender' => $req->gender,
            'version' => $req->version,
            'year' => $req->year,
            'fk_id_reviews' => ''
        ]);
        dd($videogame);
        $requirements = DB::table('elements')
        ->insert([
            'hardware' => $req->hardware,
            'value' => $req->value,
            'level' => $req->level,
            'fk_id_videogames' => ''
        ]);
    }



    public function getUserReview(Request $req)
    {
        $review = DB::table('reviews')
        ->where('reviews.fk_id_users', '=', $req->id_user)->limit(10)->get();
        return Inertia::render('ReviewGames/ListarReviews');
    }
}
