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
                            <li><a href="{{ route('elencos.edition.show') }}" class="btn-floating yellow darken-1 tooltipped" data-position="left" data-tooltip="Modificar el Nº de edición"><i class="material-icons">settings</i></a></li>
                            <li><a href="{{ route('elencos.create') }}" class="btn-floating blue tooltipped" data-position="left" data-tooltip="Nueva elenco"><i class="material-icons">playlist_add</i></a></li>
                        </ul>
                    </div>
                    <span class="card-title">Modificar el Nº de edición</span>
                    <hr>

                    {!! Form::open(['route' => ['elencos.edition.store'], 'method' => 'post']) !!}

                        <div class="row">
                            <div class="input-field col s12">
                                {!! Form::text('name', null, ['data-length' => 200, 'id' => 'name', 'placeholder' => 'Ej: 3ra']) !!}
                                <label for="name">Número de edición:</label>
                            </div>
                        </div>

                        <div class="card-action">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Confirmar
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    {!! Form::close() !!}

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