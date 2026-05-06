<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        {$categories = Category::with(['articles' => function($query){
            $query->where('is_published', true);
        }])->get();
        
        return response()->json([
            "success"=>true,
            "data"=>$categories
        ]);
        }
    }

    public function show(Category $category) {
        {$category->load(['articles'=>function($query) {
            $query->where('is_published', true);
        }]);
        
        return response()->json([
            "success"=>true,
            "data"=>$category
        ]);
        }
    }
}
