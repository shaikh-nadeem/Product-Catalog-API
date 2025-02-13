<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|unique:categories,name|max:255',
            'parent_category_id' => 'nullable|exists:categories,id',
        ]);

        $category = Category::create($validatedData);

        return response()->json($category, 201);
    }
}
