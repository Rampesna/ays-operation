<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
<script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

<script>
    var sellers = $('#sellers').DataTable({
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

    var createSellerButton = $("#createSellerButton");
    var updateSellerButton = $("#updateSellerButton");
    var deleteSellerButton = $("#deleteSellerButton");
    var surveysEditSelector = $("#surveys_edit");
    var productsEditSelector = $("#products_edit");

    createSellerButton.click(function () {
        var code = $("#code_create").val();
        var name = $("#name_create").val();
        var surveys = $("#surveys_create").val();
        var products = $("#products_create").val();

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.survey.seller.save') }}',
            data: {
                _token: '{{ csrf_token() }}',
                code: code,
                name: name,
                surveys: surveys,
                products: products
            },
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
        var seller_id = $(this).data('id');
        var seller_code = $(this).data('code');

        $.ajax({
            type: 'get',
            url: '{{ route('ajax.survey.seller.edit') }}',
            data: {
                seller_id: seller_id,
                seller_code: seller_code
            },
            success: function (response) {
                $("#editing_seller_id").val(response.seller[0].id);
                $("#code_edit").val(response.seller[0].saticiKodu);
                $("#name_edit").val(response.seller[0].saticiAdi);
                surveysEditSelector.val(response.seller[0].grupKodu).selectpicker('refresh');
                productsEditSelector.val(response.seller[0].urunKodu).selectpicker('refresh');
                $("#loader").fadeOut(250);
                $("#EditSeller").modal('show');
            },
            error: function (error) {
                console.log(error)
            }
        });
    });

    updateSellerButton.click(function () {
        var id = $("#editing_seller_id").val();
        var code = $("#code_edit").val();
        var name = $("#name_edit").val();
        var survey = $("#surveys_edit").val();
        var product = $("#products_edit").val();

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.survey.seller.save') }}',
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                code: code,
                name: name,
                surveys: [
                    survey
                ],
                products: [
                    product
                ]
            },
            success: function (response) {
                console.log(response)
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
        $("#deleted_seller_id").val($(this).data('id'));
        $("#DeleteSeller").modal('show');
    });

    deleteSellerButton.click(function () {
        $("#DeleteSeller").modal('hide');
        $("#loader").fadeIn(250);
        var seller_id = $("#deleted_seller_id").val();

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.survey.seller.delete') }}',
            data: {
                _token: '{{ csrf_token() }}',
                seller_id: seller_id
            },
            success: function () {
                toastr.success('Başarıyla Silindi');
                location.reload();
            },
            error: function () {

            }
        });
    });
</script>
