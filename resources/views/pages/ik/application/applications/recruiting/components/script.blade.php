<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
<script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

<script>

    var createRecruitingButton = $("#createRecruitingButton");
    var updateRecruitingButton = $("#updateRecruitingButton");
    var deleteRecruitingButton = $("#deleteRecruitingButton");
    var reactivateRecruitingButton = $("#reactivateRecruitingButton");
    var createNewEvaluationParameterButton = $("#createNewEvaluationParameterButton");
    var deleteRecruitingEvaluationParameterButton = $("#deleteRecruitingEvaluationParameterButton");

    var editRecruitingContext = $("#editRecruitingContext");
    var showRecruitingContext = $("#showRecruitingContext");
    var deleteRecruitingContext = $("#deleteRecruitingContext");
    var reactivateRecruitingContext = $("#reactivateRecruitingContext");

    var showRecruitingActivitiesSelector = $("#showRecruitingActivities");
    var showRecruitingEvaluationParameters = $("#showRecruitingEvaluationParameters");

    showRecruitingActivitiesSelector.hide();

    $("#showRecruitingActivitiesToggle").click(function () {
        showRecruitingActivitiesSelector.slideToggle();
    });

    var recruitings = $('#recruitings').DataTable({
        language: {
            info: "_TOTAL_ Kayıttan _START_ - _END_ Arasındaki Kayıtlar Gösteriliyor.",
            infoEmpty: "Gösterilecek Hiç Kayıt Yok.",
            loadingRecords: "Kayıtlar Yükleniyor.",
            zeroRecords: "Tablo Boş",
            search: "Arama:",
            infoFiltered: "(Toplam _MAX_ Kayıttan Filtrelenenler)",
            lengthMenu: "Sayfa Başı _MENU_ Kayıt Göster",
            sProcessing: "Yükleniyor...",
            paginate: {
                first: "İlk",
                previous: "Önceki",
                next: "Sonraki",
                last: "Son"
            },
            select: {
                rows: {
                    "_": "%d kayıt seçildi",
                    "0": "",
                    "1": "1 kayıt seçildi"
                }
            },
            buttons: {
                print: {
                    title: 'Yazdır'
                }
            }
        },

        dom: 'Brtipl',

        buttons: [
            {
                extend: 'collection',
                text: '<i class="fa fa-download"></i> Dışa Aktar',
                buttons: [
                    {
                        extend: 'pdf',
                        text: '<i class="fa fa-file-pdf"></i> PDF İndir'
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fa fa-file-excel"></i> Excel İndir',
                    }
                ]
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print"></i> Yazdır'
            }
        ],

        initComplete: function () {
            var r = $('#recruitings tfoot tr');
            $('#recruitings thead').append(r);
            this.api().columns().every(function (index) {
                var column = this;
                var input = document.createElement('input');
                if (index === 0) {
                    input = null;
                    $(input).appendTo($(column.footer()).empty())
                        .on('change', function () {
                            column.search($(this).val(), false, false, true).draw();
                        });
                    return;
                } else if (index === 1) {
                    input = document.createElement('select');
                    var option = document.createElement("option");
                    option.setAttribute("value", 0);
                    option.innerHTML = "Tümü";
                    input.appendChild(option);

                    @foreach($recruitingSteps as $recruitingStep)
                        option = document.createElement("option");
                    option.setAttribute("value", '{{ $recruitingStep->id }}');
                    option.innerHTML = "{{ $recruitingStep->name }}";
                    input.appendChild(option);
                    @endforeach
                }
                input.className = 'form-control';
                $(input).appendTo($(column.footer()).empty())
                    .on('change', function () {
                        column.search($(this).val(), false, false, true).draw();
                    });
            });
        },

        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route('ajax.ik.recruiting.index') }}',
            data: {
                auth_user_id: '{{ auth()->user()->getId() }}'
            }
        },
        columns: [
            {data: 'id', name: 'id', width: "3%"},
            {data: 'step_id', name: 'step_id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'phone_number', name: 'phone_number'},
            {data: 'identification_number', name: 'identification_number'},
            {data: 'birth_date', name: 'birth_date'},
        ],

        responsive: true,
        select: 'single'
    });

    $('#recruitings tbody').on('mousedown', 'tr', function (e) {
        if (e.button === 0) {
            return false;
        } else {
            recruitings.row(this).select();
        }
    });

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

    var EditRecruiting = function () {
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
                closeBy: 'edit_recruiting_rightbar_close',
                toggleBy: 'edit_recruiting_rightbar_toggle'
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
                _element = KTUtil.getById('edit_recruiting_rightbar');

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
    EditRecruiting.init();

    $('body').on('contextmenu', function (e) {
        var selectedRows = recruitings.rows({selected: true});
        if (selectedRows.count() > 0) {
            var recruiting_id = selectedRows.data()[0].id;
            $("#editing_recruiting_id").val(recruiting_id);

            editRecruitingContext.show();
            showRecruitingContext.show();
            deleteRecruitingContext.show();
        } else {
            editRecruitingContext.hide();
            showRecruitingContext.hide();
            deleteRecruitingContext.hide();
        }

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

    function createRecruiting() {
        $("#create_recruiting_rightbar_toggle").click();
    }

    function editRecruiting() {
        var recruiting_id = $("#editing_recruiting_id").val();

        $.ajax({
            type: 'get',
            url: '{{ route('ajax.ik.recruiting.show') }}',
            data: {
                recruiting_id: recruiting_id
            },
            success: function (recruiting) {
                showRecruitingActivitiesSelector.hide();
                $("#edit_recruiting_name").val(recruiting.name);
                $("#edit_recruiting_email").val(recruiting.email);
                $("#edit_recruiting_phone_number").val(recruiting.phone_number);
                $("#edit_recruiting_identification_number").val(recruiting.identification_number);
                $("#edit_recruiting_birth_date").val(recruiting.birth_date);
                $("#edit_recruiting_step_id").val(recruiting.step_id);

                showRecruitingActivitiesSelector.html('');
                $.each(recruiting.activities, function (index) {
                    showRecruitingActivitiesSelector.append(
                        `<div class="row ml-2 mb-3">
                            <div class="col-xl-2">
                                <label>İşlemi Yapan: </label><br>
                                <span class="btn btn-pill btn-sm btn-secondary mt-3" style="font-size: 11px; height: 20px; padding-top: 2px">${recruiting.activities[index].user.name}</span>
                            </div>
                            <div class="col-xl-3 text-center">
                                <label>Aday Durumu: </label><br>
                                <span class="btn btn-pill btn-sm btn-${recruiting.activities[index].step.color} mt-3" style="font-size: 11px; height: 20px; padding-top: 2px">${recruiting.activities[index].step.name}</span>
                            </div>
                            <div class="col-xl-7">
                                <label">Açıklamalar: </label><br>
                                <span class="mt-3">${recruiting.activities[index].description}</span>
                            </div>
                        </div><hr>`
                    );
                });

                showRecruitingEvaluationParameters.html('');
                $.each(recruiting.evaluation_parameters, function (index) {
                    showRecruitingEvaluationParameters.append(
                        `<div class="row" id="recruitingEvaluationParameterRow_${recruiting.evaluation_parameters[index].id}">
                            <div class="col-xl-1">
                                <label class="checkbox checkbox-circle checkbox-success">
                                    <input data-id="${recruiting.evaluation_parameters[index].id}" data-parameter="${recruiting.evaluation_parameters[index].parameter}" ${recruiting.evaluation_parameters[index].check === 1 ? 'checked' : null} type="checkbox" class="evaluationParameterRadio">
                                    <span></span>
                                </label>
                            </div>
                            <div class="col-xl-11 ml-n8 mt-5">
                                <span>${recruiting.evaluation_parameters[index].parameter}</span>
                                <i data-id="${recruiting.evaluation_parameters[index].id}" class="fa fa-times-circle text-danger cursor-pointer ml-5 evaluationParameterDeleter"></i>
                            </div>
                        </div>`
                    );
                });
            },
            error: function (error) {
                console.log(error)
            }
        });
        $("#edit_recruiting_rightbar_toggle").click();
    }

    function showRecruiting() {
        window.open('{{ route('ik.application.recruiting.show') }}/' + $("#editing_recruiting_id").val(), '_blank');
    }

    function deleteRecruiting() {
        $("#DeleteRecruitingModal").modal('show');
    }

    function reactivateRecruiting() {
        $("#ReactivateRecruitingModal").modal('show');
    }

    function transactionHistory() {
        window.open('{{ route('ik.application.recruiting.transactionHistory') }}/' + $("#editing_recruiting_id").val(), '_blank');
    }

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
        } else if (birth_date == null || birth_date === '') {
            toastr.warning('Doğum Tarihi Boş Olamaz');
        } else if (cv == null || cv === '') {
            toastr.warning('CV Boş Olamaz');
        } else {
            $("#create_recruiting_rightbar_toggle").click();
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
                url: '{{ route('ajax.ik.recruiting.save') }}',
                data: data,
                success: function () {
                    toastr.success('Başarıyla Oluşturuldu');
                    $("#createRecruitingForm").trigger('reset');
                    recruitings.search('').columns().search('').ajax.reload().draw();
                },
                error: function (error) {
                    console.log(error)
                }
            });
        }
    });

    updateRecruitingButton.click(function () {
        var id = $("#editing_recruiting_id").val();
        var step_id = $("#edit_recruiting_step_id").val();
        var name = $("#edit_recruiting_name").val();
        var email = $("#edit_recruiting_email").val();
        var phone_number = $("#edit_recruiting_phone_number").val();
        var identification_number = $("#edit_recruiting_identification_number").val();
        var birth_date = $("#edit_recruiting_birth_date").val();
        var cv = $('#edit_recruiting_cv')[0].files[0];

        if (name == null || name === '') {
            toastr.warning('Ad Soyad Boş Olamaz');
        } else if (email == null || email === '') {
            toastr.warning('E-posta Adresi Boş Olamaz');
        } else if (phone_number == null || phone_number === '') {
            toastr.warning('Telefon Numarası Boş Olamaz');
        } else if (birth_date == null || birth_date === '') {
            toastr.warning('Doğum Tarihi Boş Olamaz');
        } else {
            $("#edit_recruiting_rightbar_toggle").click();
            var data = new FormData();
            data.append('_token', '{{ csrf_token() }}');
            data.append('id', id);
            data.append('step_id', step_id);
            data.append('name', name);
            data.append('email', email);
            data.append('phone_number', phone_number);
            data.append('identification_number', identification_number);
            data.append('birth_date', birth_date);
            data.append('cv', cv ?? null);

            $.ajax({
                processData: false,
                contentType: false,
                type: 'post',
                url: '{{ route('ajax.ik.recruiting.save') }}',
                data: data,
                success: function () {
                    toastr.success('Başarıyla Güncellendi');
                    recruitings.search('').columns().search('').ajax.reload().draw();
                },
                error: function (error) {
                    console.log(error)
                }
            });
        }
    });

    deleteRecruitingButton.click(function () {
        var id = $("#editing_recruiting_id").val();

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.ik.recruiting.delete') }}',
            data: {
                _token: '{{ csrf_token() }}',
                id: id
            },
            success: function () {
                toastr.success('Aday Silindi');
                recruitings.search('').columns().search('').ajax.reload().draw();
            },
            error: function () {

            }
        });
    });

    reactivateRecruitingButton.click(function () {
        var id = $("#editing_recruiting_id").val();

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.ik.recruiting.reactivate') }}',
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                user_id: '{{ auth()->user()->getId() }}'
            },
            success: function () {
                toastr.success('Aday Tekrar Havuza Alındı');
                $("#ReactivateRecruitingModal").modal('hide');
                recruitings.search('').columns().search('').ajax.reload().draw();
            },
            error: function () {

            }
        });
    });

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
        var recruiting_id = $("#editing_recruiting_id").val();
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
        var recruiting_id = $("#editing_recruiting_id").val();
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
</script>
