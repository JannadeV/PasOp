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
        $response = Http::asForm()->post(url('/upload'), [
            'foto' => $request->file('dierfoto')
        ]);
        $path = $response->json('path');

        $validated = $request->validate([
            'huisdierId' => 'required|integer',
        ]);

        $dierfoto = Dierfoto::create([
            'path' => $path,
            'huisdier_id' => $validated['huisdierId'],
        ]);
        $dierfoto->huisdier()->sync($request->huisdierId);

        return redirect()->route('pet.show', ['id' => $validated['huisdierId']]);
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
