<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $categories = Category::all();
    return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
$request->validate([
    'name' => 'required|string|max:255|unique:categories,name',
    'color' => 'nullable|string|max:20',
]);
        $newCategory = new Category();
        $newCategory->name = $request->name;
        $newCategory->slug = Str::slug($request->name, '-');
        $newCategory->color = $request->color;

        $newCategory->save();
        return redirect()->route('admin.categories.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
        'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        'color' => 'nullable|string|max:20',
        ]);
        
        $data = $request->all();

        $category->name = $data['name'];
        $category->slug = Str::slug($data['name'], '-');
        $category->color = $data['color'];
        $category->save();
        return redirect()->route('admin.categories.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->articles()->detach();
        $category->delete();
        return redirect()->route('admin.categories.index');
    }

}
