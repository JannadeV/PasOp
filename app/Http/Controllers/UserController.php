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
            $query->where('baasje_id', $user->id);
        })->with(['huisfotos', 'oppastijds.huisdier', 'oppasser'])->get();

        return view('dashboard', compact('huisdieren', 'aanvragen'));
    }
}
