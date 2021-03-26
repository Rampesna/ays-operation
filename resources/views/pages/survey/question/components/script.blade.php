<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
<script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

<script>
    var questions = $('#questions').DataTable({
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
                width: "50%",
                targets: 2
            }
        ],

        responsive: true,
        select: false
    });

    var createQuestionButton = $("#createQuestionButton");
    var updateQuestionButton = $("#updateQuestionButton");
    var deleteQuestionButton = $("#deleteQuestionButton");
    var editedQuestion = $("#updated_question_id");
    var deletedQuestion = $("#deleted_question_id");

    createQuestionButton.click(function () {
        var question = $("#question_create").val();
        var question_type_id = $("#question_type_id_create").val();
        var order_number = $("#order_number_create").val();
        var description = $("#description_create").val();
        var group_code = '{{ $surveyCode }}';

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.survey.question.create') }}',
            data: {
                _token: '{{ csrf_token() }}',
                question: question,
                question_type_id: question_type_id,
                additional_question: 1,
                order_number: order_number,
                group_code: group_code,
                description: description
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

    $(document).delegate(".edit", "click", function () {
        var id = $(this).data('id');
        editedQuestion.val(id);

        $.ajax({
            type: 'get',
            url: '{{ route('ajax.survey.question.edit') }}',
            data: {
                id: id
            },
            success: function (question) {
                $("#question_edit").val(question.soru);
                $("#question_type_id_edit").val(question.soruTurKodu);
                $("#order_number_edit").val(question.siraNo);
                $("#group_code_edit").val(question.grupKodu);
                $("#description_edit").val(question.soruAciklama);
            },
            error: function () {

            }
        });
    });

    updateQuestionButton.click(function () {
        var id = $("#updated_question_id").val();
        var question = $("#question_edit").val();
        var question_type_id = $("#question_type_id_edit").val();
        var order_number = $("#order_number_edit").val();
        var group_code = $("#group_code_edit").val();
        var description = $("#description_edit").val();

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.survey.question.update') }}',
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                question: question,
                question_type_id: question_type_id,
                additional_question: 1,
                order_number: order_number,
                group_code: group_code,
                description: description
            },
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

    $(document).delegate(".delete", "click", function () {
        deletedQuestion.val($(this).data('id'));
    });

    deleteQuestionButton.click(function () {
        var id = deletedQuestion.val();

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.survey.question.delete') }}',
            data: {
                _token: '{{ csrf_token() }}',
                id: id
            },
            success: function (response) {
                if (response.status === 'Silindi') {
                    toastr.success('Başarıyla Silindi');
                    questions.row('#row_id_' + id).remove().draw();
                    $("#DeleteQuestion").modal('hide');
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
</script>
