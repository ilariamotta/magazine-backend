<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index() {
        {
    $authors = Author::with(['articles' => function ($query) {
        $query->where('is_published', true);
    }])->get();

    return response()->json([
        'success' => true,
        'data' => $authors
    ]);
}
    }

    public function show(Author $author)
{
    $author->load(['articles' => function ($query) {
        $query->where('is_published', true);
    }]);

    return response()->json([
        'success' => true,
        'data' => $author
    ]);
}
}
