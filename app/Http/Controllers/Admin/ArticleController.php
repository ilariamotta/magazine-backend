<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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

    $request->validate([
    'title' => 'required|string|max:255|unique:articles,title',
    'subtitle' => 'nullable|string|max:255',
    'content' => 'required|string',
    'author_id' => 'required|exists:authors,id',
    'categories' => 'required|array|min:1',
    'categories.*' => 'exists:categories,id',
    'is_published' => 'required|boolean',
    'cover_image' => 'nullable|image|max:2048',
    ]);

    $newArticle = new Article();

    $newArticle->title = $request->title;
    $newArticle->slug = Str::slug($request->title, '-');
    $newArticle->subtitle = $request->subtitle;
    $newArticle->content = $request->content;
    $newArticle->author_id = $request->author_id;
    $newArticle->is_published = $request->is_published ? true : false;

    if ($newArticle->is_published) {
        $newArticle->published_at = now();
    } else {
        $newArticle->published_at = null;
    }

    if (array_key_exists('cover_image', $request->all( ))) {
        $img_url = Storage::putFile('public/articles', $request['cover_image']);
        $newArticle->cover_image = $img_url;
    }


    
    $newArticle->save();
    
    $newArticle->categories()->attach($request->categories);

    return redirect()->route('admin.articles.show', $newArticle);
}

public function edit(Article $article){
    $authors = Author::all();
    $categories = Category::all();

    $article->load('categories');

    return view('admin.articles.edit', compact('authors', 'categories', 'article'));
}

public function update(Request $request, Article $article)
{

    $request->validate([
    'title' => 'required|string|max:255|unique:articles,title,' . $article->id,
    'subtitle' => 'nullable|string|max:255',
    'content' => 'required|string',
    'author_id' => 'required|exists:authors,id',
    'categories' => 'required|array|min:1',
    'categories.*' => 'exists:categories,id',
    'is_published' => 'required|boolean',
    'cover_image' => 'nullable|image|max:2048',
    ]);

    $data = $request->all();

    $article->title = $data['title'];
    $article->slug = Str::slug($data['title'], '-');
    $article->subtitle = $data['subtitle'];
    $article->content = $data['content'];
    $article->author_id = $data['author_id'];
    $article->is_published = $data['is_published'] == 1;
    if ($article->is_published) {
        $article->published_at = now();
    } else {
        $article->published_at = null;
    }

       if (array_key_exists('cover_image', $data)) {
        if ($article->cover_image) {
            Storage::delete($article->cover_image);
        }

        $img_url = Storage::putFile('public/articles', $data['cover_image']);
        $article->cover_image = $img_url;
    }


    $article->save();

    $article->categories()->sync($data['categories']);

    return redirect()->route('admin.articles.show', $article);
}

public function destroy(Article $article) {
    $article->delete();

    return redirect()->route('admin.articles.index');
}

}