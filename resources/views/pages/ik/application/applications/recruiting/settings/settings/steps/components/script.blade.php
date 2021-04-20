<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
<script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

<script>

    var editRecruitingStepContext = $("#editRecruitingStepContext");

    var updateRecruitingStepButton = $("#updateRecruitingStepButton");

    var recruitingSteps = $('#recruitingSteps').DataTable({
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
            var r = $('#recruitingSteps tfoot tr');
            $('#recruitingSteps thead').append(r);
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
        ajax: '{!! route('ajax.ik.recruiting.recruiting-steps.index') !!}',
        columns: [
            {data: 'id', name: 'id', width: "3%"},
            {data: 'name', name: 'name'},
            {data: 'color', name: 'color'},
            {data: 'management_department_id', name: 'management_department_id'}
        ],

        responsive: true,
        select: 'single'
    });

    $('body').on('contextmenu', function (e) {
        var selectedRows = recruitingSteps.rows({selected: true});
        if (selectedRows.count() > 0) {
            var extra_id = selectedRows.data()[0].id;
            $("#editing_recruiting_step_id").val(extra_id);

            editRecruitingStepContext.show();

            var top = e.pageY - 10;
            var left = e.pageX - 10;

            $("#context-menu").css({
                display: "block",
                top: top,
                left: left
            });
        } else {
            editRecruitingStepContext.hide();
        }



        return false;
    }).on("click", function () {
        $("#context-menu").hide();
    }).on('focusout', function () {
        $("#context-menu").hide();
    });

    $(document).click((e) => {
        if ($.contains($("#recruitingStepCard").get(0), e.target)) {
        } else {
            $("#context-menu").hide();
            recruitingSteps.rows().deselect();
        }
    });

    var EditRecruitingStepRightBar = function () {
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
    EditRecruitingStepRightBar.init();

    function editRecruitingStep() {
        var recruiting_step_id = $("#editing_recruiting_step_id").val();

        $.ajax({
            type: 'get',
            url: '{{ route('ajax.ik.recruiting.recruiting-steps.show') }}',
            data: {
                recruiting_step_id: recruiting_step_id
            },
            success: function (recruitingStep) {

                console.log(recruitingStep)

                $("#editing_recruiting_step_id").val(recruitingStep.id);
                $("#editing_recruiting_step_name").val(recruitingStep.name);
                $("#editing_recruiting_step_color").val(recruitingStep.color).selectpicker('refresh');
                $("#editing_recruiting_step_management_department_id").val(recruitingStep.management_department_id).selectpicker('refresh');
            },
            error: function (error) {
                console.log(error)
            }
        });

        $("#edit_toggle").click();
    }

    updateRecruitingStepButton.click(function () {
        var id = $("#editing_recruiting_step_id").val();
        var name = $("#editing_recruiting_step_name").val();
        var color = $("#editing_recruiting_step_color").val();
        var management_department_id = $("#editing_recruiting_step_management_department_id").val();

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.ik.recruiting.recruiting-steps.save') }}',
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                name: name,
                color: color,
                management_department_id: management_department_id
            },
            success: function () {
                toastr.success('Başarıyla Güncellendi');
                $("#edit_toggle").click();
                recruitingSteps.search('').columns().search('').ajax.reload().draw();
            },
            error: function (error) {
                console.log(error)
            }
        });
    });

</script>
