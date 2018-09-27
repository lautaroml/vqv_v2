<script>
    $(document).ready(function(){

        $('input#title').characterCounter();

        $('.datepicker').datepicker({
            'format': 'dd/mm/yyyy',
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
                clear: 'Borrar',
                done: 'Aceptar',
                weekdays: [
                    'Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'
                ],
                weekdaysShort: [
                    'Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'
                ],
                weekdaysAbbrev: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
            },
            showClearBtn: true
            //'defaultDate': new Date(),
            //'setDefaultDate': true
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

        /* Materialize chips start*/
        obj_of_tags = [];
        var tags = "{{ isset($inscription) ? trim($inscription->disponibility) : '' }}";
        if (tags !== '') {
            tags = tags.split(',');
            $.each(tags, function(key, val) {
                obj_of_tags.push(
                    {tag: val}
                )
            });
        }

        $('.chips-autocomplete').chips({
            data: obj_of_tags,
            onChipAdd: function(){
                chips = M.Chips.getInstance($('.chips')).chipsData;

                array_of_chips = [];

                $.each(chips, function(key, value) {
                    array_of_chips.push(value.tag.trim());
                });

                $('#disponibility').val(array_of_chips.join());
            },
            onChipDelete: function(){
                chips = M.Chips.getInstance($('.chips')).chipsData;

                array_of_chips = [];

                $.each(chips, function(key, value) {
                    array_of_chips.push(value.tag.trim());
                });

                $('#disponibility').val(array_of_chips.join());
            }
        });
        /* Materialize chips end*/

    });
</script>