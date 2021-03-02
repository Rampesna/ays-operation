<script src="{{ asset('assets/bundles/fullcalendarscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/fullcalendar/locale/tr.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>

<script>
    var ModalSelector = $("#ModalSelector");
    var onlineMeetingSelector = $("#onlineMeeting");
    var createMeetingButton = $("#createMeetingButton");
    var createNoteButton = $("#createNoteButton");
    var createInformationButton = $("#createInformationButton");

    var showMeeting = $("#showMeeting");
    var showMeetingCompany = $("#showMeetingCompany");
    var showMeetingName = $("#showMeetingName");
    var showMeetingStartDate = $("#showMeetingStartDate");
    var showMeetingEndDate = $("#showMeetingEndDate");
    var showMeetingDescription = $("#showMeetingDescription");
    var showMeetingVisibility = $("#showMeetingVisibility");
    var showMeetingVisibilityControl = $("#showMeetingVisibilityControl");
    var showMeetingType = $("#showMeetingType");
    var showMeetingLinkControl = $("#showMeetingLinkControl");
    var showMeetingLink = $("#showMeetingLink");
    var showMeetingDeleteButton = $("#showMeetingDeleteButton");
    var updateMeeting = $("#updateMeeting");
    var deleteMeeting = $("#deleteMeeting");

    $('.modalSelector').click(function () {
        ModalSelector.modal('hide');
    });

    var calendar = $('#calendar').fullCalendar({
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
            $("#create_note_date").val(date.format('YYYY-MM-DD') + 'T12:00');
            $("#create_information_date").val(date.format('YYYY-MM-DD') + 'T12:00');
        },

        eventClick: function (calEvent, jsEvent, view) {
            if (calEvent.type === 'meeting') {
                $("#show_meeting_toggle").click()
                $("#show_meeting").hide();
                $("#selectedMeeting").val(calEvent.id)
                $.ajax({
                    type: 'get',
                    url: '{{ route('ajax.calendar.meeting.show') }}',
                    data: {
                        meeting_id: calEvent.meeting_id
                    },
                    success: function (meeting) {
                        var startDate = new Date(meeting.start_date);
                        var start_date =
                            startDate.getFullYear() + '-' +
                            (String(startDate.getMonth() + 1).padStart(2, '0')) + '-' +
                            (String(startDate.getDate()).padStart(2, '0')) + 'T' +
                            String(startDate.getHours()).padStart(2, '0') + ':' +
                            String(startDate.getMinutes()).padStart(2, '0');

                        var endDate = new Date(meeting.end_date);
                        var end_date =
                            endDate.getFullYear() + '-' +
                            (String(endDate.getMonth() + 1).padStart(2, '0')) + '-' +
                            (String(endDate.getDate()).padStart(2, '0')) + 'T' +
                            String(endDate.getHours()).padStart(2, '0') + ':' +
                            String(endDate.getMinutes()).padStart(2, '0');

                        if (meeting.creator_id != '{{ auth()->user()->getId() }}') {
                            showMeeting.val(meeting.id).prop('disabled', true);
                            showMeetingCompany.val(meeting.company_id).prop('disabled', true);
                            showMeetingName.val(meeting.name).prop('disabled', true);
                            showMeetingStartDate.val(start_date).prop('disabled', true);
                            showMeetingEndDate.val(end_date).prop('disabled', true);
                            showMeetingDescription.val(meeting.description).prop('disabled', true);
                            showMeetingVisibility.val(meeting.visibility).selectpicker('refresh').prop('disabled', true);
                            showMeetingVisibilityControl.hide();
                            showMeetingType.val(meeting.type).prop('disabled', true).selectpicker('refresh');
                            showMeetingLink.val(meeting.link).prop('disabled', true);
                            meeting.type ? showMeetingLinkControl.show().prop('disabled', true) : showMeetingLinkControl.hide().prop('disabled', true);
                            updateMeeting.hide();
                            showMeetingDeleteButton.hide();
                        } else {
                            showMeeting.val(meeting.id);
                            showMeetingCompany.val(meeting.company_id);
                            showMeetingName.val(meeting.name);
                            showMeetingStartDate.val(start_date);
                            showMeetingEndDate.val(end_date);
                            showMeetingDescription.val(meeting.description);
                            showMeetingVisibility.val(meeting.visibility).selectpicker('refresh');
                            showMeetingType.val(meeting.type).selectpicker('refresh');
                            showMeetingLink.val(meeting.link);
                            meeting.type ? showMeetingLinkControl.show() : showMeetingLinkControl.hide();
                            updateMeeting.show();
                            showMeetingDeleteButton.show();
                        }
                        $("#show_meeting").fadeIn(250);
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            }

            if (calEvent.type === 'note') {
                console.log(calEvent.type + ' - ' + calEvent.id)
                $("#show_note_toggle").click()
            }

            if (calEvent.type === 'information') {
                console.log(calEvent.type + ' - ' + calEvent.id)
                $("#show_information_toggle").click()
            }
        },

        events: [
            @foreach($meetings as $meeting)
            {
                _id: 'm_{{ $meeting->id }}',
                id: 'm_{{ $meeting->id }}',
                type: 'meeting',
                title: '{{ $meeting->name }}',
                start: '{{ strftime("%Y-%m-%dT%H:%M:%S",strtotime($meeting->start_date)) }}',
                end: '{{ strftime("%Y-%m-%dT%H:%M:%S",strtotime($meeting->end_date)) }}',
                url: 'javascript:void(0);',
                className: 'fc-event-light fc-event-solid-danger',
                meeting_id: '{{ $meeting->id }}'
            },
            @endforeach

            @foreach($calendarNotes as $calendarNote)
            {
                _id: 'n_{{ $calendarNote->id }}',
                id: 'n_{{ $calendarNote->id }}',
                type: 'note',
                title: '{{ $calendarNote->title }}',
                start: '{{ strftime("%Y-%m-%dT%H:%M:%S",strtotime($calendarNote->date)) }}',
                end: '{{ strftime("%Y-%m-%dT%H:%M:%S",strtotime($calendarNote->date)) }}',
                url: 'javascript:void(0);',
                className: 'fc-event-light fc-event-solid-warning',
                note_id: '{{ $calendarNote->id }}'
            },
            @endforeach

            @foreach($calendarInformations as $calendarInformation)
            {
                _id: 'i_{{ $calendarInformation->id }}',
                id: 'i_{{ $calendarInformation->id }}',
                type: 'information',
                title: '{{ $calendarInformation->title }}',
                start: '{{ strftime("%Y-%m-%dT%H:%M:%S",strtotime($calendarInformation->date)) }}',
                end: '{{ strftime("%Y-%m-%dT%H:%M:%S",strtotime($calendarInformation->date)) }}',
                url: 'javascript:void(0);',
                className: 'fc-event-light fc-event-solid-info',
                information_id: '{{ $calendarInformation->id }}'
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

    showMeetingType.change(function () {
        $(this).val() === "1" ? showMeetingLinkControl.show() : showMeetingLinkControl.hide();
        $(this).val() === "1" ? showMeetingLink.focus() : null;
    });

    createMeetingButton.click(function () {
        var company_id = $("#create_meeting_company_id").val();
        var name = $("#create_meeting_name").val();
        var description = $("#create_meeting_description").val();
        var start_date = $("#create_meeting_start_date").val();
        var end_date = $("#create_meeting_end_date").val();
        var type = $("#create_meeting_type").val();
        var visibility = $("#create_meeting_visibility").val();
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
                    visibility: visibility,
                    link: type == 0 ? null : link
                },
                success: function (meeting) {
                    $('#calendar').fullCalendar('renderEvent', {
                        _id: 'm_' + meeting.id,
                        id: 'm_' + meeting.id,
                        type: 'meeting',
                        title: meeting.name,
                        start: meeting.start_date,
                        end: meeting.end_date,
                        url: 'javascript:void(0);',
                        className: 'fc-event-light fc-event-solid-danger',
                        meeting_id: meeting.id
                    });
                    $("#CreateMeetingModal").modal('hide');
                    $("#create_meeting_form").trigger('reset');
                    toastr.success('Toplantı Oluşturuldu');
                },
                error: function (error) {
                    console.log(error)
                }
            });
        }
    });

    createNoteButton.click(function () {
        var creator_id = '{{ auth()->user()->getId() }}';
        var creator_type = 'App\\Models\\User';
        var title = $("#create_note_title").val();
        var note = $("#create_note_note").val();
        var date = $("#create_note_date").val();

        if (creator_id === '') {
            toastr.error('Sistemsel Bir Hata Oluştu! Sayfayı Yenilemeyi Deneyin.');
        } else if (title == null || title === '') {
            toastr.warning('Not Başlığı Boş Olamaz!');
        } else if (date == null || date === '') {
            toastr.warning('Tarih Boş Olamaz!');
        } else {
            $.ajax({
                type: 'post',
                url: '{{ route('ajax.calendar.calendarNote.create') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    creator_id: creator_id,
                    creator_type: creator_type,
                    title: title,
                    note: note,
                    date: date
                },
                success: function (calendarNote) {
                    $('#calendar').fullCalendar('renderEvent', {
                        id: calendarNote.id,
                        type: 'note',
                        title: calendarNote.title,
                        start: calendarNote.date,
                        end: calendarNote.date,
                        url: 'javascript:void(0);',
                        className: 'fc-event-light fc-event-solid-warning'
                    });
                    $("#CreateNoteModal").modal('hide');
                    $("#create_note_form").trigger('reset');
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    });

    createInformationButton.click(function () {
        var creator_id = '{{ auth()->user()->getId() }}';
        var creator_type = 'App\\Models\\User';
        var title = $("#create_information_title").val();
        var information = $("#create_information_information").val();
        var date = $("#create_information_date").val();

        if (creator_id === '') {
            toastr.error('Sistemsel Bir Hata Oluştu! Sayfayı Yenilemeyi Deneyin.');
        } else if (title == null || title === '') {
            toastr.warning('Bilgilendirme Başlığı Boş Olamaz!');
        } else if (date == null || date === '') {
            toastr.warning('Tarih Boş Olamaz!');
        } else {
            $.ajax({
                type: 'post',
                url: '{{ route('ajax.calendar.calendarInformation.create') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    creator_id: creator_id,
                    creator_type: creator_type,
                    title: title,
                    information: information,
                    date: date
                },
                success: function (calendarInformation) {
                    $('#calendar').fullCalendar('renderEvent', {
                        id: calendarInformation.id,
                        type: 'information',
                        title: calendarInformation.title,
                        start: calendarInformation.date,
                        end: calendarInformation.date,
                        url: 'javascript:void(0);',
                        className: 'fc-event-light fc-event-solid-info'
                    });
                    $("#CreateInformationModal").modal('hide');
                    $("#create_information_form").trigger('reset');
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    });

    updateMeeting.click(function () {
        var meeting_id = showMeeting.val();
        var company_id = showMeetingCompany.val();
        var name = showMeetingName.val();
        var start_date = showMeetingStartDate.val();
        var end_date = showMeetingEndDate.val();
        var description = showMeetingDescription.val();
        var type = showMeetingType.val();
        var visibility = showMeetingVisibility.val();
        var link = showMeetingLink.val();

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.calendar.meeting.update') }}',
            data: {
                _token: '{{ csrf_token() }}',
                meeting_id: meeting_id,
                company_id: company_id,
                creator_id: '{{ auth()->user()->getId() }}',
                name: name,
                start_date: start_date,
                end_date: end_date,
                description: description,
                type: type,
                visibility: visibility,
                link: link
            },
            success: function (meeting) {
                var event = calendar.fullCalendar('clientEvents',['m_' + meeting_id])[0]
                event.title = meeting.name;
                event.start = meeting.start_date;
                event.end = meeting.end_date;
                calendar.fullCalendar('updateEvent', event)
                toastr.success('Toplantı Güncellendi');
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    deleteMeeting.click(function () {
        var meeting_id = showMeeting.val();
        $.ajax({
            type: 'delete',
            url: '{{ route('ajax.calendar.meeting.delete') }}',
            data: {
                _token: '{{ csrf_token() }}',
                meeting_id: meeting_id
            },
            success: function () {
                calendar.fullCalendar('removeEvents', ['m_' + meeting_id]);
                toastr.success('Toplantı Silindi');
                $("#DeleteMeetingModal").modal('hide');
            },
            error: function () {

            }
        });
        console.log(meeting_id)
    });

    var ShowMeetingRightBar = function() {
        // Private properties
        var _element;
        var _offcanvasObject;

        // Private functions
        var _init = function() {
            var header = KTUtil.find(_element, '.offcanvas-header');
            var content = KTUtil.find(_element, '.offcanvas-content');

            _offcanvasObject = new KTOffcanvas(_element, {
                overlay: true,
                baseClass: 'offcanvas',
                placement: 'right',
                closeBy: 'show_meeting_close',
                toggleBy: 'show_meeting_toggle'
            });

            KTUtil.scrollInit(content, {
                disableForMobile: true,
                resetHeightOnDestroy: true,
                handleWindowResize: true,
                height: function() {
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
            init: function() {
                _element = KTUtil.getById('show_meeting');

                if (!_element) {
                    return;
                }

                // Initialize
                _init();
            },

            getElement: function() {
                return _element;
            }
        };
    }();
    ShowMeetingRightBar.init();

    var ShowNoteRightBar = function() {
        // Private properties
        var _element;
        var _offcanvasObject;

        // Private functions
        var _init = function() {
            var header = KTUtil.find(_element, '.offcanvas-header');
            var content = KTUtil.find(_element, '.offcanvas-content');

            _offcanvasObject = new KTOffcanvas(_element, {
                overlay: true,
                baseClass: 'offcanvas',
                placement: 'right',
                closeBy: 'show_note_close',
                toggleBy: 'show_note_toggle'
            });

            KTUtil.scrollInit(content, {
                disableForMobile: true,
                resetHeightOnDestroy: true,
                handleWindowResize: true,
                height: function() {
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
            init: function() {
                _element = KTUtil.getById('show_note');

                if (!_element) {
                    return;
                }

                // Initialize
                _init();
            },

            getElement: function() {
                return _element;
            }
        };
    }();
    ShowNoteRightBar.init();

    var ShowInformationRightBar = function() {
        // Private properties
        var _element;
        var _offcanvasObject;

        // Private functions
        var _init = function() {
            var header = KTUtil.find(_element, '.offcanvas-header');
            var content = KTUtil.find(_element, '.offcanvas-content');

            _offcanvasObject = new KTOffcanvas(_element, {
                overlay: true,
                baseClass: 'offcanvas',
                placement: 'right',
                closeBy: 'show_information_close',
                toggleBy: 'show_information_toggle'
            });

            KTUtil.scrollInit(content, {
                disableForMobile: true,
                resetHeightOnDestroy: true,
                handleWindowResize: true,
                height: function() {
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
            init: function() {
                _element = KTUtil.getById('show_information');

                if (!_element) {
                    return;
                }

                // Initialize
                _init();
            },

            getElement: function() {
                return _element;
            }
        };
    }();
    ShowInformationRightBar.init();

</script>
