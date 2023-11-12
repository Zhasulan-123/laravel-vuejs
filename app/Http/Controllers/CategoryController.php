<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        try {
            $results = Category::with('children')->get();

            if ($results->isEmpty()) {
                return response()->json(['message' => 'Категория не найден.'], 404);
            }

            return response()->json($results, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Internal Server Error'], 500);
        }
    }

    public function searchCategory($category)
    {
        try {
            $category = Category::where('title', $category)->first();

            $results = $category->products()->orderBy('category_id')->paginate(12);

            if ($results->isEmpty()) {
                return response()->json(['message' => 'Категория не найден.'], 404);
            }

            return response()->json($results, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Internal Server Error'], 500);
        }

    }

}