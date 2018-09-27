@extends('layouts.app')
@section('title', 'Bienvenido')

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

                <div class="card-content">


                    <div class="fixed-action-btn">
                        <a class="btn-floating btn-large red">
                            <i class="large material-icons">mode_edit</i>
                        </a>
                        <ul>
                            <li><a class="btn-floating red tooltipped" data-position="left" data-tooltip="I am a tooltip"><i class="material-icons">insert_chart</i></a></li>
                            <li><a class="btn-floating yellow darken-1 tooltipped" data-position="left" data-tooltip="Configuración"><i class="material-icons">settings</i></a></li>
                            <li><a class="btn-floating green tooltipped" data-position="left" data-tooltip="I am a tooltip"><i class="material-icons">publish</i></a></li>
                            <li><a href="{{ route('tallers.create', ['inscription_id' => $inscription->id]) }}" class="btn-floating blue tooltipped" data-position="left" data-tooltip="Nuevo Taller"><i class="material-icons">playlist_add</i></a></li>
                        </ul>
                    </div>

                    <span class="card-title">{{ $inscription->title }}</span>
                    <hr>
                    <div class="row">
                        <p>{{ $inscription->description }}</p>
                    </div>

                    <div class="row">
                        <table class="striped highlight">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Profesor</th>
                                <th>Cupo</th>
                                <th>Disponibilidad</th>
                                <th width="250px;">Herramientas</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($inscription->tallers as $taller)
                                <tr>
                                    <td>{{ $taller->name }}</td>
                                    <td>{{ $taller->professor }}</td>
                                    <td>{{ $taller->cupo }}</td>
                                    <td>{{ $taller->disponibility }}</td>
                                    <td>
                                        <a class="waves-effect waves-light btn-small" href="{{ route('tallers.edit', $taller->id) }}"><i class="material-icons right">edit</i>Editar</a>
                                        <a class="waves-effect waves-light btn-small red lighten-2"><i class="material-icons right">delete</i>Borrar</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
                <div class="card-action">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('.fixed-action-btn').floatingActionButton({
                'hoverEnabled': false
            });

            $('.tooltipped').tooltip();
        });
    </script>
@endsection