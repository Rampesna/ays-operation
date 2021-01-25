<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
<script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

<script>
    var table = $('#users').DataTable({
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
                targets: 5,
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
    $("#competence_create").click(function () {
        var company_id = $("#company_id_create").val();
        var name = $("#name_create").val();

        if (company_id == null || company_id === '') {
            toastr.warning('Firma Seçilmesi Zorunludur');
        } else if (name == null || name === '') {
            toastr.warning('Yetkinlik Adı Girilmesi Zorunludur');
        } else {
            $.ajax({
                type: 'post',
                url: '{{ route('setting.competences.store') }}',
                dataType: 'json',
                data: {
                    _token: '{{ csrf_token() }}',
                    company_id: company_id,
                    name: name
                },
                success: function () {
                    toastr.success('Yeni Yetkinlik Başarıyla Oluşturuldu');
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
        $("#updated_competence_id").val(id);
        $.ajax({
            type: 'get',
            url: '{{ route('setting.competences.edit') }}',
            dataType: 'json',
            data: {
                id: id
            },
            success: function (competence) {
                $("#company_id_edit").val(competence.company_id).selectpicker('refresh');
                $("#name_edit").val(competence.name);
            },
            error: function () {

            }
        });
    });
</script>

<script>
    $("#competence_update").click(function () {
        var id = $("#updated_competence_id").val();
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
                url: '{{ route('setting.competences.update') }}',
                dataType: 'json',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    company_id: company_id,
                    name: name
                },
                success: function () {
                    toastr.success('Yetkinlik Başarıyla Güncellendi');
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
        $("#deleted_competence_id").val(id);
    });
</script>

<script>
    $("#delete_competence").click(function () {
        var id = $("#deleted_competence_id").val();
        $.ajax({
            type: 'post',
            url: '{{ route('setting.competences.delete') }}',
            dataType: 'json',
            data: {
                _token: '{{ csrf_token() }}',
                id: id
            },
            success: function () {
                table.row($("#row-" + id).closest('tr')).remove().draw();
                toastr.success('Yetkinlik Başarıyla Silindi');
                $("#DeleteModal").modal('hide');
            },
            error: function () {

            }
        });
    });
</script>
