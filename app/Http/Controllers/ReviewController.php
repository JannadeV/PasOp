<?php

namespace App\Http\Controllers;

use App\Models\review;
use Illuminate\Http\Request;

class ReviewController extends Controller
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
            'rating' => 'required|integer',
            'oppasser_id' => 'required|exists:users,id',
            'aanvraag_id' => 'required|exists:aanvraags,id'
        ]);

        $review = Review::create([
            'rating' => $validated['rating'],
            'oppasser_id' => $validated['oppasser_id'],
            'aanvraag_id' => $validated['aanvraag_id'],
            'baasje_id' => auth()->id(),
        ]);

        return redirect()->route('aanvraag.show', ['aanvraag' => $validated['aanvraag_id']]);
    }

    /**
     * Display the specified resource.
     */
    public function show(review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(review $review)
    {
        //
    }
}
