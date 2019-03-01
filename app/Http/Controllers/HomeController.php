<?php

namespace App\Http\Controllers;

use App\ElencoForm;
use App\Inscription;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        $inscriptions = Inscription::where('status', 1)->get();

        $elenco = ElencoForm::where('user_id', auth()->user()->id)->first();

        return view('home', compact('inscriptions', 'elenco'));
    }
}
