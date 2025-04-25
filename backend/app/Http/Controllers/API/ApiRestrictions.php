<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Restrictions;
use Illuminate\Http\Request;

class ApiRestrictions extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restrictions = Restrictions::all();
        return response()->json($restrictions, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string'
        ]);
        $restrictions = Restrictions::create($validated);
        return response()->json($restrictions, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Restrictions $restrictions)
    {
        return response()->json($restrictions, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Restrictions $restrictions)
    {
        $validated = $request->validate([
            'name' => 'required|string',
        ]);
    
        $restrictions->update($validated);
    
        return response()->json($restrictions, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restrictions $restrictions)
    {
        $restrictions->delete();  
        return response()->json(['message' => 'Restrictions berhasil dihapus'], 200);
    }
}
