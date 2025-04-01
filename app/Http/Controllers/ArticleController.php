<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return 'index article';
    }

    public function category()
    {
        return 'category article';
    }

    public function show()
    {
        return 'show article';
    }

    public function tag()
    {
        return 'tag article';
    }
}
