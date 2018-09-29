<?php

namespace App\Http\Controllers;

use App\Inscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class InscriptionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inscriptions = Inscription::orderBy('created_at', 'DESC')->paginate(6);
        return view('admin.inscriptions.index', compact('inscriptions'));
    }

    public function edit(Inscription $inscription)
    {
        return view('admin.inscriptions.edit', compact('inscription'));
    }
    
    public function update(Request $request, Inscription $inscription)
    {
        $inscription->title = $request->get('title');
        $inscription->slug = str_slug($request->get('title'), '-');
        $inscription->description = $request->get('description');
        $inscription->min_age = $request->get('min_age');
        $inscription->max_age = $request->get('max_age');
        $inscription->max_subscriptions = $request->get('max_subscriptions');
        //$inscription->available_from = $request->get('available_from');
        //$inscription->available_to = $request->get('available_to');
        $inscription->disponibility = $request->get('disponibility');

        $inscription->save();

        return redirect()->route('inscriptions.index');
    }

    public function create()
    {
        return view('admin.inscriptions.create');
    }
    
    public function store(Request $request)
    {
        //'email' => 'unique:users,email_address'

        $validatedData = $request->validate([
            'title' => 'required|max:255|unique:inscriptions,title',
        ]);

        $inscription = new Inscription();

        $inscription->title = $request->get('title');
        $inscription->slug = str_slug($request->get('title'), '-');
        $inscription->description = $request->get('description');
        $inscription->min_age = $request->get('min_age');
        $inscription->max_age = $request->get('max_age');
        $inscription->max_subscriptions = $request->get('max_subscriptions');
        //$inscription->available_from = $request->get('available_from');
        //$inscription->available_to = $request->get('available_to');
        $inscription->disponibility = $request->get('disponibility');

        $inscription->save();

        return redirect()->route('inscriptions.index');
    }

    public function toggleInscription(Inscription $inscription)
    {
        $inscription->status = !$inscription->status;
        $inscription->save();
        return redirect()->back();
    }

    public function destroy(Inscription $inscription)
    {
        $inscription->delete();

        return redirect()->route('inscriptions.index')->with([
            'message_success' => 'Se ha eliminado la Inscripción, correctamente!'
        ]);
    }
}
