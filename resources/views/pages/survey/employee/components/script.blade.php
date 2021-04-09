<script>

    var batchActionTypeSelector = $("#batch_action_type");
    var selectEmployeeSurveyButton = $("#selectEmployeeSurveyButton");

    batchActionTypeSelector.attr('disabled', 'disabled');

    $("#select_all").click(function () {
        $('input:checkbox').prop('checked', true);
        batchActionTypeSelector.removeAttr('disabled');
        $('#batch_action_type').selectpicker('refresh');
    });

    $("#deselect_all").click(function () {
        $('input:checkbox').prop('checked', false);
        batchActionTypeSelector.attr('disabled', 'disabled');
        $('#batch_action_type').selectpicker('refresh');
    });

    function getSelectedEmployees() {
        var vals = [];
        $(':checkbox:checked').each(function (i) {
            vals[i] = $(this).val();
        });
        return vals;
    }

    function setChecked(id) {
        var checkbox = $("#checkbox_" + id);
        checkbox.prop('checked', !checkbox.prop('checked'));

        var employeeList = [];
        $(':checkbox:checked').each(function (i) {
            employeeList[i] = $(this).val();
        });

        if (employeeList.length > 0) {
            batchActionTypeSelector.removeAttr('disabled');
            $('#batch_action_type').selectpicker('refresh');
        } else {
            batchActionTypeSelector.attr('disabled', 'disabled');
            $('#batch_action_type').selectpicker('refresh');
        }
    }

    $(function () {
        $('#batch_action_type').selectpicker({
            liveSearchPlaceholder: "Arayın...",
            noneSelectedText: "İşlem Seçin"
        });
    });

    batchActionTypeSelector.change(function () {
        if ($(this).val() === "1") {
            $("#SelectEmployeeSurveyModal").modal('show');
        }

        $(this).prop("selectedIndex", 0);
    });

    $("#search_employee").keyup(function () {
        var keyword = $(this).val().toLowerCase();

        $('.each_employee').each(function (i) {
            var name = $(this).find(".employee-name").html().toLowerCase();
            if (name.includes(keyword)) {
                $(this).fadeIn(250);
            } else {
                $(this).hide();
            }
        });
    });

    selectEmployeeSurveyButton.click(function () {
        var employees = getSelectedEmployees();
        var survey_code = $("#survey_code").val();

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.survey.employee.update') }}',
            data: {
                _token: '{{ csrf_token() }}',
                employees: employees,
                survey_code: survey_code
            },
            success: function (response) {
                toastr.success(response.response);
                $("#SelectEmployeeSurveyModal").modal('hide');
                location.reload();
            },
            error: function (error) {
                console.log(error)
            }
        });
    });
</script>
