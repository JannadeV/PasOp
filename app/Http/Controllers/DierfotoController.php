<?php

namespace App\Http\Controllers;

use App\Models\Dierfoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DierfotoController extends Controller
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
                'dierfoto' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
                'huisdier' => 'required|exists:huisdiers,id'
            ]);

            $path = $validated['dierfoto']->store('images', 'public');

            $dierfoto = Dierfoto::create([
                'path' => $path,
                'huisdier_id' => $validated['huisdier'],
            ]);

            return redirect()->route('huisdier.show', ['huisdier' => $validated['huisdier']]);


        } catch (\Exception $e) {
            return response()->json(['error' => "Failed to upload file. {{$e}}"], 500);
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
