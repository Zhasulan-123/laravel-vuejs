<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        try {
            $results = Products::with('category')->get();
            if ($results->isEmpty()) {
                return response()->json(['message' => 'Товар не найден.'], 404);
            }
            return response()->json($results, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Internal Server Error'], 500);
        }
    }

    public function search(Request $request)
    {
        try {
            $request->validate([
                'query' => 'required|string|min:3',
            ]);

            $query = $request->input('query');
            $results = Products::where('name', 'like', '%' . $query . '%')->paginate(12);

            if ($results->isEmpty()) {
                return response()->json(['message' => 'Товар не найден.'], 404);
            }

            return response()->json($results, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Internal Server Error'], 500);
        }
    }

}