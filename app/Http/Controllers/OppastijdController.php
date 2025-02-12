<?php

namespace App\Http\Controllers;

use App\Models\Oppastijd;
use Illuminate\Http\Request;

class OppastijdController extends Controller
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
        $validated = $request->validate([
            'huisdier_id' => 'required|exists:huisdiers,id',
            'datum' => 'required|date',
            'start' => 'required',
            'eind' => 'required'
        ]);

        $oppastijd = Oppastijd::create([
            'huisdier_id' => $validated['huisdier_id'],
            'datum' => $validated['datum'],
            'start' => $validated['start'],
            'eind' => $validated['eind'],
        ]);

        //redirect
        return redirect()->route('huisdier.show', ['huisdier' => $oppastijd->huisdier]);
    }

    /**
     * Display the specified resource.
     */
    public function show(oppastijd $oppastijd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(oppastijd $oppastijd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, oppastijd $oppastijd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(oppastijd $oppastijd)
    {
        $oppastijd->delete();

        return redirect()->route('huisdier.show', ['huisdier' => $oppastijd->huisdier]);
    }
}
