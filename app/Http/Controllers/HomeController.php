<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $articles = Article::with('state','tags')->orderByDesc('created_at')->take(6)->get();
        return view('app.home',compact('articles'));
    }
}
