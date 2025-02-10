<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'foto' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
            ]);

            $path = $validated['foto']->store('images');

            return response()->json(['path' => $path], 200);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to upload file.'], 500);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(foto $foto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(foto $foto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, foto $foto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(foto $foto)
    {
        //
    }
}
