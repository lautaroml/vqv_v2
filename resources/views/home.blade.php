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
                            @if(auth()->user()->type === '1')
                                <a class="waves-effect waves-light btn-small" href="{{ route('inscriptions.index') }}"><i class="material-icons center">edit</i></a>
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
                            <p>No hay inscripciones abiertas por el momento.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection