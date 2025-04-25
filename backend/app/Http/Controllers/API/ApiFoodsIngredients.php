<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\FoodsIngredients;
use Illuminate\Http\Request;

class ApiFoodsIngredients extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foodsIngredients = FoodsIngredients::with('food:id,name', 'ingredient:id,name')->get(); // Memuat restaurant_id dan restaurant_name saja
        return response()->json($foodsIngredients, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'food_id' => 'required|integer',
            'ingredient_id' => 'required|integer',
            'quantity' => 'nullable|numeric',
            'unit' => 'nullable|string'
        ]);
        $foodsIngredients = FoodsIngredients::create($validated);
        return response()->json($foodsIngredients, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(FoodsIngredients $foodsIngredients)
    {
        return response()->json($foodsIngredients, 200);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FoodsIngredients $foodsIngredients)
    {
        $validated = $request->validate([
            'food_id' => 'required|integer',
            'ingredient_id' => 'required|integer',
            'quantity' => 'nullable|numeric',
            'unit' => 'nullable|string'
        ]);
    
        $foodsIngredients->update($validated);
    
        return response()->json($foodsIngredients, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FoodsIngredients $foodsIngredients)
    {
        $foodsIngredients->delete();  
        return response()->json(['message' => 'foodsIngredients berhasil dihapus'], 200);
    }
}
