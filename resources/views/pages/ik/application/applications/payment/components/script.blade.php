<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
<script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

<script>
    var payments = $('#payments').DataTable({
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

    $(document).delegate('.edit', 'click', function () {
        var id = $(this).data('id');
        $("#payment_id_edit").val(id);

        $.ajax({
            type: 'get',
            url: '{{ route('ajax.ik.payment.getPayment') }}',
            data: {
                id: id
            },
            success: function (payment) {
                $("#employee_id_edit").val(payment.employee_id);
                $("#type_id_edit").val(payment.type_id).selectpicker('refresh');
                $("#status_id_edit").val(payment.status_id).selectpicker('refresh');
                $("#date_edit").val(payment.date);
                $("#amount_edit").val(payment.amount);
                $("#payroll_edit").val(payment.payroll).selectpicker('refresh');
                $("#description_edit").val(payment.description);
                $("#EditPaymentModal").modal('show');
            },
            error: function (error) {
                console.log(error)
            }
        });
    });

    $(document).delegate('.delete', 'click', function () {
        $("#deleted_payment_id").val($(this).data('id'));
        $("#DeletePaymentModal").modal('show');
    });
</script>
