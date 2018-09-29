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
                    <span class="card-title">Elencos</span>
                    <hr>

                    <div class="row">
                        <table class="striped highlight">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th width="250px;">Herramientas</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($elencos as $elenco)
                                <tr>
                                    <td>{{ $elenco->name }}</td>
                                    <td>
                                        <a class="waves-effect waves-light btn-small" href="{{ route('elencos.edit', $elenco->id) }}"><i class="material-icons right">edit</i>Editar</a>
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

        @if (session('message_error'))
        M.toast({html: '{{ session('message_error') }}', classes: 'red accent-1'});
        @endif

        @if (session('message_success'))
        M.toast({html: '{{ session('message_success') }}', classes: 'teal lighten-2', displayLength: 7000});
        @endif

    </script>
@endsection