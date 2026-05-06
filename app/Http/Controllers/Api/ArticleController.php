<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() {
        $articles = Article::with('author', 'categories')->where('is_published', true)->latest()->get();
        return response()->json([
            "success"=>true,
            "data"=>$articles
        ]);
    }

    public function show(Article $article) {
        $article->load('author', 'categories');
        return response()->json([
            "success"=>true,
            "data"=>$article
        ]);
    }
}
