<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
<script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

<script>
    var files = $('#files').DataTable({
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

    "use strict";

    var KTDropzoneDemo = function () {
        var fileUpload = function () {
            $('#file_upload').dropzone({
                paramName: 'file',
                addRemoveLinks: true,
                accept: function(file, done) {
                    done();
                },
                complete: function (file) {
                    this.removeFile(file);
                },
                success : function(file, response){
                    files.row.add([
                        '<a href="#" class="fileDelete" data-id="' + response.id + '" data-toggle="modal" data-target="#DeleteFileModal"><i class="fa fa-trash text-danger"></i></a>',
                        '<a href="{{ asset('') }}' + response.path + response.name + '" download><i class="' + response.icon + '"></i></a>',
                        response.name,
                        dateReCreator(response.created_at)
                    ]).draw();
                },
                error: function (error) {
                    console.log(error);
                    toastr.error('Sistemsel Bir Hata Oluştu');
                }
            });
        }

        return {
            // public functions
            init: function() {
                fileUpload();
            }
        };
    }();

    KTUtil.ready(function() {
        KTDropzoneDemo.init();
    });

    function dateReCreator(getDate) {
        var date = new Date(getDate);
        return `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}-${String(date.getDate()).padStart(2, '0')} ${String(date.getHours()).padStart(2, '0')}:${String(date.getMinutes()).padStart(2, '0')}`
    }

    $(document).delegate('.delete','click', function () {
        $("#deleted_file_id").val($(this).data('id'));
    })

    $("#cancelDeleteFile").click(function () {
        $("#deleted_file_id").val(null);
    });

</script>
