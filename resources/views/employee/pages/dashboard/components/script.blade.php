<script src="{{ asset('assets/bundles/fullcalendarscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/fullcalendar/locale/tr.js') }}"></script>

<script>
    var calendar = $('#calendar').fullCalendar({
        defaultView: 'month',
        lang: {
            month: 'Ay'
        },
        header: {
            left: 'month, agendaWeek, listMonth, _prev, _next, today',
            center: '',
            right: 'title',
        },
        contentHeight: 'auto',
        defaultDate: '{{ date('Y-m-d') }}',
        editable: false,
        eventLimit: false,
        nowIndicator: true,
        displayEventTime: false,
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

        dayClick: function (date, jsEvent, view) {

        },

        events: [
                @foreach($permits as $permit)
            {
                myEventType: 'permit',
                permitId: '{{ $permit->id }}',
                title: '{{ $permit->type->name }}',
                start: '{{ strftime("%Y-%m-%dT%H:%M:00",strtotime($permit->start_date)) }}',
                end: '{{ strftime("%Y-%m-%dT%H:%M:00",strtotime($permit->end_date)) }}',
                url: 'javascript:void(0);',
                className: 'fc-event-light fc-event-solid-{{ $permit->status->color }}'
            },
                @endforeach
                @foreach($overtimes as $overtime)
            {
                myEventType: 'overtime',
                overtimeId: '{{ $overtime->id }}',
                title: '{{ $overtime->reason->name }}',
                start: '{{ strftime("%Y-%m-%dT%H:%M:00",strtotime($overtime->start_date)) }}',
                end: '{{ strftime("%Y-%m-%dT%H:%M:00",strtotime($overtime->end_date)) }}',
                url: 'javascript:void(0);',
                className: 'fc-event-light fc-event-solid-dark-75'
            },
                @endforeach
                @foreach($foodList as $food)
            {
                myEventType: 'food',
                foodId: '{{ $food->id }}',
                title: '{{ $food->name }}',
                start: '{{ strftime("%Y-%m-%dT%H:%M:00",strtotime($food->date)) }}',
                end: '{{ strftime("%Y-%m-%dT%H:%M:00",strtotime($food->date)) }}',
                url: 'javascript:void(0);',
                className: 'fc-event-light fc-event-solid-primary'
            },
                @endforeach
                @foreach($shifts as $shift)
            {
                myEventType: 'shift',
                shiftId: '{{ $shift->id }}',
                title: '{{ $shift->description }}',
                start: '{{ strftime("%Y-%m-%dT%H:%M:00",strtotime($shift->start_date)) }}',
                end: '{{ strftime("%Y-%m-%dT%H:%M:00",strtotime($shift->start_date)) }}',
                url: 'javascript:void(0);',
                className: 'fc-event-light fc-event-solid-{{ intval(date('H', strtotime($shift->start_date))) != 9 || intval(date('H', strtotime($shift->end_date))) != 18 ? 'danger' : 'secondary' }}'
            },
            @endforeach
        ],

        eventClick: function (calEvent, jsEvent, view) {
            if (calEvent.myEventType === 'permit') {
                $("#show_permit_start_date").html(calEvent.start.format('DD MMMM YYYY - HH:mm'));
                $("#show_permit_end_date").html(calEvent.end.format('DD MMMM YYYY - HH:mm'));
                $("#show_permit_title").html(calEvent.title);
                $("#permit_duration").html(calEvent.pduration);
                $("#AcceptedPermitModal").modal('show');
            }

            if (calEvent.myEventType === 'overtime') {
                $("#overtime_date").html(calEvent.start.format('DD MMMM YYYY - HH:mm'));
                $("#overtime_duration").html(calEvent.oduration);
                $("#AcceptedOvertimeModal").modal('show');
            }

            if (calEvent.myEventType === 'payment') {
                $("#payment_date").html(calEvent.start.format('DD MMMM YYYY'));
                $("#payment_type").html(calEvent.paymentType);
                $("#payment_amount").html(calEvent.paymentAmount + " TL");
                if (calEvent.isPayBack == 1) {
                    $("#payment_payback_status").html("Ödendi");
                    $("#payment_payback_status").addClass("btn-outline-success");
                    $("#payment_payback_status").removeClass("btn-outline-warning");
                } else {
                    $("#payment_payback_status").html("Ödenmedi");
                    $("#payment_payback_status").removeClass("btn-outline-success");
                    $("#payment_payback_status").addClass("btn-outline-warning");
                }
                $("#PaymentsModal").modal('show');
            }

            if (calEvent.myEventType === 'event') {
                $("#event_name").html(calEvent.title);
                $("#event_start_date").html(calEvent.start.format('DD MMMM YYYY HH:mm'));
                $("#event_end_date").html(calEvent.end.format('DD MMMM YYYY HH:mm'));
                $("#event_description").html(calEvent.description);
                $("#AllEventsModal").modal('show');
            }

            if (calEvent.myEventType === 'shift') {
                $("#shift_start_date").html(calEvent.start.format('DD MMMM YYYY - HH:mm'));
                $("#shift_end_date").html(calEvent.end.format('DD MMMM YYYY - HH:mm'));
                $("#shift_break_duration").html(calEvent.breakDuration);
                $("#shift_description").html(calEvent.description);
                $("#ShiftModal").modal('show');
            }

            if (calEvent.myEventType === 'food') {
                var employee_id = '{{ auth()->user()->getId() }}';
                var food_id = calEvent.foodId;
                var date = calEvent.start.format('YYYY-MM-DD');

                $.ajax({
                    type: 'get',
                    url: '{{ route('ajax.ik.food-list-check.getFoodListCheck') }}',
                    data: {
                        employee_id: employee_id,
                        food_id: food_id,
                        date: date
                    },
                    success: function (foodListCheck) {
                        $("#selected_food_list_check_id").val(foodListCheck.id);
                        if (foodListCheck.checked === 1) {
                            $("#food_checked_success").prop('checked', true);
                        } else if (foodListCheck.checked === 0) {
                            $("#food_checked_danger").prop('checked', true);
                        } else {
                            $("#food_checked_success").prop('checked', false);
                            $("#food_checked_danger").prop('checked', false);
                        }

                        $("#food_list_check_description").html(foodListCheck.description);
                        $("#food_description").html(foodListCheck.food.description);
                    },
                    error: function () {

                    }
                });
                $("#ShowFoodModal").modal('show');
            }

        }

    });

    function setFoodCheck(id, check, description) {
        $.ajax({
            type: 'post',
            url: '{{ route('ajax.ik.food-list-check.setFoodCheck') }}',
            data: {
                _token: '{{ csrf_token() }}',
                food_list_check_id: id,
                description: description,
                check: check
            }
        });
    }

    $("#food_checked_success").click(function () {
        var food_list_check_id = $("#selected_food_list_check_id").val();
        var description = $("#food_list_check_description").val();
        setFoodCheck(food_list_check_id, 1, description);
    });

    $("#food_checked_danger").click(function () {
        var food_list_check_id = $("#selected_food_list_check_id").val();
        var description = $("#food_list_check_description").val();
        setFoodCheck(food_list_check_id, 0, description);
    });

    $("#update_description").click(function () {
        var food_list_check_id = $("#selected_food_list_check_id").val();
        var description = $("#food_list_check_description").val();
        setFoodCheck(food_list_check_id, null, description);
    });
</script>
