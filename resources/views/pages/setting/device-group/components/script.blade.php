<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
<script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

<script>
    var table = $('#groups').DataTable({
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
                targets: 3,
                width: "5%",
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
    $("#device_group_create").click(function () {
        var company_id = $("#company_id_create").val();
        var name = $("#name_create").val();
        var icon = $("#icon_create").val();

        if (company_id == null || company_id === '') {
            toastr.warning('Firma Seçilmesi Zorunludur');
        } else if (name == null || name === '') {
            toastr.warning('Grup Adı Girilmesi Zorunludur');
        } else if (icon == null || icon === '') {
            toastr.warning('Grup İkonu Seçilmesi Zorunludur');
        } else {
            $.ajax({
                type: 'post',
                url: '{{ route('setting.device-groups.store') }}',
                dataType: 'json',
                data: {
                    _token: '{{ csrf_token() }}',
                    company_id: company_id,
                    name: name,
                    icon: icon
                },
                success: function () {
                    toastr.success('Yeni Cihaz Grubu Başarıyla Oluşturuldu');
                    $("#CreateModal").modal('hide');
                    setTimeout(location.reload(), 1000);
                },
                error: function (error) {
                    console.log(error)
                    toastr.error('Sistemsel Bir Hata Oluştu');
                }
            });
        }
    });
</script>

<script>
    $(".edit").click(function () {
        var id = $(this).data('id');
        $("#updated_device_group_id").val(id);
        $.ajax({
            type: 'get',
            url: '{{ route('setting.device-groups.edit') }}',
            dataType: 'json',
            data: {
                id: id
            },
            success: function (group) {
                $("#company_id_edit").val(group.company_id).selectpicker('refresh');
                $("#name_edit").val(group.name);
                $("#icon_edit").val(group.icon).selectpicker('refresh');
            },
            error: function () {

            }
        });
    });
</script>

<script>
    $("#device_group_update").click(function () {
        var id = $("#updated_device_group_id").val();
        var company_id = $("#company_id_edit").val();
        var name = $("#name_edit").val();
        var icon = $("#icon_edit").val();

        if (id == null || id === '') {
            toastr.warning('Bir Hata Oluştu. Lütfen Sayfayı Yenileyip Tekrar Deneyin.');
        } else if (company_id == null || company_id === '') {
            toastr.warning('Firma Seçilmesi Zorunludur');
        } else if (name == null || name === '') {
            toastr.warning('Grup Adı Girilmesi Zorunludur');
        } else if (icon == null || icon === '') {
            toastr.warning('Grup İkonu Seçilmesi Zorunludur');
        } else {
            $.ajax({
                type: 'post',
                url: '{{ route('setting.device-groups.update') }}',
                dataType: 'json',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    company_id: company_id,
                    name: name,
                    icon: icon
                },
                success: function () {
                    toastr.success('Grup Başarıyla Güncellendi');
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
        $("#deleted_device_group_id").val(id);
    });
</script>

<script>
    $("#delete_device_group").click(function () {
        var id = $("#deleted_device_group_id").val();
        $.ajax({
            type: 'post',
            url: '{{ route('setting.device-groups.delete') }}',
            dataType: 'json',
            data: {
                _token: '{{ csrf_token() }}',
                id: id
            },
            success: function () {
                table.row($("#row-" + id).closest('tr')).remove().draw();
                toastr.success('Grup Başarıyla Silindi');
                $("#DeleteModal").modal('hide');
            },
            error: function () {

            }
        });
    });
</script>
