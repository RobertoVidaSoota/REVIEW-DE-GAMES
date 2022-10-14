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


    
    public function getReviewsGroup(Request $req)
    {
        $group = $req->group;
        $sub_group = $req->sub_group;        
        if($group === 'year')
        {
            $my_years = explode("-", $sub_group);
            $reviews = DB::table('reviews')
            ->select("*", DB::raw("reviews.id as reviews_id"))
            ->join('users', 'reviews.fk_id_users', '=', 'users.id')
            ->join('videogames', 'videogames.fk_id_reviews', '=', 'reviews.id')
            ->whereBetween('videogames.'.$group, [$my_years[0], $my_years[1]])
            ->limit(20)->orderBy('reviews.id', 'desc')->get();
        }
        else
        {
            $reviews = DB::table('reviews')
            ->select("*", DB::raw("reviews.id as reviews_id"))
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



    public function getOneReview(Request $req, ComentsController $coment)
    {
        $id_review = $req->id_review;
        $reviews = DB::table('reviews')
        ->select("*", DB::raw("reviews.id as reviews_id"))
        ->join('users', 'reviews.fk_id_users', '=', 'users.id')
        ->where('reviews.id', "=", $id_review)->get();
        $date_create = date_create($reviews[0]->date_review);
        $reviews[0]->date_review = date_format($date_create, "d/m/Y");
        $reviews[0]->password = "";
        $seeMore = DB::table('reviews')->orderBy('id', 'desc')->limit(3)->get();
        $coments = $coment->getComentOneReview($id_review);
        return Inertia::render('ReviewGames/PaginaReview', [ 
            'review' => $reviews,
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
            'rate' => ['required', 'numeric', 'gte:1', 'lte:5'],
            'name_game' => ['required', 'max:180'],
            'collection' => ['required', 'max:180'],
            'developer' => ['required', 'max:180'],
            'owner' => ['required', 'max:180'],
            'gender' => ['required', 'max:180'],
            'version' => ['required', 'max:180'],
            'year' => ['required', 'max:4'],
            'id_user' => ['required', 'int']
        ]);
        $review = Reviews::create([
            'name_review' => $req->titulo_principal,
            'desc_review' => $req->desc_review,
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



    public function getUserReviews(Request $req)
    {
        $review = DB::table('reviews')
        ->select("*", DB::raw("reviews.id as reviews_id"))
        ->where('reviews.fk_id_users', '=', $req->id_user)
        ->limit(5)->orderBy('reviews.id', 'desc')->get();
        return Inertia::render('ReviewGames/ListarReviews', ['reviews' => $review]);
    }



    public function pageUpdateReview(Request $req)
    {
        $reviews = DB::table('reviews')
        ->select("*", DB::raw("reviews.id as reviews_id"))
        ->join('users', 'reviews.fk_id_users', '=', 'users.id')
        ->join('videogames', 'reviews.id', '=', 'videogames.fk_id_reviews')
        ->where('reviews.id', "=", $req->id_review)
        ->where('users.id', $req->id_user)->get();
        $reviews[0]->password = "";
        return Inertia::render('ReviewGames/CadastrarReview', 
            [
                'toUpdate' => true,
                'review' => $reviews
            ]);
    }



    public function updateReview(Request $req)
    {
        $validateData = $req->validate([
            'titulo_principal' => ['required', 'max:180'],
            'thumb' => ['required', 'url', 'max:320'],
            'desc_review' => ['required'],
            'rate' => ['required', 'numeric', 'gte:1', 'lte:5'],
            'name_game' => ['required', 'max:180'],
            'collection' => ['required', 'max:180'],
            'developer' => ['required', 'max:180'],
            'owner' => ['required', 'max:180'],
            'gender' => ['required', 'max:180'],
            'version' => ['required', 'max:180'],
            'year' => ['required', 'max:4'],
            'id_user' => ['required', 'int'],
            'id_review' => ['required']
        ]);
        $review = Reviews::where('fk_id_users', $req->id_user)
        ->where('reviews.id', $req->id_review)
        ->update([
            'name_review' => $req->titulo_principal,
            'desc_review' => $req->desc_review,
            'thumb' => $req->thumb,
            'date_review' => date('y-m-d'),
            'rate' => $req->rate,
        ]);
        $videogame = Videogames::where('fk_id_reviews', $req->id_review)
        ->update([
            'name_game' => $req->name_game,
            'developer' => $req->developer,
            'collection' => $req->collection,
            'owner' => $req->owner,
            'gender' => $req->gender,
            'version' => $req->version,
            'year' => $req->year,
        ]);
        return "Alteração realizada.";
    }



    public function deleteReview(Request $req)
    {
        $validateData = $req->validate([
            'id_user' => ['required'],
            'id_review' => ['required'],
        ]);
        $review = DB::table('reviews')
        ->where('fk_id_users', $req->id_user)
        ->where('reviews.id', $req->id_review)->delete();
        return "Exclusão realizada.";
    }
}
