@extends('layouts.app')
@section('title', 'Login')

@section('css')
    <style>
        .card {
            margin-top: 40px;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <form  method="POST" action="{{ route('login') }}">
                <div class="card-content">
                    {{ csrf_field() }}
                    <span class="card-title">Login</span>
                    <hr>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">mail</i>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" class="{{ $errors->has('email') ? 'invalid' : '' }}" required autofocus>
                            <label for="email" data-error="{{ $errors->has('email') ? $errors->first('email'): '' }}">E-Mail</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">lock</i>
                            <input id="password" type="password" name="password" class="{{ $errors->has('password') ? 'invalid' : '' }}" required>
                            <label for="password" data-error="{{ $errors->has('password') ? $errors->first('password'): '' }}">Contraseña</label>
                        </div>
                    </div>
                    <p>
                        <label for="remember">
                            <input type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span>Recordarme</span>
                        </label>
                    </p>
                </div>
                <div class="card-action">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Login
                        <i class="material-icons right">lock_open</i>
                    </button>
                    <a class="waves-effect waves-light btn" href="{{ route('password.request') }}">No recuerdas tu contraseña?<i class="material-icons right">message</i></a>
                </div>
                <input type="hidden" name="inscription" value="{{ app('request')->input('i') }}">
            </form>
        </div>
    </div>
</div>
@endsection
