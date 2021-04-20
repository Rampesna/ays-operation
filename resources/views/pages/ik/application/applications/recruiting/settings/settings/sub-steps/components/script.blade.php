<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
<script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

<script>

    var createRecruitingStepSubStepContext = $("#createRecruitingStepSubStepContext");
    var editRecruitingStepSubStepContext = $("#editRecruitingStepSubStepContext");
    var deleteRecruitingStepSubStepContext = $("#deleteRecruitingStepSubStepContext");

    var createRecruitingStepSubStepButton = $("#createRecruitingStepSubStepButton");
    var updateRecruitingStepSubStepButton = $("#updateRecruitingStepSubStepButton");
    var deleteRecruitingStepSubStepButton = $("#deleteRecruitingStepSubStepButton");

    var recruitingStepSubSteps = $('#recruitingStepSubSteps').DataTable({
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

        dom: 'rtipl',

        initComplete: function () {
            var r = $('#recruitingStepSubSteps tfoot tr');
            $('#recruitingStepSubSteps thead').append(r);
            this.api().columns().every(function (index) {
                var column = this;
                var input = document.createElement('input');
                input.className = 'form-control';
                $(input).appendTo($(column.footer()).empty())
                    .on('change', function () {
                        column.search($(this).val(), false, false, true).draw();
                    });
            });
        },

        processing: true,
        serverSide: true,
        ajax: '{!! route('ajax.ik.recruiting.recruiting-step-sub-steps.index') !!}',
        columns: [
            {data: 'id', name: 'id', width: "3%"},
            {data: 'name', name: 'name'},
            {data: 'recruiting_step_id', name: 'recruiting_step_id'}
        ],

        responsive: true,
        select: 'single'
    });

    $('body').on('contextmenu', function (e) {
        var selectedRows = recruitingStepSubSteps.rows({selected: true});
        if (selectedRows.count() > 0) {
            var extra_id = selectedRows.data()[0].id;
            $("#editing_recruiting_step_sub_step_id").val(extra_id);

            editRecruitingStepSubStepContext.show();
            deleteRecruitingStepSubStepContext.show();
        } else {
            editRecruitingStepSubStepContext.hide();
            deleteRecruitingStepSubStepContext.hide();
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

    $(document).click((e) => {
        if ($.contains($("#recruitingStepSubStepCard").get(0), e.target)) {
        } else {
            $("#context-menu").hide();
            recruitingStepSubSteps.rows().deselect();
        }
    });

    var EditRecruitingStepSubStepRightBar = function () {
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
                closeBy: 'edit_close',
                toggleBy: 'edit_toggle'
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
                _element = KTUtil.getById('edit_rightbar');

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
    EditRecruitingStepSubStepRightBar.init();

    var CreateRecruitingStepSubStepRightBar = function () {
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
                closeBy: 'create_close',
                toggleBy: 'create_toggle'
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
                _element = KTUtil.getById('create_rightbar');

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
    CreateRecruitingStepSubStepRightBar.init();

    function createRecruitingStepSubStep() {
        $("#create_toggle").click();
    }

    function editRecruitingStepSubStep() {
        var recruiting_step_sub_step_id = $("#editing_recruiting_step_sub_step_id").val();

        $.ajax({
            type: 'get',
            url: '{{ route('ajax.ik.recruiting.recruiting-step-sub-steps.show') }}',
            data: {
                recruiting_step_sub_step_id: recruiting_step_sub_step_id
            },
            success: function (recruitingStepSubStep) {
                $("#editing_recruiting_step_sub_step_id").val(recruitingStepSubStep.id);
                $("#editing_recruiting_step_sub_step_name").val(recruitingStepSubStep.name);
                $("#editing_recruiting_step_sub_step_recruiting_step_id").val(recruitingStepSubStep.recruiting_step_id).selectpicker('refresh');
            },
            error: function (error) {
                console.log(error)
            }
        });

        $("#edit_toggle").click();
    }

    function deleteRecruitingStepSubStep() {
        $("#DeleteRecruitingStepSubStepModal").modal('show');
    }

    createRecruitingStepSubStepButton.click(function () {
        var name = $("#creating_recruiting_step_sub_step_name").val();
        var recruiting_step_id = $("#creating_recruiting_step_sub_step_recruiting_step_id").val();

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.ik.recruiting.recruiting-step-sub-steps.save') }}',
            data: {
                _token: '{{ csrf_token() }}',
                name: name,
                recruiting_step_id: recruiting_step_id
            },
            success: function () {
                toastr.success('Yeni Alt Adım Oluşturuldu');
                $("#create_toggle").click();
                $("#createRecruitingStepSubStepForm").trigger('reset');
                $("#creating_recruiting_step_sub_step_recruiting_step_id").selectpicker('refresh');
                recruitingStepSubSteps.search('').columns().search('').ajax.reload().draw();
            },
            error: function (error) {
                console.log(error)
            }
        });
    });

    updateRecruitingStepSubStepButton.click(function () {
        var id = $("#editing_recruiting_step_sub_step_id").val();
        var name = $("#editing_recruiting_step_sub_step_name").val();
        var recruiting_step_id = $("#editing_recruiting_step_sub_step_recruiting_step_id").val();

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.ik.recruiting.recruiting-step-sub-steps.save') }}',
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                name: name,
                recruiting_step_id: recruiting_step_id
            },
            success: function () {
                toastr.success('Başarıyla Güncellendi');
                $("#edit_toggle").click();
                recruitingStepSubSteps.search('').columns().search('').ajax.reload().draw();
            },
            error: function (error) {
                console.log(error)
            }
        });
    });

    deleteRecruitingStepSubStepButton.click(function () {
        var id = $("#editing_recruiting_step_sub_step_id").val();

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.ik.recruiting.recruiting-step-sub-steps.delete') }}',
            data: {
                _token: '{{ csrf_token() }}',
                id: id
            },
            success: function () {
                toastr.success('Alt Adım Silindi');
                $("#DeleteRecruitingStepSubStepModal").modal('hide');
                recruitingStepSubSteps.search('').columns().search('').ajax.reload().draw();
            },
            error: function (error) {
                console.log(error)
            }
        });
    });
</script>
