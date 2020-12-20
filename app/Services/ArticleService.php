<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleService
{
    public function getList()
    {
        return Article::all();
    }

    public function store($article, $request)
    {
        $article = Article::create($article);

        $article->addMediaFromRequest('thumbnail')
            ->toMediaCollection('images');

        return $article;
    }
}
