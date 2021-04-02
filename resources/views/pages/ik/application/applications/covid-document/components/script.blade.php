<script>
    $(".multidate").hide();
    $("#start_date").attr('required', false);
    $("#end_date").attr('required', false);
    $("#date").attr('required', true);

    $("#date_type").change(function () {
        if ($(this).val() == 1) {
            $(".multidate").show();
            $(".onedate").hide();
            $("#start_date").attr('required', true);
            $("#end_date").attr('required', true);
            $("#date").attr('required', false);
        } else {
            $(".multidate").hide();
            $(".onedate").show();
            $("#start_date").attr('required', false);
            $("#end_date").attr('required', false);
            $("#date").attr('required', true);
        }
    });

    $("#select_all").click(function () {
        $('#employees option').each(function () {
            if ($(this).is(':selected') === false) {
                $(this).prop('selected', true)
            }
        });
        $("#employees").selectpicker('refresh');
    });

    $("#deselect_all").click(function () {
        $('#employees').selectpicker('val', '');
    });
</script>
