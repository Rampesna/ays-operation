<script src="{{ asset('assets/bundles/fullcalendarscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/fullcalendar/locale/tr.js') }}"></script>

<script>

    const months = [
        'Ocak',
        'Şubat',
        'Mart',
        'Nisan',
        'Mayıs',
        'Haziran',
        'Temmuz',
        'Ağustos',
        'Eylül',
        'Ekim',
        'Kasım',
        'Aralık',
    ];

    function reformatDate(date) {
        var formattedDate = new Date(date);
        return String(formattedDate.getDate()).padStart(2, '0') + ' ' +
            months[formattedDate.getMonth()] + ' ' +
            formattedDate.getFullYear() + ', ' +
            String(formattedDate.getHours()).padStart(2, '0') + ':' +
            String(formattedDate.getMinutes()).padStart(2, '0') + ' ';
    }

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
                permitId: '{{ @$permit->id }}',
                title: '{{ @$permit->type->name }}',
                start: '{{ @strftime("%Y-%m-%dT%H:%M:00",strtotime($permit->start_date)) }}',
                end: '{{ @strftime("%Y-%m-%dT%H:%M:00",strtotime($permit->end_date)) }}',
                url: 'javascript:void(0);',
                className: 'fc-event-light fc-event-solid-{{ @$permit->status->color }}',
                id: 'permit_{{ $permit->id }}'
            },
                @endforeach
                @foreach($overtimes as $overtime)
            {
                myEventType: 'overtime',
                overtimeId: '{{ @$overtime->id }}',
                title: '{{ @$overtime->reason->name }}',
                start: '{{ strftime("%Y-%m-%dT%H:%M:00",strtotime(@$overtime->start_date)) }}',
                end: '{{ strftime("%Y-%m-%dT%H:%M:00",strtotime(@$overtime->end_date)) }}',
                url: 'javascript:void(0);',
                className: 'fc-event-light fc-event-solid-dark-75',
                id: 'overtime_{{ $overtime->id }}'
            },
                @endforeach
                @foreach($foodList as $food)
            {
                @php(@$foodListCheck = \App\Models\FoodListCheck::where('food_list_id', $food->id)->where('employee_id', auth()->user()->getId())->first())
                myEventType: 'food',
                foodId: '{{ @$food->id }}',
                title: '{{ @$food->name }}',
                start: '{{ @strftime("%Y-%m-%dT%H:%M:00",strtotime($food->date)) }}',
                end: '{{ @strftime("%Y-%m-%dT%H:%M:00",strtotime($food->date)) }}',
                url: 'javascript:void(0);',
                className: 'fc-event-light {{ @$foodListCheck->checked === 1 ? 'fc-event-solid-success' : (@$foodListCheck->checked === 0 ? 'fc-event-solid-danger' : 'fc-event-solid-primary') }}',
                id: 'food_{{ $food->id }}'
            },
                @endforeach
                @foreach($shifts as $shift)
            {
                myEventType: 'shift',
                shiftId: '{{ @$shift->id }}',
                title: '{{ @$shift->description }}',
                start: '{{ @strftime("%Y-%m-%dT%H:%M:00",strtotime($shift->start_date)) }}',
                end: '{{ @strftime("%Y-%m-%dT%H:%M:00",strtotime($shift->start_date)) }}',
                url: 'javascript:void(0);',
                className: 'fc-event-light fc-event-solid-{{ @intval(date('H', strtotime(@$shift->start_date))) != 9 || @intval(date('H', strtotime(@$shift->end_date))) != 18 ? 'danger' : 'secondary' }}',
                id: 'shift_{{ @$shift->id }}'
            },
            @endforeach
        ],

        eventClick: function (calEvent, jsEvent, view) {
            if (calEvent.myEventType === 'permit') {
                $.ajax({
                    type: 'get',
                    url: '{{ route('ajax.ik.permit.getPermit') }}',
                    data: {
                        id: calEvent.permitId
                    },
                    success: function (permit) {
                        $("#show_permit_start_date").html(reformatDate(permit.start_date));
                        $("#show_permit_end_date").html(reformatDate(permit.end_date));
                        $("#show_permit_duration").html(permit.duration);
                        $("#show_permit_type").html(permit.type.name);
                        $("#show_permit_status").html(permit.status.name).removeClass().addClass(`btn btn-pill btn-sm btn-${permit.status.color}`);
                        $("#show_permit_description").html(permit.description);
                    },
                    error: function (error) {
                        console.log(error)
                    }
                });

                $("#show_permit_toggle").click();
            }

            if (calEvent.myEventType === 'overtime') {
                $.ajax({
                    type: 'get',
                    url: '{{ route('ajax.ik.overtime.getOvertime') }}',
                    data: {
                        id: calEvent.overtimeId
                    },
                    success: function (overtime) {
                        $("#show_overtime_start_date").html(reformatDate(overtime.start_date));
                        $("#show_overtime_end_date").html(reformatDate(overtime.end_date));
                        $("#show_overtime_duration").html(overtime.duration);
                        $("#show_overtime_type").html(overtime.reason.name);
                        $("#show_overtime_status").html(overtime.status.name).removeClass().addClass(`btn btn-pill btn-sm btn-${overtime.status.color}`);
                        $("#show_overtime_description").html(overtime.description);
                    },
                    error: function (error) {
                        console.log(error)
                    }
                });

                $("#show_overtime_toggle").click();
            }

            if (calEvent.myEventType === 'payment') {

            }

            if (calEvent.myEventType === 'shift') {
                $.ajax({
                    type: 'get',
                    url: '{{ route('ajax.application.shift.edit') }}',
                    data: {
                        shift_id: calEvent.shiftId
                    },
                    success: function (shift) {
                        $("#show_shift_start_date").html(reformatDate(shift.start_date));
                        $("#show_shift_end_date").html(reformatDate(shift.end_date));
                        $("#show_shift_duration").html(shift.duration);
                        $("#show_shift_break_duration").html(shift.break_duration + ' Dakika');
                        $("#show_shift_description").html(shift.description);
                    },
                    error: function (error) {
                        console.log(error)
                    }
                });

                $("#show_shift_toggle").click();
            }

            if (calEvent.myEventType === 'food') {
                var employee_id = '{{ auth()->user()->getId() }}';
                var food_id = calEvent.foodId;
                var date = calEvent.start.format('YYYY-MM-DD');
                $("#selected_food_id").val(food_id);
                $.ajax({
                    type: 'get',
                    url: '{{ route('ajax.ik.food-list-check.getFoodListCheck') }}',
                    data: {
                        employee_id: employee_id,
                        food_id: food_id,
                        date: date
                    },
                    success: function (foodListCheck) {
                        console.log(foodListCheck)
                        $("#selected_food_list_check_id").val(foodListCheck.id);
                        if (foodListCheck.checked === 1) {
                            $("#food_checked_success").prop('checked', true);
                        } else if (foodListCheck.checked === 0) {
                            $("#food_checked_danger").prop('checked', true);
                        } else {
                            $("#food_checked_success").prop('checked', false);
                            $("#food_checked_danger").prop('checked', false);
                        }

                        if (foodListCheck.liked === 1) {
                            $("#food_liked_success").prop('checked', true);
                        } else if (foodListCheck.liked === 0) {
                            $("#food_liked_danger").prop('checked', true);
                        } else {
                            $("#food_liked_success").prop('checked', false);
                            $("#food_liked_danger").prop('checked', false);
                        }

                        $("#food_list_check_description").html(foodListCheck.description);
                        $("#food_name").html(foodListCheck.food.name);
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
        var event = $("#calendar").fullCalendar('clientEvents', 'food_' + $("#selected_food_id").val())[0];

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.ik.food-list-check.setFoodCheck') }}',
            data: {
                _token: '{{ csrf_token() }}',
                food_list_check_id: id,
                description: description,
                check: check
            },
            success: function (foodListCheck) {
                toastr.success('Kaydedildi');
                // console.log(foodListCheck)
                event.className = [];
                event.className = [
                    foodListCheck.checked == '1' ? 'fc-event-solid-success' : (foodListCheck.checked == '0' ? 'fc-event-solid-danger' : 'fc-event-solid-primary')
                ];
                event.start = event.start;
                event.end = event.end;
                $('#calendar').fullCalendar('updateEvent', event);
            }
        });
    }

    function setFoodLiked(id, liked, description) {
        $.ajax({
            type: 'post',
            url: '{{ route('ajax.ik.food-list-check.setFoodLiked') }}',
            data: {
                _token: '{{ csrf_token() }}',
                food_list_check_id: id,
                description: description,
                liked: liked
            },
            success: function () {
                toastr.success('Kaydedildi');
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

    $("#food_liked_success").click(function () {
        var food_list_check_id = $("#selected_food_list_check_id").val();
        var description = $("#food_list_check_description").val();
        setFoodLiked(food_list_check_id, 1, description);
    });

    $("#food_liked_danger").click(function () {
        var food_list_check_id = $("#selected_food_list_check_id").val();
        var description = $("#food_list_check_description").val();
        setFoodLiked(food_list_check_id, 0, description);
    });

    $("#update_description").click(function () {
        var food_list_check_id = $("#selected_food_list_check_id").val();
        var description = $("#food_list_check_description").val();
        setFoodCheck(food_list_check_id, null, description);
    });

    var ShowPermit = function () {
        // Private properties
        var _element;
        var _offcanvasObject;

        // Private functions
        var _init = function () {
            var header = KTUtil.find(_element, '.offcanvas-header');
            var content = KTUtil.find(_element, '.offcanvas-content');

            _offcanvasObject = new KTOffcanvas(_element, {
                overlay: true,
                baseClass: 'offcanvas',
                placement: 'right',
                closeBy: 'show_permit_close',
                toggleBy: 'show_permit_toggle'
            });

            KTUtil.scrollInit(content, {
                disableForMobile: true,
                resetHeightOnDestroy: true,
                handleWindowResize: true,
                height: function () {
                    var height = parseInt(KTUtil.getViewPort().height);

                    if (header) {
                        height = height - parseInt(KTUtil.actualHeight(header));
                        height = height - parseInt(KTUtil.css(header, 'marginTop'));
                        height = height - parseInt(KTUtil.css(header, 'marginBottom'));
                    }

                    if (content) {
                        height = height - parseInt(KTUtil.css(content, 'marginTop'));
                        height = height - parseInt(KTUtil.css(content, 'marginBottom'));
                    }

                    height = height - parseInt(KTUtil.css(_element, 'paddingTop'));
                    height = height - parseInt(KTUtil.css(_element, 'paddingBottom'));

                    height = height - 2;

                    return height;
                }
            });
        }

        // Public methods
        return {
            init: function () {
                _element = KTUtil.getById('show_permit');

                if (!_element) {
                    return;
                }

                // Initialize
                _init();
            },

            getElement: function () {
                return _element;
            }
        };
    }();
    ShowPermit.init();

    var ShowShift = function () {
        // Private properties
        var _element;
        var _offcanvasObject;

        // Private functions
        var _init = function () {
            var header = KTUtil.find(_element, '.offcanvas-header');
            var content = KTUtil.find(_element, '.offcanvas-content');

            _offcanvasObject = new KTOffcanvas(_element, {
                overlay: true,
                baseClass: 'offcanvas',
                placement: 'right',
                closeBy: 'show_shift_close',
                toggleBy: 'show_shift_toggle'
            });

            KTUtil.scrollInit(content, {
                disableForMobile: true,
                resetHeightOnDestroy: true,
                handleWindowResize: true,
                height: function () {
                    var height = parseInt(KTUtil.getViewPort().height);

                    if (header) {
                        height = height - parseInt(KTUtil.actualHeight(header));
                        height = height - parseInt(KTUtil.css(header, 'marginTop'));
                        height = height - parseInt(KTUtil.css(header, 'marginBottom'));
                    }

                    if (content) {
                        height = height - parseInt(KTUtil.css(content, 'marginTop'));
                        height = height - parseInt(KTUtil.css(content, 'marginBottom'));
                    }

                    height = height - parseInt(KTUtil.css(_element, 'paddingTop'));
                    height = height - parseInt(KTUtil.css(_element, 'paddingBottom'));

                    height = height - 2;

                    return height;
                }
            });
        }

        // Public methods
        return {
            init: function () {
                _element = KTUtil.getById('show_shift');

                if (!_element) {
                    return;
                }

                // Initialize
                _init();
            },

            getElement: function () {
                return _element;
            }
        };
    }();
    ShowShift.init();

    var ShowOvertime = function () {
        // Private properties
        var _element;
        var _offcanvasObject;

        // Private functions
        var _init = function () {
            var header = KTUtil.find(_element, '.offcanvas-header');
            var content = KTUtil.find(_element, '.offcanvas-content');

            _offcanvasObject = new KTOffcanvas(_element, {
                overlay: true,
                baseClass: 'offcanvas',
                placement: 'right',
                closeBy: 'show_overtime_close',
                toggleBy: 'show_overtime_toggle'
            });

            KTUtil.scrollInit(content, {
                disableForMobile: true,
                resetHeightOnDestroy: true,
                handleWindowResize: true,
                height: function () {
                    var height = parseInt(KTUtil.getViewPort().height);

                    if (header) {
                        height = height - parseInt(KTUtil.actualHeight(header));
                        height = height - parseInt(KTUtil.css(header, 'marginTop'));
                        height = height - parseInt(KTUtil.css(header, 'marginBottom'));
                    }

                    if (content) {
                        height = height - parseInt(KTUtil.css(content, 'marginTop'));
                        height = height - parseInt(KTUtil.css(content, 'marginBottom'));
                    }

                    height = height - parseInt(KTUtil.css(_element, 'paddingTop'));
                    height = height - parseInt(KTUtil.css(_element, 'paddingBottom'));

                    height = height - 2;

                    return height;
                }
            });
        }

        // Public methods
        return {
            init: function () {
                _element = KTUtil.getById('show_overtime');

                if (!_element) {
                    return;
                }

                // Initialize
                _init();
            },

            getElement: function () {
                return _element;
            }
        };
    }();
    ShowOvertime.init();
</script>
