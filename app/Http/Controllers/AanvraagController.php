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
        return Aanvraag::all();
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
        return redirect()->route('pet.show', ['id' => $huisdier->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $aanvraag = Aanvraag::with([
            'oppastijds' => function($query) {
                $query->orderBy('datum')->orderBy('start');
            }
        ])->find($id);
        return view('aanvraag', compact('aanvraag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aanvraag $aanvraag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aanvraag $aanvraag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aanvraag $aanvraag)
    {
        //
    }
}
