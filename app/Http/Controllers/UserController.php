<?php

namespace App\Http\Controllers;

use App\Models\Aanvraag;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();

        $huisdieren = $user->huisdiers;

        $aanvragen = Aanvraag::whereHas('oppastijds.huisdier', function ($query) use ($user) {
            $query->where('baasje_id', $user->id)
                  ->where('antwoord', -1);
        })->with(['huisfotos', 'oppastijds.huisdier', 'oppasser'])->get();

        $afspraken = Aanvraag::where(function($query) use ($user) {
            $query->whereHas('oppastijds.huisdier', function($subQuery) use ($user) {
                $subQuery->where('baasje_id', $user->id);
            })->orWhere('oppasser_id', $user->id);
        })->where('antwoord', 1)
          ->with(['huisfotos', 'oppastijds.huisdier', 'oppasser'])
          ->get();

        $aangeboden = Aanvraag::whereHas('oppastijds.huisdier', function($query) use ($user) {
            $query->where('oppasser_id', $user->id);
        })->with(['oppastijds.huisdier'])->get();

        $reviews = $user->reviewsGot;

        return view('dashboard', compact('user', 'huisdieren', 'aanvragen', 'afspraken', 'aangeboden', 'reviews'));
    }
}
