<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
<script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

<script>

    var createEvaluationParameterContext = $("#createEvaluationParameterContext");
    var editEvaluationParameterContext = $("#editEvaluationParameterContext");
    var deleteEvaluationParameterContext = $("#deleteEvaluationParameterContext");

    var createEvaluationParameterButton = $("#createEvaluationParameterButton");
    var updateEvaluationParameterButton = $("#updateEvaluationParameterButton");
    var deleteEvaluationParameterButton = $("#deleteEvaluationParameterButton");

    var evaluationParameters = $('#evaluationParameters').DataTable({
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
            var r = $('#evaluationParameters tfoot tr');
            $('#evaluationParameters thead').append(r);
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
        ajax: '{!! route('ajax.ik.recruiting.evaluation-parameters.index') !!}',
        columns: [
            {data: 'id', name: 'id', width: "3%"},
            {data: 'name', name: 'name'}
        ],

        responsive: true,
        select: 'single'
    });

    $('body').on('contextmenu', function (e) {
        var selectedRows = evaluationParameters.rows({selected: true});
        if (selectedRows.count() > 0) {
            var extra_id = selectedRows.data()[0].id;
            $("#editing_evaluation_parameter_id").val(extra_id);

            editEvaluationParameterContext.show();
            deleteEvaluationParameterContext.show();
        } else {
            editEvaluationParameterContext.hide();
            deleteEvaluationParameterContext.hide();
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
        if ($.contains($("#evaluationParameterCard").get(0), e.target)) {
        } else {
            $("#context-menu").hide();
            evaluationParameters.rows().deselect();
        }
    });

    var EditEvaluationParameterRightBar = function () {
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
    EditEvaluationParameterRightBar.init();

    var CreateEvaluationParameterRightBar = function () {
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
    CreateEvaluationParameterRightBar.init();

    function createEvaluationParameter() {
        $("#create_toggle").click();
    }

    function editEvaluationParameter() {
        var id = $("#editing_evaluation_parameter_id").val();

        $.ajax({
            type: 'get',
            url: '{{ route('ajax.ik.recruiting.evaluation-parameters.show') }}',
            data: {
                id: id
            },
            success: function (evaluationParameter) {
                $("#editing_evaluation_parameter_id").val(evaluationParameter.id);
                $("#editing_evaluation_parameter_name").val(evaluationParameter.name);
            },
            error: function (error) {
                console.log(error)
            }
        });

        $("#edit_toggle").click();
    }

    function deleteEvaluationParameter() {
        $("#DeleteEvaluationParameterModal").modal('show');
    }

    createEvaluationParameterButton.click(function () {
        var name = $("#creating_evaluation_parameter_name").val();

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.ik.recruiting.evaluation-parameters.save') }}',
            data: {
                _token: '{{ csrf_token() }}',
                name: name
            },
            success: function () {
                toastr.success('Yeni Parametre Oluşturuldu');
                $("#create_toggle").click();
                $("#createEvaluationParameterForm").trigger('reset');
                evaluationParameters.search('').columns().search('').ajax.reload().draw();
            },
            error: function (error) {
                console.log(error)
            }
        });
    });

    updateEvaluationParameterButton.click(function () {
        var id = $("#editing_evaluation_parameter_id").val();
        var name = $("#editing_evaluation_parameter_name").val();

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.ik.recruiting.evaluation-parameters.save') }}',
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                name: name
            },
            success: function () {
                toastr.success('Başarıyla Güncellendi');
                $("#edit_toggle").click();
                evaluationParameters.search('').columns().search('').ajax.reload().draw();
            },
            error: function (error) {
                console.log(error)
            }
        });
    });

    deleteEvaluationParameterButton.click(function () {
        var id = $("#editing_evaluation_parameter_id").val();

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.ik.recruiting.evaluation-parameters.delete') }}',
            data: {
                _token: '{{ csrf_token() }}',
                id: id
            },
            success: function () {
                toastr.success('Parametre Silindi');
                $("#DeleteEvaluationParameterModal").modal('hide');
                evaluationParameters.search('').columns().search('').ajax.reload().draw();
            },
            error: function (error) {
                console.log(error)
            }
        });
    });
</script>
