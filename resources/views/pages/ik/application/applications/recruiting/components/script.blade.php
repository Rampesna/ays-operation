<script src="{{ asset('assets/plugins/custom/kanban/kanban.bundle.js') }}"></script>

<script>

    var nextStepRecruitingButton = $("#nextStepRecruitingButton");
    var cancelRecruitingButton = $("#cancelRecruitingButton");
    var createRecruitingRightbarOpenerButton = $("#createRecruitingRightbarOpenerButton");
    var createRecruitingButton = $("#createRecruitingButton");
    var setRecruitingStepSubStepCheckButton = $("#setRecruitingStepSubStepCheckButton");

    var recruitingStepSubStepCheckActivitiesSelector = $("#recruitingStepSubStepCheckActivities");

    "use strict";

    var kanban = new jKanban({
        element: '#tasks',
        gutter: '0',
        widthBoard: '295px',
        dragItems: false,
        dragBoards: false,
        boards: [
                @foreach($recruitingSteps as $recruitingStep)
            {
                id: '{{ $recruitingStep->id }}',
                title:
                    '<div class="row">' +
                    '   <div class="col-xl-12 mt-2">' +
                    '       <h5>{{ $recruitingStep->name }}</h5>' +
                    '   </div>' +
                    '</div>',
                item: [
                        @if(auth()->user()->managementDepartments()->where('management_department_id', $recruitingStep->management_department_id)->exists())
                        @foreach($recruitingStep->recruitings as $recruiting)
                    {
                        id: '{{ $recruiting->id }}',
                        title:
                            '<div class="row">' +
                            '   <div class="col-xl-2 mt-n1 ml-n3">' +
                            '       <div class="dropdown dropdown-inline">' +
                            '       	<a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                            '       		<i class="fas fa-grip-horizontal cursor-pointer"></i>' +
                            '       	</a>' +
                            '       	<div class="dropdown-menu dropdown-menu-sm" style="width: 300px">' +
                            '       		<ul class="navi navi-hover">' +

                            @if(\App\Models\RecruitingStepSubStepCheck::with(['subStep'])->where('recruiting_id', $recruiting->id)->where('recruiting_step_id', $recruiting->step_id)->where('check', 0)->count() <= 0)
                                '       			<li class="navi-item">' +
                            '       				<a class="navi-link cursor-pointer nextStepRecruiting" data-id="{{ $recruiting->id }}">' +
                            '       					<span class="navi-icon">' +
                            '       						<i class="fas fa-forward text-success"></i>' +
                            '       					</span>' +
                            '       					<span class="navi-text">Sonraki Aşamaya Geç</span>' +
                            '       				</a>' +
                            '       			</li>' +
                            '                   <hr>' +
                            @endif
                                '       			<li class="navi-item">' +
                            '       				<a class="navi-link cursor-pointer cancelRecruiting" data-id="{{ $recruiting->id }}">' +
                            '       					<span class="navi-icon">' +
                            '       						<i class="fas fa-times-circle text-danger"></i>' +
                            '       					</span>' +
                            '       					<span class="navi-text">Adayı İptal Et</span>' +
                            '       				</a>' +
                            '       			</li>' +

                            '       		</ul>' +
                            '       	</div>' +
                            '       </div>' +
                            '   </div>' +
                            '   <div class="col-xl-8 ml-1 mt-1">' +
                            '       <span data-id="{{ $recruiting->id }}" class="recruitingName cursor-pointer">{{ $recruiting->name }}</span>' +
                            '   </div>' +
                            '   <div class="col-xl-2 mt-1">' +
                            '       <i class="fas fa-sort-amount-down cursor-pointer recruitingStepSubStepChecksToggle" data-id="{{ $recruiting->id }}"></i>' +
                            '   </div>' +
                            '</div>' +
                            '<div id="recruitingStepSubStepChecks_{{ $recruiting->id }}" class="recruitingStepSubStepChecks">' +
                            '   <hr>' +
                            '   <div class="row" id="recruitingStepSubStepChecksControl_{{ $recruiting->id }}">' +
                            @foreach(\App\Models\RecruitingStepSubStepCheck::with(['subStep'])->where('recruiting_id', $recruiting->id)->where('recruiting_step_id', $recruiting->step_id)->get() as $check)
                                '       <div class="col-xl-12 m-1" id="checklist_item_id_{{ $check->id }}">' +
                            '           <i onclick="setRecruitingStepSubStepCheck({{ $check->check === 1 ? 0 : 1 }},{{ $check->id }})" id="recruitingStepSubStepCheckId_{{ $check->id }}" class="cursor-pointer @if($check->check == 1) fa fa-check-circle text-success @else far fa-check-circle @endif mr-3"></i><span data-check-id="{{ $check->id }}" class="cursor-pointer showRecruitingStepSubStepCheckActivities">{{ @$check->subStep->name }}</span>' +
                            '       </div>' +
                            @endforeach
                                '   </div>' +
                            '</div>'
                    },
                    @endforeach
                    @endif
                ]
            },
            @endforeach
        ]
    });

    function setRecruitingStepSubStepCheck(check, check_id) {
        $("#set_recruiting_step_sub_step_check_check_id").val(check_id);
        $("#set_recruiting_step_sub_step_check_check").val(check);
        $("#SetRecruitingStepSubStepCheckModal").modal('show');
    }

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

    var CreateRecruiting = function () {
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
                closeBy: 'create_recruiting_rightbar_close',
                toggleBy: 'create_recruiting_rightbar_toggle'
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
                _element = KTUtil.getById('create_recruiting_rightbar');

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
    CreateRecruiting.init();

    $(".recruitingStepSubStepChecks").hide();

    $('body').on('contextmenu', function (e) {
        var top = e.pageY - 10;
        var left = e.pageX - 10;

        $("#context-menu").css({
            display: "block",
            top: top,
            left: left
        });

        return false;
    }).on("click", function () {
        $("#context-menu").hide();
    }).on('focusout', function () {
        $("#context-menu").hide();
    });

    function openSettings() {
        window.open('{{ route('ik.application.recruiting.settings') }}', '_blank');
    }

    $(document).delegate('.recruitingStepSubStepChecksToggle', 'click', function () {
        $("#recruitingStepSubStepChecks_" + $(this).data('id')).slideToggle();
    });

    $(document).delegate('.recruitingName', 'click', function () {
        var recruiting_id = $(this).data('id');

        $.ajax({
            type: 'get',
            url: '{{ route('ajax.ik.recruiting.show') }}',
            data: {
                recruiting_id: recruiting_id
            },
            success: function (recruiting) {
                console.log(recruiting)

                $("#show_recruiting_step").html(`<span class="btn btn-pill btn-sm btn-warning mt-3" style="font-size: 11px; height: 20px; padding-top: 2px">${recruiting.step.name}</span>`);
                $("#show_recruiting_email").html(recruiting.name);
                $("#show_recruiting_phone_number").html(recruiting.phone_number);
                $("#show_recruiting_identification_number").html(recruiting.identification_number);
                $("#show_recruiting_birth_date").html(recruiting.birth_date);
                $("#show_recruiting_cv").html('CV').attr('href', '{{ asset('') }}' + recruiting.cv);

                $("#showRecruitingActivities").html('');

                $.each(recruiting.activities, function (index) {
                    $("#showRecruitingActivities").append(
                        `<div class="row ml-2 mb-3">
                            <div class="col-xl-3">
                                <label for="title_">İşlemi Yapan</label>
                                <input type="text" class="form-control" value="${recruiting.activities[index].user.name}" disabled>
                            </div>
                            <div class="col-xl-3 text-center">
                                <label for="">Aday Durumu</label><br>
                                <span class="btn btn-pill btn-sm btn-${recruiting.activities[index].step.color} mt-3" style="font-size: 11px; height: 20px; padding-top: 2px">${recruiting.activities[index].step.name}</span>
                            </div>
                            <div class="col-xl-6">
                                <label for="description_">Açıklamalar</label>
                                <textarea id="description_" rows="3" class="form-control" disabled>${recruiting.activities[index].description}</textarea>
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
    });

    $(document).delegate('.nextStepRecruiting', 'click', function () {
        var recruiting_id = $(this).data('id');
        $("#next_step_recruiting_id").val(recruiting_id);
        $("#NextStepRecruitingModal").modal('show');
    });

    $(document).delegate('.cancelRecruiting', 'click', function () {
        var recruiting_id = $(this).data('id');
        $("#cancel_recruiting_id").val(recruiting_id);
        $("#CancelRecruitingModal").modal('show');
    });

    nextStepRecruitingButton.click(function () {
        var recruiting_id = $("#next_step_recruiting_id").val();
        var description = $("#next_step_recruiting_description").val();

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.ik.recruiting.nextStepRecruiting') }}',
            data: {
                _token: '{{ csrf_token() }}',
                recruiting_id: recruiting_id,
                description: description,
                user_id: '{{ auth()->user()->getId() }}'
            },
            success: function () {
                location.reload();
            },
            error: function (error) {
                console.log(error)
            }
        });
    });

    cancelRecruitingButton.click(function () {
        var recruiting_id = $("#cancel_recruiting_id").val();
        var description = $("#cancel_recruiting_description").val();

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.ik.recruiting.cancelRecruiting') }}',
            data: {
                _token: '{{ csrf_token() }}',
                recruiting_id: recruiting_id,
                description: description,
                user_id: '{{ auth()->user()->getId() }}'
            },
            success: function () {
                location.reload();
            },
            error: function (error) {
                console.log(error)
            }
        });
    });

    createRecruitingRightbarOpenerButton.click(function () {
        $("#create_recruiting_rightbar_toggle").click();
    });

    createRecruitingButton.click(function () {
        var name = $("#create_recruiting_name").val();
        var email = $("#create_recruiting_email").val();
        var phone_number = $("#create_recruiting_phone_number").val();
        var identification_number = $("#create_recruiting_identification_number").val();
        var birth_date = $("#create_recruiting_birth_date").val();
        var cv = $('#create_recruiting_cv')[0].files[0];

        if (name == null || name === '') {
            toastr.warning('Ad Soyad Boş Olamaz');
        } else if (email == null || email === '') {
            toastr.warning('E-posta Adresi Boş Olamaz');
        } else if (phone_number == null || phone_number === '') {
            toastr.warning('Telefon Numarası Boş Olamaz');
        } else if (identification_number == null || identification_number === '') {
            toastr.warning('Kimlik Numarası Boş Olamaz');
        } else if (birth_date == null || birth_date === '') {
            toastr.warning('Doğum Tarihi Boş Olamaz');
        } else if (cv == null || cv === '') {
            toastr.warning('CV Boş Olamaz');
        } else {
            $("#create_recruiting_rightbar_toggle").click();
            $("#loader").fadeIn(250);
            var data = new FormData();
            data.append('_token', '{{ csrf_token() }}');
            data.append('step_id', 1);
            data.append('name', name);
            data.append('email', email);
            data.append('phone_number', phone_number);
            data.append('identification_number', identification_number);
            data.append('birth_date', birth_date);
            data.append('cv', cv);

            $.ajax({
                processData: false,
                contentType: false,
                type: 'post',
                url: '{{ route('ajax.ik.recruiting.create') }}',
                data: data,
                success: function () {
                    toastr.success('Oluşturuldu');
                    location.reload();
                },
                error: function (error) {
                    console.log(error)
                }
            });
        }
    });

    setRecruitingStepSubStepCheckButton.click(function () {
        var check_id = $("#set_recruiting_step_sub_step_check_check_id").val();
        var check = $("#set_recruiting_step_sub_step_check_check").val();
        var description = $("#set_recruiting_step_sub_step_check_description").val();

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.ik.recruiting.setRecruitingStepSubStepCheck') }}',
            data: {
                _token: '{{ csrf_token() }}',
                check: check,
                check_id: check_id,
                description: description,
                user_id: '{{ auth()->user()->getId() }}'
            },
            success: function () {
                location.reload();
            },
            error: function (error) {
                console.log(error)
            }
        });
    });

    $(document).delegate('.showRecruitingStepSubStepCheckActivities', 'click', function () {
        var check_id = $(this).data('check-id');

        $.ajax({
            type: 'get',
            url: '{{ route('ajax.ik.recruiting.recruitingStepSubStepCheckActivities') }}',
            data: {
                check_id: check_id
            },
            success: function (recruitingStepSubStepCheck) {
                recruitingStepSubStepCheckActivitiesSelector.html('');
                $.each(recruitingStepSubStepCheck.activities, function (index) {
                    recruitingStepSubStepCheckActivitiesSelector.append(
                        `<div class="row">
                            <div class="col-xl-3">
                                <label>İşlemi Yapan</label>
                                <input type="text" class="form-control" value="${recruitingStepSubStepCheck.activities[index].user.name}" disabled>
                            </div>
                            <div class="col-xl-3 text-center">
                                <label>Durumu</label><br>
                                <span class="btn btn-pill btn-sm btn-${recruitingStepSubStepCheck.activities[index].check === 1 ? 'success' : 'danger'} mt-3" style="font-size: 11px; height: 20px; padding-top: 2px">${recruitingStepSubStepCheck.activities[index].check === 1 ? 'Onaylandı' : 'İptal Edildi'}</span>
                            </div>
                            <div class="col-xl-6">
                                <label>Açıklamalar</label>
                                <textarea rows="3" class="form-control" disabled>${recruitingStepSubStepCheck.activities[index].description}</textarea>
                            </div>
                        </div>`
                    );
                });

                $("#ShowRecruitingStepSubStepCheckActivitiesModal").modal('show');
            },
            error: function (error) {
                console.log(error)
            }
        });

    });
</script>
