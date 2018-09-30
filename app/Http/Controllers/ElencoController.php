<?php

namespace App\Http\Controllers;

use App\Elenco;
use App\Settings;
use Illuminate\Http\Request;

class ElencoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $elencos = Elenco::all();

        return view('admin.elencos.index', compact('elencos'));
    }

    public function edit(Elenco $elenco)
    {
        return view('admin.elencos.edit', compact('elenco'));
    }

    public function update(Request $request, Elenco $elenco)
    {
        $elenco->name = $request->name;
        $elenco->save();

        return redirect()->route('elencos.index')->with([
            'message_success' => 'Se ha modificado el Elenco, correctamente!'
        ]);
    }
    
    public function create()
    {
        return view('admin.elencos.create');
    }
    
    public function store(Request $request)
    {
        $elenco = new Elenco();
        $elenco->name = $request->name;
        $elenco->save();

        return redirect()->route('elencos.index')->with([
            'message_success' => 'Se ha creado el Elenco, correctamente!'
        ]);
    }

    public function destroy(Elenco $elenco)
    {
        $elenco->delete();

        return redirect()->route('elencos.index')->with([
            'message_success' => 'Se ha eliminado el Elenco, correctamente!'
        ]);
    }
    
    public function edition()
    {
        $settings = Settings::all();
        return view('admin.elencos.edition.index', compact('settings'));
    }

    public function editionStore(Request $request)
    {
        $settings = Settings::firstOrNew(
            ['key' => 'edicion']
        );

        $settings->val = $request->name;

        $settings->save();

        return redirect()->route('elencos.index')->with([
            'message_success' => 'Se ha cambiado la edición, correctamente!'
        ]);

    }
}
