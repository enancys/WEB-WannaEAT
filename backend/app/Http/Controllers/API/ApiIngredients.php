<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ingredients;
use Illuminate\Http\Request;

class ApiIngredients extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ingredients = Ingredients::all();
        return response()->json($ingredients, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string'
        ]);
        $ingredients = Ingredients::create($validated);
        return response()->json($ingredients, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ingredients $ingredients)
    {
        return response()->json($ingredients, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ingredients $ingredients)
    {
        $validated = $request->validate([
            'name' => 'required|string',
        ]);
    
        $ingredients->update($validated);
    
        return response()->json($ingredients, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ingredients $ingredients)
    {
        $ingredients->delete();  
        return response()->json(['message' => 'ingredients berhasil dihapus'], 200);
    }
}
