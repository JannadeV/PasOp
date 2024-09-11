<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HuisfotoController extends Controller
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
            'foto' => $request->file('huisfoto')
        ]);
        $path = $response->json('path');

        $validated = $request->validate([
            'aanvraag' => 'required',
        ]);

        $dierfoto = Huisfoto::create([
            'path' => $path,
            'aanvraag_id' => $validated['aanvraag']->id,
        ]);
        $huisfoto->aanvraag()->sync('aanvraag_id');

        return redirect()->route('aanvraag.show', ['aanvraag' => $validated['aanvraag']]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
