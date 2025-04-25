<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UserFavoriteCuisines;
use Illuminate\Http\Request;

class ApiUserFavoriteCuisines extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userFavoriteCuisines = UserFavoriteCuisines::with([
            'userPreference.user', 'cuisine'
        ])->get();
        return response()->json($userFavoriteCuisines, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_preference_id' => 'required|integer',
            'cuisine_id' => 'required|integer',
        ]);
        $userFavoriteCuisines = UserFavoriteCuisines::create($validated);
        return response()->json($userFavoriteCuisines, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(UserFavoriteCuisines $userFavoriteCuisines)
    {
        return response()->json($userFavoriteCuisines, 200);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserFavoriteCuisines $userFavoriteCuisines)
    {
        $validated = $request->validate([
            'user_preference_id' => 'required|integer',
            'cuisine_id' => 'required|integer',
        ]);
    
        $userFavoriteCuisines->update($validated);
    
        return response()->json($userFavoriteCuisines, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserFavoriteCuisines $userFavoriteCuisines)
    {
        $userFavoriteCuisines->delete();  
        return response()->json(['message' => 'UserFavoriteCuisines berhasil dihapus'], 200);
    }
}
