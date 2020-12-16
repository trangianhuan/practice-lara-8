<?php

namespace App\Http\Services;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleService
{
    public function getList()
    {
        return Article::all();
    }

    public function store($article)
    {
        return Article::save($article);
    }
}
