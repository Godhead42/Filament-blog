<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Carbon::setLocale('ru');

        View::composer('*', function ($view) {
            $categories = ArticleCategory::where('active', true)->get();
            $latestArticles = Article::latest('published_at')->take(3)->get();
            $view->with('categories', $categories);
            $view->with('latestArticles', $latestArticles);
        });
    }
}
