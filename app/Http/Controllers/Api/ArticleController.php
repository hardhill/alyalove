<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Services\ArticleServices;

class ArticleController extends Controller
{
    protected ArticleServices $services;
    public function __construct()
    {
        $this->services = new ArticleServices();
    }
    public function __destruct()
    {
       unset($this->services);
    }

    public function show(Request $request){
        $article = $this->services->getArticleBySlug($request);
        return new ArticleResource($article);
    }
    public function viewsIncrement(Request $request){
        $article = $this->services->getArticleBySlug($request);
        $article->state->increment('views');
        return new ArticleResource($article);
    }
    public function likesIncrement(Request $request){
        $article = $this->services->getArticleBySlug($request);
        $inc = $request->get('increment');
        $inc ? $article->state->increment('likes'):$article->state->decrement('likes');
        return new ArticleResource($article);
    }

}
