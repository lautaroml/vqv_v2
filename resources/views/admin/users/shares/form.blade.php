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
            {!! Form::text('first_name', null, ['id' => 'first_name', 'class' => $errors->has('first_name') ? 'invalid' : '', 'required' => true]) !!}
            <label for="first_name" data-error="{{ $errors->has('first_name') ? $errors->first('first_name'): '' }}">Nombre *</label>
            @if ($errors->has('first_name'))
                <span class="helper-text" data-error="{{ $errors->first('first_name') }}"></span>
            @endif
        </div>
        <div class="input-field col s6">
            <i class="material-icons prefix">person</i>
            {!! Form::text('last_name', null, ['id' => 'last_name', 'class' => $errors->has('last_name') ? 'invalid' : '', 'required' => true]) !!}
            <label for="last_name" data-error="{{ $errors->has('last_name') ? $errors->first('last_name'): '' }}">Apellido *</label>
            @if ($errors->has('last_name'))
                <span class="helper-text" data-error="{{ $errors->first('last_name') }}"></span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6">
            <i class="material-icons prefix">account_box</i>
            {!! Form::text('document', null, ['id' => 'document', 'class' => $errors->has('document') ? 'invalid' : '', 'required' => true]) !!}
            <label for="document" data-error="{{ $errors->has('document') ? $errors->first('document'): '' }}">Documento (Sin puntos ni guiones) *</label>
            @if ($errors->has('document'))
                <span class="helper-text" data-error="{{ $errors->first('document') }}"></span>
            @endif
        </div>
        <div class="input-field col s6">
            <i class="material-icons prefix">cake</i>
            {!! Form::text('birthday', \Carbon\Carbon::parse($user->birthday)->format('m/d/Y'), ['id' => 'birthday', 'class' => $errors->has('birthday') ? 'invalid' : '', 'required' => true, 'pattern' => '^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$']) !!}
            <label for="birthday" data-error="{{ $errors->has('birthday') ? $errors->first('birthday'): '' }}">Fecha de nacimiento (dd/mm/aaaa) *</label>
            @if ($errors->has('birthday'))
                <span class="helper-text" data-error="{{ $errors->first('birthday') }}"></span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6">
            <i class="material-icons prefix">public</i>
            {!! Form::select('country',$countries, $user->country_id, ['required' => true, 'id' => 'country', 'placeholder' => 'Elija una opción']) !!}
            <label>País *</label>
            @if ($errors->has('country'))
                <span class="helper-text" data-error="{{ $errors->first('country') }}"></span>
            @endif
        </div>
        <div class="input-field col s6">

            <i class="material-icons prefix">location_city</i>
            {!! Form::select('state',$states, $user->state_id, ['required' => true, 'id' => 'state', 'placeholder' => 'Elija una opción']) !!}
            <label>Provincia *</label>
            @if ($errors->has('state'))
                <span class="helper-text" data-error="{{ $errors->first('state') }}"></span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6">
            <i class="material-icons prefix">mail</i>
            {!! Form::email('email', null, ['id' => 'email', 'class' => $errors->has('email') ? 'invalid' : '', 'required' => true]) !!}
            <label for="email" data-error="{{ $errors->has('email') ? $errors->first('email'): '' }}">E-Mail Address *</label>
            @if ($errors->has('email'))
                <span class="helper-text" data-error="{{ $errors->first('email') }}"></span>
            @endif
        </div>


        {{--TODO: Hacer la logica para el siguiente input--}}
        <div id="other_container" class="form-group{{ $errors->has('other') ? ' has-error' : '' }}" style="display: none">
            <div class="input-field col s6">
                <i class="material-icons prefix">location_city</i>
                {!! Form::text('other', null, ['id' => 'other', 'class' => $errors->has('other') ? 'invalid' : '', 'required' => true]) !!}
                <label for="other" data-error="{{ $errors->has('other') ? $errors->first('other'): '' }}">Escriba la provincia *</label>
                @if ($errors->has('other'))
                    <span class="helper-text" data-error="{{ $errors->first('other') }}"></span>
                @endif
            </div>
        </div>
    </div>
</div>