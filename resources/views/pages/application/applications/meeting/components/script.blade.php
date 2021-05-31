<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
<script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

<script>

    var CreateButton = $("#CreateButton");
    var UpdateButton = $("#UpdateButton");
    var DeleteButton = $("#DeleteButton");

    var usersCreate = $("#users_create");
    var usersEdit = $("#users_edit");

    var meetings = $('#meetings').DataTable({
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

        order: [
            [
                0,
                "desc"
            ]
        ],

        initComplete: function () {
            var r = $('#meetings tfoot tr');
            $('#meetings thead').append(r);
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
        ajax: '{{ route('ajax.application.meeting.datatable') }}',
        columns: [
            {data: 'id', name: 'id', width: '4%'},
            {data: 'name', name: 'name'},
            {data: 'start_date', name: 'start_date'},
            {data: 'type', name: 'type'},
            {data: 'status_id', name: 'status_id'},
            {data: 'link', name: 'link'},
            {data: 'users', name: 'users'}
        ],

        responsive: true,
        stateSave: true,
        select: 'single'
    });

    var CreateRightBar = function () {
        var _element;
        var _offcanvasObject;

        var _init = function () {
            var header = KTUtil.find(_element, '.offcanvas-header');
            var content = KTUtil.find(_element, '.offcanvas-content');

            _offcanvasObject = new KTOffcanvas(_element, {
                overlay: true,
                baseClass: 'offcanvas',
                placement: 'right',
                closeBy: 'create_rightbar_close',
                toggleBy: 'create_rightbar_toggle'
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
                _element = KTUtil.getById('CreateRightbar');

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
    CreateRightBar.init();

    var EditRightBar = function () {
        var _element;
        var _offcanvasObject;

        var _init = function () {
            var header = KTUtil.find(_element, '.offcanvas-header');
            var content = KTUtil.find(_element, '.offcanvas-content');

            _offcanvasObject = new KTOffcanvas(_element, {
                overlay: true,
                baseClass: 'offcanvas',
                placement: 'right',
                closeBy: 'edit_rightbar_close',
                toggleBy: 'edit_rightbar_toggle'
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
                _element = KTUtil.getById('EditRightbar');

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
    EditRightBar.init();

    function reformatDate(date) {
        var formattedDate = new Date(date);
        return formattedDate.getFullYear() + '-' +
            String(formattedDate.getMonth() + 1).padStart(2, '0') + '-' +
            String(formattedDate.getDate()).padStart(2, '0') + 'T' +
            String(formattedDate.getHours()).padStart(2, '0') + ':' +
            String(formattedDate.getMinutes()).padStart(2, '0') + ':00';
    }

    function allAgendas() {
        window.open('{{ route('applications.agenda.index') }}', '_blank');
    }

    function create() {
        $("#CreateForm").trigger('reset');
        usersCreate.selectpicker('refresh');
        $("#create_rightbar_toggle").trigger('click');
    }

    function edit() {
        var id = $("#id_edit").val();
        $.ajax({
            type: 'get',
            url: '{{ route('ajax.application.meeting.show') }}',
            data: {
                id: id
            },
            success: function (meeting) {
                $("#name_edit").val(meeting.name);
                $("#start_date_edit").val(reformatDate(meeting.start_date));
                $("#type_edit").val(meeting.type).selectpicker('refresh');
                $("#link_edit").val(meeting.link);
                $("#description_edit").val(meeting.description);
                $("#users_edit").val($.map(meeting.users, function (user) {
                    return user['id'];
                })).selectpicker('refresh');
            },
            error: function (error) {
                toastr.error('Sistemsel Bir Hata Oluştu!');
                console.log(error);
            }
        });
        $("#edit_rightbar_toggle").trigger('click');
    }

    function show() {
        var id = $("#id_edit").val();
        window.open('{{ route('applications.meeting.show') }}/' + id + '/index', '_blank');
    }

    function downloadMeeting() {
        window.open('{{ route('applications.meeting.download') }}?id=' + $("#id_edit").val(), '_self');
    }

    function drop() {
        $("#DeleteModal").modal('show');
    }

    function getUsers() {
        $.ajax({
            type: 'get',
            url: '{{ route('ajax.user.index') }}',
            data: {},
            success: function (users) {
                usersCreate.empty();
                usersEdit.empty();
                $.each(users, function (index) {
                    usersCreate.append(`<option value="${users[index].id}">${users[index].name}</option>`);
                    usersEdit.append(`<option value="${users[index].id}">${users[index].name}</option>`);
                });
                usersCreate.selectpicker('refresh');
                usersEdit.selectpicker('refresh');
            },
            error: function (error) {
                toastr.error('Sistemsel Bir Hata Oluştu!');
                console.log(error)
            }
        });
    }

    getUsers();

    CreateButton.click(function () {
        var name = $("#name_create").val();
        var start_date = $("#start_date_create").val();
        var type = $("#type_create").val();
        var link = $("#link_create").val();
        var description = $("#description_create").val();
        var users = $("#users_create").val();

        save({
            _token: '{{ csrf_token() }}',
            name: name,
            start_date: start_date,
            type: type,
            link: link,
            description: description,
            users: users
        }, 'Başarıyla Oluşturuldu', 'Oluşturulurken Sistemsel Bir Hata Oluştu!', 0);
    });

    UpdateButton.click(function () {
        var id = $("#id_edit").val();
        var name = $("#name_edit").val();
        var start_date = $("#start_date_edit").val();
        var type = $("#type_edit").val();
        var link = $("#link_edit").val();
        var description = $("#description_edit").val();
        var users = $("#users_edit").val();

        save({
            _token: '{{ csrf_token() }}',
            id: id,
            name: name,
            start_date: start_date,
            type: type,
            link: link,
            description: description,
            users: users
        }, 'Başarıyla Güncellendi', 'Güncellenirken Bir Hata Oluştu', 1);
    });

    DeleteButton.click(function () {
        $("#DeleteModal").modal('hide');
        $.ajax({
            type: 'delete',
            url: '{{ route('ajax.application.meeting.drop') }}',
            data: {
                _token: '{{ csrf_token() }}',
                id: $("#id_edit").val()
            },
            success: function () {
                meetings.ajax.reload().draw();
                toastr.success('Başarıyla Silindi');

            },
            error: function (error) {
                console.log(error);
                toastr.error('Silinirken Sistemsel Bir Hata Oluştu!');
            }
        });
    });

    function save(data, successMessage, errorMessage, direction) {
        $.ajax({
            type: 'post',
            url: '{{ route('ajax.application.meeting.save') }}',
            data: data,
            success: function () {
                toastr.success(successMessage);
                if (direction === 0) {
                    $("#create_rightbar_toggle").click();
                } else if (direction === 1) {
                    $("#edit_rightbar_toggle").click();
                }
                meetings.ajax.reload().draw();
            },
            error: function (error) {
                toastr.success(errorMessage);
                console.log(error)
            }
        });
    }

    $('body').on('contextmenu', function (e) {
        var selectedRows = meetings.rows({selected: true});
        if (selectedRows.count() > 0) {
            var id = selectedRows.data()[0].id.replace('#', '');
            $("#id_edit").val(id);
            $("#EditingContexts").show();
        } else {
            $("#EditingContexts").hide();
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

    $('#meetings tbody').on('mousedown', 'tr', function (e) {
        if (e.button === 0) {
            return false;
        } else {
            meetings.row(this).select();
        }
    });

    $(document).click((e) => {
        if ($.contains($("#meetingsCard").get(0), e.target)) {
        } else {
            $("#context-menu").hide();
            meetings.rows().deselect();
        }
    });

</script>
