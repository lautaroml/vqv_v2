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
                        <a class="btn-floating btn-large red">
                            <i class="large material-icons">mode_edit</i>
                        </a>
                        <ul>
                            <li><a class="btn-floating red tooltipped" data-position="left" data-tooltip="I am a tooltip"><i class="material-icons">insert_chart</i></a></li>
                            <li><a class="btn-floating yellow darken-1 tooltipped" data-position="left" data-tooltip="Configuración"><i class="material-icons">settings</i></a></li>
                            <li><a class="btn-floating green tooltipped" data-position="left" data-tooltip="I am a tooltip"><i class="material-icons">publish</i></a></li>
                            <li><a href="{{ route('inscriptions.create') }}" class="btn-floating blue tooltipped" data-position="left" data-tooltip="Nueva inscripción"><i class="material-icons">playlist_add</i></a></li>
                        </ul>
                    </div>

                    <span class="card-title">Bienvenido</span>
                    <hr>
                    <div class="row">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias autem beatae deleniti dignissimos dolores eaque id maiores molestiae optio perspiciatis possimus quae quaerat quas quia quidem repellendus tenetur, ut vitae.</p>
                    </div>

                    <div class="row">
                        <div class="col s12 m6">
                            <div class="card blue-grey darken-1">
                                <div class="card-content white-text">
                                    <span class="card-title">
                                        <a href="#!"><i class="material-icons left">edit</i></a>
                                        Inscripción 2019
                                    </span>
                                    <a class="waves-effect waves-light btn-small"><i class="material-icons left">people</i>257</a>
                                    <a class="waves-effect waves-light btn-small"><i class="material-icons left">format_list_bulleted</i>15</a>
                                    <a class="waves-effect waves-light btn-small"><i class="material-icons left">cloud</i>button</a>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-action">
                    <ul class="pagination">
                        <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                        <li class="active"><a href="#!">1</a></li>
                        <li class="waves-effect"><a href="#!">2</a></li>
                        <li class="waves-effect"><a href="#!">3</a></li>
                        <li class="waves-effect"><a href="#!">4</a></li>
                        <li class="waves-effect"><a href="#!">5</a></li>
                        <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
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
    </script>
@endsection