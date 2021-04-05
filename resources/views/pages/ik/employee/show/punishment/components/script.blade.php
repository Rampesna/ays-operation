<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
<script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

<script>
    var punishments = $('#punishments').DataTable({
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
                targets: 0,
                width: "3%",
                orderable: false,
                order: false
            },
            {
                targets: 1,
                width: "3%",
                orderable: false,
                order: false
            },
        ],

        responsive: true
    });

    $(document).delegate('.edit', 'click', function () {
        var punishment_id = $(this).data('id');
        $("#punishment_id_edit").val(punishment_id);
        $.ajax({
            type: 'get',
            url: '{{ route('ajax.ik.punishment.getPunishment') }}',
            data: {
                punishment_id: punishment_id
            },
            success: function (punishment) {
                $("#category_id_edit").val(punishment.category_id).selectpicker('refresh');
                $("#date_edit").val(punishment.date);
                $("#amount_edit").val(punishment.amount);
                $("#description_edit").val(punishment.description);
                $("#EditPunishmentModal").modal('show');
            },
            error: function (error) {
                console.log(error)
            }
        });
    });

    $(document).delegate('.delete', 'click', function () {
        $("#deleted_punishment_id").val($(this).data('id'));
        $("#DeletePunishmentModal").modal('show');
    });

    $(document).delegate('.upload-document', 'click', function () {
        $("#upload_document_punishment_id").val($(this).data('id'));
        $("#UploadDocumentModal").modal('show');
    });

    $(document).delegate('.delete-document', 'click', function () {
        $("#delete_document_punishment_id").val($(this).data('id'));
        $("#DeleteDocumentModal").modal('show');
    });

</script>
