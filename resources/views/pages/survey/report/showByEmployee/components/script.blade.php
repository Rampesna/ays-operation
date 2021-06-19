<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
<script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

<script>
    "use strict";

    const primary = '#6993FF';
    const success = '#1BC5BD';
    const info = '#8950FC';
    const warning = '#FFA800';
    const danger = '#F64E60';

    var selectedNames = [];
    var selectedList = [];

    var filterData = $("#filterData");
    var getReports = $("#getReports");
    var getCallReports = $("#getCallReports");
    var getRemainingReports = $("#getRemainingReports");
    var getNotContactCustomers = $("#getNotContactCustomers");
    var startDateSelector = $("#start_date");
    var endDateSelector = $("#end_date");
    var selectedName = $("#selected_name");
    var statusSelectors = $('.statusSelector');

    /////////////////////////////////////////////////////////////////////////////////////////

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
                targets: 0,
                width: "5%"
            },
            {
                targets: 1,
                width: "10%"
            },
            {
                targets: 2,
                width: "85%"
            }
        ],

        buttons: [
            {
                extend: 'collection',
                text: '<i class="fa fa-download"></i> Dışa Aktar',
                buttons: [
                    {
                        extend: 'pdf',
                        text: '<i class="fa fa-file-pdf"></i> PDF İndir'
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fa fa-file-excel"></i> Excel İndir'
                    }
                ]
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print"></i> Yazdır'
            }
        ],

        dom: 'Brtipl',

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
        select: false
    });

    var callDetails = $('#callDetails ').DataTable({
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
                targets: 0,
                width: "5%"
            },
            {
                targets: 1,
                width: "10%"
            },
            {
                targets: 2,
                width: "85%"
            }
        ],

        buttons: [
            {
                extend: 'collection',
                text: '<i class="fa fa-download"></i> Dışa Aktar',
                buttons: [
                    {
                        extend: 'pdf',
                        text: '<i class="fa fa-file-pdf"></i> PDF İndir'
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fa fa-file-excel"></i> Excel İndir'
                    }
                ]
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print"></i> Yazdır'
            }
        ],

        dom: 'Brtipl',

        initComplete: function () {
            var r = $('#callDetails  tfoot tr');
            $('#callDetails  thead').append(r);
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
        select: false
    });

    var remainingDetails = $('#remainingDetails ').DataTable({
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
                targets: 0,
                width: "5%"
            },
            {
                targets: 1,
                width: "10%"
            },
            {
                targets: 2,
                width: "85%"
            }
        ],

        buttons: [
            {
                extend: 'collection',
                text: '<i class="fa fa-download"></i> Dışa Aktar',
                buttons: [
                    {
                        extend: 'pdf',
                        text: '<i class="fa fa-file-pdf"></i> PDF İndir'
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fa fa-file-excel"></i> Excel İndir'
                    }
                ]
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print"></i> Yazdır'
            }
        ],

        dom: 'Brtipl',

        initComplete: function () {
            var r = $('#remainingDetails  tfoot tr');
            $('#remainingDetails  thead').append(r);
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
        select: false
    });

    $(document).delegate('.dataCardSelector', 'click', function () {
        if ($(this).hasClass('bg-success')) {
            $(this).removeClass('bg-success text-white');
            $(this).find('.dataCardSelectorIcon').removeClass('svg-icon-white').addClass('svg-icon-dark-75');
            selectedList.splice($.inArray($(this).data('id'), selectedList), 1);
        } else {
            $(this).addClass('bg-success text-white');
            $(this).find('.dataCardSelectorIcon').removeClass('svg-icon-dark-75').addClass('svg-icon-white');
            selectedList.push($(this).data('id'));
        }

        selectedList.length > 0 ? getReports.show() : getReports.hide();
    });

    getReports.click(function () {
        $("#loader").fadeIn(250);
        var code = '{{ $surveyCode }}';
        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();

        $.ajax({
            type: 'get',
            url: '{{ route('ajax.survey.scriptReportDetail') }}',
            data: {
                code: code,
                start_date: start_date ?? null,
                end_date: end_date ?? null,
                ids: jQuery.unique(selectedList)
            },
            success: function (response) {
                console.log(response)
                details.clear().draw();

                var detailsData = [];
                $.each(response.response, function (index) {
                    detailsData.push([
                        response.response[index].id,
                        response.response[index].islemTarihi1,
                        response.response[index].kullaniciAdSoyad,
                        response.response[index].cariId,
                        response.response[index].musteriAdi,
                        `<textarea class="form-control" rows="2" disabled>${response.response[index].gorusmeNotlari}</textarea>`
                    ]);
                });

                details.rows.add(detailsData).draw(false);
                details.search(jQuery.unique(selectedNames).join('|'), true, false).draw();
                $("#ReportDetail").modal('show');
                $("#loader").fadeOut(250);
            },
            error: function (error) {
                console.log(error)
                toastr.error('Detay Bilgiler Alınırken API\'de Hata Oluştu!');
                $("#loader").fadeOut(250);
            }
        });
    });

    getCallReports.click(function () {
        $("#loader").fadeIn(250);
        var code = '{{ $surveyCode }}';
        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();

        $.ajax({
            type: 'get',
            url: '{{ route('ajax.survey.scriptCallReportDetail') }}',
            data: {
                code: code,
                start_date: start_date ?? null,
                end_date: end_date ?? null
            },
            success: function (response) {
                callDetails.clear().draw();
                var callDetailsData = [];
                $.each(response, function (index) {
                    callDetailsData.push([
                        response[index].id,
                        response[index].islemTarihi1,
                        response[index].kullaniciAdSoyad,
                        response[index].cariId,
                        response[index].musteriAdi,
                        `<textarea class="form-control" rows="2" disabled>${response[index].gorusmeNotlari}</textarea>`
                    ]);
                });
                callDetails.rows.add(callDetailsData).draw(false);
                $("#CalledReportDetail").modal('show');
                $("#loader").fadeOut(250);
            },
            error: function (error) {
                console.log(error)
                toastr.error('Detay Bilgiler Alınırken API\'de Hata Oluştu!');
                $("#loader").fadeOut(250);
            }
        });
    });

    getRemainingReports.click(function () {
        $("#loader").fadeIn(250);
        var code = '{{ $surveyCode }}';
        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();

        $.ajax({
            type: 'get',
            url: '{{ route('ajax.survey.scriptRemainingReportDetail') }}',
            data: {
                code: code,
                start_date: start_date ?? null,
                end_date: end_date ?? null
            },
            success: function (response) {
                console.log(response)
                remainingDetails.clear().draw();
                var remainingDetailsData = [];
                $.each(response, function (index) {
                    remainingDetailsData.push([
                        response[index].id,
                        response[index].cariid,
                        response[index].grupkodu,
                    ]);
                });
                remainingDetails.rows.add(remainingDetailsData).draw(false);
                $("#RemainingReportDetail").modal('show');
                $("#loader").fadeOut(250);

            },
            error: function (error) {
                console.log(error)
                toastr.error('Detay Bilgiler Alınırken API\'de Hata Oluştu!');
                $("#loader").fadeOut(250);
            }
        });
    });

    getNotContactCustomers.click(function () {
        $("#loader").fadeIn(250);
        var code = '{{ $surveyCode }}';
        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();

        $.ajax({
            type: 'get',
            url: '{{ route('ajax.survey.scriptReportDetail') }}',
            data: {
                code: code,
                start_date: start_date ?? null,
                end_date: end_date ?? null,
                ids: [
                    $(this).data('id')
                ]
            },
            success: function (response) {
                console.log(response)
                details.clear().draw();

                var detailsData = [];
                $.each(response.response, function (index) {
                    detailsData.push([
                        response.response[index].id,
                        response.response[index].islemTarihi1,
                        response.response[index].kullaniciAdSoyad,
                        response.response[index].cariId,
                        response.response[index].musteriAdi,
                        `<textarea class="form-control" rows="2" disabled>${response.response[index].gorusmeNotlari}</textarea>`
                    ]);
                });

                details.rows.add(detailsData).draw(false);
                $("#ReportDetail").modal('show');
                $("#loader").fadeOut(250);
            },
            error: function (error) {
                console.log(error)
                toastr.error('Detay Bilgiler Alınırken API\'de Hata Oluştu!');
                $("#loader").fadeOut(250);
            }
        });
    });

    $.fn.dataTable.ext.errMode = 'none';

    $(document).delegate('.statusSelector', 'click', function () {
        if ($(this).hasClass('bg-success')) {
            $(this).removeClass('bg-success text-white');
            selectedList.splice($.inArray($(this).data('status-id'), selectedList), 1);
            selectedNames.splice($.inArray($(this).data('employee-name'), selectedList), 1);
        } else {
            $(this).addClass('bg-success text-white');
            selectedList.push($(this).data('status-id'));
            selectedNames.push($(this).data('employee-name'));
        }

        // jQuery.unique(selectedList);

        // if ($.inArray($(this).data('status-id'), selectedList) !== -1) {
        //     alert("found");
        // }

        selectedList.length > 0 ? getReports.show() : getReports.hide();
    });

    /////////////////////////////////////////////////////////////////////////////////////////
</script>
