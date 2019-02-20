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
                        <div class="input-field col s12">
                            <textarea id="sinopsis" class="materialize-textarea {{ $errors->has('sinopsis') ? 'invalid' : '' }}" name="sinopsis" required>{{ old('sinopsis') }}</textarea>
                            <label for="sinopsis" data-error="{{ $errors->has('sinopsis') ? $errors->first('sinopsis'): '' }}">Sinopsis de la obra e historia del grupo resumida en 5 renglones</label>
                            @if ($errors->has('sinopsis'))
                                <span class="helper-text" data-error="{{ $errors->first('sinopsis') }}"></span>
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
                            <label for="director" data-error="{{ $errors->has('director') ? $errors->first('director'): '' }}">Director: Incluir datos del director (si hubiese)</label>
                            @if ($errors->has('director'))
                                <span class="helper-text" data-error="{{ $errors->first('director') }}"></span>
                            @endif
                        </div>
                        <div class="input-field col s6">
                            <input id="autor" type="text" name="autor" value="{{ old('autor') }}" class="{{ $errors->has('autor') ? 'invalid' : '' }}" required>
                            <label for="autor" data-error="{{ $errors->has('autor') ? $errors->first('autor'): '' }}">Autor: Incluir datos del autor (si hubiese)</label>
                            @if ($errors->has('autor'))
                                <span class="helper-text" data-error="{{ $errors->first('autor') }}"></span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <a class="waves-effect waves-light  modal-trigger" href="#modal1">Como subir el video?</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="video_duration" type="text" name="video_duration" value="{{ old('video_duration') }}" class="{{ $errors->has('video_duration') ? 'invalid' : '' }}" required>
                            <label for="video_duration" data-error="{{ $errors->has('video_duration') ? $errors->first('video_duration'): '' }}">Duración del VIDEO (mínimo 20’)</label>
                            @if ($errors->has('video_duration'))
                                <span class="helper-text" data-error="{{ $errors->first('video_duration') }}"></span>
                            @endif
                        </div>
                        <div class="input-field col s6">
                            <input id="video_link" type="text" name="video_link" value="{{ old('video_link') }}" class="{{ $errors->has('video_link') ? 'invalid' : '' }}" required>
                            <label for="video_link" data-error="{{ $errors->has('video_link') ? $errors->first('video_link'): '' }}">Link del VIDEO (mínimo 20’)</label>
                            @if ($errors->has('video_link'))
                                <span class="helper-text" data-error="{{ $errors->first('video_link') }}"></span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <a class="waves-effect waves-light  modal-trigger" href="#modal2">Como subir las fotos?</a>
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