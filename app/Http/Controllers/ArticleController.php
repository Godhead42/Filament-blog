<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use App\Models\Article;


class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::where('active', true)->latest('published_at')->paginate(2);
        return view('article.index', compact('articles'));
    }

    public function category($category)
    {
        $category = ArticleCategory::where('slug', $category)->firstOrFail();
        $articles = Article::where('active', true)->where('category_id', $category->id)->latest('published_at')->paginate(2);
        return view('article.index', compact('articles', 'category'));
    }

    public function show($category, $article)
    {
        return 'show article' . $category . ' ' . $article;
    }

    public function tag($tag)
    {
        return 'tag article' . $tag;
    }
}
