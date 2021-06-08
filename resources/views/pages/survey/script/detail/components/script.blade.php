<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
<script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

<script>

    function getSurveyQuestions(code) {
        var list = ``;

        $.ajax({
            async: false,
            type: 'get',
            url: '{{ route('ajax.survey.question.questionList') }}',
            data: {
                code: code
            },
            success: function (questions) {
                $.each(questions, function (index) {
                    list = list +
                        `    <tr>` +
                        `        <td class="details-control answerControl">${questions[index].id}</td>` +
                        `        <td class="details-control answerControl">${questions[index].soru}</td>` +
                        `        <td class="details-control answerControl">${questions[index].soruTurKodu == 1 ? 'Metin' : (questions[index].soruTurKodu == 2 ? 'Tarih' : (questions[index].soruTurKodu == 3 ? 'Tekli Seçim' : (questions[index].soruTurKodu == 4 ? 'Çoklu Seçim' : 'Diğer')))}</td>` +
                        `        <td class="details-control answerControl">${questions[index].ekCevapString}</td>` +
                        `        <td class="details-control answerControl">${questions[index].siraNo}</td>` +
                        `        <td class="details-control answerControl">${questions[index].grupKodu}</td>` +
                        `    </tr>`;
                });
            },
            error: function (error) {
                console.log(error)
            }
        });

        // <span class="btn btn-pill btn-sm btn-" style="font-size: 11px; height: 20px; padding-top: 2px"></span>

        return `` +
            `<table class="table" id="questionsTable" style="padding-left:50px;">` +
            `<thead>` +
            `    <tr>` +
            `        <th>#</th>` +
            `        <th>Soru</th>` +
            `        <th>Soru Türü</th>` +
            `        <th>Ek Cevap</th>` +
            `        <th>Sıra</th>` +
            `        <th>Grup Kodu</th>` +
            `    </tr>` +
            `</thead>` +
            `<tbody>` +
            list +
            `</tbody>` +
            `</table>`;
    }

    function getSurveyQuestionAnswers(id) {
        var list = ``;

        $.ajax({
            async: false,
            type: 'get',
            url: '{{ route('ajax.survey.answer.answerList') }}',
            data: {
                id: id
            },
            success: function (answers) {
                console.log(answers)
                $.each(answers, function (index) {
                    list = list +
                        `    <tr>` +
                        `        <td>${answers[index].cevap}</td>` +
                        `    </tr>`;
                });
            },
            error: function (error) {
                console.log(error)
            }
        });

        return `` +
            `<table class="table" id="answersTable" style="padding-left:50px;">` +
            `<thead>` +
            `    <tr>` +
            `        <th>Cevap</th>` +
            `    </tr>` +
            `</thead>` +
            `<tbody>` +
            list +
            `</tbody>` +
            `</table>`;
    }

    var surveyList = $('#surveyList').DataTable({
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
        dom: 'frtipl',

        "columnDefs": [
            {
                "targets": [0],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [1],
                "visible": true,
                "searchable": true,
                "width": "15%"
            },
            {
                "targets": [2],
                "visible": true,
                "searchable": true,
                "width": "5%"
            },
            {
                "targets": [3],
                "visible": true,
                "searchable": true,
                "width": "5%"
            },
            {
                "targets": [4],
                "visible": true,
                "searchable": true,
                "width": "5%"
            },
            {
                "targets": [5],
                "visible": true,
                "searchable": true,
                "width": "5%"
            }
        ],

        responsive: false,
        select: 'single'
    });

    var questionsTable = $('#questionsTable').DataTable({
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
        dom: 'rtp',

        responsive: true,
        select: 'single'
    });

    $('#surveyList tbody').on('click', 'td.details-control', function (e) {
        var tr = $(this).closest('tr');
        var row = surveyList.row(tr);
        if (row.child.isShown()) {
            row.child.hide();
            tr.removeClass('shown');
        } else {
            if (row.length == 0) {
                question_id = $("#questionsTable").find('tr.selected').find('td:eq(0)').text();
                console.log(getSurveyQuestionAnswers(question_id));
            } else {
                row.child(getSurveyQuestions(row.data()[0])).show();
                tr.addClass('shown');

                var questionsTable = $("#questionsTable").DataTable({
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
                    dom: 'rtp',

                    responsive: true,
                    select: 'single'
                });

                $("#questionsTable tr").on('click', 'td.details-control', function () {
                    var tr = $(this).closest('tr');
                    var row = questionsTable.row(tr);
                    if (row.child.isShown()) {
                        row.child.hide();
                        tr.removeClass('shown');
                    } else {
                        row.child(getSurveyQuestionAnswers(row.data()[0])).show();
                        tr.addClass('shown');
                    }
                });
            }
        }
    });



</script>
