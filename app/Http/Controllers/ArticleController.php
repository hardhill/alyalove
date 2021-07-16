<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        $articles = Article::allPagination(10);
//        $articles = Article::with('tags','state')->orderBy('created_at','desc')->paginate(10);
        return view('app.article.index', compact('articles'));
    }
}
