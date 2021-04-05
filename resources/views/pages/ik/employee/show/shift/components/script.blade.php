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

        eventClick: function (calEvent, jsEvent, view) {

        },

        events: [
                @foreach($shifts as $shift)
            {
                _id: 'shift_{{ $shift->id }}',
                id: 'shift_{{ $shift->id }}',
                type: 'shift',
                title: '{{ $shift->description }}',
                start: '{{ strftime("%Y-%m-%dT%H:%M:%S",strtotime($shift->start_date)) }}',
                end: '{{ strftime("%Y-%m-%dT%H:%M:%S",strtotime($shift->end_date)) }}',
                url: 'javascript:void(0);',
                className: 'fc-event-light fc-event-solid-{{ intval(date('H', strtotime($shift->start_date))) == 9 && intval(date('H', strtotime($shift->end_date))) == 18 ? 'primary' : 'danger' }}',
                shift_id: '{{ $shift->id }}'
            },
                @endforeach
        ]
    });
</script>
