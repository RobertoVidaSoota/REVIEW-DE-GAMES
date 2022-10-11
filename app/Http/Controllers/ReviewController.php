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
        ->select("*", DB::raw("reviews.id as reviews_id"))
        ->join('users', 'fk_id_users', '=', 'users.id')
        ->limit(20)->orderBy('reviews.id', 'desc')->get();
        for($i = 0; $i < count($reviews); $i++)
        {
            $reviews[$i]->password = "";
        }
        return Inertia::render('Dashboard', ['reviews' => $reviews]);
    }


    // NÃO PEGOU
    public function getReviewsGroup(Request $req)
    {
        sleep(1);
        $group = $req->group;
        $sub_group = $req->sub_group;
        $validateData = $req->validate([
            'group' => ['required', 'max:30'],
            'sub_group' => ['required', 'max:30']
        ]);
        if($group === 'year')
        {
            $my_years = explode("-", $sub_group);
            $reviews = DB::table('reviews')
            ->join('users', 'reviews.fk_id_users', '=', 'users.id')
            ->join('videogames', 'videogames.fk_id_reviews', '=', 'reviews.id')
            ->whereBetween('videogames.'.$group, [$my_years[0], $my_years[1]])
            ->limit(20)->orderBy('reviews.id', 'desc')->get();
        }
        else
        {
            $reviews = DB::table('reviews')
            ->join('users', 'reviews.fk_id_users', '=', 'users.id')
            ->join('videogames', 'videogames.fk_id_reviews', '=', 'reviews.id')
            ->where('videogames.'.$group, '=', $sub_group)
            ->limit(20)->orderBy('reviews.id', 'desc')->get();
        }
        for($i = 0; $i < count($reviews); $i++)
        {
            $reviews[$i]->password = "";
        }
        return Inertia::render('Dashboard', ['reviews' => $reviews]);
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
            'titulo_principal' => ['required', 'max:180'],
            'thumb' => ['required', 'url', 'max:320'],
            'desc_review' => ['required'],
            'rate' => ['required', 'numeric', 'digits_between:1,5'],
            'name_game' => ['required', 'max:180'],
            'collection' => ['required', 'max:180'],
            'developer' => ['required', 'max:180'],
            'owner' => ['required', 'max:180'],
            'gender' => ['required', 'max:180'],
            'version' => ['required', 'max:180'],
            'year' => ['required', 'max:4'],
            'requirements' => ['required'],
            'id_user' => ['required', 'int']
        ]);
        $review = Reviews::create([
            'name_review' => $req->titulo_principal,
            'desc_review' => $req->desc_review.' ## Requisitos '.$req->requirements,
            'thumb' => $req->thumb,
            'date_review' => date('y-m-d'),
            'rate' => $req->rate,
            'fk_id_users' => $req->id_user
        ]);
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
        return true;
    }



    public function getUserReview(Request $req)
    {
        $review = DB::table('reviews')
        ->where('reviews.fk_id_users', '=', $req->id_user)->limit(10)->get();
        return Inertia::render('ReviewGames/ListarReviews');
    }
}
