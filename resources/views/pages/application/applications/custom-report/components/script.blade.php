<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
<script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

<script>
    var table = $('#customReports').DataTable({
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

    var createCustomReportButton = $("#create_custom_report_button");

    createCustomReportButton.click(function () {
        var name = $("#name_create").val();
        var query = $("#query_create").val();

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.application.custom-report.create') }}',
            data: {
                _token: '{{ csrf_token() }}',
                name: name,
                query: query
            },
            success: function (report) {
                table.row.add([
                    '<div class="dropdown dropdown-inline"><a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ki ki-bold-more-ver"></i></a><div class="dropdown-menu dropdown-menu-sm dropdown-menu-right"><ul class="navi navi-hover"><li class="navi-item"><a href="#" data-id="' + report.id + '" data-toggle="modal" data-target="#EditCustomReport" class="navi-link edit"><span class="navi-icon"><i class="fa fa-edit"></i></span><span class="navi-text">Düzenle</span></a></li><li class="navi-item"><a href="#" data-id="' + report.id + '" data-toggle="modal" data-target="#DeleteCustomReport" class="navi-link delete"><span class="navi-icon"><i class="fa fa-trash-alt text-danger"></i></span><span class="navi-text text-danger">Sil</span></a></li></ul></div></div>',
                    report.name
                ]).node().id = 'row_id_' + report.id;
                table.draw(false);
                $("#create_custom_report_form").trigger('reset');
                $("#CreateCustomReport").modal('hide');
                toastr.success('Yeni Özel Rapor Başarıyla Oluşturuldu');
            },
            error: function () {

            }
        });
    });

    $(document).delegate(".edit", "click", function (e) {
        var id = $(this).data('id');
        $("#updated_custom_report_id").val(id);

        $.ajax({
            type: 'get',
            url: '{{ route('ajax.application.custom-report.edit') }}',
            data: {
                id: id
            },
            success: function (report) {
                $("#name_edit").val(report.name);
                $("#query_edit").val(report.query);
            },
            error: function (error) {
                console.log(error);
            }
        }).done();
    });

    $("#update_custom_report_button").click(function () {
        var id = $("#updated_custom_report_id").val();
        var name = $("#name_edit").val();
        var query = $("#query_edit").val();

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.application.custom-report.update') }}',
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                name: name,
                query: query
            },
            success: function (report) {
                table.row("#row_id_" + id).remove().draw();
                table.row.add([
                    '<div class="dropdown dropdown-inline"><a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ki ki-bold-more-ver"></i></a><div class="dropdown-menu dropdown-menu-sm dropdown-menu-right"><ul class="navi navi-hover"><li class="navi-item"><a href="#" data-id="' + report.id + '" data-toggle="modal" data-target="#EditCustomReport" class="navi-link edit"><span class="navi-icon"><i class="fa fa-edit"></i></span><span class="navi-text">Düzenle</span></a></li><li class="navi-item"><a href="#" data-id="' + report.id + '" data-toggle="modal" data-target="#DeleteCustomReport" class="navi-link delete"><span class="navi-icon"><i class="fa fa-trash-alt text-danger"></i></span><span class="navi-text text-danger">Sil</span></a></li></ul></div></div>',
                    report.name
                ]).node().id = 'row_id_' + report.id;
                table.draw(false);
                $("#edit_custom_report_form").trigger('reset');
                $("#EditCustomReport").modal('hide');
                toastr.success('Özel Rapor Başarıyla Güncellendi');
            },
            error: function (error) {
                console.log(error);

            }
        }).done();
    });

    $(document).delegate(".delete", "click", function (e) {
        var id = $(this).data('id');
        $("#deleted_custom_report_id").val(id);
    });

    $(document).delegate("#delete_custom_report", "click", function (e) {
        var id = $("#deleted_custom_report_id").val();

        $.ajax({
            async: false,
            type: 'post',
            url: '{{ route('ajax.application.custom-report.delete') }}',
            data: {
                _token: '{{ csrf_token() }}',
                id: id
            },
            success: function () {
                table.row('#row_id_' + id).remove().draw();
                $("#DeleteCustomReport").modal('hide');
                $("#deleted_custom_report_id").val('');
            },
            error: function (error) {
                console.log(error);
            }
        }).done();
    });
</script>
