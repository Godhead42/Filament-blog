<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blog', [ArticleController::class, 'index'])->name('article.index');
Route::get('/blog/{category}', [ArticleController::class, 'category'])->name('article.category');
Route::get('/blog/{category}/{arcticle}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/blog/tag/{tag}', [ArticleController::class, 'tag'])->name('article.tag');


Route::get('/about', [HomeController::class, 'about'])->name('about');
