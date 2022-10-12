<?php

use App\Http\Controllers\{
    ComentsController,
    ReviewController,
    UserController
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/add-coment', [ComentsController::class, "addComent"]);//

Route::post('/add-review', [ReviewController::class, "addReview"]);//

Route::post('/update-profile', [UserController::class, "updateProfileData"]);//

Route::post('/update-review', [ReviewController::class, "updateReview"]);

Route::post('/update-coment', [ComentsController::class, "updateComent"]);

Route::delete('/delete-review', [ReviewController::class, "deleteReview"]);

Route::delete('/delete-coment', [ComentsController::class, "deleteReview"]);

