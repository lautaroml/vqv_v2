<?php

namespace App\Http\Controllers;

use App\Elenco;
use App\ElencoForm;
use App\Settings;
use Illuminate\Http\Request;

class ElencoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin')->except(['formShow', 'formRegister', 'dropVideo', 'dropImage']);
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

    public function formShow()
    {
        return view('elencos.index');
    }

    public function formRegister(Request $request)
    {
        $validatedData = $request->validate([
            'group_name' => 'required',
            'location' => 'required',
            'group_history' => 'required',
            'sinopsis' => 'required',
            'ficha_de_inscripcion' => 'required',
            'obra_title' => 'required',
            'obra_duration' => 'required',
            'sinopsis_2' => 'required',
            'director' => 'required',
            'autor' => 'required',
            'video_duration' => 'required',
            'video_link' => 'required',
            'photos_link' => 'required',
            'planta_de_luces' => 'required',
            'sonido' => 'required',
            'proyector' => 'required'
        ]);

        $elenco_form = new ElencoForm();

        $path = 'storage/' . $request->ficha_de_inscripcion->store('fichas_de_inscripcion');

        $elenco_form->group_name = $request->get('group_name');
        $elenco_form->location  = $request->get('location');
        $elenco_form->group_history = $request->get('group_history');
        $elenco_form->sinopsis = $request->get('sinopsis');
        $elenco_form->ficha_de_inscripcion = $path;
        $elenco_form->obra_title = $request->get('obra_title');
        $elenco_form->obra_duration = $request->get('obra_duration');
        $elenco_form->sinopsis_2 = $request->get('sinopsis_2');
        $elenco_form->director = $request->get('director');
        $elenco_form->autor = $request->get('autor');
        $elenco_form->video_duration = $request->get('video_duration');
        $elenco_form->video_link = $request->get('video_link');
        $elenco_form->photos_link = $request->get('photos_link');
        $elenco_form->planta_de_luces = $request->get('planta_de_luces');
        $elenco_form->sonido = $request->get('sonido');
        $elenco_form->proyector = $request->get('proyector');

        $elenco_form->save();

        return redirect()->route('elencos.inscripcion.finish');
    }

    public function formView()
    {
        $elencos_form = ElencoForm::paginate(15);

        return view('elencos.show', compact('elencos_form'));
    }

    public function dropImage(Request $request)
    {
        $path = 'storage/' . $request->file_i->store('image');
        return response()->json(['message' => 'faa'], 200);
    }

    public function dropVideo(Request $request)
    {
        $extension = $request->file_v->extension();
        $path = 'storage/' . $request->file_v->storeAs('videos', '_'.time() . '.' .$extension);
        return response()->json(['message' => 'faa'], 200);
    }
}
