<?php

namespace App\Http\Controllers;

use App\Models\Aanvraag;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        $huisdieren = $user->huisdiers;

        if($user->role == "admin") {

            $huisdieren = array();

            $aanvragen = Aanvraag::where('antwoord', -1)
                ->with(['huisfotos', 'oppastijds.huisdier', 'oppasser'])
                ->get();

            $aangeboden = array();

            $afspraken = Aanvraag::where('antwoord', 1)
                ->with(['huisfotos', 'oppastijds.huisdier', 'oppasser'])
                ->get();

            $afgewezen = Aanvraag::where('antwoord', 0)
                ->with(['huisfotos', 'oppastijds.huisdier', 'oppasser'])
                ->get();

            $reviews = array();

            $gebruikers = User::where('role', "normal")
                ->get();

            $blocked = User::where('role', "blocked")
                ->get();

        } else {

            $huisdieren = $user->huisdiers;

            $aanvragen = Aanvraag::whereHas('oppastijds.huisdier', function ($query) use ($user) {
                $query->where('baasje_id', $user->id)
                      ->where('antwoord', -1);
            })->with(['huisfotos', 'oppastijds.huisdier', 'oppasser'])
              ->get();

            $aangeboden = Aanvraag::whereHas('oppastijds.huisdier', function($query) use ($user) {
                $query->where('oppasser_id', $user->id);
            })->with(['oppastijds.huisdier'])
              ->get();

            $afspraken = Aanvraag::where(function($query) use ($user) {
                $query->whereHas('oppastijds.huisdier', function($subQuery) use ($user) {
                    $subQuery->where('baasje_id', $user->id);
                })->orWhere('oppasser_id', $user->id);
            })->where('antwoord', 1)
              ->with(['huisfotos', 'oppastijds.huisdier', 'oppasser'])
              ->get();

            $afgewezen = Aanvraag::whereHas('oppastijds.huisdier', function ($query) use ($user) {
                $query->where('baasje_id', $user->id)
                      ->where('antwoord', 0);
            })->with(['huisfotos', 'oppastijds.huisdier', 'oppasser'])
              ->get();

            $reviews = $user->reviewsGot;

            $gebruikers = array();

            $blocked = array();

        }

        return view('dashboard', compact('user', 'huisdieren', 'aanvragen', 'aangeboden', 'afspraken', 'afgewezen', 'reviews'));
    }
}
