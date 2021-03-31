<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
<script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

<script>
    var permits = $('#permits').DataTable({
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
        ],

        responsive: true
    });

    function dateReCreator(getDate) {
        var date = new Date(getDate);
        return `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}-${String(date.getDate()).padStart(2, '0')}T${String(date.getHours()).padStart(2, '0')}:${String(date.getMinutes()).padStart(2, '0')}`
    }

    $(document).delegate('.edit', 'click', function () {
        var id = $(this).data('id');
        $("#permit_id_edit").val(id);

        $.ajax({
            type: 'get',
            url: '{{ route('ajax.ik.permit.getPermit') }}',
            data: {
                id: id
            },
            success: function (permit) {
                $("#employee_id_edit").val(permit.employee_id);
                $("#type_id_edit").val(permit.type_id).selectpicker('refresh');
                $("#status_id_edit").val(permit.status_id).selectpicker('refresh');
                $("#start_date_edit").val(dateReCreator(permit.start_date));
                $("#end_date_edit").val(dateReCreator(permit.end_date));
                $("#description_edit").val(permit.description);
                $("#EditPermitModal").modal('show');
            },
            error: function (error) {
                console.log(error)
            }
        });
    });

    $(document).delegate('.delete', 'click', function () {
        $("#deleted_permit_id").val($(this).data('id'));
        $("#DeletePermitModal").modal('show');
    });
</script>
