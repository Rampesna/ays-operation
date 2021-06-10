<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
<script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

<script>

    var filterButton = $("#filterButton");
    var clearFilterButton = $("#clearFilterButton");

    var missions = $('#missions').DataTable({
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

        dom: 'rtipl',

        order: [
            [
                0,
                "desc"
            ]
        ],

        initComplete: function () {
            var r = $('#missions tfoot tr');
            $('#missions thead').append(r);
            this.api().columns().every(function (index) {
                var column = this;
                var input = document.createElement('input');

                if (index === 2) {
                    input = document.createElement('select');
                    var option = document.createElement("option");
                    option.setAttribute("value", 0);
                    option.innerHTML = "Tümü";
                    input.appendChild(option);

                    @foreach($missionStatuses as $missionStatus)
                    option = document.createElement("option");
                    option.setAttribute("value", "{{ $missionStatus->id }}");
                    option.innerHTML = "{{ $missionStatus->name }}";
                    input.appendChild(option);
                    @endforeach

                    input.className = 'selectpicker';
                } else if (index === 3 || index === 5) {
                    input = document.createElement('select');
                    var option = document.createElement("option");
                    option.setAttribute("value", "all");
                    option.innerHTML = "Tümü";
                    input.appendChild(option);

                    option = document.createElement("option");
                    option.setAttribute("value", "App\\Models\\User");
                    option.innerHTML = "Kullanıcı";
                    input.appendChild(option);

                    option = document.createElement("option");
                    option.setAttribute("value", "App\\Models\\Employee");
                    option.innerHTML = "Personel";
                    input.appendChild(option);
                } else if (index === 7 || index === 8 || index === 9) {
                    input = null;
                    $(input).appendTo($(column.footer()).empty())
                        .on('change', function () {
                            column.search($(this).val(), false, false, true).draw();
                        });
                    return;
                } else {

                }

                input.className = 'form-control';
                $(input).appendTo($(column.footer()).empty())
                    .on('change', function () {
                        column.search($(this).val(), false, false, true).draw();
                    });
            });
        },

        processing: true,
        serverSide: true,
        ajax: {
            type: 'get',
            url: '{{ route('ajax.mission.datatable') }}',
            data: function (d) {
                return $.extend({}, d, {
                    start_date: $("#start_date").val(),
                    end_date: $("#end_date").val()
                });
            }
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'subject', name: 'subject'},
            {data: 'status_id', name: 'status_id'},
            {data: 'creator_type', name: 'creator_type'},
            {data: 'creator_id', name: 'creator_id'},
            {data: 'assigned_type', name: 'assigned_type'},
            {data: 'assigned_id', name: 'assigned_id'},
            {data: 'start_date', name: 'start_date'},
            {data: 'end_date', name: 'end_date'},
            {data: 'complete_date', name: 'complete_date'}
        ],

        responsive: true,
        stateSave: false,
        colReorder: true,
        select: 'single'
    });

    filterButton.click(function () {
        missions.ajax.reload().draw();
    });

    clearFilterButton.click(function () {
        $("#start_date").val(null);
        $("#end_date").val(null);
        missions.ajax.reload().draw();
    });
</script>
