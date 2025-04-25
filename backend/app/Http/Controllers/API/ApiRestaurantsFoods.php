<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\RestaurantsFoods;
use Illuminate\Http\Request;

class ApiRestaurantsFoods extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurantsFoods = RestaurantsFoods::with('restaurant:id,name', 'food:id,name')->get();
        return response()->json($restaurantsFoods, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'restaurant_id' => 'required|integer',
            'food_id' => 'required|integer',
            'price' => 'required|numeric'
        ]);
        $restaurantsFoods = RestaurantsFoods::create($validated);
        return response()->json($restaurantsFoods, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(RestaurantsFoods $restaurantsFoods)
    {
        return response()->json($restaurantsFoods, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RestaurantsFoods $restaurantsFoods)
    {
        $validated = $request->validate([
            'restaurant_id' => 'required|integer',
            'food_id' => 'required|integer',
            'price' => 'required|numeric'
        ]);
    
        $restaurantsFoods->update($validated);
    
        return response()->json($restaurantsFoods, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RestaurantsFoods $restaurantsFoods)
    {
        $restaurantsFoods->delete();  
        return response()->json(['message' => 'RestaurantsFoods berhasil dihapus'], 200);
    }
}
