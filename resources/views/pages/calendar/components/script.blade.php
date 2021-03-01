<script src="{{ asset('assets/bundles/fullcalendarscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/fullcalendar/locale/tr.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>

<script>
    var ModalSelector = $("#ModalSelector");
    var onlineMeetingSelector = $("#onlineMeeting");
    var createMeetingButton = $("#createMeetingButton");

    $('.modalSelector').click(function () {
        ModalSelector.modal('hide');
    });

    $('#calendar').fullCalendar({
        defaultView: 'month',
        lang: {
            month : 'Ay'
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
                click: function() {
                    $('#calendar').fullCalendar('next');
                }
            },
            _prev: {
                text: 'Geri',
                click: function() {
                    $('#calendar').fullCalendar('prev');
                }
            }
        },

        dayClick: function(date, jsEvent, view) {
            ModalSelector.modal('show');
            $("#create_meeting_start_date").val(date.format('YYYY-MM-DD') + 'T12:00');
            $("#create_meeting_end_date").val(date.format('YYYY-MM-DD') + 'T13:00');
        },

        eventClick: function (calEvent, jsEvent, view) {
            if (calEvent.myEventType == 'overtime') {
                $("#overtime_date").html(calEvent.start.format('DD MMMM YYYY - HH:mm'));
                $("#overtime_duration").html(calEvent.oduration);
                $("#overtime_username").html(calEvent.username);
                $("#AcceptedOvertimeModal").modal('show');

            }
        },

        events: [
            @foreach($meetings as $meeting)
            {
                id: '{{ $meeting->id }}',
                type: 'meeting',
                title: '{{ $meeting->name }}',
                start: '{{ strftime("%Y-%m-%dT%H:%M:%S",strtotime($meeting->start_date)) }}',
                end: '{{ strftime("%Y-%m-%dT%H:%M:%S",strtotime($meeting->end_date)) }}',
                url: 'javascript:void(0);',
                className: 'fc-event-light fc-event-solid-danger',
                description: '{{ $meeting->description }}'
            },
            @endforeach

            @foreach($calendarNotes as $calendarNote)
            {
                id: '{{ $calendarNote->id }}',
                type: 'meeting',
                title: '{{ $calendarNote->title }}',
                start: '{{ strftime("%Y-%m-%dT%H:%M:%S",strtotime($calendarNote->date)) }}',
                end: '{{ strftime("%Y-%m-%dT%H:%M:%S",strtotime($calendarNote->date)) }}',
                url: 'javascript:void(0);',
                className: 'fc-event-light fc-event-solid-warning',
                description: '{{ $calendarNote->description }}'
            },
            @endforeach

            @foreach($calendarInformations as $calendarInformation)
            {
                id: '{{ $calendarInformation->id }}',
                type: 'meeting',
                title: '{{ $calendarInformation->title }}',
                start: '{{ strftime("%Y-%m-%dT%H:%M:%S",strtotime($calendarInformation->date)) }}',
                end: '{{ strftime("%Y-%m-%dT%H:%M:%S",strtotime($calendarInformation->date)) }}',
                url: 'javascript:void(0);',
                className: 'fc-event-light fc-event-solid-info',
                description: '{{ $calendarInformation->description }}'
            },
            @endforeach
        ]


    });

    $("#create_meeting_type").change(function () {
        var type = $(this).val();

        if (type == 0) {
            onlineMeetingSelector.hide();
        } else {
            onlineMeetingSelector.show();
        }
    });

    createMeetingButton.click(function () {
        var company_id = $("#create_meeting_company_id").val();
        var name = $("#create_meeting_name").val();
        var description = $("#create_meeting_description").val();
        var start_date = $("#create_meeting_start_date").val();
        var end_date = $("#create_meeting_end_date").val();
        var type = $("#create_meeting_type").val();
        var link = $("#create_meeting_link").val();

        if (company_id == null || company_id === '') {
            toastr.warning('Firma Seçilmesi Zorunludur!');
        } else if (name == null || name === '') {
            toastr.warning('Toplantı Başlığı Girilmesi Zorunludur!');
        } else if (start_date == null || start_date === '') {
            toastr.warning('Başlangıç Zamanı Girilmesi Zorunludur!');
        } else if (end_date == null || end_date === '') {
            toastr.warning('Bitiş Zamanı Girilmesi Zorunludur!');
        } else if (type == null || type === '') {
            toastr.warning('Toplantı Türü Seçilmesi Zorunludur!');
        } else {
            $.ajax({
                type: 'post',
                url: '{{ route('ajax.calendar.meeting.create') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    company_id: company_id,
                    creator_id: '{{ auth() ->user()->getId() }}',
                    name: name,
                    description: description,
                    start_date: start_date,
                    end_date: end_date,
                    type: type,
                    link: type == 0 ? null : link
                },
                success: function (meeting) {
                    $('#calendar').fullCalendar('renderEvent', {
                        id: meeting.id,
                        type: 'meeting',
                        title: meeting.name,
                        start: meeting.start_date,
                        end: meeting.end_date,
                        url: 'javascript:void(0);',
                        className: 'fc-event-light fc-event-solid-danger',
                        description: meeting.description
                    });
                    $("#CreateMeetingModal").modal('hide');
                },
                error: function (error) {
                    console.log(error)
                }
            });
        }
    });

</script>
