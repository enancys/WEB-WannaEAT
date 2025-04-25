<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ratings;
use Illuminate\Http\Request;

class ApiRatings extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ratings = Ratings::with('user:id,name', 'food:id,name', 'restaurant:id,name')->get();
        return response()->json($ratings, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'food_id' => 'required|integer',
            'restaurant_id' => 'required|integer',
            'rating' => 'required|numeric',
            'review' => 'nullable|string'
        ]);
        $ratings = Ratings::create($validated);
        return response()->json($ratings, 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(Ratings $ratings)
    {
        return response()->json($ratings, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ratings $ratings)
    {
        
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'food_id' => 'required|integer',
            'restaurant_id' => 'required|integer',
            'rating' => 'required|numeric',
            'review' => 'nullable|string'
        ]);
    
        $ratings->update($validated);
    
        return response()->json($ratings, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ratings $ratings)
    {
        $ratings->delete();  
        return response()->json(['message' => 'Ratings berhasil dihapus'], 200);
    }
}
