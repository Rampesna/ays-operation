<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
<script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

<script>
    var products = $('#products').DataTable({
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
            }
        },
        dom: 'Bfrtipl',

        buttons: [
            'excel', 'pdf', 'print', 'csv', 'copy'
        ],

        columnDefs: [
            {
                width: "3%",
                targets: 0
            },
            {
                width: "2%",
                targets: 1
            }
        ],

        responsive: true,
        select: false
    });

    var createProductButton = $("#createProductButton");
    var updateProductButton = $("#updateProductButton");
    var deleteProductButton = $("#deleteProductButton");

    createProductButton.click(function () {
        var data = new FormData();
        data.append('file', $('#file_selector_create')[0].files[0]);
        data.append('code', $("#code_create").val());
        data.append('name', $("#name_create").val());
        data.append('status', $("#status_create").val());
        data.append('email_title', $("#email_title_create").val());
        data.append('_token', '{{ csrf_token() }}');

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.survey.product.create') }}',
            data: data,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.status === 'Tamamlandı') {
                    toastr.success('Başarıyla Oluşturuldu');
                    location.reload();
                } else {
                    toastr.error('Bir Hata Oluştu');
                    console.log(response)
                }
            },
            error: function (error) {
                console.log(error)
            }
        });
    });

    $(document).delegate('.edit', 'click', function () {
        $("#loader").fadeIn(250);
        var product_id = $(this).data('id');
        $("#editing_product_id").val(product_id);
        $.ajax({
            type: 'get',
            url: '{{ route('ajax.survey.product.edit') }}',
            data: {
                product_id: product_id
            },
            success: function (product) {
                $("#code_edit").val(product.kodu);
                $("#name_edit").val(product.adi);
                $("#status_edit").val(product.durum);
                $("#email_title_edit").val(product.epostaBaslik);

                $("#loader").fadeOut(250);
                $("#EditProduct").modal('show');
            },
            error: function (error) {
                console.log(error)
            }
        });
    });

    updateProductButton.click(function () {
        var data = new FormData();
        data.append('file', $('#file_selector_edit')[0].files[0]);
        data.append('code', $("#code_edit").val());
        data.append('name', $("#name_edit").val());
        data.append('status', $("#status_edit").val());
        data.append('email_title', $("#email_title_edit").val());
        data.append('id', $("#editing_product_id").val());
        data.append('_token', '{{ csrf_token() }}');

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.survey.product.update') }}',
            data: data,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.status === 'Tamamlandı') {
                    toastr.success('Başarıyla Güncellendi');
                    location.reload();
                } else {
                    toastr.error('Bir Hata Oluştu');
                    console.log(response)
                }
            },
            error: function (error) {
                console.log(error)
            }
        });
    });

    $(document).delegate('.delete', 'click', function () {
        $("#deleted_product_id").val($(this).data('id'));
        $("#DeleteProduct").modal('show');
    });

    deleteProductButton.click(function () {
        $("#DeleteProduct").modal('hide');
    });
</script>
