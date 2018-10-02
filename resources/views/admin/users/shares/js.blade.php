<script>
    $(document).ready(function(){
        $('select').formSelect();
    });

    if ($("#state").val() == '99') {
        $("#other_container").show();
    }
    if ($("#other_container").is(":visible") ) {
        $("#other").prop('required', true);
    } else {
        $("#other").prop('required', false);
    }
    $("#state").change(function(){
        $("#other").val('');
        if ($(this).val() == '99') {
            $("#other_container").show();
            $("#other").prop('required', true);
        } else {
            $("#other_container").hide();
            $("#other").prop('required', false);
        }
    });
    @if (session('message_error'))
    M.toast({html: '{{ session('message_error') }}', classes: 'red accent-1'});
    @endif

    @if (session('message_success'))
    M.toast({html: '{{ session('message_success') }}', classes: 'teal lighten-2', displayLength: 7000});
    @endif
</script>