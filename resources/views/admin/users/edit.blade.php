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
                {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}
                <div class="card-content">
                    <div class="row">
                        @include('admin.users.shares.form')
                    </div>
                </div>
                <div class="card-action">
                    <a class="waves-effect waves-light btn modal-trigger right red lighten-2" href="#modal1">Eliminar</a>
                    <button class="btn waves-effect waves-light" type="submit" name="action">Confirmar
                        <i class="material-icons right">send</i>
                    </button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>


    @component('components.modals.delete')
        @slot('form_action')
            {{ route('users.destroy', ['id' => $user->id]) }}
        @endslot
        @slot('message')
            <p>¿Esta seguro que desea eliminar el Usuario: {{ $user->first_name }} {{ $user->last_name }}?</p>
        @endslot
    @endcomponent

@endsection

@section('js')
    @include('admin.users.shares.js')
@endsection