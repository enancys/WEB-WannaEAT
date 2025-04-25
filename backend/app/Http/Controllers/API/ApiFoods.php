<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Foods;
use Illuminate\Http\Request;

class ApiFoods extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foods = Foods::with('restaurants:id,name', 'cuisine:id,name')->get(); // Memuat restaurant_id dan restaurant_name saja
    
        return response()->json($foods, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image_url' => 'required|string',
            'restaurant_id' => 'required|integer',
            'cuisine_id' => 'required|integer',

        ]);
        $foods = Foods::create($validated);
        return response()->json($foods, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Foods $foods)
    {
        return response()->json($foods, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Foods $foods)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image_url' => 'required|string',
            'restaurant_id' => 'required|integer',
            'cuisine_id' => 'required|integer',

        ]);
        $foods->update($validated);
        return response()->json($foods, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Foods $foods)
    {
        $foods->delete();  
        return response()->json(['message' => 'foods berhasil dihapus'], 200);
    }
}
