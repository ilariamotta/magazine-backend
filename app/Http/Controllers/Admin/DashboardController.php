<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Author;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $articleCount= Article::count();
        $publishedArticleCount = Article::where("is_published", true)->count();
        $draftArticleCount = Article::where("is_published", false)->count();
        $authorsCount= Author::count();
        $categoriesCount= Category::count();
        $latestArticles = Article::orderBy("published_at", desc)->take(5)->get();

        return view("admin.dashboard", compact(articleCount, publishedArticleCount, draftArticleCount, authorsCount, categoriesCount, latestArticles));

    }
}
