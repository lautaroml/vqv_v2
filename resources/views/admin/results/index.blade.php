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
                                <th width="150px;">Herramientas</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($inscription->tallers as $taller)
                                <tr>
                                    <td>{{ $taller->name }}</td>
                                    <td>{{ $taller->professor }}</td>
                                    <td>{{ count($taller->users) }} / {{ $taller->cupo }}</td>
                                    <td>{{ $taller->disponibility }}</td>
                                    <td>
                                        <a class="waves-effect waves-light btn-small" href="{{ route('results.show', $taller->id) }}"><i class="material-icons center">remove_red_eye</i></a>
                                        <a class="waves-effect waves-light btn-small" href="{{ route('results.download', $taller->id) }}"><i class="material-icons center">cloud_download</i></a>
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