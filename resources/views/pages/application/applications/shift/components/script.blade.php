<script src="{{ asset('assets/bundles/fullcalendarscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/fullcalendar/locale/tr.js') }}"></script>

<script>
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
        editable: true,
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


        events: [],

        select: function (start, end, jsEvent, view) {
            $("#shift_start_day").val(start.format('YYYY-MM-DD'));
            $("#shift_end_day").val(start.format('YYYY-MM-DD'));

            $("#shift_start_day_view").val(start.format('YYYY-MM-DD'));
            $("#shift_end_day_view").val(start.format('YYYY-MM-DD'));

            $("#break_start_day").val(start.format('YYYY-MM-DD'));
            $("#break_end_day").val(start.format('YYYY-MM-DD'));

            $("#shift_start").val(start.format('HH:mm'));
            $("#shift_end").val(end.format('HH:mm'));
            $("#AddShiftModal").modal('show');

        },

        eventClick: function (calEvent, jsEvent, view) {
            $("#shift_id").val(calEvent.shift_id);
            $("#shift_start_date").html(calEvent.start.format('DD MMMM YYYY - HH:mm'));
            $("#shift_end_date").html(calEvent.end.format('DD MMMM YYYY - HH:mm'));
            $("#shift_break_duration").html(calEvent.breakDuration);
            $("#shift_description").html(calEvent.description);
            $("#ShiftModal").modal('show');
            $("#EditShiftModal").modal('show');
        }

    });


</script>
