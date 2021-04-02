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
                @foreach($permits as $permit)
            {
                _id: 'permit_{{ $permit->id }}',
                id: 'permit_{{ $permit->id }}',
                type: 'permit',
                title: '{{ $permit->employee->name . ' - ' . $permit->type->name }}',
                start: '{{ strftime("%Y-%m-%dT%H:%M:%S",strtotime($permit->start_date)) }}',
                end: '{{ strftime("%Y-%m-%dT%H:%M:%S",strtotime($permit->end_date)) }}',
                url: 'javascript:void(0);',
                className: 'fc-event-light fc-event-solid-primary',
                permit_id: '{{ $permit->id }}'
            },
                @endforeach

                @foreach($overtimes as $overtime)
            {
                _id: 'overtime_{{ $overtime->id }}',
                id: 'overtime_{{ $overtime->id }}',
                type: 'overtime',
                title: '{{ $overtime->employee->name . ' - ' . $overtime->reason->name }}',
                start: '{{ strftime("%Y-%m-%dT%H:%M:%S",strtotime($overtime->start_date)) }}',
                end: '{{ strftime("%Y-%m-%dT%H:%M:%S",strtotime($overtime->end_date)) }}',
                url: 'javascript:void(0);',
                className: 'fc-event-light fc-event-solid-dark-75',
                overtime_id: '{{ $overtime->id }}'
            },
                @endforeach

                @foreach($payments as $payment)
            {
                _id: 'payment_{{ $payment->id }}',
                id: 'payment_{{ $payment->id }}',
                type: 'payment',
                title: '{{ $payment->employee->name . ' - ' . $payment->type->name }}',
                start: '{{ strftime("%Y-%m-%dT%H:%M:%S",strtotime($payment->date)) }}',
                end: '{{ strftime("%Y-%m-%dT%H:%M:%S",strtotime($payment->date)) }}',
                url: 'javascript:void(0);',
                className: 'fc-event-light fc-event-solid-info',
                payment_id: '{{ $payment->id }}'
            },
                @endforeach
        ]
    });
</script>
