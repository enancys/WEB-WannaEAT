<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\FavCategoryIngredients;
use Illuminate\Http\Request;

class ApiFavCategoryIngredients extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $favCategoryIngredients = FavCategoryIngredients::with(
            'userPreference.user',
            'ingredient'
        )->get();
        return response()->json($favCategoryIngredients, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_preference_id' => 'required|integer',
            'ingredient_id' => 'required|integer'
        ]);
        $favCategoryIngredients = FavCategoryIngredients::create($validated);
        return response()->json($favCategoryIngredients, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(FavCategoryIngredients $favCategoryIngredients)
    {
        return response()->json($favCategoryIngredients, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FavCategoryIngredients $favCategoryIngredients)
    {
        $validated = $request->validate([
            'user_preference_id' => 'required|integer',
            'ingredient_id' => 'required|integer'
        ]);
    
        $favCategoryIngredients->update($validated);
    
        return response()->json($favCategoryIngredients, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FavCategoryIngredients $favCategoryIngredients)
    {
        $favCategoryIngredients->delete();  
        return response()->json(['message' => 'favCategoryIngredients berhasil dihapus'], 200);
    }
}
