<?php

namespace App\Http\Controllers\Auth;

use App\Country;
use App\Elenco;
use App\Helpers\Helpers;
use App\State;
use App\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectTo = route('inscriptions.index');
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $age = Helpers::ageFromBirthdayString($data['birthday']);

        // TODO: tomar los valores de $min_age y $max_age desde la DB
        $min_age = 25;
        $max_age = 32;

        $validator = Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'document' => 'required|max:255',
            'birthday' => 'required|max:255',
            'country' => 'required|max:255',
            'state' => 'required|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'elenco' => 'required',
            'other' => 'required_if:state,99',
        ]);


        $validator->after(function ($validator) use($age, $min_age, $max_age) {
            if (!(($min_age <= $age) && ($age <= $max_age))) {
                $validator->errors()->add('birthday', 'No cumplís con la edad necesaria para inscribirte!');
            }
        });

        return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'document' => $data['document'],
            'age' => Helpers::ageFromBirthdayString($data['birthday']),
            'birthday' => Carbon::createFromFormat('d/m/Y',$data['birthday']),
            'country_id' => $data['country'],
            'state_id' => $data['state'],
            'elenco' => $data['elenco'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'other_state' => $data['other'],
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $elencos = Elenco::all()->pluck('name', 'id')->toArray();
        $countries = Country::all()->pluck('name', 'id')->toArray();
        $states = State::all()->pluck('name', 'id')->toArray();

        return view('auth.register', compact('countries', 'states', 'elencos'));
    }
}
