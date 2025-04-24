<?php

namespace App\Http\Controllers;

use App\Models\Huisfoto;
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
            return response()->json(['error' => "Failed to upload file. {{$e}}"], 500);
        }

    }

    public function store_huisfoto(Request $request)
    {
        try {
            $validated = $request->validate([
                'huisfoto' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
                'aanvraag_id' => 'required|exists:aanvraags,id'
            ]);

            $path = $validated['huisfoto']->store('images', 'public');
            //return response()->json(['path' => $path], 200);

            $huisfoto = Huisfoto::create([
                'path' => $path, //bijv. 'images/foto.jpg'
                'aanvraag_id' => $validated['aanvraag_id']
            ]);

            return redirect()->route('aanvraag.show', ['aanvraag' => $validated['aanvraag_id']]);


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
