<?php

namespace App\Http\Controllers;

use App\Models\Aanvraag;
use Illuminate\Http\Request;

class AanvraagController extends Controller
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
    public function create(int $huisdierId)
    {
        return redirect()->route('pet.show', ['id' => $huisdierId]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valideer de input
        $validated = $request->validate([
            'tijden' => 'required|array',
            'tijden.*.id' => 'required|exists:oppastijds,id',
            'tijden.*.selected' => 'nullable|boolean'
        ]);

        // Maak een nieuwe aanvraag
        $aanvraag = Aanvraag::create([
            'oppasser_id' => auth()->id(),
        ]);

        // Verzamel de geselecteerde oppastijd-IDs
        $selectedOppastijdIds = array_filter(array_column($validated['tijden'], 'id'), function($tijd) {
            return isset($tijd['selected']);
        });

        // Koppel de geselecteerde oppastijden aan de aanvraag
        $aanvraag->oppastijds()->sync($selectedOppastijdIds);

        // Redirect naar de volgende pagina met de aanvraag ID
        return redirect()->route('aanvragen.show', ['id' => $aanvraag->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(aanvraag $aanvraag)
    {


        return view('aanvraag');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(aanvraag $aanvraag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, aanvraag $aanvraag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(aanvraag $aanvraag)
    {
        //
    }
}
