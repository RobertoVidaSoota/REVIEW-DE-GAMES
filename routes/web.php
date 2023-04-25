<?php

use App\Http\Controllers\{
    ReviewController,
    UserController
};
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [ReviewController::class, "getAllReviews"]);//

Route::post('/make-login-user', [UserController::class , "makeLogin"]);//

Route::post('/add-register', [UserController::class, "makeRegister"]);//

Route::get('/review/{id_review}', [ReviewController::class, "getOneReview"]);//

Route::get('/get-reviews-group/{group}/{sub_group}', 
[ReviewController::class, "getReviewsGroup"]);//

// LOGIN OBRIGATÓRIO PARA TER ACESSO À ESTAS ROTAS
Route::middleware(['auth'])->group(function() 
{
    Route::get('/perfil/{id_user}', [UserController::class, 'getProfileData']);//

    Route::get('/cadastrar-review', function() {
        return Inertia::render('ReviewGames/CadastrarReview');
    });//

    Route::get('/edit-review-user/{id_review}/{id_user}', 
    [ReviewController::class, "pageUpdateReview"]);//

    Route::get('/listar-reviews/{id_user}', [ReviewController::class , 'getUserReviews']);//
});
