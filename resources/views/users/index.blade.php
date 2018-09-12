@extends('layouts.app')
@section('title', 'Usuarios')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Usuarios</div>
                    <div class="card-body">
                        <table cellpadding="1" cellspacing="1" class="table table-condensed table-hover" style="border-collapse: collapse;">
                            <thead>
                            <tr>
                                <th style="text-align: center">Sub Estados</th>
                                <th>Herramientas</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td style="text-align: center">
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-xs btn-outline btn-success">
                                            <i aria-hidden="true" class="fa fa-pencil-square-o fa-fw"></i>
                                            Editar
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
