<script>

    var batchActionTypeSelector = $("#batch_action_type");
    var changeEducationPermissionButton = $("#change_education_permission_button");
    var changeAssignmentPermissionButton = $("#change_assignment_permission_button");
    var changeTeamSupportPermissionButton = $("#change_team_support_permission_button");
    var changeTeamSupportAssistantPermissionButton = $("#change_team_support_assistant_permission_button");
    var educationType = $("#education_type");
    var assignmentType = $("#assignment_type");
    var teamSupportType = $("#team_support_type");
    var teamSupportAssistantType = $("#team_support_assistant_type");

    var typeFiltererSelector = $("#typeFilterer");


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
            $("#ChangeEducationPermission").modal('show');
        } else if ($(this).val() === "2") {
            $("#ChangeAssignmentPermission").modal('show');
        } else if ($(this).val() === "3") {
            $("#ChangeTeamSupportPermission").modal('show');
        } else if ($(this).val() === "4") {
            $("#ChangeTeamSupportAssistantPermission").modal('show');
        }

        $(this).prop("selectedIndex", 0);
    });

    $("#search_employee").keyup(function () {
        var typeClass = $("#typeFilterer").val();
        var keyword = $(this).val().toLowerCase();

        console.log(typeClass)
        console.log(keyword)

        if (typeClass === "all") {
            $('.each_employee').each(function (i) {
                var name = $(this).find(".employee-name").html().toLowerCase();
                if (name.includes(keyword)) {
                    $(this).fadeIn(250);
                } else {
                    $(this).hide();
                }
            });
        } else {
            $('.each_employee').each(function (i) {
                var name = $(this).find(".employee-name").html().toLowerCase();
                if (name.includes(keyword) && $(this).hasClass(`${typeClass}`)) {
                    $(this).fadeIn(250);
                } else {
                    $(this).hide();
                }
            });
        }
    });

    changeEducationPermissionButton.click(function () {
        $("#loader").fadeIn(250);
        var employees = getSelectedEmployees();
        var education = educationType.val();

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.application.batch-actions.changeEducationPermission') }}',
            data: {
                _token: '{{ csrf_token() }}',
                employees: employees,
                education_type: `${education}`
            },
            success: function (response) {
                console.log(response);
                toastr.success('İşlem Başarılı');
                location.reload();
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    changeAssignmentPermissionButton.click(function () {
        $("#loader").fadeIn(250);
        var employees = getSelectedEmployees();
        var assignment = assignmentType.val();

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.application.batch-actions.changeAssignmentPermission') }}',
            data: {
                _token: '{{ csrf_token() }}',
                employees: employees,
                assignment_type: `${assignment}`
            },
            success: function (response) {
                console.log(response);
                toastr.success('İşlem Başarılı');
                location.reload();
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    changeTeamSupportPermissionButton.click(function () {
        $("#loader").fadeIn(250);
        var employees = getSelectedEmployees();
        var team_support = teamSupportType.val();

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.application.batch-actions.changeTeamSupportPermission') }}',
            data: {
                _token: '{{ csrf_token() }}',
                employees: employees,
                team_support_type: `${team_support}`
            },
            success: function (response) {
                console.log(response);
                toastr.success('İşlem Başarılı');
                location.reload();
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    changeTeamSupportAssistantPermissionButton.click(function () {
        $("#loader").fadeIn(250);
        var employees = getSelectedEmployees();
        var team_support_assistant = teamSupportAssistantType.val();
        console.log(employees);

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.application.batch-actions.changeTeamSupportAssistantPermission') }}',
            data: {
                _token: '{{ csrf_token() }}',
                employees: employees,
                team_support_assistant_type: `${team_support_assistant}`
            },
            success: function (response) {
                console.log(response);
                toastr.success('İşlem Başarılı');
                location.reload();
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    typeFiltererSelector.change(function () {
        var typeClass = $(this).val();
        var keyword = $("#search_employee").val().toLowerCase();
        if ($(this).val() === "all") {
            $('.each_employee').each(function (i) {
                var name = $(this).find(".employee-name").html().toLowerCase();
                if (name.includes(keyword)) {
                    $(this).fadeIn(250);
                } else {
                    $(this).hide();
                }
            });
        } else {
            $('.each_employee').each(function (i) {
                var name = $(this).find(".employee-name").html().toLowerCase();
                if (name.includes(keyword) && $(this).hasClass(`${typeClass}`)) {
                    $(this).fadeIn(250);
                } else {
                    $(this).hide();
                }
            });
        }
    });
</script>
