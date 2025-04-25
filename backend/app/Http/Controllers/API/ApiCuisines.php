<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cuisines;
use Illuminate\Http\Request;

class ApiCuisines extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cuisines = Cuisines::all();
        return response()->json($cuisines, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string'
        ]);
        $cuisines = Cuisines::create($validated);
        return response()->json($cuisines, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cuisines $cuisines)
    {
        return response()->json($cuisines, 200);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cuisines $cuisines)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string'
        ]);
    
        $cuisines->update($validated);
    
        return response()->json($cuisines, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cuisines $cuisines)
    {
        $cuisines->delete();

        return response()->json(['message' => 'cuisines berhasil dihapus'], 200);
    }
}
