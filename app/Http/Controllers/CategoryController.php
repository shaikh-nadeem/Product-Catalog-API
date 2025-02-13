<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{   
    public function index()
    {
        $categories = Category::all(); // Fetch all categories
        return response()->json([
            'success' => true,
            'data' => $categories
        ], 200);
    }
    
    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|unique:categories,name|max:255',
            'parent_category_id' => 'nullable|exists:categories,id',
        ]);

        $category = Category::create($validatedData);

        return response()->json($category, 201);
    }

    // // Show a single category
    // public function show(Category $category)
    // {
    //     return response()->json($category, 200);
    // }

    // // Update a category
    // public function update(Request $request, Category $category)
    // {
    //     $request->validate([
    //         'name' => 'required|string|unique:categories,name,' . $category->id,
    //     ]);

    //     $category->update(['name' => $request->name]);

    //     return response()->json($category, 200);
    // }

    // // Delete a category
    // public function destroy(Category $category)
    // {
    //     $category->delete();
    //     return response()->json(['message' => 'Category deleted successfully'], 200);
    // }
}
