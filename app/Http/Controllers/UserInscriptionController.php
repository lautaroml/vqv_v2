<?php

namespace App\Http\Controllers;

use App\Inscription;
use App\Taller;
use Carbon\Carbon;

class UserInscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($inscription_slug)
    {
        $inscription = Inscription::where('slug', $inscription_slug)->first();

        $user_age = Carbon::parse(auth()->user()->birthday)->age;




        if ($inscription->min_age <= $user_age && $user_age <= $inscription->max_age) {
            return view('users.inscription.index', compact('inscription'));
        }

        return redirect()->back()->with([
            'message_error' => 'No contas con la edad necesaria para anotarte a esta inscripción!'
        ]);


    }

    public function subscribe(Taller $taller)
    {
        $subscription_limit = $taller->inscription->max_subscriptions;
        if (auth()->user()->inscriptions->where('id', $taller->inscription->id)->count() >= $subscription_limit) {
            return redirect()->back()->with([
                'message_error' => 'No podes inscribirte a más de '. $subscription_limit .' Talleres'
            ]);
        }


        $disponibility_taken = auth()->user()->tallers->where('inscription_id', $taller->inscription->id)->pluck('disponibility')->toArray();
        if (in_array($taller->disponibility, $disponibility_taken)) {
            return redirect()->back()->with([
                'message_error' => 'El taller: ' . $taller->name . ' se superpone con otro Taller que ya estas inscripto'
            ]);
        }
        

        if ($taller->users->count() < $taller->cupo) {
            $user = auth()->user();
            $taller->users()->syncWithoutDetaching([
                    $user->id => [
                        'inscription_id' => $taller->inscription->id
                    ]
            ]);

            //SendEmail::dispatch($user->id, $taller->id);

            return redirect()->back()->with([
                'message_success' => 'Te llegará un e-mail con la confirmación de la inscripción. (Si no lo ves en unos minutos, fijate que no este como SPAM)'
            ]);
        }

        return redirect()->back()->with([
            'message_error' => 'El Taller: ' .$taller->name . ' no tiene mas cupo'
        ]);
    }

    public function destroy(Taller $taller)
    {
        $user = auth()->user();
        $taller->users()->detach([$user->id]);
        return redirect()->back()->with([
            'message_success' => 'Has eliminado tu inscripción!'
        ]);
    }
}
