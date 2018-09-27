<script>
    $(document).ready(function(){

        obj_of_tags = [];
        var tags = "{{ isset($taller) ? trim($taller->disponibility) : '' }}";
        if (tags !== '') {
            tags = tags.split(',');
            $.each(tags, function(key, val) {
                obj_of_tags.push(
                    {tag: val}
                )
            });
        }

        disponibility = {!! json_encode($disponibility, JSON_FORCE_OBJECT) !!};

        $('.chips-autocomplete').chips({
            placeholder: 'Disponibilidad',
            secondaryPlaceholder: ' ',
            data: obj_of_tags,
            autocompleteOptions: {
                data: disponibility,
                limit: Infinity,
                minLength: 1
            },
            onChipAdd: function(e, chip){

                var input = chip.childNodes[0].textContent;

                if (!(input in disponibility)) {
                    console.log(input + ' no existe');
                    M.Chips.getInstance($('.chips')).chipsData.splice(M.Chips.getInstance($('.chips')).chipsData.length-1,1);
                    chip.remove();
                }


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
    });
</script>