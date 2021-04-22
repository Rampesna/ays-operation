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

    var showRecruitingActivitiesSelector = $("#showRecruitingActivities");
    var showRecruitingEvaluationParameters = $("#showRecruitingEvaluationParameters");

    var createNewEvaluationParameterButton = $("#createNewEvaluationParameterButton");
    var deleteRecruitingEvaluationParameterButton = $("#deleteRecruitingEvaluationParameterButton");

    showRecruitingActivitiesSelector.hide();

    function reformatDate(date) {
        var formattedDate = new Date(date);
        return String(formattedDate.getDate()).padStart(2, '0') + ' ' +
            months[formattedDate.getMonth()] + ' ' +
            formattedDate.getFullYear() + ', ' +
            String(formattedDate.getHours()).padStart(2, '0') + ':' +
            String(formattedDate.getMinutes()).padStart(2, '0') + ' ';
    }

    function reformatDateForCalendar(date) {
        var formattedDate = new Date(date);
        return formattedDate.getFullYear() + '-' +
            String(formattedDate.getMonth() + 1).padStart(2, '0') + '-' +
            String(formattedDate.getDate()).padStart(2, '0') + 'T' +
            String(formattedDate.getHours()).padStart(2, '0') + ':' +
            String(formattedDate.getMinutes()).padStart(2, '0') + ':00';
    }

    var recruitingReservations = $('#recruitingReservations').fullCalendar({
        defaultView: 'agendaWeek',
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
                    recruitingReservations.fullCalendar('next');
                }
            },
            _prev: {
                text: 'Geri',
                click: function () {
                    recruitingReservations.fullCalendar('prev');
                }
            }
        },

        dayClick: function (date, jsEvent, view) {

        },

        eventClick: function (calEvent, jsEvent, view) {
            showRecruitingActivitiesSelector.hide();

            var id = calEvent.id;
            $("#selected_reservation_id").val(calEvent.id);
            $("#selected_reservation_recruiting_id").val(calEvent.recruiting_id);

            $.ajax({
                type: 'get',
                url: '{{ route('ajax.ik.recruiting.recruiting-reservations.show') }}',
                data: {
                    id: id
                },
                success: function (reservation) {
                    $("#show_recruiting_reservation_date").html(reformatDate(reservation.date));
                    $("#show_recruiting_step").html(`<span class="btn btn-pill btn-sm btn-warning mt-3" style="font-size: 11px; height: 20px; padding-top: 2px">${reservation.recruiting.step.name}</span>`);
                    $("#show_recruiting_email").html(reservation.recruiting.name);
                    $("#show_recruiting_phone_number").html(reservation.recruiting.phone_number);
                    $("#show_recruiting_identification_number").html(reservation.recruiting.identification_number);
                    $("#show_recruiting_birth_date").html(reservation.recruiting.birth_date);
                    $("#show_recruiting_cv").html('CV').attr('href', '{{ asset('') }}' + reservation.recruiting.cv);

                    showRecruitingActivitiesSelector.html('');
                    $.each(reservation.recruiting.activities, function (index) {
                        showRecruitingActivitiesSelector.append(
                            `<div class="row ml-2 mb-3">
                            <div class="col-xl-3">
                                <label for="title_">İşlemi Yapan</label>
                                <input type="text" class="form-control" value="${reservation.recruiting.activities[index].user.name}" disabled>
                            </div>
                            <div class="col-xl-3 text-center">
                                <label for="">Aday Durumu</label><br>
                                <span class="btn btn-pill btn-sm btn-${reservation.recruiting.activities[index].step.color} mt-3" style="font-size: 11px; height: 20px; padding-top: 2px">${reservation.recruiting.activities[index].step.name}</span>
                            </div>
                            <div class="col-xl-6">
                                <label for="description_">Açıklamalar</label>
                                <textarea id="description_" rows="3" class="form-control" disabled>${reservation.recruiting.activities[index].description}</textarea>
                            </div>
                        </div>`
                        );
                    });

                    showRecruitingEvaluationParameters.html('');
                    $.each(reservation.recruiting.evaluation_parameters, function (index) {
                        showRecruitingEvaluationParameters.append(
                            `<div class="row" id="recruitingEvaluationParameterRow_${reservation.recruiting.evaluation_parameters[index].id}">
                            <div class="col-xl-1">
                                <label class="checkbox checkbox-circle checkbox-success">
                                    <input data-id="${reservation.recruiting.evaluation_parameters[index].id}" data-parameter="${reservation.recruiting.evaluation_parameters[index].parameter}" ${reservation.recruiting.evaluation_parameters[index].check === 1 ? 'checked' : null} type="checkbox" class="evaluationParameterRadio">
                                    <span></span>
                                </label>
                            </div>
                            <div class="col-xl-11 ml-n8 mt-5">
                                <span>${reservation.recruiting.evaluation_parameters[index].parameter}</span>
                                <i data-id="${reservation.recruiting.evaluation_parameters[index].id}" class="fa fa-times-circle text-danger cursor-pointer ml-5 evaluationParameterDeleter"></i>
                            </div>
                        </div>`
                        );
                    });
                },
                error: function (error) {
                    console.log(error)
                }
            });

            $("#show_recruiting_rightbar_toggle").click();
        },

        events: function(start, end, timezone, callback) {
            $.ajax({
                url: '{{ route('ajax.ik.recruiting.recruiting-reservations.calendar') }}',
                dataType: 'json',
                data: {
                    start_date: start.format(),
                    end_date: end.format()
                },
                success: function(reservations) {
                    var events = [];

                    $.each(reservations, function (index) {
                        events.push({
                            _id: reservations[index].id,
                            id: reservations[index].id,
                            type: 'reservation',
                            title: `${reservations[index].recruiting.name}`,
                            start: reformatDateForCalendar(reservations[index].date),
                            end: reformatDateForCalendar(reservations[index].date),
                            url: 'javascript:void(0)',
                            className: `fc-event-light fc-event-solid-info`,
                            reservation_id: reservations[index].id,
                            recruiting_id: reservations[index].recruiting_id

                        });
                    });
                    callback(events);
                }
            });
        }

        {{--events: [--}}
        {{--        @foreach($reservations as $reservation)--}}
        {{--    {--}}
        {{--        _id: '{{ $reservation->id }}',--}}
        {{--        id: '{{ $reservation->id }}',--}}
        {{--        type: 'reservation',--}}
        {{--        title: '{{ $reservation->customer_name }} - {{ $reservation->room->number }}',--}}
        {{--        start: '{{ strftime("%Y-%m-%dT%H:%M:%S",strtotime($reservation->start_date)) }}',--}}
        {{--        end: '{{ strftime("%Y-%m-%dT%H:%M:%S",strtotime($reservation->end_date)) }}',--}}
        {{--        url: 'javascript:void(0);',--}}
        {{--        className: 'fc-event-light fc-event-solid-{{ $reservation->status->color }}',--}}
        {{--        reservation_id: '{{ $reservation->id }}'--}}
        {{--    },--}}
        {{--        @endforeach--}}
        {{--]--}}
    });

    var ShowRecruiting = function () {
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
                closeBy: 'show_recruiting_rightbar_close',
                toggleBy: 'show_recruiting_rightbar_toggle'
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
                _element = KTUtil.getById('show_recruiting_rightbar');

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
    ShowRecruiting.init();

    $(document).delegate('.evaluationParameterDeleter', 'click', function () {
        $("#deleting_recruiting_evaluation_parameter_id").val($(this).data('id'));
        $("#DeleteRecruitingEvaluationParameterModal").modal('show');
    });

    deleteRecruitingEvaluationParameterButton.click(function () {
        var id = $("#deleting_recruiting_evaluation_parameter_id").val();

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.ik.recruiting.recruiting-evaluation-parameters.delete') }}',
            data: {
                _token: '{{ csrf_token() }}',
                id: id
            },
            success: function () {
                toastr.success('Parametre Kaldırıldı');
                $("#DeleteRecruitingEvaluationParameterModal").modal('hide');
                $("#recruitingEvaluationParameterRow_" + id).remove();
            },
            error: function () {

            }
        });
    });

    createNewEvaluationParameterButton.click(function () {
        var recruiting_id = $("#selected_reservation_recruiting_id").val();
        var parameter = $("#createNewEvaluationParameterInput").val();

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.ik.recruiting.recruiting-evaluation-parameters.save') }}',
            data: {
                _token: '{{ csrf_token() }}',
                recruiting_id: recruiting_id,
                parameter: parameter,
                check: 0
            },
            success: function (recruitingEvaluationParameter) {
                showRecruitingEvaluationParameters.append(
                    `<div class="row" id="recruitingEvaluationParameterRow_${recruitingEvaluationParameter.id}">
                        <div class="col-xl-1">
                            <label class="checkbox checkbox-circle checkbox-success">
                                <input data-id="${recruitingEvaluationParameter.id}" data-parameter="${recruitingEvaluationParameter.parameter}" ${recruitingEvaluationParameter.check === 1 ? 'checked' : null} type="checkbox" class="evaluationParameterRadio">
                                <span></span>
                            </label>
                        </div>
                        <div class="col-xl-11 ml-n8 mt-5">
                            <span>${recruitingEvaluationParameter.parameter}</span>
                            <i data-id="${recruitingEvaluationParameter.id}" class="fa fa-times-circle text-danger cursor-pointer ml-5 evaluationParameterDeleter"></i>
                        </div>
                    </div>`
                );
                $("#createNewEvaluationParameterInput").val(null);
            },
            error: function () {

            }
        });
    });

    $(document).delegate('.evaluationParameterRadio', 'click', function () {
        var id = $(this).data('id');
        var recruiting_id = $("#selected_reservation_recruiting_id").val();
        var parameter = $(this).data('parameter');
        var check = $(this).is(':checked') ? 1 : 0;

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.ik.recruiting.recruiting-evaluation-parameters.save') }}',
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                recruiting_id: recruiting_id,
                parameter: parameter,
                check: check
            },
            success: function () {

            },
            error: function () {

            }
        });
    });

    $("#showRecruitingActivitiesToggle").click(function () {
        showRecruitingActivitiesSelector.slideToggle();
    });
</script>
