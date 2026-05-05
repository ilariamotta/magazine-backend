<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('admin.authors.index', compact('authors'));
    }

        public function show(Author $author)
        {
            return view('admin.authors.show', compact('author'));
        }

        public function create()
    {
        return view('admin.authors.create');
    }

    public function store (Request $request) {
        $newAuthor = New Author();

        $newAuthor->name = $request->name;
        $newAuthor->slug = Str::slug($request->name, '-');
        $newAuthor->email = $request->email;

         if (array_key_exists('avatar_image', $request->all( ))) {
        $img_url = Storage::putFile('public/authors', $request['avatar_image']);
        $newAuthor->avatar_image= $img_url;
    }

    $newAuthor->save();
    return redirect()->route('admin.authors.show', $newAuthor);


    }
}
