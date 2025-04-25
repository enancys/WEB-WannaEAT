<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Restaurants;
use Illuminate\Http\Request;

class ApiRestaurants extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurants = Restaurants::with('cuisine:id,name')->get(); // Memuat restaurant_id dan restaurant_name saja

        return response()->json($restaurants, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'location' => 'required|string',
            'rating' => 'required|numeric',
            'cuisine_id' => 'required|integer',
            'description' => 'nullable|string'
        ]);
        $restaurants = Restaurants::create($validated);
        return response()->json($restaurants, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurants $restaurants)
    {
        return response()->json($restaurants, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Restaurants $restaurants)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'location' => 'required|string',
            'rating' => 'required|numeric',
            'cuisine_id' => 'required|integer',
            'description' => 'nullable|string'
        ]);
    
        $restaurants->update($validated);
    
        return response()->json($restaurants, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurants $restaurants)
    {
        $restaurants->delete();  
        return response()->json(['message' => 'Restaurants berhasil dihapus'], 200);
    }
}
