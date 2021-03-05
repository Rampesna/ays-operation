<script src="{{ asset('assets/bundles/fullcalendarscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/fullcalendar/locale/tr.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>

<script>
    var ModalSelector = $("#ModalSelector");
    var onlineMeetingSelector = $("#onlineMeeting");
    var createMeetingButton = $("#createMeetingButton");
    var createNoteButton = $("#createNoteButton");
    var createInformationButton = $("#createInformationButton")
    var createReminderButton = $("#createReminderButton")

    var employeesAndUsersEdit = $("#employeesAndUsersEdit");
    var employeesAndUsersShow = $("#employeesAndUsersShow");

    var employeesAndUsersShowUsers = $("#employeesAndUsersShowUsers");
    var employeesAndUsersShowEmployees = $("#employeesAndUsersShowEmployees");

    var createMeetingEmployees = $("#create_meeting_employees");
    var createMeetingUsers = $("#create_meeting_users");

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
    var showMeetingEmployees = $("#showMeetingEmployees");
    var showMeetingUsers = $("#showMeetingUsers");
    var showMeetingDeleteButton = $("#showMeetingDeleteButton");
    var updateMeeting = $("#updateMeeting");
    var deleteMeeting = $("#deleteMeeting");

    var showNote = $("#showNote");
    var showNoteDate = $("#showNoteDate");
    var showNoteTitle = $("#showNoteTitle");
    var showNoteNote = $("#showNoteNote");
    var updateNote = $("#updateNote");
    var deleteNote = $("#deleteNote");

    var showInformation = $("#showInformation");
    var showInformationDate = $("#showInformationDate");
    var showInformationTitle = $("#showInformationTitle");
    var showInformationInformation = $("#showInformationInformation");
    var updateInformation = $("#updateInformation");
    var deleteInformation = $("#deleteInformation");

    var showReminder = $("#showReminder");
    var showReminderDate = $("#showReminderDate");
    var showReminderTitle = $("#showReminderTitle");
    var showReminderNote = $("#showReminderNote");
    var showReminderNotification = $("#showReminderNotification");
    var showReminderMail = $("#showReminderMail");
    var showReminderSms = $("#showReminderSms");
    var updateReminder = $("#updateReminder");
    var deleteReminder = $("#deleteReminder");

    $('.modalSelector').click(function () {
        ModalSelector.modal('hide');
    });

    function checkIfObjectExist(meetingEmployees, employee_id) {
        for (var i = 0; i < meetingEmployees.length; i++) {
            if (meetingEmployees[i].id === employee_id) {
                return true;
            }
        }
    }

    function getEmployeesByCompany() {
        var company_id = $('#create_meeting_company_id').val();
        $.ajax({
            type: 'get',
            url: '{{ route('ajax.all-employees-by-company-id') }}',
            data: {
                company_id: company_id
            },
            success: function (employees) {
                createMeetingEmployees.empty();
                $.each(employees, function (index) {
                    createMeetingEmployees.append(`<option value="${employees[index].id}">${employees[index].name}</option>`);
                });
                createMeetingEmployees.selectpicker('refresh');
            },
            error: function (error) {
                console.log('ajax.all-employees-by-company-id => ' + error)
            }
        });
    }

    function getUsersByCompany() {
        var company_id = $('#create_meeting_company_id').val();
        $.ajax({
            type: 'get',
            url: '{{ route('ajax.user.usersByCompany') }}',
            data: {
                company_id: company_id,
                excepts: ['{{ auth()->user()->getId() }}']
            },
            success: function (users) {
                createMeetingUsers.empty();
                $.each(users, function (index) {
                    createMeetingUsers.append(`<option value="${users[index].id}">${users[index].name}</option>`);
                });
                createMeetingUsers.selectpicker('refresh');
            },
            error: function (error) {
                console.log('ajax.user.usersByCompany => ' + error)
            }
        });
    }

    getEmployeesByCompany();
    getUsersByCompany();

    $("#create_meeting_company_id").change(function () {
        getEmployeesByCompany();
        getUsersByCompany();
    });

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
            ModalSelector.modal('show');
            $("#create_meeting_start_date").val(date.format('YYYY-MM-DD') + 'T12:00');
            $("#create_meeting_end_date").val(date.format('YYYY-MM-DD') + 'T13:00');
            $("#create_note_date").val(date.format('YYYY-MM-DD') + 'T12:00');
            $("#create_information_date").val(date.format('YYYY-MM-DD') + 'T12:00');
            $("#create_reminder_date").val(date.format('YYYY-MM-DD') + 'T12:00');
        },

        eventClick: function (calEvent, jsEvent, view) {
            if (calEvent.type === 'meeting') {
                $("#show_meeting_toggle").click()
                $("#show_meeting").hide();
                $.ajax({
                    type: 'get',
                    url: '{{ route('ajax.calendar.meeting.show') }}',
                    data: {
                        meeting_id: calEvent.meeting_id
                    },
                    success: function (meeting) {

                        var employees = [];
                        var users = [];

                        $.ajax({
                            async: false,
                            type: 'get',
                            url: '{{ route('ajax.all-employees-by-company-id') }}',
                            data: {
                                company_id: meeting.company_id
                            },
                            success: function (response) {
                                employees = response;
                            },
                            error: function (error) {
                                console.log('ajax.all-employees-by-company-id => ' + error)
                            }
                        });

                        $.ajax({
                            async: false,
                            type: 'get',
                            url: '{{ route('ajax.user.usersByCompany') }}',
                            data: {
                                company_id: meeting.company_id,
                                excepts: [
                                    '{{ auth()->user()->getId() }}'
                                ]
                            },
                            success: function (response) {
                                users = response;
                            },
                            error: function (error) {
                                console.log('ajax.all-employees-by-company-id => ' + error)
                            }
                        });

                        showMeetingEmployees.empty();
                        $.each(employees, function (index) {
                            showMeetingEmployees.append(`<option ${checkIfObjectExist(meeting.employees, employees[index].id) ? 'selected' : null} value="${employees[index].id}">${employees[index].name}</option>`);
                        });
                        showMeetingEmployees.selectpicker('refresh');

                        showMeetingUsers.empty();
                        $.each(users, function (index) {
                            showMeetingUsers.append(`<option ${checkIfObjectExist(meeting.users, users[index].id) ? 'selected' : null} value="${users[index].id}">${users[index].name}</option>`);
                        });
                        showMeetingUsers.selectpicker('refresh');

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
                            showMeetingEmployees.prop('disabled', true).selectpicker('refresh');
                            showMeetingUsers.prop('disabled', true).selectpicker('refresh');
                            showMeetingDeleteButton.hide();
                            employeesAndUsersEdit.hide();
                            employeesAndUsersShow.show();

                            employeesAndUsersShowEmployees.html('');
                            $.each(meeting.employees, function (index) {
                                employeesAndUsersShowEmployees.append(`
                                <a class="symbol symbol-30 symbol-circle setTooltip" data-toggle="tooltip" title="${meeting.employees[index].name}">
                                    <img alt="Pic" src="${meeting.employees[index].image ? '{{ asset('') }}' + meeting.employees[index].image : '{{ asset('assets/media/logos/avatar.jpg') }}'}" />
                                </a>
                                `);
                            });

                            employeesAndUsersShowUsers.html('');
                            $.each(meeting.users, function (index) {
                                employeesAndUsersShowUsers.append(`
                                <a class="symbol symbol-30 symbol-circle setTooltip" data-toggle="tooltip" title="${meeting.users[index].name}">
                                    <img alt="Pic" src="${meeting.users[index].image ? '{{ asset('') }}' + meeting.users[index].image : '{{ asset('assets/media/logos/avatar.jpg') }}'}" />
                                </a>
                                `);
                            });

                            $('.setTooltip').tooltip();
                        } else {
                            showMeeting.val(meeting.id).prop('disabled', false);
                            showMeetingCompany.val(meeting.company_id).prop('disabled', false);
                            showMeetingName.val(meeting.name).prop('disabled', false);
                            showMeetingStartDate.val(start_date).prop('disabled', false);
                            showMeetingEndDate.val(end_date).prop('disabled', false);
                            showMeetingDescription.val(meeting.description).prop('disabled', false);
                            showMeetingVisibilityControl.show();
                            showMeetingVisibility.val(meeting.visibility).prop('disabled', false).selectpicker('refresh');
                            showMeetingType.val(meeting.type).prop('disabled', false).selectpicker('refresh');
                            showMeetingLink.val(meeting.link).prop('disabled', false);
                            meeting.type ? showMeetingLinkControl.show() : showMeetingLinkControl.hide();
                            updateMeeting.show();
                            showMeetingEmployees.prop('disabled', false).selectpicker('refresh');
                            showMeetingUsers.prop('disabled', false).selectpicker('refresh');
                            showMeetingDeleteButton.show();
                            employeesAndUsersEdit.show();
                            employeesAndUsersShow.hide();
                        }
                        $("#show_meeting").fadeIn(250);
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            }

            if (calEvent.type === 'note') {
                $("#show_note_toggle").click();
                $("#show_note").hide();
                showNote.val(calEvent.note_id);
                $.ajax({
                    type: 'get',
                    url: '{{ route('ajax.calendar.calendarNote.show') }}',
                    data: {
                        note_id: calEvent.note_id
                    },
                    success: function (note) {
                        var getDate = new Date(note.date);
                        var date =
                            getDate.getFullYear() + '-' +
                            (String(getDate.getMonth() + 1).padStart(2, '0')) + '-' +
                            (String(getDate.getDate()).padStart(2, '0')) + 'T' +
                            String(getDate.getHours()).padStart(2, '0') + ':' +
                            String(getDate.getMinutes()).padStart(2, '0');

                        showNoteDate.val(date);
                        showNoteTitle.val(note.title);
                        showNoteNote.val(note.note);
                        $("#show_note").fadeIn(250);
                    },
                    error: function (error) {
                        console.log('ajax.calendar.calendarNote.show => ' + error)
                    }
                });
            }

            if (calEvent.type === 'information') {
                $("#show_information_toggle").click();
                $("#show_information").hide();
                showInformation.val(calEvent.information_id);
                $.ajax({
                    type: 'get',
                    url: '{{ route('ajax.calendar.calendarInformation.show') }}',
                    data: {
                        information_id: calEvent.information_id
                    },
                    success: function (information) {
                        var getDate = new Date(information.date);
                        var date =
                            getDate.getFullYear() + '-' +
                            (String(getDate.getMonth() + 1).padStart(2, '0')) + '-' +
                            (String(getDate.getDate()).padStart(2, '0')) + 'T' +
                            String(getDate.getHours()).padStart(2, '0') + ':' +
                            String(getDate.getMinutes()).padStart(2, '0');

                        showInformationDate.val(date);
                        showInformationTitle.val(information.title);
                        showInformationInformation.val(information.information);
                        $("#show_information").fadeIn(250);
                    },
                    error: function (error) {
                        console.log('ajax.calendar.calendarNote.show => ' + error)
                    }
                });
            }

            if (calEvent.type === 'reminder') {
                $("#show_reminder_toggle").click();
                $("#show_reminder").hide();
                showReminder.val(calEvent.reminder_id);
                $.ajax({
                    type: 'get',
                    url: '{{ route('ajax.calendar.calendarReminder.show') }}',
                    data: {
                        reminder_id: calEvent.reminder_id
                    },
                    success: function (reminder) {
                        var getDate = new Date(reminder.date);
                        var date =
                            getDate.getFullYear() + '-' +
                            (String(getDate.getMonth() + 1).padStart(2, '0')) + '-' +
                            (String(getDate.getDate()).padStart(2, '0')) + 'T' +
                            String(getDate.getHours()).padStart(2, '0') + ':' +
                            String(getDate.getMinutes()).padStart(2, '0');

                        showReminderDate.val(date);
                        showReminderTitle.val(reminder.title);
                        showReminderNote.val(reminder.note);
                        showReminderNotification.prop('checked', reminder.notification);
                        showReminderMail.prop('checked', reminder.mail);
                        showReminderSms.prop('checked', reminder.sms);
                        $("#show_reminder").fadeIn(250);
                    },
                    error: function (error) {
                        console.log('ajax.calendar.calendarNote.show => ' + error)
                    }
                });
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

                @foreach($calendarReminders as $calendarReminder)
            {
                _id: 'r_{{ $calendarReminder->id }}',
                id: 'r_{{ $calendarReminder->id }}',
                type: 'reminder',
                title: '{{ $calendarReminder->title }}',
                start: '{{ strftime("%Y-%m-%dT%H:%M:%S",strtotime($calendarReminder->date)) }}',
                end: '{{ strftime("%Y-%m-%dT%H:%M:%S",strtotime($calendarReminder->date)) }}',
                url: 'javascript:void(0);',
                className: 'fc-event-light fc-event-solid-dark-75',
                reminder_id: '{{ $calendarReminder->id }}'
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
        var employees = $("#create_meeting_employees").val();
        var users = $("#create_meeting_users").val();

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
                    link: type == 0 ? null : link,
                    employees: employees,
                    users: users
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
                        _id: 'n_' + calendarNote.id,
                        id: 'n_' + calendarNote.id,
                        type: 'note',
                        title: calendarNote.title,
                        start: calendarNote.date,
                        end: calendarNote.date,
                        url: 'javascript:void(0);',
                        className: 'fc-event-light fc-event-solid-warning',
                        note_id: calendarNote.id
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
                        _id: 'i_' + calendarInformation.id,
                        id: 'i_' + calendarInformation.id,
                        type: 'information',
                        title: calendarInformation.title,
                        start: calendarInformation.date,
                        end: calendarInformation.date,
                        url: 'javascript:void(0);',
                        className: 'fc-event-light fc-event-solid-info',
                        information_id: calendarInformation.id
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

    createReminderButton.click(function () {
        var relation_id = '{{ auth()->user()->getId() }}';
        var relation_type = 'App\\Models\\User';
        var date = $('#create_reminder_date').val();
        var title = $('#create_reminder_title').val();
        var note = $('#create_reminder_note').val();
        var notification = $('#create_reminder_notification').is(':checked') ? 1 : 0;
        var mail = $('#create_reminder_mail').is(':checked') ? 1 : 0;
        var sms = $('#create_reminder_sms').is(':checked') ? 1 : 0;

        if (date == null || date === '') {
            toastr.warning('Hatırlatıcı Zamanı Boş Olamaz!');
        } else if (title == null || title === '') {
            toastr.warning('Başlık Boş Olamaz!');
        } else if (notification === 0 && mail === 0 && sms === 0) {
            toastr.warning('En Az Bir Hatırlatma Türü Seçilmelidir!');
        } else {
            $.ajax({
                type: 'post',
                url: '{{ route('ajax.calendar.calendarReminder.create') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    relation_id: relation_id,
                    relation_type: relation_type,
                    date: date,
                    title: title,
                    note: note,
                    notification: notification,
                    mail: mail,
                    sms: sms
                },
                success: function (reminder) {
                    $('#calendar').fullCalendar('renderEvent', {
                        _id: 'r_' + reminder.id,
                        id: 'r_' + reminder.id,
                        type: 'reminder',
                        title: reminder.title,
                        start: reminder.date,
                        end: reminder.date,
                        url: 'javascript:void(0);',
                        className: 'fc-event-light fc-event-solid-dark-75',
                        reminder_id: reminder.id
                    });
                    $("#CreateReminderModal").modal('hide');
                    $("#create_reminder_form").trigger('reset');
                },
                error: function () {

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
        var employees = $("#showMeetingEmployees").val();
        var users = $("#showMeetingUsers").val();

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
                link: link,
                employees: employees,
                users: users
            },
            success: function (meeting) {
                var event = calendar.fullCalendar('clientEvents', ['m_' + meeting_id])[0]
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

    updateNote.click(function () {
        var note_id = showNote.val();
        var creator_id = '{{ auth()->user()->getId() }}';
        var creator_type = 'App\\Models\\User';
        var title = showNoteTitle.val();
        var note = showNoteNote.val();
        var date = showNoteDate.val();

        if (creator_id === '') {
            toastr.error('Sistemsel Bir Hata Oluştu! Sayfayı Yenilemeyi Deneyin.');
        } else if (title == null || title === '') {
            toastr.warning('Not Başlığı Boş Olamaz!');
        } else if (date == null || date === '') {
            toastr.warning('Tarih Boş Olamaz!');
        } else {
            $.ajax({
                type: 'post',
                url: '{{ route('ajax.calendar.calendarNote.update') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    note_id: note_id,
                    creator_id: creator_id,
                    creator_type: creator_type,
                    title: title,
                    note: note,
                    date: date
                },
                success: function (calendarNote) {
                    var event = calendar.fullCalendar('clientEvents', ['n_' + note_id])[0]
                    event.title = calendarNote.title;
                    event.start = calendarNote.date;
                    event.end = calendarNote.date;
                    calendar.fullCalendar('updateEvent', event)
                    toastr.success('Not Güncellendi');
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    });

    updateInformation.click(function () {
        var information_id = showInformation.val();
        var creator_id = '{{ auth()->user()->getId() }}';
        var creator_type = 'App\\Models\\User';
        var title = showInformationTitle.val();
        var information = showInformationInformation.val();
        var date = showInformationDate.val();

        if (creator_id === '') {
            toastr.error('Sistemsel Bir Hata Oluştu! Sayfayı Yenilemeyi Deneyin.');
        } else if (title == null || title === '') {
            toastr.warning('Bilgilendirme Başlığı Boş Olamaz!');
        } else if (date == null || date === '') {
            toastr.warning('Tarih Boş Olamaz!');
        } else {
            $.ajax({
                type: 'post',
                url: '{{ route('ajax.calendar.calendarInformation.update') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    information_id: information_id,
                    creator_id: creator_id,
                    creator_type: creator_type,
                    title: title,
                    information: information,
                    date: date
                },
                success: function (calendarInformation) {
                    var event = calendar.fullCalendar('clientEvents', ['i_' + information_id])[0]
                    event.title = calendarInformation.title;
                    event.start = calendarInformation.date;
                    event.end = calendarInformation.date;
                    calendar.fullCalendar('updateEvent', event)
                    toastr.success('Bilgilendirme Güncellendi');
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    });

    updateReminder.click(function () {
        var reminder_id = showReminder.val();
        var relation_id = '{{ auth()->user()->getId() }}';
        var relation_type = 'App\\Models\\User';
        var date = showReminderDate.val();
        var title = showReminderTitle.val();
        var note = showReminderNote.val();
        var notification = showReminderNotification.is(':checked') ? 1 : 0;
        var mail = showReminderMail.is(':checked') ? 1 : 0;
        var sms = showReminderSms.is(':checked') ? 1 : 0;

        if (date == null || date === '') {
            toastr.warning('Hatırlatıcı Zamanı Boş Olamaz!');
        } else if (title == null || title === '') {
            toastr.warning('Başlık Boş Olamaz!');
        } else if (notification === 0 && mail === 0 && sms === 0) {
            toastr.warning('En Az Bir Hatırlatma Türü Seçilmelidir!');
        } else {
            $.ajax({
                type: 'post',
                url: '{{ route('ajax.calendar.calendarReminder.update') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    reminder_id: reminder_id,
                    relation_id: relation_id,
                    relation_type: relation_type,
                    date: date,
                    title: title,
                    note: note,
                    notification: notification,
                    mail: mail,
                    sms: sms
                },
                success: function (reminder) {
                    var event = calendar.fullCalendar('clientEvents', ['r_' + reminder.id])[0]
                    event.title = reminder.title;
                    event.start = reminder.date;
                    event.end = reminder.date;
                    calendar.fullCalendar('updateEvent', event)
                    toastr.success('Hatırlatıcı Güncellendi');
                },
                error: function () {

                }
            });
        }
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
    });

    deleteNote.click(function () {
        var note_id = showNote.val();
        $.ajax({
            type: 'delete',
            url: '{{ route('ajax.calendar.calendarNote.delete') }}',
            data: {
                _token: '{{ csrf_token() }}',
                note_id: note_id
            },
            success: function () {
                calendar.fullCalendar('removeEvents', ['n_' + note_id]);
                toastr.success('Not Silindi');
                $("#DeleteNoteModal").modal('hide');
            },
            error: function () {

            }
        });
    });

    deleteInformation.click(function () {
        var information_id = showInformation.val();
        $.ajax({
            type: 'delete',
            url: '{{ route('ajax.calendar.calendarInformation.delete') }}',
            data: {
                _token: '{{ csrf_token() }}',
                information_id: information_id
            },
            success: function () {
                calendar.fullCalendar('removeEvents', ['i_' + information_id]);
                toastr.success('Bilgilendirme Silindi');
                $("#DeleteInformationModal").modal('hide');
            },
            error: function () {

            }
        });
    });

    deleteReminder.click(function () {
        var reminder_id = showReminder.val();
        $.ajax({
            type: 'delete',
            url: '{{ route('ajax.calendar.calendarReminder.delete') }}',
            data: {
                _token: '{{ csrf_token() }}',
                reminder_id: reminder_id
            },
            success: function () {
                calendar.fullCalendar('removeEvents', ['r_' + reminder_id]);
                toastr.success('Hatırlatıcı Silindi');
                $("#DeleteReminderModal").modal('hide');
            },
            error: function () {

            }
        });
    });

    var ShowMeetingRightBar = function () {
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
                closeBy: 'show_meeting_close',
                toggleBy: 'show_meeting_toggle'
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
                _element = KTUtil.getById('show_meeting');

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
    ShowMeetingRightBar.init();

    var ShowNoteRightBar = function () {
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
                closeBy: 'show_note_close',
                toggleBy: 'show_note_toggle'
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
                _element = KTUtil.getById('show_note');

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
    ShowNoteRightBar.init();

    var ShowInformationRightBar = function () {
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
                closeBy: 'show_information_close',
                toggleBy: 'show_information_toggle'
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
                _element = KTUtil.getById('show_information');

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
    ShowInformationRightBar.init();

    var ShowReminderRightBar = function () {
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
                closeBy: 'show_reminder_close',
                toggleBy: 'show_reminder_toggle'
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
                _element = KTUtil.getById('show_reminder');

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
    ShowReminderRightBar.init();

</script>
