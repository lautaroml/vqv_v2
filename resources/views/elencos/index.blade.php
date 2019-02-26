@extends('layouts.app')
@section('title', 'Inscripción de Elencos')

@section('css')
    <style>
        .card {
            margin-top: 40px;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <span class="title">
                        <h2>Inscripción de Elencos</h2>
                    </span>
    <div class="row">
        <div class="card">
            <form  method="POST" action="{{ route('elencos.inscripcion.register') }}" enctype="multipart/form-data">
                <div class="card-content">
                    {{ csrf_field() }}
                    <span class="card-title">
                        Datos del grupo
                    </span>
                    <hr>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="group_name" type="text" name="group_name" value="{{ old('group_name') }}" class="{{ $errors->has('group_name') ? 'invalid' : '' }}" required>
                            <label for="group_name" data-error="{{ $errors->has('group_name') ? $errors->first('group_name'): '' }}">Nombre del Grupo</label>
                            @if ($errors->has('group_name'))
                                <span class="helper-text" data-error="{{ $errors->first('group_name') }}"></span>
                            @endif
                        </div>
                        <div class="input-field col s6">
                            <input id="location" type="text" name="location" value="{{ old('location') }}" class="{{ $errors->has('location') ? 'invalid' : '' }}" required>
                            <label for="location" data-error="{{ $errors->has('location') ? $errors->first('location'): '' }}">Localidad o Barrio</label>
                            @if ($errors->has('location'))
                                <span class="helper-text" data-error="{{ $errors->first('location') }}"></span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="group_history" class="materialize-textarea {{ $errors->has('group_history') ? 'invalid' : '' }}" name="group_history" required>{{ old('group_history') }}</textarea>
                            <label for="group_history" data-error="{{ $errors->has('group_history') ? $errors->first('group_history'): '' }}">Historia del Grupo (extendida)</label>
                            @if ($errors->has('group_history'))
                                <span class="helper-text" data-error="{{ $errors->first('group_history') }}"></span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Ficha de inscripción</span>
                                <input type="file" name="ficha_de_inscripcion" required>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate {{ $errors->has('ficha_de_inscripcion') ? 'invalid' : '' }}" type="text" placeholder="Hace click aqui para adjuntar tu ficha de inscripcion" data-error="{{ $errors->has('ficha_de_inscripcion') ? $errors->first('ficha_de_inscripcion'): '' }}">
                                @if ($errors->has('ficha_de_inscripcion'))
                                    <span class="helper-text" data-error="{{ $errors->first('ficha_de_inscripcion') }}"></span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <span class="card-title">
                        Datos de la Obra
                    </span>
                    <hr>

                    <div class="row">
                        <div class="input-field col s6">
                            <input id="obra_title" type="text" name="obra_title" value="{{ old('obra_title') }}" class="{{ $errors->has('obra_title') ? 'invalid' : '' }}" required>
                            <label for="obra_title" data-error="{{ $errors->has('obra_title') ? $errors->first('obra_title'): '' }}">Titulo de la Obra</label>
                            @if ($errors->has('obra_title'))
                                <span class="helper-text" data-error="{{ $errors->first('obra_title') }}"></span>
                            @endif
                        </div>
                        <div class="input-field col s6">
                            <input id="obra_duration" type="text" name="obra_duration" value="{{ old('obra_duration') }}" class="{{ $errors->has('obra_duration') ? 'invalid' : '' }}" required>
                            <label for="obra_duration" data-error="{{ $errors->has('obra_duration') ? $errors->first('obra_duration'): '' }}">Duración de la OBRA (máximo 75’)</label>
                            @if ($errors->has('obra_duration'))
                                <span class="helper-text" data-error="{{ $errors->first('obra_duration') }}"></span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="sinopsis_2" class="materialize-textarea {{ $errors->has('sinopsis_2') ? 'invalid' : '' }}" name="sinopsis_2" required>{{ old('sinopsis_2') }}</textarea>
                            <label for="sinopsis_2" data-error="{{ $errors->has('sinopsis_2') ? $errors->first('sinopsis_2'): '' }}">Sinopsis</label>
                            @if ($errors->has('sinopsis_2'))
                                <span class="helper-text" data-error="{{ $errors->first('sinopsis_2') }}"></span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="director" type="text" name="director" value="{{ old('director') }}" class="{{ $errors->has('director') ? 'invalid' : '' }}" required>
                            <label for="director" data-error="{{ $errors->has('director') ? $errors->first('director'): '' }}">Director: Incluir datos del director</label>
                            @if ($errors->has('director'))
                                <span class="helper-text" data-error="{{ $errors->first('director') }}"></span>
                            @endif
                        </div>
                        <div class="input-field col s6">
                            <input id="autor" type="text" name="autor" value="{{ old('autor') }}" class="{{ $errors->has('autor') ? 'invalid' : '' }}" required>
                            <label for="autor" data-error="{{ $errors->has('autor') ? $errors->first('autor'): '' }}">Autor: Incluir datos del autor</label>
                            @if ($errors->has('autor'))
                                <span class="helper-text" data-error="{{ $errors->first('autor') }}"></span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <a class="waves-effect waves-light  modal-trigger" href="#modal1">Para saber como subir tu video, haz click aquí</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="video_link" type="text" name="video_link" value="{{ old('video_link') }}" class="{{ $errors->has('video_link') ? 'invalid' : '' }}" required>
                            <label for="video_link" data-error="{{ $errors->has('video_link') ? $errors->first('video_link'): '' }}">Link del Video</label>
                            @if ($errors->has('video_link'))
                                <span class="helper-text" data-error="{{ $errors->first('video_link') }}"></span>
                            @endif
                        </div>
                        <div class="input-field col s6">
                            <input id="video_duration" type="text" name="video_duration" value="{{ old('video_duration') }}" class="{{ $errors->has('video_duration') ? 'invalid' : '' }}" required>
                            <label for="video_duration" data-error="{{ $errors->has('video_duration') ? $errors->first('video_duration'): '' }}">Duración del Video (mínimo 20’)</label>
                            @if ($errors->has('video_duration'))
                                <span class="helper-text" data-error="{{ $errors->first('video_duration') }}"></span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <a class="waves-effect waves-light  modal-trigger" href="#modal2">Para saber como subir tus fotos, haz click aquí</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="photos_link" type="text" name="photos_link" value="{{ old('photos_link') }}" class="{{ $errors->has('photos_link') ? 'invalid' : '' }}" required>
                            <label for="photos_link" data-error="{{ $errors->has('photos_link') ? $errors->first('photos_link'): '' }}">Link de las Fotos</label>
                            @if ($errors->has('photos_link'))
                                <span class="helper-text" data-error="{{ $errors->first('photos_link') }}"></span>
                            @endif
                        </div>
                    </div>

                    <span class="card-title">
                        Necesidades Técnicas
                    </span>
                    <hr>

                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="planta_de_luces" class="materialize-textarea {{ $errors->has('planta_de_luces') ? 'invalid' : '' }}" name="planta_de_luces" required>{{ old('planta_de_luces') }}</textarea>
                            <label for="planta_de_luces" data-error="{{ $errors->has('planta_de_luces') ? $errors->first('planta_de_luces'): '' }}">Planta de luces</label>
                            @if ($errors->has('planta_de_luces'))
                                <span class="helper-text" data-error="{{ $errors->first('planta_de_luces') }}"></span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="sonido" class="materialize-textarea {{ $errors->has('sonido') ? 'invalid' : '' }}" name="sonido" required>{{ old('sonido') }}</textarea>
                            <label for="sonido" data-error="{{ $errors->has('sonido') ? $errors->first('sonido'): '' }}">Sonido</label>
                            @if ($errors->has('sonido'))
                                <span class="helper-text" data-error="{{ $errors->first('sonido') }}"></span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="proyector" class="materialize-textarea {{ $errors->has('proyector') ? 'invalid' : '' }}" name="proyector" required>{{ old('proyector') }}</textarea>
                            <label for="proyector" data-error="{{ $errors->has('proyector') ? $errors->first('proyector'): '' }}">Proyector</label>
                            @if ($errors->has('proyector'))
                                <span class="helper-text" data-error="{{ $errors->first('proyector') }}"></span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="otros_requerimientos" class="materialize-textarea {{ $errors->has('otros_requerimientos') ? 'invalid' : '' }}" name="otros_requerimientos" required>{{ old('otros_requerimientos') }}</textarea>
                            <label for="otros_requerimientos" data-error="{{ $errors->has('otros_requerimientos') ? $errors->first('otros_requerimientos'): '' }}">Otros requerimientos</label>
                            @if ($errors->has('otros_requerimientos'))
                                <span class="helper-text" data-error="{{ $errors->first('otros_requerimientos') }}"></span>
                            @endif
                        </div>
                    </div>



                    <span class="card-title">
                        Otros
                    </span>
                    <hr>

                    <div class="row">
                        <div class="input-field col s6">
                            <textarea id="adulto_responsable" class="materialize-textarea {{ $errors->has('adulto_responsable') ? 'invalid' : '' }}" name="adulto_responsable" required>{{ old('adulto_responsable') }}</textarea>
                            <label for="adulto_responsable" data-error="{{ $errors->has('adulto_responsable') ? $errors->first('adulto_responsable'): '' }}">Nombre del adulto responsable</label>
                            @if ($errors->has('adulto_responsable'))
                                <span class="helper-text" data-error="{{ $errors->first('adulto_responsable') }}"></span>
                            @endif
                        </div>
                        <div class="input-field col s6">
                            <textarea id="adulto_responsable_dni" class="materialize-textarea {{ $errors->has('adulto_responsable_dni') ? 'invalid' : '' }}" name="adulto_responsable_dni" required>{{ old('adulto_responsable_dni') }}</textarea>
                            <label for="adulto_responsable_dni" data-error="{{ $errors->has('adulto_responsable_dni') ? $errors->first('adulto_responsable_dni'): '' }}">DNI del adulto responsable</label>
                            @if ($errors->has('adulto_responsable_dni'))
                                <span class="helper-text" data-error="{{ $errors->first('adulto_responsable_dni') }}"></span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s6">
                            <textarea id="adulto_responsable_relacion" class="materialize-textarea {{ $errors->has('adulto_responsable_relacion') ? 'invalid' : '' }}" name="adulto_responsable_relacion" required>{{ old('adulto_responsable_relacion') }}</textarea>
                            <label for="adulto_responsable_relacion" data-error="{{ $errors->has('adulto_responsable_relacion') ? $errors->first('adulto_responsable_relacion'): '' }}">Relación del adulto responsable</label>
                            @if ($errors->has('adulto_responsable_relacion'))
                                <span class="helper-text" data-error="{{ $errors->first('adulto_responsable_relacion') }}"></span>
                            @endif
                        </div>
                        <div class="input-field col s6">
                            <textarea id="adulto_responsable_telefono" class="materialize-textarea {{ $errors->has('adulto_responsable_telefono') ? 'invalid' : '' }}" name="adulto_responsable_telefono" required>{{ old('adulto_responsable_telefono') }}</textarea>
                            <label for="adulto_responsable_telefono" data-error="{{ $errors->has('adulto_responsable_telefono') ? $errors->first('adulto_responsable_telefono'): '' }}">Teléfono del adulto responsable</label>
                            @if ($errors->has('adulto_responsable_telefono'))
                                <span class="helper-text" data-error="{{ $errors->first('adulto_responsable_telefono') }}"></span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s6">
                            <textarea id="adulto_responsable_email" class="materialize-textarea {{ $errors->has('adulto_responsable_email') ? 'invalid' : '' }}" name="adulto_responsable_email" required>{{ old('adulto_responsable_email') }}</textarea>
                            <label for="adulto_responsable_email" data-error="{{ $errors->has('adulto_responsable_email') ? $errors->first('adulto_responsable_email'): '' }}">Email del adulto responsable</label>
                            @if ($errors->has('adulto_responsable_email'))
                                <span class="helper-text" data-error="{{ $errors->first('adulto_responsable_email') }}"></span>
                            @endif
                        </div>
                    </div>



                    <div class="row">
                        <div class="input-field col s6">
                            <textarea id="lo_que_mas_me_gusta" class="materialize-textarea {{ $errors->has('lo_que_mas_me_gusta') ? 'invalid' : '' }}" name="lo_que_mas_me_gusta" required>{{ old('lo_que_mas_me_gusta') }}</textarea>
                            <label for="lo_que_mas_me_gusta" data-error="{{ $errors->has('lo_que_mas_me_gusta') ? $errors->first('lo_que_mas_me_gusta'): '' }}">¿Qué es lo que más me gusta del espectáculo?</label>
                            @if ($errors->has('lo_que_mas_me_gusta'))
                                <span class="helper-text" data-error="{{ $errors->first('lo_que_mas_me_gusta') }}"></span>
                            @endif
                        </div>
                        <div class="input-field col s6">
                            <textarea id="momento_especial" class="materialize-textarea {{ $errors->has('momento_especial') ? 'invalid' : '' }}" name="momento_especial" required>{{ old('momento_especial') }}</textarea>
                            <label for="momento_especial" data-error="{{ $errors->has('momento_especial') ? $errors->first('momento_especial'): '' }}">Momento especial del texto dramático</label>
                            @if ($errors->has('momento_especial'))
                                <span class="helper-text" data-error="{{ $errors->first('momento_especial') }}"></span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s6">
                            <textarea id="como_se_enteraron" class="materialize-textarea {{ $errors->has('como_se_enteraron') ? 'invalid' : '' }}" name="como_se_enteraron" required>{{ old('como_se_enteraron') }}</textarea>
                            <label for="como_se_enteraron" data-error="{{ $errors->has('como_se_enteraron') ? $errors->first('como_se_enteraron'): '' }}">¿Cómo se enteraron del festival?</label>
                            @if ($errors->has('como_se_enteraron'))
                                <span class="helper-text" data-error="{{ $errors->first('como_se_enteraron') }}"></span>
                            @endif
                        </div>
                        <div class="input-field col s6">
                            <textarea id="estrategia_de_viaje" class="materialize-textarea {{ $errors->has('estrategia_de_viaje') ? 'invalid' : '' }}" name="estrategia_de_viaje" required>{{ old('estrategia_de_viaje') }}</textarea>
                            <label for="estrategia_de_viaje" data-error="{{ $errors->has('estrategia_de_viaje') ? $errors->first('estrategia_de_viaje'): '' }}">Estrategias previstas para concretar el viaje</label>
                            @if ($errors->has('estrategia_de_viaje'))
                                <span class="helper-text" data-error="{{ $errors->first('estrategia_de_viaje') }}"></span>
                            @endif
                        </div>
                    </div>




                    <div class="row center-align">

                        <p class="">
                            <label>
                                {!! Form::checkbox('bases', 1, null, ['required' => true]) !!}
                                <span>Acepto las bases y condiciones</span>
                            </label>
                        </p>

                    </div>


                </div>
                <div class="card-action">
                    <button class="btn waves-effect waves-light" type="submit">Confirmar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>





<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4>Como subir tu video:</h4>
        <p>1) Abre una ventana en tu navegador y dirigete a: https://ydray.com</p>
        <p>2) Haz click en donde dice: "Añade tus archivos" y selecciona tu video. Una vez que el video se haya subido, haz click en el boton de color azul que dice "Enviar"</p>
        <img src="{{asset('img/ydray_1.png')}}" width="200">
        <p>3) Una vez que hayas hecho click en el boton "Enviar" te aparecerá un enlace que debes copiar y pegar en este formulario, en el campo "Link del video"</p>
        <img src="{{asset('img/ydray_2.png')}}" width="200">

    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
</div>


<!-- Modal Structure -->
<div id="modal2" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4>Como subir tus fotos:</h4>
        <p>1) Abre una ventana en tu navegador y dirigete a: https://ydray.com</p>
        <p>2) Haz click en donde dice: "Añade tus archivos" y selecciona tus fotos (Puedes subir muchas fotos en diferentes archivos o en un archivo zip). Una vez que hayas subido las fotos, haz click en el boton de color azul que dice "Enviar"</p>
        <img src="{{asset('img/ydray_1.png')}}" width="200">
        <p>3) Una vez que hayas hecho click en el boton "Enviar" te aparecerá un enlace que debes copiar y pegar en este formulario, en el campo "Link de las fotos"</p>
        <img src="{{asset('img/ydray_2.png')}}" width="200">

    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
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