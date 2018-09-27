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
                    <small>{{ $inscription->description }}</small>
                    <hr>
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
                                        @if(auth()->user()->has($taller->id))
                                            <a class="waves-effect waves-light btn-small red accent-1" href="{{ route('user.inscriptions.destroy', $taller->id) }}"><i class="material-icons right">delete</i>Eliminar inscripción</a>
                                        @else
                                            @if(! $taller->isFull())
                                                <a class="waves-effect waves-light btn-small" href="{{ route('user.inscriptions.subscribe', $taller->id) }}"><i class="material-icons right">edit</i>Inscribirme</a>
                                            @else
                                                <a class="btn disabled">Taller sin cupo</a>
                                            @endif
                                        @endif
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

            @if (session('message_error'))
                M.toast({html: '{{ session('message_error') }}', classes: 'red accent-1'});
            @endif

            @if (session('message_success'))
                M.toast({html: '{{ session('message_success') }}', classes: 'teal lighten-2', displayLength: 7000});
            @endif
        });
    </script>
@endsection