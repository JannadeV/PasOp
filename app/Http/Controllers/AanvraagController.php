<?php

namespace App\Http\Controllers;

use App\Models\Aanvraag;
use App\Models\Huisdier;
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
    public function create(Huisdier $huisdier)
    {
        return redirect()->route('huisdier.show', ['huisdier' => $huisdier]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tijden' => 'required|array',
            'tijden.*.id' => 'required|exists:oppastijds,id',
            'tijden.*.selected' => 'nullable|boolean'
        ]);

        $aanvraag = Aanvraag::create([
            'oppasser_id' => auth()->id(),
        ]);

        $selectedOppastijdIds = array_column(array_filter($validated['tijden'], function($tijd) {
            return isset($tijd['selected']);
        }), 'id');
        $aanvraag->oppastijds()->sync($selectedOppastijdIds);

        return redirect()->route('aanvraag.show', ['aanvraag' => $aanvraag]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Aanvraag $aanvraag)
    {
        $user = auth()->user();

        if ($aanvraag) {
            return view('aanvraag', compact('aanvraag', 'user'));
        } else {
            return redirect()->route('aanvraag.index')->with('error', 'Aanvraag not found.');
        }
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
        $validated = $request->validate([
            'oppastijds' => 'sometimes|array',
            'oppastijds.*.id' => 'sometimes|exists:oppastijds,id',
            'oppasser' => 'sometimes|exists:users,id',
            'huisfotos' => 'sometimes|array',
            'huisfotos.*' => 'sometimes|image|mimes:jpeg,jpg,png,gif|max:2048',
            'huisfotos.*.id' => 'sometimes|exists:huisfotos,id',
            'antwoord' => 'sometimes|integer'
        ]);

        $aanvraag->update($validated);

        return redirect()->route('aanvraag.show', ['aanvraag' => $aanvraag]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aanvraag $aanvraag)
    {
        $aanvraag->delete();

        return redirect()->route('dashboard');
    }
}
