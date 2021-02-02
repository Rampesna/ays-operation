<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
<script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

<script>
    var table = $('#groups2').DataTable({
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

        dom: 'frtipl',

        columnDefs: [
            {
                targets: 2,
                width: "5%",
                orderable: false,
                order: false
            },
            {
                targets: 0,
                width: "30%",
                orderable: false,
                order: false
            },
        ],

        responsive: true,
        colReorder: true,
        rowReorder: false,
        stateSave: true,
        select: false
    });
</script>

<script>
    $("#shift-group_create").click(function () {
        var company_id = $("#company_id_create").val();
        var name = $("#name_create").val();

        if (company_id == null || company_id === '') {
            toastr.warning('Firma Seçilmesi Zorunludur');
        } else if (name == null || name === '') {
            toastr.warning('Vardiya Grubu Adı Girilmesi Zorunludur');
        } else {
            $.ajax({
                type: 'post',
                url: '{{ route('setting.shift-groups.store') }}',
                dataType: 'json',
                data: {
                    _token: '{{ csrf_token() }}',
                    company_id: company_id,
                    name: name
                },
                success: function () {
                    toastr.success('Yeni Vardiya Grubu Başarıyla Oluşturuldu');
                    $("#CreateModal").modal('hide');
                    setTimeout(location.reload(), 1000);
                },
                error: function () {

                }
            });
        }
    });
</script>

<script>
    $(".edit").click(function () {
        var id = $(this).data('id');
        $("#updated_shift-group_id").val(id);
        $.ajax({
            type: 'get',
            url: '{{ route('setting.shift-groups.edit') }}',
            dataType: 'json',
            data: {
                id: id
            },
            success: function (shift_group) {
                $("#company_id_edit").val(shift_group.company_id).selectpicker('refresh');
                $("#name_edit").val(shift_group.name);
            },
            error: function () {

            }
        });
    });
</script>

<script>
    $("#shift-group_update").click(function () {
        var id = $("#updated_shift-group_id").val();
        var company_id = $("#company_id_edit").val();
        var name = $("#name_edit").val();

        if (id == null || id === '') {
            toastr.warning('Bir Hata Oluştu. Lütfen Sayfayı Yenileyip Tekrar Deneyin.');
        } else if (company_id == null || company_id === '') {
            toastr.warning('Firma Seçilmesi Zorunludur');
        } else if (name == null || name === '') {
            toastr.warning('Yetkinlik Adı Girilmesi Zorunludur');
        } else {
            $.ajax({
                type: 'post',
                url: '{{ route('setting.shift-groups.update') }}',
                dataType: 'json',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    company_id: company_id,
                    name: name
                },
                success: function () {
                    toastr.success('Vardiya Grubu Başarıyla Güncellendi');
                    $("#EditModal").modal('hide');
                    setTimeout(location.reload(), 1000);
                },
                error: function () {

                }
            });
        }
    });
</script>

<script>
    $(".delete").click(function () {
        var id = $(this).data('id');
        $("#deleted_shift-group_id").val(id);
    });
</script>

<script>
    $("#delete_shift-group").click(function () {
        var id = $("#deleted_shift-group_id").val();
        $.ajax({
            type: 'post',
            url: '{{ route('setting.shift-groups.delete') }}',
            dataType: 'json',
            data: {
                _token: '{{ csrf_token() }}',
                id: id
            },
            success: function () {
                table.row($("#row-" + id).closest('tr')).remove().draw();
                toastr.success('Vardiya Grubu Başarıyla Silindi');
                $("#DeleteModal").modal('hide');
            },
            error: function () {

            }
        });
    });
</script>

<script>

    $(".employeesUpdate").click(function () {
        var group_id = $(this).data('group-id');
        var employees = $("#" + group_id + "_employees").val();

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.shift-group.employeesUpdate') }}',
            data: {
                _token: '{{ csrf_token() }}',
                group_id: group_id,
                employees: employees
            },
            success: function () {
                toastr.success('Vardiya Grubu Personelleri Başarıyla Güncellendi');
            },
            error: function (error) {
                console.log(error);
                toastr.error('Sistemsel Bir Hata Oluştu!');
            }
        });
    });

</script>
