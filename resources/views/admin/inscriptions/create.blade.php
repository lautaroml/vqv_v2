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
                    <div class="row">
                        <form class="col s12">
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="input_text" type="text" data-length="10" name="title">
                                    <label for="input_text">Título</label>
                                </div>
                                <div class="input-field col s12">
                                    <textarea id="textarea1" class="materialize-textarea" name="description"></textarea>
                                    <label for="textarea1">Descripción</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s6">
                                    <label>Edad mínima</label>
                                    <span id="min-age-span" class="new badge" data-badge-caption=""></span>
                                    <p class="range-field">
                                        <input name="min_age" type="range" id="min-age-input" min="1" max="100" value="20" />
                                    </p>
                                </div>
                                <div class="col s6">
                                    <label>Edad máxima</label>
                                    <span id="max-age-span" class="new badge" data-badge-caption=""></span>
                                    <p class="range-field">
                                        <input name="max_agw" type="range" id="max-age-input" min="1" max="100" value="100" />
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s6">
                                    <label>Habilitado desde:</label>
                                    <input type="text" class="datepicker">
                                </div>
                                <div class="col s6">
                                    <label>Habilitado hasta:</label>
                                    <input type="text" class="datepicker">
                                </div>
                            </div>
                        </form>
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

            $('input#input_text').characterCounter();

            $('.datepicker').datepicker({
                'format': 'dd mmm, yyyy',
                'i18n': {
                    months: [
                        'Enero', 'Febrero', 'Marzo', 'Abril',
                        'Mayo', 'Junio', 'Julio', 'Agosto',
                        'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                    ],
                    monthsShort: [
                        'Ene', 'Feb', 'Mar', 'Abr',
                        'May', 'Jun', 'Jul', 'Ago',
                        'Sep', 'Oct', 'Nov', 'Dic'
                    ],
                    cancel: 'Cancelar',
                    clear: 'Limpiar',
                    done: 'Aceptar',
                    weekdays: [
                        'Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'
                    ],
                    weekdaysShort: [
                        'Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'
                    ],
                    weekdaysAbbrev: ['D', 'L', 'M', 'M', 'J', 'V', 'S']
                }
            });



            /* Materializecss Range Fix*/
            var array_of_dom_elements = document.querySelectorAll("input[type=range]");
            M.Range.init(array_of_dom_elements);


            /* Materializecss Range extend*/
            $('#min-age-span').html($('#min-age-input').val());
            $('#max-age-span').html($('#max-age-input').val());
            $('#min-age-input').on('mousemove change', function(){
                $('#min-age-span').html($(this).val());
            });
            $('#max-age-input').on('mousemove change', function(){
                $('#max-age-span').html($(this).val());
            });
        });
    </script>
@endsection