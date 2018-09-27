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
                {!! Form::model($taller, ['route' => ['tallers.update', $taller->id], 'method' => 'put']) !!}
                <div class="card-content">
                    <div class="row">
                        @include('admin.tallers.shares.form')
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
@endsection

@section('js')
    @include('admin.tallers.shares.js')
@endsection