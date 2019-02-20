@extends('layouts.app')
@section('title', 'Elencos Inscriptos')

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




            <div class="row">

                @foreach($elencos_form as $elenco)
                    <div class="col s12 m12">
                        <span class="card-title">Elencos inscriptos:</span>
                        <hr>
                        <div class="card blue-grey darken-1">
                            <div class="card-content white-text">

                                <span class="card-title">
                                    Datos del grupo:
                                </span>
                                <hr>

                                <blockquote>
                                    <strong>Nombre del grupo:</strong> {{ $elenco->group_name }}
                                </blockquote>


                                <blockquote>
                                    <strong>Localidad:</strong> {{ $elenco->location }}
                                </blockquote>


                                <blockquote>
                                    <strong>Historia del grupo:</strong> <br> {{ $elenco->group_history }}
                                </blockquote>


                                <blockquote>
                                    <strong>Sinopsis de la obra e historia del grupo resumida en 5 renglones:</strong>
                                    <br>
                                    {{ $elenco->sinopsis }}
                                </blockquote>

                                <blockquote>
                                    <strong>Ficha de Inscripción:</strong>
                                    <a href="{{ asset($elenco->ficha_de_inscripcion) }}">descargar</a>
                                </blockquote>

                                <span class="card-title">
                                    Datos de la obra:
                                </span>
                                <hr>

                                <blockquote>
                                    <strong>Titulo de la obra:</strong>
                                    <br>
                                    {{ $elenco->obra_title }}
                                </blockquote>

                                <blockquote>
                                    <strong>Duración de la obra:</strong>
                                    {{ $elenco->obra_duration }}
                                </blockquote>

                                <blockquote>
                                    <strong>Sinopsis:</strong>
                                    <br>
                                    {{ $elenco->sinopsis_2 }}
                                </blockquote>

                                <blockquote>
                                    <strong>Director: </strong>
                                    {{ $elenco->director }}
                                </blockquote>

                                <blockquote>
                                    <strong>Autor: </strong>
                                    {{ $elenco->autor }}
                                </blockquote>

                                <blockquote>
                                    <strong>Link del video: </strong>
                                    {{ $elenco->video_link }}
                                </blockquote>

                                <blockquote>
                                    <strong>Duración del video: </strong>
                                    {{ $elenco->video_duration }}
                                </blockquote>

                                <blockquote>
                                    <strong>Link de las fotos: </strong>
                                    {{ $elenco->photos_link }}
                                </blockquote>


                                <span class="card-title">
                                    Necesidades Técnicas:
                                </span>
                                <hr>

                                <blockquote>
                                    <strong>Plan de luces: </strong>
                                    <br>
                                    {{ $elenco->planta_de_luces }}
                                </blockquote>

                                <blockquote>
                                    <strong>Sonido: </strong>
                                    <br>
                                    {{ $elenco->sonido }}
                                </blockquote>


                                <blockquote>
                                    <strong>Proyector: </strong>
                                    <br>
                                    {{ $elenco->proyector }}
                                </blockquote>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection