<?php

namespace App\Http\Controllers;

use App\Country;
use App\Elenco;
use App\Inscription;
use App\State;
use App\Taller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ResultController extends Controller
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
        return view('admin.results.index', compact('inscription'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuarios = User::all();

        foreach ($usuarios as $usuario) {
            $usuario->first_name = ucwords($usuario->first_name);
            $usuario->last_name = ucwords($usuario->last_name);
            $usuario->save();
        }

        $taller = Taller::find($id);
        $inscription = $taller->inscription;

        return view('admin.results.show', compact('taller', 'inscription'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function download($id)
    {
        if (auth()->user()->type === 1) {

            $taller =Taller::find($id);

            $usuarios = User::all();

            foreach ($usuarios as $usuario) {
                $usuario->first_name = ucwords($usuario->first_name);
                $usuario->last_name = ucwords($usuario->last_name);
                $usuario->save();
            }

            $response = new \Symfony\Component\HttpFoundation\StreamedResponse(function() use($taller){

                $handle = fopen('php://output', 'w');

                fputcsv($handle, [
                    'Apellido',
                    'Nombre',
                    'Documento',
                    'Email',
                    'Edad',
                    'Nacimiento',
                    'País',
                    'Provincia',
                    'Elenco'
                ], ',', '"');

                foreach ($taller->users->sortBy('last_name') as $user) {

                    $state = '';
                    if($user->state_id != 99) {
                        $state = State::find($user->state_id)->name;
                    } else {
                        $state = $user->other_state;
                    }

                    $elenco = '';
                    if ($user->elenco) {
                        $elenco = Elenco::find($user->elenco)->name;
                    }


                    $row = [
                        $user->last_name,
                        $user->first_name,
                        $user->document,
                        $user->email,
                        Carbon::parse($user->birthday)->age,
                        Carbon::parse($user->birthday)->format('m/d/Y'),
                        Country::find($user->country_id)->name,
                        $state,
                        $elenco
                    ];
                    fputcsv($handle, $row, ',', '"');
                }
                fclose($handle);
            }, 200, [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="'.  $taller->name. '_'. time() .'.csv"',
            ]);
            return $response;
        }
        return redirect()->route('home');
    }
}
