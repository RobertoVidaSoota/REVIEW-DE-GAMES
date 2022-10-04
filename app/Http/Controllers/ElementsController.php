<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ElementsController extends Controller
{
    public function getElementsOneReview($id_review)
    {
        $elements = DB::table('elements')
        ->where("elements.fk_id_reviews", '=', $id_review)->get();
        return $elements ? $elements : '';
    }
}
