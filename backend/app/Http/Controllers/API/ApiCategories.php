<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class ApiCategories extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::all();
        return response()->json($categories, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string'
        ]);
        $categories = Categories::create($validated);
        return response()->json($categories, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categories)
    {
        return response()->json($categories, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categories $categories)
    {
        $validated = $request->validate([
            'name' => 'required|string',
        ]);
    
        $categories->update($validated);
    
        return response()->json($categories, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $categories)
    {
        $categories->delete();  
        return response()->json(['message' => 'Kategori berhasil dihapus'], 200);
    }
}
