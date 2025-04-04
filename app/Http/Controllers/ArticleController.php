<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return view('article.index');
    }

    public function category($category)
    {
        return 'category article' . $category;
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
