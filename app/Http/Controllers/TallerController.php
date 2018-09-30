<?php

namespace App\Http\Controllers;

use App\Inscription;
use App\Taller;
use Illuminate\Http\Request;

class TallerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $inscription = Inscription::find($request->inscription_id);
        return view('admin.tallers.index', compact('inscription'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $inscription = Inscription::find($request->inscription_id);

        $disponibility = array_map('trim', explode(',', $inscription->disponibility));
        $disponibility = array_fill_keys($disponibility, null);
        return view('admin.tallers.create', compact('inscription', 'disponibility'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $taller = new Taller();
        $taller->name = $request->name;
        $taller->professor = $request->professor;
        $taller->cupo = $request->cupo;
        $taller->disponibility = $request->disponibility;
        $taller->inscription_id = $request->inscription_id;
        $taller->save();

        return redirect()->route('tallers.index', ['inscription_id' => $request->inscription_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Taller  $taller
     * @return \Illuminate\Http\Response
     */
    public function show(Taller $taller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Taller  $taller
     * @return \Illuminate\Http\Response
     */
    public function edit(Taller $taller)
    {
        $disponibility = array_map('trim', explode(',', $taller->inscription->disponibility));
        $disponibility = array_fill_keys($disponibility, null);

        return view('admin.tallers.edit', compact('taller', 'disponibility'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Taller  $taller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Taller $taller)
    {
        $taller->name = $request->name;
        $taller->professor = $request->professor;
        $taller->cupo = $request->cupo;
        $taller->disponibility = $request->disponibility;
        $taller->save();

        return redirect()->route('tallers.index', ['inscription_id' => $taller->inscription->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Taller  $taller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taller $taller)
    {
        $inscription_id = $taller->inscription->id;

        $taller->delete();

        return redirect()->route('tallers.index', ['inscription_id' => $inscription_id])->with([
            'message_success' => 'Se ha eliminado el Taller, correctamente!'
        ]);
    }
}