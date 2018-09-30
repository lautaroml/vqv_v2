<?php

namespace App\Http\Controllers;

use App\Inscription;
use App\Taller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

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

        if (auth()->user()->type === 1) {
            return view('users.inscription.index', compact('inscription'));
        }

        if($inscription->status === 0){
            return redirect('home')->with([
                'message_error' => 'Está inscripción ha finalizado!'
            ]);
        }

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
        foreach ($disponibility_taken as $value) {
                if (count(array_intersect(explode(',', $taller->disponibility), explode(',', $value)))) {
                    return redirect()->back()->with([
                        'message_error' => 'El taller: ' . $taller->name . ' se superpone con otro Taller que ya estas inscripto'
                    ]);
                }
        }

        if ($taller->users->count() < $taller->cupo) {
            $user = auth()->user();
            $taller->users()->syncWithoutDetaching([
                    $user->id => [
                        'inscription_id' => $taller->inscription->id
                    ]
            ]);

            Mail::send('inscription', [
                'taller' => $taller->name,
                'user' => $user
            ], function ($message)  use ($taller, $user) {
                $message->subject('Comprobante de inscripción al taller [' . $taller->name . ']');
                $message->from('vqvinscripciones@gmail.com', 'Vamos que venimos');
                $message->to($user->email);
            });

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
