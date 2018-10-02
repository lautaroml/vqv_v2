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
                    <span class="card-title">Usuarios</span>
                    <hr>

                    <div class="row">
                        <table class="striped highlight">
                            <thead>
                            <tr>
                                <th>Apellido</th>
                                <th>Nombre</th>
                                <th>Documento</th>
                                <th>Email</th>
                                <th>Edad</th>
                                <th>Nacimiento</th>
                                <th>País</th>
                                <th>Provincia</th>
                                <th>Elenco</th>
                                <th width="100px;">Herramientas</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->last_name}}</td>
                                    <td>{{$user->first_name}}</td>
                                    <td>{{$user->document}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{\Carbon\Carbon::parse($user->birthday)->age}}</td>
                                    <td>{{\Carbon\Carbon::parse($user->birthday)->format('m/d/Y')}}</td>
                                    {{--<td>{{explode('-', (string) $user->birthday)[2]}}/{{explode('-',  (string) $user->birthday)[1]}}/{{explode('-',  (string) $user->birthday)[0]}}</td>--}}
                                    <td>{{\App\Country::find($user->country_id)->name}}</td>
                                    <td>
                                        @if($user->state_id != 99)
                                            {{\App\State::find($user->state_id)->name}}
                                        @else
                                            {{ $user->other_state }}
                                        @endif
                                    </td>
                                    <td>
                                        @if(\App\Elenco::find($user->elenco) && $user->elenco != 0)
                                            {{\App\Elenco::find($user->elenco)->name}}
                                        @endif
                                    </td>
                                    <td>
                                        <a class="waves-effect waves-light btn-small right" href="{{ route('users.edit', $user->id) }}"><i class="material-icons center">edit</i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
                <div class="card-action">
                    <ul class="pagination">
                        {{ $users->links() }}
                    </ul>
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