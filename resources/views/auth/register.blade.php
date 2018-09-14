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
<div class="container">
    <div class="row">
        <div class="card">
            <form  method="POST" action="{{ route('register') }}">
                <div class="card-content">
                    {{ csrf_field() }}
                    <span class="card-title">
                        Registro
                        <span class="right"><small>* (campos obligatorios)</small></span>
                    </span>
                    <hr>
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">person</i>
                            <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}" class="{{ $errors->has('first_name') ? 'invalid' : '' }}" >
                            <label for="first_name" data-error="{{ $errors->has('first_name') ? $errors->first('first_name'): '' }}">Nombre *</label>
                            @if ($errors->has('first_name'))
                                <span class="helper-text" data-error="{{ $errors->first('first_name') }}"></span>
                            @endif
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">person</i>
                            <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}" class="{{ $errors->has('last_name') ? 'invalid' : '' }}" required>
                            <label for="last_name" data-error="{{ $errors->has('last_name') ? $errors->first('last_name'): '' }}">Apellido *</label>
                            @if ($errors->has('last_name'))
                                <span class="helper-text" data-error="{{ $errors->first('last_name') }}"></span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">account_box</i>
                            <input id="document" type="text" name="document" value="{{ old('document') }}" class="{{ $errors->has('document') ? 'invalid' : '' }}" required>
                            <label for="document" data-error="{{ $errors->has('document') ? $errors->first('document'): '' }}">Documento (Sin puntos ni guiones) *</label>
                            @if ($errors->has('document'))
                                <span class="helper-text" data-error="{{ $errors->first('document') }}"></span>
                            @endif
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">cake</i>
                            <input id="birthday" type="text" name="birthday" value="{{ old('birthday') }}" class="{{ $errors->has('birthday') ? 'invalid' : '' }}" required pattern="^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$">
                            <label for="birthday" data-error="{{ $errors->has('birthday') ? $errors->first('birthday'): '' }}">Fecha de nacimiento (dd/mm/aaaa) *</label>
                            @if ($errors->has('birthday'))
                                <span class="helper-text" data-error="{{ $errors->first('birthday') }}"></span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">public</i>
                            <select required name="country" id="country" value="{{ old('country') }}">
                                <option value="" disabled selected>Elija una opción</option>
                                <option value="">Elija una opción</option>
                                @foreach($countries as $id => $name)
                                    <option value="{{ $id }}" {{ ( old('country')  == $id ? "selected":"") }}>{{ $name }}</option>
                                @endforeach
                            </select>
                            <label>País *</label>
                            @if ($errors->has('country'))
                                <span class="helper-text" data-error="{{ $errors->first('country') }}"></span>
                            @endif
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">location_city</i>
                            <select required name="state" id="state" value="{{ old('state') }}">
                                <option value="" disabled selected>Elija una opción</option>
                                @foreach($states as $id => $name)
                                    <option value="{{ $id }}" {{ ( old('state')  == $id ? "selected":"") }}>{{ $name }}</option>
                                @endforeach
                                <option value="99" {{ ( old('state')  == '99' ? "selected":"") }}>Otro</option>
                            </select>
                            <label>Provincia *</label>
                            @if ($errors->has('state'))
                                <span class="helper-text" data-error="{{ $errors->first('state') }}"></span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">mail</i>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" class="{{ $errors->has('email') ? 'invalid' : '' }}" required>
                            <label for="email" data-error="{{ $errors->has('email') ? $errors->first('email'): '' }}">E-Mail Address *</label>
                            @if ($errors->has('email'))
                                <span class="helper-text" data-error="{{ $errors->first('email') }}"></span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">lock</i>
                            <input id="password" type="password" name="password" class="{{ $errors->has('password') ? 'invalid' : '' }}" required>
                            <label for="password" data-error="{{ $errors->has('password') ? $errors->first('password'): '' }}">Contraseña *</label>
                            @if ($errors->has('password'))
                                <span class="helper-text" data-error="{{ $errors->first('password') }}"></span>
                            @endif
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">lock</i>
                            <input id="password-confirm" type="password" name="password_confirmation" required>
                            <label for="password-confirm">Confirmar contraseña *</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">arrow_forward</i>
                            <select required name="elenco" id="elenco" value="{{ old('elenco') }}">
                                <option value="" disabled selected>Elija una opción</option>
                                <option value="0">No</option>
                                <optgroup label="Si. ¿Cual?">
                                    @foreach($elencos as $id => $name)
                                        <option value="{{ $id }}" {{ ( old('elenco')  == $id ? "selected":"") }}>{{ $name }}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                            <label>¿Pertenece a un elenco que forma parte de este 9na Edición de VQV? *</label>
                            @if ($errors->has('elenco'))
                                <span class="helper-text" data-error="{{ $errors->first('elenco') }}"></span>
                            @endif
                        </div>
                    </div>

                    {{--TODO: Hacer la logica para el siguiente input--}}
                    <div id="other_container" class="form-group{{ $errors->has('other') ? ' has-error' : '' }}" style="display: none">
                        <label for="other" class="col-md-4 control-label">Escriba cual</label>
                        <div class="col-md-6">
                            <input id="other" value="{{ old('other') }}" type="text" class="form-control" name="other" value="{{ old('other') }}" >
                            @if ($errors->has('other'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('other') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="card-action">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Confirmar
                        <i class="material-icons right">create</i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>
@endsection