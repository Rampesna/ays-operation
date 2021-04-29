<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
<script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

<script>

    var selectedImage = $("#selectedImage");
    var showImageSelector = $("#showImageSelector");

    function showImage() {
        var image = selectedImage.val();
        $("#ShowImageModal").modal('show');
        showImageSelector.attr('src', image);
    }

    var details = $('#details').DataTable({
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

        columnDefs: [
            {
                "targets": [6],
                "visible": false,
                "searchable": false
            }
        ],

        dom: 'rtipl',

        initComplete: function () {
            var r = $('#details tfoot tr');
            $('#details thead').append(r);
            this.api().columns().every(function (index) {
                var column = this;
                var input = document.createElement('input');
                input.className = 'form-control';
                $(input).appendTo($(column.footer()).empty())
                    .on('change', function () {
                        column.search($(this).val(), false, false, true).draw();
                    });
            });
        },

        responsive: true,
        select: 'single'
    });

    $('#details tbody').on('mousedown', 'tr', function (e) {
        if (e.button === 0) {
            return false;
        } else {
            details.row(this).select();
        }
    });

    $('body').on('contextmenu', function (e) {
        var selectedRows = details.rows({selected: true});

        var image = selectedRows.data()[0][6];

        console.log(image)

        selectedImage.val(image);

        var top = e.pageY - 10;
        var left = e.pageX - 10;

        $("#context-menu").css({
            display: "block",
            top: top,
            left: left
        });

        return false;
    }).on("click", function () {
        $("#context-menu").hide();
    }).on("click", function () {
        $("#context-menu").hide();
    });
</script>
