<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
<script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

<script>
    var table = $('#statuses').DataTable({
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
    $("#device_status_create").click(function () {
        var company_id = $("#company_id_create").val();
        var name = $("#name_create").val();
        var color = $("#color_create").val();

        if (company_id == null || company_id === '') {
            toastr.warning('Firma Seçilmesi Zorunludur');
        } else if (name == null || name === '') {
            toastr.warning('Durum Adı Girilmesi Zorunludur');
        } else if (color == null || color === '') {
            toastr.warning('Durum Rengi Seçilmesi Zorunludur');
        } else {
            $.ajax({
                type: 'post',
                url: '{{ route('setting.device-statuses.store') }}',
                dataType: 'json',
                data: {
                    _token: '{{ csrf_token() }}',
                    company_id: company_id,
                    name: name,
                    color: color
                },
                success: function () {
                    toastr.success('Yeni Cihaz Durumu Başarıyla Oluşturuldu');
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
        $("#updated_device_status_id").val(id);
        $.ajax({
            type: 'get',
            url: '{{ route('setting.device-statuses.edit') }}',
            dataType: 'json',
            data: {
                id: id
            },
            success: function (status) {
                $("#company_id_edit").val(status.company_id).selectpicker('refresh');
                $("#name_edit").val(status.name);
                $("#color_edit").val(status.color).selectpicker('refresh');
            },
            error: function () {

            }
        });
    });
</script>

<script>
    $("#device_status_update").click(function () {
        var id = $("#updated_device_status_id").val();
        var company_id = $("#company_id_edit").val();
        var name = $("#name_edit").val();
        var color = $("#color_edit").val();

        if (id == null || id === '') {
            toastr.warning('Bir Hata Oluştu. Lütfen Sayfayı Yenileyip Tekrar Deneyin.');
        } else if (company_id == null || company_id === '') {
            toastr.warning('Firma Seçilmesi Zorunludur');
        } else if (name == null || name === '') {
            toastr.warning('Durum Adı Girilmesi Zorunludur');
        } else if (color == null || color === '') {
            toastr.warning('Durum Rengi Seçilmesi Zorunludur');
        } else {
            $.ajax({
                type: 'post',
                url: '{{ route('setting.device-statuses.update') }}',
                dataType: 'json',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    company_id: company_id,
                    name: name,
                    color: color
                },
                success: function () {
                    toastr.success('Durum Başarıyla Güncellendi');
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
        $("#deleted_device_status_id").val(id);
    });
</script>

<script>
    $("#delete_device_status").click(function () {
        var id = $("#deleted_device_status_id").val();
        $.ajax({
            type: 'post',
            url: '{{ route('setting.device-statuses.delete') }}',
            dataType: 'json',
            data: {
                _token: '{{ csrf_token() }}',
                id: id
            },
            success: function () {
                table.row($("#row-" + id).closest('tr')).remove().draw();
                toastr.success('Durum Başarıyla Silindi');
                $("#DeleteModal").modal('hide');
            },
            error: function () {

            }
        });
    });
</script>
