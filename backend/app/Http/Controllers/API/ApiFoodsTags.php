<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\FoodsTags;
use Illuminate\Http\Request;

class ApiFoodsTags extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foodsTags = FoodsTags::with(['food', 'tag'])->get();
        return response()->json($foodsTags, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'food_id' => 'required|integer',
            'tag_id' => 'required|integer'
        ]);
        $foodsTags = FoodsTags::create($validated);
        return response()->json($foodsTags, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(FoodsTags $foodsTags)
    {
        return response()->json($foodsTags, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FoodsTags $foodsTags)
    {
        $validated = $request->validate([
            'food_id' => 'required|integer',
            'tag_id' => 'required|integer'
        ]);
    
        $foodsTags->update($validated);
    
        return response()->json($foodsTags, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FoodsTags $foodsTags)
    {
        $foodsTags->delete();  
        return response()->json(['message' => 'foodsTags berhasil dihapus'], 200);
    }
}
