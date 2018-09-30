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
</script>