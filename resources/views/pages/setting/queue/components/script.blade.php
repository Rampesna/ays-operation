<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
<script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

<script>
    var table = $('#queues').DataTable({
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
        ],

        responsive: true,
        colReorder: true,
        rowReorder: false,
        stateSave: true,
        select: false
    });
</script>

<script>
    $("#queue_create").click(function () {
        var company_id = $("#company_id_create").val();
        var short = $("#short_create").val();
        var name = $("#name_create").val();

        if (company_id == null || company_id === '') {
            toastr.warning('Firma Seçilmesi Zorunludur');
        } else if (short == null || short === '') {
            toastr.warning('Kuyruk Kısa Adı Girilmesi Zorunludur');
        } else if (name == null || name === '') {
            toastr.warning('Kuyruk Adı Girilmesi Zorunludur');
        } else {
            $.ajax({
                type: 'post',
                url: '{{ route('setting.queues.store') }}',
                dataType: 'json',
                data: {
                    _token: '{{ csrf_token() }}',
                    company_id: company_id,
                    short: short,
                    name: name
                },
                success: function (queue) {
                    table.row.add([
                        queue.name,
                        queue.short,
                        'Düzenle'
                    ]).draw(false);
                    toastr.success('Yeni Kuyruk Başarıyla Oluşturuldu');
                    $("#CreateModal").modal('hide');
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
        $("#updated_queue_id").val(id);
        $.ajax({
            type: 'get',
            url: '{{ route('setting.queues.edit') }}',
            dataType: 'json',
            data: {
                id: id
            },
            success: function (queue) {
                $("#company_id_edit").val(queue.company_id).selectpicker('refresh');
                $("#short_edit").val(queue.short);
                $("#name_edit").val(queue.name);
            },
            error: function () {

            }
        });
    });
</script>

<script>
    $("#queue_update").click(function () {
        var id = $("#updated_queue_id").val();
        var company_id = $("#company_id_create").val();
        var short = $("#short_create").val();
        var name = $("#name_create").val();

        if (id == null || id === '') {
            toastr.warning('Bir Hata Oluştu. Lütfen Sayfayı Yenileyip Tekrar Deneyin.');
        } else if (company_id == null || company_id === '') {
            toastr.warning('Firma Seçilmesi Zorunludur');
        } else if (short == null || short === '') {
            toastr.warning('Kuyruk Kısa Adı Girilmesi Zorunludur');
        } else if (name == null || name === '') {
            toastr.warning('Kuyruk Adı Girilmesi Zorunludur');
        } else {
            $.ajax({
                type: 'post',
                url: '{{ route('setting.queues.update') }}',
                dataType: 'json',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    company_id: company_id,
                    short: short,
                    name: name
                },
                success: function (queue) {
                    table.row.add([
                        queue.name,
                        queue.short,
                        'Düzenle'
                    ]).draw(false);
                    toastr.success('Yeni Kuyruk Başarıyla Güncellendi');
                    $("#EditModal").modal('hide');
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
        $("#deleted_queue_id").val(id);
    });
</script>

<script>
    $("#delete_queue").click(function () {
        var id = $("#deleted_queue_id").val();
        $.ajax({
            type: 'post',
            url: '{{ route('setting.queues.delete') }}',
            dataType: 'json',
            data: {
                _token: '{{ csrf_token() }}',
                id: id
            },
            success: function () {
                table.row($("#row-" + id).closest('tr')).remove().draw();
                toastr.success('Kuyruk Başarıyla Silindi');
                $("#DeleteModal").modal('hide');
            },
            error: function () {

            }
        });
    });
</script>
