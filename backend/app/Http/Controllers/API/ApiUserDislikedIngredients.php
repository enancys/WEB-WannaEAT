<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UserDislikedIngredients;
use Illuminate\Http\Request;

class ApiUserDislikedIngredients extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userDislikedIngredients = UserDislikedIngredients::with([
            'userPreference.user', 'ingredient'
        ])->get();
        return response()->json($userDislikedIngredients, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_preference_id' => 'required|integer',
            'ingredient_id' => 'required|integer',
        ]);
        $userDislikedIngredients = UserDislikedIngredients::create($validated);
        return response()->json($userDislikedIngredients, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(UserDislikedIngredients $userDislikedIngredients)
    {
        return response()->json($userDislikedIngredients, 200);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserDislikedIngredients $userDislikedIngredients)
    {
        $validated = $request->validate([
            'user_preference_id' => 'required|integer',
            'ingredient_id' => 'required|integer',
        ]);
    
        $userDislikedIngredients->update($validated);
    
        return response()->json($userDislikedIngredients, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserDislikedIngredients $userDislikedIngredients)
    {
        $userDislikedIngredients->delete();  
        return response()->json(['message' => 'UserDislikedIngredients berhasil dihapus'], 200);
    }
}
