@extends('layouts.app')
@section('title', 'Registro')

@section('css')
    <style>
        .card {
            margin-top: 40px;
        }
    </style>
@endsection

@section('content')
{{--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>--}}
<div class="container">
    <div class="row">
        <div class="card">
            <form  method="POST" action="{{ route('register') }}">
                <div class="card-content">
                    {{ csrf_field() }}
                    <span class="card-title">Register</span>
                    <hr>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">person</i>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" class="{{ $errors->has('name') ? 'invalid' : '' }}" required autofocus>
                            <label for="name" data-error="{{ $errors->has('name') ? $errors->first('name'): '' }}">Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">mail</i>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" class="{{ $errors->has('email') ? 'invalid' : '' }}" required autofocus>
                            <label for="email" data-error="{{ $errors->has('email') ? $errors->first('email'): '' }}">E-Mail Address</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">lock</i>
                            <input id="password" type="password" name="password" class="{{ $errors->has('password') ? 'invalid' : '' }}" required>
                            <label for="password" data-error="{{ $errors->has('password') ? $errors->first('password'): '' }}">Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">lock</i>
                            <input id="password-confirm" type="password" name="password_confirmation" required>
                            <label for="password-confirm">Confirm Password</label>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Register
                        <i class="material-icons right">create</i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
