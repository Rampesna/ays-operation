<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
<script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

<script>

    function dateReCreator(getDate) {
        var date = new Date(getDate);
        return `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}-${String(date.getDate()).padStart(2, '0')}T${String(date.getHours()).padStart(2, '0')}:${String(date.getMinutes()).padStart(2, '0')}`
    }

    var filterButton = $("#filterButton");
    var clearFilterButton = $("#clearFilterButton");

    var assignedTypeCreate = $("#assigned_type_create");
    var assignedIdCreate = $("#assigned_id_create");

    var assignedTypeEdit = $("#assigned_type_edit");
    var assignedIdEdit = $("#assigned_id_edit");

    var statusIdCreate = $("#status_id_create");
    var statusIdEdit = $("#status_id_edit");

    var CreateButton = $("#CreateButton");
    var UpdateButton = $("#UpdateButton");
    var DeleteButton = $("#DeleteButton");

    var missions = $('#missions').DataTable({
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
            var r = $('#missions tfoot tr');
            $('#missions thead').append(r);
            this.api().columns().every(function (index) {
                var column = this;
                var input = document.createElement('input');

                if (index === 2) {
                    input = document.createElement('select');
                    var option = document.createElement("option");
                    option.setAttribute("value", 0);
                    option.innerHTML = "Tümü";
                    input.appendChild(option);

                    @foreach($missionStatuses as $missionStatus)
                        option = document.createElement("option");
                    option.setAttribute("value", "{{ $missionStatus->id }}");
                    option.innerHTML = "{{ $missionStatus->name }}";
                    input.appendChild(option);
                    @endforeach

                        input.className = 'selectpicker';
                } else if (index === 3 || index === 5) {
                    input = document.createElement('select');
                    var option = document.createElement("option");
                    option.setAttribute("value", "all");
                    option.innerHTML = "Tümü";
                    input.appendChild(option);

                    option = document.createElement("option");
                    option.setAttribute("value", "App\\Models\\User");
                    option.innerHTML = "Kullanıcı";
                    input.appendChild(option);

                    option = document.createElement("option");
                    option.setAttribute("value", "App\\Models\\Employee");
                    option.innerHTML = "Personel";
                    input.appendChild(option);
                } else if (index === 7 || index === 8 || index === 9) {
                    input = null;
                    $(input).appendTo($(column.footer()).empty())
                        .on('change', function () {
                            column.search($(this).val(), false, false, true).draw();
                        });
                    return;
                } else {

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
            type: 'get',
            url: '{{ route('ajax.mission.datatable') }}',
            data: function (d) {
                return $.extend({}, d, {
                    start_date: $("#start_date").val(),
                    end_date: $("#end_date").val()
                });
            }
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'subject', name: 'subject'},
            {data: 'status_id', name: 'status_id'},
            {data: 'creator_type', name: 'creator_type'},
            {data: 'creator_id', name: 'creator_id'},
            {data: 'assigned_type', name: 'assigned_type'},
            {data: 'assigned_id', name: 'assigned_id'},
            {data: 'start_date', name: 'start_date'},
            {data: 'end_date', name: 'end_date'},
            {data: 'complete_date', name: 'complete_date'}
        ],

        responsive: true,
        stateSave: false,
        colReorder: true,
        select: 'single'
    });

    function getAssignsCreate() {
        var type = assignedTypeCreate.val();
        $.ajax({
            type: 'get',
            url: '{{ route('ajax.mission.getAssigns') }}',
            data: {
                type: type
            },
            success: function (assigns) {
                assignedIdCreate.empty();
                $.each(assigns, function (index) {
                    assignedIdCreate.append(`<option value="${assigns[index].id}">${assigns[index].name}</option>`);
                });
                assignedIdCreate.selectpicker('refresh');
            },
            error: function (error) {
                toastr.error('Atanacak Kullanıcılar Alınırken Sistemsel Bir Hata Oluştu!');
                console.log(error);
            }
        });
    }

    function getAssignsEdit(id) {
        var type = assignedTypeEdit.val();
        $.ajax({
            type: 'get',
            url: '{{ route('ajax.mission.getAssigns') }}',
            data: {
                type: type
            },
            success: function (assigns) {
                assignedIdEdit.empty();
                $.each(assigns, function (index) {
                    assignedIdEdit.append(`<option value="${assigns[index].id}" ${id && id === assigns[index].id ? 'selected' : null}>${assigns[index].name}</option>`);
                });
                assignedIdEdit.selectpicker('refresh');
            },
            error: function (error) {
                toastr.error('Atanacak Kullanıcılar Alınırken Sistemsel Bir Hata Oluştu!');
                console.log(error);
            }
        });
    }

    function getStatuses() {
        $.ajax({
            type: 'get',
            url: '{{ route('ajax.mission.getStatuses') }}',
            data: {},
            success: function (statuses) {
                statusIdCreate.empty();
                statusIdEdit.empty();
                $.each(statuses, function (index) {
                    statusIdCreate.append(`<option value="${statuses[index].id}">${statuses[index].name}</option>`);
                    statusIdEdit.append(`<option value="${statuses[index].id}">${statuses[index].name}</option>`);
                });
                statusIdCreate.selectpicker('refresh');
                statusIdEdit.selectpicker('refresh');
            },
            error: function (error) {
                toastr.error('Görev Durumları Alınırken Sistemsel Bir Hata Oluştu!');
                console.log(error);
            }
        });
    }

    getStatuses();

    assignedTypeCreate.change(function () {
        getAssignsCreate();
    });

    assignedTypeEdit.change(function () {
        getAssignsEdit();
    });

    function create() {
        $("#CreateModal").modal('show');
        $("#CreateForm").trigger('reset');
        getAssignsCreate();
    }

    function edit() {
        var id = $("#id_edit").val();
        $.ajax({
            type: 'get',
            url: '{{ route('ajax.mission.show') }}',
            data: {
                id: id
            },
            success: function (mission) {
                assignedTypeEdit.val(mission.assigned_type).selectpicker('refresh');
                getAssignsEdit(mission.assigned_id);
                $("#start_date_edit").val(dateReCreator(mission.start_date));
                $("#end_date_edit").val(dateReCreator(mission.end_date));
                $("#subject_edit").val(mission.subject);
                statusIdEdit.val(mission.status_id).selectpicker('refresh');
                $("#description_edit").val(mission.description);
                $("#EditModal").modal('show');
            },
            error: function (error) {
                toastr.error('Görev Detayları Alınırken Sistemsel Bir Hata Oluştu!');
                console.log(error)
            }
        });
    }

    function drop() {
        $("#DeleteModal").modal('show');
    }

    CreateButton.click(function () {
        var creator_type = 'App\\Models\\User';
        var creator_id = '{{ auth()->user()->getId() }}';
        var assigned_type = assignedTypeCreate.val();
        var assigned_id = assignedIdCreate.val();
        var subject = $("#subject_create").val();
        var description = $("#description_create").val();
        var start_date = $("#start_date_create").val();
        var end_date = $("#end_date_create").val();
        var status_id = statusIdCreate.val();

        save({
            creator_type: creator_type,
            creator_id: creator_id,
            assigned_type: assigned_type,
            assigned_id: assigned_id,
            subject: subject,
            description: description,
            start_date: start_date,
            end_date: end_date,
            status_id: status_id
        }, 0);
    });

    UpdateButton.click(function () {
        var id = $("#id_edit").val();
        var creator_type = 'App\\Models\\User';
        var creator_id = '{{ auth()->user()->getId() }}';
        var assigned_type = assignedTypeEdit.val();
        var assigned_id = assignedIdEdit.val();
        var subject = $("#subject_edit").val();
        var description = $("#description_edit").val();
        var start_date = $("#start_date_edit").val();
        var end_date = $("#end_date_edit").val();
        var status_id = statusIdEdit.val();

        save({
            id: id,
            creator_type: creator_type,
            creator_id: creator_id,
            assigned_type: assigned_type,
            assigned_id: assigned_id,
            subject: subject,
            description: description,
            start_date: start_date,
            end_date: end_date,
            status_id: status_id
        }, 1);
    });

    function save(data, direction) {
        $.ajax({
            type: 'post',
            url: '{{ route('ajax.mission.save') }}',
            data: data,
            success: function (response) {
                if (response.type === 'success') {
                    toastr.success(response.message);
                    if (direction === 0) {
                        $("#CreateModal").modal('hide');
                    } else if (direction === 1) {
                        $("#EditModal").modal('hide');
                    }
                    missions.ajax.reload().draw();
                } else if (response.type === 'warning') {
                    toastr.warning(response.message);
                } else if (response.type === 'error') {
                    toastr.error(response.message);
                } else {
                    toastr.info(response.message);
                }
            },
            error: function (error) {
                toastr.success('Kaydedilirken Sistemsel Bir Hata Oluştu!');
                console.log(error)
            }
        });
    }

    filterButton.click(function () {
        missions.ajax.reload().draw();
    });

    clearFilterButton.click(function () {
        $("#start_date").val(null);
        $("#end_date").val(null);
        missions.ajax.reload().draw();
    });

    $('body').on('contextmenu', function (e) {
        var selectedRows = missions.rows({selected: true});
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

    $('#missions tbody').on('mousedown', 'tr', function (e) {
        if (e.button === 0) {
            return false;
        } else {
            missions.row(this).select();
        }
    });

    $(document).click((e) => {
        if ($.contains($("#missionsCard").get(0), e.target)) {
        } else {
            $("#context-menu").hide();
            missions.rows().deselect();
        }
    });
</script>
