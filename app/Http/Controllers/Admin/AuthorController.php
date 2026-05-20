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

    $request->validate([
    'name' => 'required|string|max:255|unique:authors,name',
    'email' => 'required|email|max:255|unique:authors,email',
    'bio' => 'nullable|string',
    'avatar_image' => 'nullable|image|max:2048',
    ], [
        'name.required' => 'Il nome è obbligatorio',
        'email.required' => 'Inserisci una mail valida',
    ]);

        $newAuthor = New Author();

        $newAuthor->name = $request->name;
        $newAuthor->slug = Str::slug($request->name, '-');
        $newAuthor->email = $request->email;
        $newAuthor->bio = $request->bio;

         if (array_key_exists('avatar_image', $request->all( ))) {
        $img_url = Storage::putFile('public/authors', $request['avatar_image']);
        $newAuthor->avatar_image= $img_url;
    }

    $newAuthor->save();
    return redirect()->route('admin.authors.show', $newAuthor);


    }

    public function edit(Author $author) {
        return view('admin.authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author) {

        $request->validate([
        'name' => 'required|string|max:255|unique:authors,name,' . $author->id,
        'email' => 'required|email|max:255|unique:authors,email,' . $author->id,
        'bio' => 'nullable|string',
        'avatar_image' => 'nullable|image|max:2048',
        ],
        [
        'name.required' => 'Il nome è obbligatorio',
        'email.required' => 'Inserisci una mail valida',
        ]);
        
        $data = $request->all();
        $author->name = $data['name'];
        $author->slug = Str::slug($data['name'], '-');
        $author->email = $data['email'];
               if (array_key_exists('avatar_image', $data)) {
        if ($author->avatar_image) {
            Storage::delete($author->avatar_image);
        }
        $img_url = Storage::putFile('public/authors', $data['avatar_image']);
        $author->avatar_image = $img_url;
    }

    $author->save();
    return redirect()-> route('admin.authors.show', $author);
    
    }

    public function destroy(Author $author) {
        
        $author->delete();
        return redirect()->route('admin.authors.index');
    }
}