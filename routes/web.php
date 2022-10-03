<?php

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

Route::get('/', function () {
    return Inertia::render('Dashboard');
});

Route::get('/review/{id}', function() {
    return Inertia::render('ReviewGames/PaginaReview');
});

// LOGIN OBRIGATÓRIO PARA TER ACESSO À ESTAS ROTAS
// Route::middleware(['auth'])->group(function() 
// {
    Route::get('/perfil/{id}', function () {
        return Inertia::render('Auth/Perfil');
    });

    Route::get('/cadastrar-review', function() {
        return Inertia::render('ReviewGames/CadastrarReview');
    });

    Route::get('/listar-reviews', function() {
        return Inertia::render('ReviewGames/ListarReviews');
    });
// });
