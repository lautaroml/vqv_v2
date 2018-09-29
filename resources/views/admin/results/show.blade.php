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
                        <a href="{{ route('results.download', $taller->id) }}" class="btn-floating btn-large red">
                            <i class="large material-icons">cloud_download</i>
                        </a>
                    </div>

                    <span class="card-title">{{ $inscription->title }}</span>
                    <hr>
                    <div class="row">
                        <p>{{ $inscription->description }}</p>
                    </div>

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
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($taller->users->sortBy('last_name') as $user)
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
                                        @if($user->elenco)
                                            {{\App\Elenco::find($user->elenco)->name}}
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
        });
        @if (session('message_error'))
            M.toast({html: '{{ session('message_error') }}', classes: 'red accent-1'});
        @endif

        @if (session('message_success'))
            M.toast({html: '{{ session('message_success') }}', classes: 'teal lighten-2', displayLength: 7000});
        @endif
    </script>
@endsection