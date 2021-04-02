<script>
    $("#report_type").change(function () {
        if ($(this).val() === "1" || $(this).val() === "3") {
            $("#permitTypesRow").show();
            $("#permitTypes").prop('required', true);
            $("#overtimeReasonsRow").hide();
            $("#overtimeReasons").prop('required', false);
        } else if ($(this).val() === "2" || $(this).val() === "4") {
            $("#permitTypesRow").hide();
            $("#permitTypes").prop('required', false);
            $("#overtimeReasonsRow").show();
            $("#overtimeReasons").prop('required', true);
        } else {
            $("#permitTypesRow").hide();
            $("#overtimeReasonsRow").hide();
            $("#permitTypes").prop('required', false);
            $("#overtimeReasons").prop('required', false);
        }
    });
</script>
