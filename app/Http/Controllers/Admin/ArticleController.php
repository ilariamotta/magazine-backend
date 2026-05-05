<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('admin.articles.index', compact('articles'));
    }

    public function show(Article $article) {
    return view('admin.articles.show', compact ('article'));
}

public function create() {
    $authors = Author::all();
    $categories = Category::all();
    return view('admin.articles.create', compact('authors', 'categories'));
}

public function store(Request $request) {
    $newArticle = new Article();

    $newArticle->title = $request->title;
    $newArticle->slug = Str::slug($request->title, '-');
    $newArticle->content = $request->content;
    $newArticle->author_id = $request->author_id;
    $newArticle->is_published = $request->is_published ? true : false;
    if ($newArticle->is_published) {
        $newArticle->published_at = now();
    } else {
        $newArticle->published_at = null;
    }

    
    $newArticle->save();
    
    $newArticle->categories()->attach($request->categories);

    return redirect()->route('admin.articles.show', $newArticle);
}

}

