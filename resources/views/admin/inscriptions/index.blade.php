@extends('layouts.app')
@section('title', 'Bienvenido')

@section('css')
    <style>
        .card {
            margin-top: 40px;
        }
        .card.small {
            height: 250px;
        }
        .switch label .lever {
            margin: 0 5px;
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
                        @foreach($inscriptions as $inscription)
                            <div class="col s12 m6">
                                <div class="card small blue-grey darken-1">
                                    <div class="card-content white-text">
                                        <span class="card-title">
                                            <div class="switch right">
                                                <label onclick="toggleInscription({{ $inscription->id }})">
                                                    <input type="checkbox" {{ $inscription->status ? 'checked' : '' }}>
                                                    <span class="lever"></span>
                                                </label>
                                            </div>
                                            {{ str_limit($inscription->title, 50, '...') }}

                                        </span>
                                        <br>
                                        <p>{{ str_limit($inscription->description, 100, '...') }}</p>
                                        <br>

                                    </div>
                                    <div class="card-action">
                                        <a class="waves-effect waves-light btn-small"><i class="material-icons left">people</i>257</a>
                                        <a class="waves-effect waves-light btn-small" href="{{ route('tallers.index', ['inscription_id' => $inscription->id]) }}"><i class="material-icons left">format_list_bulleted</i>{{ $inscription->tallers->count() }}</a>
                                        <a class="waves-effect waves-light btn-small link" href="inscription/{{$inscription->slug}}"><i class="material-icons center">link</i></a>
                                        <a class="waves-effect waves-light btn-small" href="inscription/{{$inscription->slug}}" target="_blank"><i class="material-icons center">tab</i></a>
                                        <a class="waves-effect waves-light btn-small right" href="{{ route('inscriptions.edit', [$inscription->id]) }}"><i class="material-icons center">edit</i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-action">
                    <ul class="pagination">
                        {{ $inscriptions->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>

        function toggleInscription(id) {
            window.location.href = route('inscriptions.toggle', id);
        }

        $(document).ready(function(){
            $('.fixed-action-btn').floatingActionButton({
                'hoverEnabled': false
            });

            $('.tooltipped').tooltip();

            /*Copy to clipboard*/
            $('.link').on('click', function(e){
                e.preventDefault();
                var $body = document.getElementsByTagName('body')[0];
                var $tempInput = document.createElement('INPUT');
                $body.appendChild($tempInput);
                $tempInput.setAttribute('value', $(this).prop('href'));
                $tempInput.select();
                document.execCommand('copy');
                $body.removeChild($tempInput);
                M.toast({html: 'URL de la Inscripción, copiada al porta papeles!', classes: 'teal lighten-2'});
            });
        });
    </script>
@endsection