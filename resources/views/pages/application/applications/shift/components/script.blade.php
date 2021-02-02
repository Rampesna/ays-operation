<script src="{{ asset('assets/bundles/fullcalendarscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/fullcalendar/locale/tr.js') }}"></script>

<script>
    $(".onlyNumber").keypress(function (e) {
        if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });

    $('#calendar').fullCalendar({
        header: {
            left: 'month, agendaWeek, listMonth, _prev, _next, today',
            center: '',
            right: 'title',
        },
        defaultView: 'month',
        contentHeight: 'auto',
        defaultDate: '{{ date('Y-m-d') }}',
        selectable: true,
        selectMirror: true,
        editable: false,
        droppable: false,
        eventLimit: false,

        eventConstraint: {
            start: '00:00',
            end: '24:00',
        },

        customButtons: {
            _next: {
                text: 'İleri',
                click: function () {
                    $('#calendar').fullCalendar('next');
                }
            },
            _prev: {
                text: 'Geri',
                click: function () {
                    $('#calendar').fullCalendar('prev');
                }
            }
        },


        events: [
                @foreach($companies as $company)
                @foreach($company->shifts as $shift)
            {
                id: {{ $shift->id }},
                title: '{{ ucwords($shift->employee->name) }}',
                textEscape: false,
                start: '{{ strftime('%Y-%m-%dT%H:%M:00', strtotime($shift->start_date)) }}',
                end: '{{ strftime('%Y-%m-%dT%H:%M:00', strtotime($shift->end_date)) }}',
                url: 'javascript:void(0);',
                className: 'fc-event-light fc-event-solid-primary',
                breakDuration: '{{ $shift->break_duration }} Dakika',
                description: '{{ $shift->description }}',
                shift_id: '{{ $shift->id }}'
            },
            @endforeach
            @endforeach
        ],

        select: function (start, end, jsEvent, view) {
            $("#shift_start_date_create").val(start.format('YYYY-MM-DD'));
            $("#shift_end_date_create").val(start.format('YYYY-MM-DD'));
            $("#shift_start_hour_create").val('09:00');
            $("#shift_end_hour_create").val('18:00');
            $("#CreateModal").modal('show');

        },

        eventClick: function (calEvent, jsEvent, view) {
            $("#shift_start_date").html(calEvent.start.format('DD MMMM YYYY - HH:mm'));
            $("#shift_end_date").html(calEvent.end.format('DD MMMM YYYY - HH:mm'));
            $("#shift_break_duration").html(calEvent.breakDuration);
            $("#shift_description").html(calEvent.description);
            $("#shift_employee_name").html(calEvent.title);
            $("#ShowModal").modal('show');
            $("#updated_shift_id").val(calEvent.shift_id);
            $("#deleted_shift_id").val(calEvent.shift_id);
        }

    });

    var company_id_create = $("#company_id_create");

    function getEmployeesByCompany() {
        var company_id = company_id_create.val();
        var employees = $("#employees_create");

        $.ajax({
            type: 'get',
            url: '{{ route('ajax.all-employees-by-company-id') }}',
            data: {
                company_id: company_id
            },
            success: function (response) {
                employees.empty().selectpicker('refresh');
                $.each(response, function (index) {
                    employees.append('<option value="' + response[index].id + '">' + response[index].name + '</option>');
                });
                employees.selectpicker('refresh');
            },
            error: function (error) {
                console.log(error);
                employees.empty().selectpicker('refresh');
                toastr.warning('Personeller Alınırken Bir Hata Oluştu! Sayfayı Yenilemeyi Deneyin.');
            }
        });
    }

    getEmployeesByCompany();

    company_id_create.change(function () {
        getEmployeesByCompany();
    });

    $("#create_shift").click(function () {
        var company_id = $("#company_id_create").val();
        var employees = $("#employees_create").val();
        var shiftStartDate = $("#shift_start_date_create").val();
        var shiftStartHour = $("#shift_start_hour_create").val();
        var shiftEndDate = $("#shift_end_date_create").val();
        var shiftEndHour = $("#shift_end_hour_create").val();
        var breakDuration = $("#break_duration_create").val();
        var description = $("#description_create").val();

        if (company_id == null || company_id === '') {
            toastr.error("Firma Seçilmesi Zorunludur!");
        } else if (employees == null || employees.length <= 0) {
            toastr.warning("Vardiya Eklenecek Çalışan(lar)ı Seçmediniz! Lütfen Kontrol Edin");
        } else if (shiftStartHour.includes("_") || shiftStartHour.length !== 5) {
            toastr.warning("Vardiya Başlangıç Saati Eksiksiz ve Tam Doğru Şekilde Girilmelidir. Lütfen Kontrol Edin.");
        } else if (shiftEndHour.includes("_") || shiftEndHour.length !== 5) {
            toastr.warning("Vardiya Bitiş Saati Eksiksiz ve Tam Doğru Şekilde Girilmelidir. Lütfen Kontrol Edin.");
        } else if (breakDuration === '' || breakDuration == null) {
            toastr.warning("Mola Süresi Boş Olamaz");
        } else {
            $.ajax({
                type: "post",
                url: "{{ route('ajax.application.shift.store') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    company_id: company_id,
                    employees: employees,
                    start_date: shiftStartDate + ' ' + shiftStartHour,
                    end_date: shiftEndDate + ' ' + shiftEndHour,
                    break_duration: breakDuration,
                    description: description,
                },
                success: function (response) {
                    console.log(response);
                    $.each(response, function (index) {
                        $('#calendar').fullCalendar('renderEvent', {
                            id: response[index].id,
                            title: response[index].employee.name,
                            textEscape: false,
                            start: shiftStartDate + 'T' + shiftStartHour + ':00',
                            end: shiftEndDate + 'T' + shiftEndHour + ':00',
                            url: 'javascript:void(0);',
                            className: 'fc-event-light fc-event-solid-primary',
                            breakDuration: response[index].break_duration + ' Dakika',
                            description: response[index].description,
                            shift_id: response[index].id
                        });
                    });
                    toastr.success('Vardiyalar Eklendi');
                    $("#CreateModal").modal('hide');
                },
                error: function (error) {
                    console.log(error);
                    alert("Bir Hata Oluştu. Lütfen Daha Sonra Tekrar Deneyin.");
                }
            });
        }
    });

    $("#edit_shift").click(function () {
        var shift_id = $("#updated_shift_id").val();
        $.ajax({
            type: 'get',
            url: '{{ route('ajax.application.shift.edit') }}',
            data: {
                shift_id: shift_id
            },
            success: function (shift) {
                console.log(moment(new Date(shift.start_date)).format('YYYY-MM-DD'));
                $("#shift_edit_name").html(shift.employee.name);
                $("#shift_start_date_edit").val(moment(new Date(shift.start_date)).format('YYYY-MM-DD'));
                $("#shift_end_date_edit").val(moment(new Date(shift.end_date)).format('YYYY-MM-DD'));
                $("#shift_start_hour_edit").val(moment(new Date(shift.start_date)).format('HH:mm'));
                $("#shift_end_hour_edit").val(moment(new Date(shift.end_date)).format('HH:mm'));
                $("#break_duration_edit").val(shift.break_duration);
                $("#description_edit").val(shift.description);
                $("#ShowModal").modal('hide');
                $("#EditModal").modal('show');
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    $("#update_shift").click(function () {
        var shift_id = $("#updated_shift_id").val();
        var shiftStartDate = $("#shift_start_date_edit").val();
        var shiftStartHour = $("#shift_start_hour_edit").val();
        var shiftEndDate = $("#shift_end_date_edit").val();
        var shiftEndHour = $("#shift_end_hour_edit").val();
        var breakDuration = $("#break_duration_edit").val();
        var description = $("#description_edit").val();

        if (shiftStartHour.includes("_") || shiftStartHour.length !== 5) {
            toastr.warning("Vardiya Başlangıç Saati Eksiksiz ve Tam Doğru Şekilde Girilmelidir. Lütfen Kontrol Edin.");
        } else if (shiftEndHour.includes("_") || shiftEndHour.length !== 5) {
            toastr.warning("Vardiya Bitiş Saati Eksiksiz ve Tam Doğru Şekilde Girilmelidir. Lütfen Kontrol Edin.");
        } else if (breakDuration === '' || breakDuration == null) {
            toastr.warning("Mola Süresi Boş Olamaz");
        } else {
            var event = $("#calendar").fullCalendar('clientEvents', shift_id)[0];
            $.ajax({
                type: "post",
                url: "{{ route('ajax.application.shift.update') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    shift_id: shift_id,
                    start_date: shiftStartDate + ' ' + shiftStartHour,
                    end_date: shiftEndDate + ' ' + shiftEndHour,
                    break_duration: breakDuration,
                    description: description
                },
                success: function () {
                    event.start = shiftStartDate + 'T' + shiftStartHour;
                    event.end = shiftEndDate + 'T' + shiftEndHour;
                    event.breakDuration = breakDuration;
                    event.description = description;
                    $('#calendar').fullCalendar('updateEvent', event);
                    toastr.success('Vardiya Başarıyla Güncellendi');
                    $("#EditModal").modal('hide');
                },
                error: function (error) {
                    console.log(error);
                    alert("Bir Hata Oluştu. Lütfen Daha Sonra Tekrar Deneyin.");
                }
            });
        }
    });

    $("#shift_delete").click(function () {
        $("#ShowModal").modal('hide');
        $("#DeleteModal").modal('show');
    });

    $("#delete_shift").click(function () {
        var shift_id = $("#deleted_shift_id").val();
        $.ajax({
            type: 'post',
            url: '{{ route('ajax.application.shift.delete') }}',
            data: {
                _token: '{{ csrf_token() }}',
                shift_id: shift_id
            },
            success: function () {
                $('#calendar').fullCalendar('removeEvents', shift_id);
                toastr.success('Vardiya Başarıyla Silindi');
                $("#DeleteModal").modal('hide');
            }
        });
    });


</script>
