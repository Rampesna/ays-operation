
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    $("#company_id").change(function () {
        window.location.replace("{{ route('employee.index') }}/" + $(this).val());
    });

</script>

<script>

    var queue_save_icon = $(".queue_save_icon");
    var competence_save_icon = $(".competence_save_icon");

    $(".queue_selection_card").hide();
    $(".competence_selection_card").hide();
    queue_save_icon.hide();
    competence_save_icon.hide();

    $(".queue_edit_icon").click(function () {
        var employeeId = $(this).data('employee-id');
        $("#" + employeeId + "_queues_list_card").hide();
        $("#" + employeeId + "_queues_selection_card").show();
        $("#" + employeeId + "_queue_save_icon").show();
        $(this).hide();
    });

    queue_save_icon.click(function () {
        var employeeId = $(this).data('employee-id');
        var queues = $("#" + employeeId + "_queues_selection").val();
        $.ajax({
            type: "post",
            url: "{{ route('ajax.employee.updateQueues') }}",
            dataType: 'json',
            data: {
                _token: '{{ csrf_token() }}',
                employee_id: employeeId,
                queues: queues,
            },
            success: function (response) {
                var row = $("#" + employeeId + "_queues_list_row");
                row.html('');
                $.each(response.content, function (index) {
                    row.append('' +
                        '<div class="btn btn-dark-75 btn-square btn-sm m-1" style="cursor:context-menu;">' +
                        response.content[index].name +
                        '</div>' +
                        '');
                });
                toastr.success('Başarıyla Güncellendi');
            },
            error: function (response) {
                toastr.error('Bir Hata Oluştu!');
            }
        });
        $("#" + employeeId + "_queues_list_card").show();
        $("#" + employeeId + "_queues_selection_card").hide();
        $("#" + employeeId + "_queue_edit_icon").show();
        $(this).hide();
    });

    $(".competence_edit_icon").click(function () {
        var employeeId = $(this).data('employee-id');
        $("#" + employeeId + "_competences_list_card").hide();
        $("#" + employeeId + "_competences_selection_card").show();
        $("#" + employeeId + "_competence_save_icon").show();
        $(this).hide();
    });

    competence_save_icon.click(function () {
        var employeeId = $(this).data('employee-id');
        var competences = $("#" + employeeId + "_competences_selection").val();
        $.ajax({
            type: "post",
            url: "{{ route('ajax.employee.updateCompetences') }}",
            dataType: 'json',
            data: {
                _token: '{{ csrf_token() }}',
                employee_id: employeeId,
                competences: competences,
            },
            success: function (response) {
                var row = $("#" + employeeId + "_competences_list_row");
                row.html('');
                $.each(response.content, function (index) {
                    row.append('' +
                        '<div class="btn btn-dark-75 btn-square btn-sm m-1" style="cursor:context-menu;">' +
                        response.content[index].name +
                        '</div>' +
                        '');
                });
                toastr.success('Başarıyla Güncellendi');
            },
            error: function (response) {
                toastr.error('Bir Hata Oluştu!');
            }
        });
        $("#" + employeeId + "_competences_list_card").show();
        $("#" + employeeId + "_competences_selection_card").hide();
        $("#" + employeeId + "_competence_edit_icon").show();
        $(this).hide();
    });

    $("#name-searching").keyup(function () {
        //    each_employee
        var keyword = $(this).val().toLowerCase();
        console.log(keyword);
        $('.each_employee').each(function(i){
            var name = $(this).find(".employee-name").html().toLowerCase();
            if (name.includes(keyword)) {
                $(this).show();
            } else {
                $(this).fadeOut(250);
            }
        });
    });

</script>
