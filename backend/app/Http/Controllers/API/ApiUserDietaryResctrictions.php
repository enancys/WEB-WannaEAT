<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UserDietaryResctrictions;
use App\Models\UserPreferences;
use Illuminate\Http\Request;

class ApiUserDietaryResctrictions extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userDietaryResctrictions = UserDietaryResctrictions::with(['userPreference.user', 'restriction'])->get();
        return response()->json($userDietaryResctrictions, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_preference_id' => 'required|integer',
            'restriction_id' => 'required|integer',
        ]);
        $userDietaryResctrictions = UserDietaryResctrictions::create($validated);
        return response()->json($userDietaryResctrictions, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(UserDietaryResctrictions $userDietaryResctrictions)
    {
        return response()->json($userDietaryResctrictions, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserDietaryResctrictions $userDietaryResctrictions)
    {
        $validated = $request->validate([
            'user_preference_id' => 'required|integer',
            'restriction_id' => 'required|integer',
        ]);
    
        $userDietaryResctrictions->update($validated);
    
        return response()->json($userDietaryResctrictions, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserDietaryResctrictions $userDietaryResctrictions)
    {
        $userDietaryResctrictions->delete();  
        return response()->json(['message' => 'UserDietaryResctrictions berhasil dihapus'], 200);
    }
}
