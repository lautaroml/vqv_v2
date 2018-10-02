<?php

namespace App\Http\Controllers;

use App\Country;
use App\Elenco;
use App\Settings;
use App\State;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
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
    public function index()
    {
        $users = User::paginate(30);
        return view('admin.users.index', compact('users'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $elencos = Elenco::all()->pluck('name', 'id')->toArray();
        $countries = Country::all()->pluck('name', 'id')->toArray();
        $states = State::all()->pluck('name', 'id')->toArray();
        $states[99] = 'Otro';
        $edicion = '';
        if ( Settings::where('key', 'edicion')->first() )
        {
            $edicion = Settings::where('key', 'edicion')->first()->val;
        }
        return view('admin.users.edit', compact('user', 'countries', 'states', 'elencos', 'edicion'));
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
        $user = User::find($id);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->document = $request->document;
        $user->birthday = Carbon::createFromFormat('d/m/Y',$request->birthday);
        $user->country_id = $request->country;
        $user->state_id = $request->state;
        $user->email = $request->email;
        $user->other_state = $request->other;
        $user->type = $request->type;
        $user->save();

        return redirect()->back()->with([
            'message_success' => 'Usuario editado correctamente!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users.index')->with([
            'message_success' => 'Usuario eliminado correctamente!'
        ]);
    }
}
