<?php

namespace App\Http\Controllers;

use App\Inscription;
use App\Taller;

class UserInscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($inscription_slug)
    {
        $inscription = Inscription::where('slug', $inscription_slug)->first();

        return view('users.inscription.index', compact('inscription'));
    }

    public function subscribe(Taller $taller)
    {
        if (auth()->user()->tallers->count() >= $taller->inscription->max_subscriptions) {
            return redirect()->back()->with([
                'message_error' => 'No podes inscribirte a más de dos Talleres'
            ]);
        }

        if (auth()->user()->tallers->count()) {
            $comp = $taller->compatibilities->pluck('external_taller_id')->toArray();
            if (! in_array(auth()->user()->tallers->first()->id, $comp)) {
                return redirect()->back()->with([
                    'message_error' => 'El taller: ' . $taller->name . ' no es compatible con: ' . auth()->user()->tallers->first()->name
                ]);
            }
        }

        if ($taller->users->count() < $taller->cupo) {
            $user = auth()->user();
            $taller->users()->attach([$user->id]);

            SendEmail::dispatch($user->id, $taller->id);

            return redirect()->back()->with([
                'message_success' => 'Quedaste inscripto en el Taller: ' .$taller->name . '<br>  Te llegará un e-mail con la confirmación de la inscripción. (Si no lo ves en unos minutos, fijate que no este como SPAM)'
            ]);
        }

        return redirect()->back()->with([
            'message_error' => 'El Taller: ' .$taller->name . ' no tiene mas cupo'
        ]);
    }
}
