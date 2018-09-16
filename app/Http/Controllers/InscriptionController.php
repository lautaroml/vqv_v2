<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('inscription.index');
    }

    public function edit($id)
    {
        dd(1, $$id);
    }
    
    public function update(Request $request)
    {
        dd(1, $request);
    }

    public function create()
    {
        return view('admin.inscriptions.create');
    }
    
    public function store(Request $request)
    {
        dd(1, $request);
    }
}
