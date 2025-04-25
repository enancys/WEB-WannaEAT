<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UserFavoriteCategories;
use Illuminate\Http\Request;

class ApiUserFavoriteCategories extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userFavoriteCategories = UserFavoriteCategories::with (
            'userPreferences.user', 
            'category'
        )->get();
        return response()->json($userFavoriteCategories, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_preference_id' => 'required|integer',
            'category_id' => 'required|integer',
        ]);
        $userFavoriteCategories = UserFavoriteCategories::create($validated);
        return response()->json($userFavoriteCategories, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(UserFavoriteCategories $userFavoriteCategories)
    {
        return response()->json($userFavoriteCategories, 200);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserFavoriteCategories $userFavoriteCategories)
    {
        $validated = $request->validate([
            'user_preference_id' => 'required|integer',
            'category_id' => 'required|integer',
        ]);
    
        $userFavoriteCategories->update($validated);
    
        return response()->json($userFavoriteCategories, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserFavoriteCategories $userFavoriteCategories)
    {
        $userFavoriteCategories->delete();  
        return response()->json(['message' => 'UserFavoriteCategories berhasil dihapus'], 200);
    }
}
