<?php

namespace App\Http\Controllers;

use App\Models\Elements;
use App\Models\Requirements;
use App\Models\Reviews;
use App\Models\Videogames;
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
            'titulo_pricipal' => ['required', 'max:180'],//
            'thumb' => ['required', 'max:320'],
            'desc_review' => ['required'],
            'rate' => ['required'],
            'name_game' => ['required', 'max:180'],
            'collection' => ['required', 'max:180'],
            'developer' => ['required', 'max:180'],
            'owner' => ['required', 'max:180'],
            'gender' => ['required', 'max:180'],
            'version' => ['required', 'max:180'],
            'year' => ['required', 'max:4'],
            'elements' => ['array'],
            'elements.*' => ['max:180'],
            'requirements' => ['array'],
            'requirements.*' => ['max:180'] 
        ]);
        $review = Reviews::create([
            'name_review' => $req->titulo_pricipal,
            'desc_review' => $req->desc_review,
            'thumb' => $req->thumb,
            'date_review' => date('y-m-d'),
            'rate' => $req->rate,
            'fk_id_users' => $req->id_user
        ]);
        for($i = 0; $i < count($req->elements); $i++)
        {
            $elements = Elements::create([
                'name_element' => $req->elements[$i]["name_element"],
                'text_element' => $req->elements[$i]["text_element"],
                'fk_id_reviews' => $review->id
            ]);
        }
        $videogame = Videogames::create([
            'name_game' => $req->name_game,
            'developer' => $req->developer,
            'collection' => $req->collection,
            'owner' => $req->owner,
            'gender' => $req->gender,
            'version' => $req->version,
            'year' => $req->year,
            'fk_id_reviews' => $review->id
        ]);
        for($i = 0; $i < count($req->requirements); $i++)
        {
            $requirements = Requirements::create([
                'hardware' => $req->requirements[$i]["hardware"],
                'value' => $req->requirements[$i]["value"],
                'level' => $req->requirements[$i]["level"],
                'fk_id_videogames' => $videogame->id
            ]);
        }
        return true;
    }



    public function getUserReview(Request $req)
    {
        $review = DB::table('reviews')
        ->where('reviews.fk_id_users', '=', $req->id_user)->limit(10)->get();
        return Inertia::render('ReviewGames/ListarReviews');
    }
}
