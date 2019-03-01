<?php

namespace App\Http\Controllers;

use App\Elenco;
use App\ElencoForm;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ElencoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin',['except' => ['formShow', 'formRegister', 'formEdit', 'formUpdate']]);
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

    public function formEdit()
    {
        $elenco = ElencoForm::where('user_id', auth()->user()->id)->first();
        return view('elencos.edit', compact('elenco'));
    }


    public function formRegister(Request $request)
    {
        $validatedData = $request->validate([
            'group_name' => 'required',
            'location' => 'required',
            'group_history' => 'required',
            'sinopsis_2' => 'required',
            "adulto_responsable" => 'required',
            "adulto_responsable_dni" => 'required',
            "adulto_responsable_relacion" => 'required',
            "adulto_responsable_telefono" => 'required',
            "adulto_responsable_email" => 'required',

            /*'ficha_de_inscripcion' => 'required',
            'obra_title' => 'required',
            'obra_duration' => 'required',
            'director' => 'required',
            'autor' => 'required',
            'video_duration' => 'required',
            'video_link' => 'required',
            'photos_link' => 'required',
            'planta_de_luces' => 'required',
            'sonido' => 'required',
            'proyector' => 'required',
            "otros_requerimientos" => 'required',
            "lo_que_mas_me_gusta" => 'required',
            "momento_especial" => 'required',
            "como_se_enteraron" => 'required',
            "estrategia_de_viaje" => 'required',
            "bases" => 'required'*/
        ]);


        $elenco_form = new ElencoForm();

        $path = '';
        if ($request->ficha_de_inscripcion) {
            $file_name = str_slug(time() . $request->ficha_de_inscripcion->getClientOriginalName());
            $file_extension = $request->ficha_de_inscripcion->getClientOriginalExtension();
            $file = $file_name . '.' . $file_extension;
            $path = 'storage/' . $request->ficha_de_inscripcion->storeAs('fichas_de_inscripcion', $file);
        }

        $elenco_form->group_name = $request->get('group_name');
        $elenco_form->location  = $request->get('location');
        $elenco_form->group_history = $request->get('group_history');
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

        $elenco_form->otros_requerimientos = $request->get('otros_requerimientos');
        $elenco_form->adulto_responsable = $request->get('adulto_responsable');
        $elenco_form->adulto_responsable_dni = $request->get('adulto_responsable_dni');
        $elenco_form->adulto_responsable_relacion = $request->get('adulto_responsable_relacion');
        $elenco_form->adulto_responsable_telefono = $request->get('adulto_responsable_telefono');
        $elenco_form->adulto_responsable_email = $request->get('adulto_responsable_email');
        $elenco_form->lo_que_mas_me_gusta = $request->get('lo_que_mas_me_gusta');
        $elenco_form->momento_especial = $request->get('momento_especial');
        $elenco_form->como_se_enteraron = $request->get('como_se_enteraron');
        $elenco_form->estrategia_de_viaje = $request->get('estrategia_de_viaje');
        $elenco_form->bases = $request->get('bases');
        $elenco_form->user_id = auth()->user()->id;

        $elenco_form->save();


        Mail::send('elenco_mail', [
            'group' => $request->get('group_name'),
            'user' => auth()->user()
        ], function ($message) {
            $message->subject('Confirmación de inscripción de elenco');
            $message->from('vqvinscripciones@gmail.com', 'Vamos que venimos');
            $message->to(auth()->user()->email);
        });

        return redirect('/')->with([
            'message_success' => 'Te llegará un e-mail con la confirmación de la inscripción. (Si no lo ves en unos minutos, fijate que no este como SPAM)'
        ]);
    }

    public function formView()
    {
        $elencos_form = ElencoForm::paginate(15);

        return view('elencos.show', compact('elencos_form'));
    }

    public function formUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'group_name' => 'required',
            'location' => 'required',
            'group_history' => 'required',
            'sinopsis_2' => 'required',
            "adulto_responsable" => 'required',
            "adulto_responsable_dni" => 'required',
            "adulto_responsable_relacion" => 'required',
            "adulto_responsable_telefono" => 'required',
            "adulto_responsable_email" => 'required',
        ]);

        $elenco_form = ElencoForm::find($id);


        $path = '';
        if ($request->ficha_de_inscripcion) {
            $file_name = str_slug(time() . $request->ficha_de_inscripcion->getClientOriginalName());
            $file_extension = $request->ficha_de_inscripcion->getClientOriginalExtension();
            $file = $file_name . '.' . $file_extension;
            $path = 'storage/' . $request->ficha_de_inscripcion->storeAs('fichas_de_inscripcion', $file);
            $elenco_form->ficha_de_inscripcion = $path;
        }

        $elenco_form->group_name = $request->get('group_name');
        $elenco_form->location  = $request->get('location');
        $elenco_form->group_history = $request->get('group_history');

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

        $elenco_form->otros_requerimientos = $request->get('otros_requerimientos');
        $elenco_form->adulto_responsable = $request->get('adulto_responsable');
        $elenco_form->adulto_responsable_dni = $request->get('adulto_responsable_dni');
        $elenco_form->adulto_responsable_relacion = $request->get('adulto_responsable_relacion');
        $elenco_form->adulto_responsable_telefono = $request->get('adulto_responsable_telefono');
        $elenco_form->adulto_responsable_email = $request->get('adulto_responsable_email');
        $elenco_form->lo_que_mas_me_gusta = $request->get('lo_que_mas_me_gusta');
        $elenco_form->momento_especial = $request->get('momento_especial');
        $elenco_form->como_se_enteraron = $request->get('como_se_enteraron');
        $elenco_form->estrategia_de_viaje = $request->get('estrategia_de_viaje');
        $elenco_form->bases = $request->get('bases');
        $elenco_form->user_id = auth()->user()->id;

        $elenco_form->save();

        return redirect('/')->with([
            'message_success' => 'Los cambios se guardaron correctamente!'
        ]);
    }
}
