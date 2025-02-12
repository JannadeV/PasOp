<?php

namespace App\Http\Controllers;

use App\Models\Huisdier;
use Illuminate\Http\Request;

class HuisdierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Huisdier::with([
            'dierfotos' => function($query) {
                $query->take(1);
            },
            'oppastijds' => function($query) {
                $query->orderBy('datum')
                      ->orderBy('start');
            }
        ]);

        if ($request->filled('soort')) {
            $query->whereIn('soort', $request->soort);
        }

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('naam', 'like', '%' . $request->search . '%')
                  ->orWhere('soort', 'like', '%' . $request->search . '%');
            });
        }

        $huisdiers = $query->get();

        return view('pet-overview', compact('huisdiers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create-pet');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'soort' => 'required|string'
        ]);

        $huisdier = Huisdier::create([
            'naam' => $validated['name'],
            'soort' => $validated['soort'],
            'baasje_id' => auth()->id()
        ]);

        //redirect
        return redirect()->route('huisdier.show', ['huisdier' => $huisdier]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $user = auth()->user();
        $huisdier = Huisdier::with([
            'dierfotos',
            'oppastijds' => function($query) {
                $query->orderBy('datum')->orderBy('start');
            }])->find($id);
        return view('pet-profile', compact('huisdier', 'user'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(huisdier $huisdier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, huisdier $huisdier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(huisdier $huisdier)
    {
        //
    }
}
