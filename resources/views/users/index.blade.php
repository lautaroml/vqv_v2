@extends('layouts.app')
@section('title', 'Usuarios')

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

                        <table>
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Item Name</th>
                                <th>Item Price</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td>Alvin</td>
                                <td>Eclair</td>
                                <td>$0.87</td>
                            </tr>
                            <tr>
                                <td>Alan</td>
                                <td>Jellybean</td>
                                <td>$3.76</td>
                            </tr>
                            <tr>
                                <td>Jonathan</td>
                                <td>Lollipop</td>
                                <td>$7.00</td>
                            </tr>
                            </tbody>
                        </table>
            </div>
        </div>
    </div>
@endsection
