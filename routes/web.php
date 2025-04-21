<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Barryvdh\TranslationManager\Controller as TranslationController;
use Filament\Facades\Filament;



Route::get('/', function () {
    // Редирект на язык по умолчанию
    return redirect(app()->getLocale());
});



Route::group(['prefix' => '{locale}', 'where' => ['locale' => 'en|ru|kz']], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Блог
    Route::get('/blog', [ArticleController::class, 'index'])->name('article.index');
    Route::get('/blog/{category}', [ArticleController::class, 'category'])->name('article.category');
    Route::get('/blog/tag/{tag}', [ArticleController::class, 'tag'])->name('article.tag');
    Route::get('/blog/{category}/{article}', [ArticleController::class, 'show'])->name('article.show');

    // Поиск и страницы
    Route::get('/search', [ArticleController::class, 'search'])->name('article.search');
    Route::get('/about', [HomeController::class, 'about'])->name('about');


    // Переключатель языка
    Route::get('/lang/{targetLocale}', function ($locale, $targetLocale) {
        if (!in_array($targetLocale, ['en', 'ru', 'kz'])) {
            abort(400);
        }

        $newUrl = preg_replace('#^/' . $locale . '#', '/' . $targetLocale, request()->getRequestUri());
        return redirect($newUrl);
    })->name('lang.switch');

    // 💡 Менеджер переводов
    Route::group([
        'prefix' => 'translations',
        'middleware' => ['web']
    ], function () {
        Route::get('/', [TranslationController::class, 'getIndex']);
        Route::get('/view/{group}', [TranslationController::class, 'getView']); // ← Вот его не хватало

        Route::post('/import', [TranslationController::class, 'postImport']);
        Route::post('/find', [TranslationController::class, 'postFind']);
        Route::post('/add', [TranslationController::class, 'postAdd']);
        Route::post('/edit', [TranslationController::class, 'postEdit']);
        Route::post('/delete', [TranslationController::class, 'postDelete']);
        Route::post('/publish', [TranslationController::class, 'postPublish']);
        Route::post('/translate-missing', [TranslationController::class, 'postTranslateMissing']);
    });


});
