<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tags;
use Illuminate\Http\Request;

class ApiTags extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tags::all();
        return response()->json($tags, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string'
        ]);
        $tags = Tags::create($validated);
        return response()->json($tags, 201);  
    }

    /**
     * Display the specified resource.
     */
    public function show(Tags $tags)
    {
        return response()->json($tags, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tags $tags)
    {
        $validated = $request->validate([
            'name' => 'required|string',
        ]);
    
        $tags->update($validated);
    
        return response()->json($tags, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tags $tags)
    {
        $tags->delete();  
        return response()->json(['message' => 'Tags berhasil dihapus'], 200);
    }
}
