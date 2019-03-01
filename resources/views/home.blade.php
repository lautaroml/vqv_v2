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
                    <span class="card-title">
                        Inscripciones
                        @auth()
                            @if(intval(auth()->user()->type) === 1)
                                <a class="waves-effect waves-light btn-small" href="{{ route('inscriptions.index') }}"><i class="material-icons center">edit</i></a>
                                <a class="right waves-effect waves-light btn-small" href="{{ route('elencos.inscripcion.show') }}">Elencos Inscriptos</a>
                            @endif
                        @endauth

                    </span>

                    <hr>
                    <div class="row">
                        @if(count($inscriptions))
                            <div class="collection">
                                @foreach($inscriptions as $inscription)
                                    <a href="{{ route('user.inscriptions', [$inscription->slug]) }}" class="collection-item">{{ $inscription->title }}</a>
                                @endforeach
                            </div>
                        @else
                            <p>No hay inscripciones a talleres por el momento.</p>
                        @endif
                            <br>

                            @if($elenco)
                                <p>Para editar tu inscripción del elenco, hace click <a href="{{ url('/elencos_inscripcion/edit') }}">aqui</a>.</p>
                            @else
                                <p>Para inscribir un elenco, hace click <a href="{{ url('/elencos_inscripcion') }}">aqui</a>.</p>
                            @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        @if (session('message_error'))
        M.toast({html: '{{ session('message_error') }}', classes: 'red accent-1'});
        @endif

        @if (session('message_success'))
        M.toast({html: '{{ session('message_success') }}', classes: 'teal lighten-2', displayLength: 7000});
        @endif
    </script>
@endsection