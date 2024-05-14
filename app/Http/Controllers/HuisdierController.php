<?php

namespace App\Http\Controllers;

use App\Models\Huisdier;
use Illuminate\Http\Request;

class HuisdierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $huisdiers = Huisdier::with([
            'dierfotos' => function($query) {
                $query->take(1);
            }, 'oppastijds'])->get();
        return view('pet-overview', compact('huisdiers'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(huisdier $huisdier)
    {
        $huisdier = Huisdier::with(['dierfotos', 'oppastijds'])->get();
        return view('pet-profile', compact('huisdier'));
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
