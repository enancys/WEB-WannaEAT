<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UserPreferences;
use Illuminate\Http\Request;

class ApiUserPreferences extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userPreferences = UserPreferences::with('user:id,name')->get();
        return response()->json($userPreferences, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
        ]);
        $userPreferences = UserPreferences::create($validated);
        return response()->json($userPreferences, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(UserPreferences $userPreferences)
    {
        return response()->json($userPreferences, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserPreferences $userPreferences)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
        ]);
    
        $userPreferences->update($validated);
    
        return response()->json($userPreferences, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserPreferences $userPreferences)
    {
        $userPreferences->delete();  
        return response()->json(['message' => 'UserPreferences berhasil dihapus'], 200);
    }

    public function getByUser($userId)
    {
        $preferences = UserPreferences::where('user_id', $userId)->first();

        if (!$preferences) {
            $preferences = UserPreferences::create([
                'user_id' => $userId,
            ]);
            return response()->json([
                'message' => 'User preferences not found, a new entry has been created.',
                'preferences' => $preferences
            ], 201); 
        }

        return response()->json($preferences);
    }

}
