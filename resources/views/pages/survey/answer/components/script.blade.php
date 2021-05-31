<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
<script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

<script>
    var input = document.getElementById('groups_create'),
        tagify = new Tagify(input, {})
    tagify.on('add', onAddTag)
    function onAddTag(e) {
        tagify.off('add', onAddTag)
    }

    var input2 = document.getElementById('groups_edit'),
        tagify2 = new Tagify(input2, {})
    tagify2.on('add', onAddTag2)
    function onAddTag2(e) {
        tagify2.off('add', onAddTag2)
    }

    var answers = $('#answers').DataTable({
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
                width: "3%",
                targets: 1
            },
            {
                width: "5%",
                targets: 3
            }
        ],

        responsive: true,
        select: false
    });

    var createAnswerButton = $("#createAnswerButton");
    var updateAnswerButton = $("#updateAnswerButton");
    var deleteAnswerButton = $("#deleteAnswerButton");
    var editedAnswer = $("#updated_answer_id");
    var deletedAnswer = $("#deleted_answer_id");
    var questionsSelector = $("#questions_create");
    var questionsSelectorEdit = $("#questions_edit");
    var productsSelector = $("#products_create");
    var productsSelectorEdit = $("#products_edit");

    function getQuestionsList()
    {
        $.ajax({
            type: 'get',
            url: '{{ route('ajax.survey.question.questionList') }}',
            data: {
                code: '{{ $surveyCode }}'
            },
            success: function (questions) {
                $.each(questions, function (index) {
                    questionsSelector.append(`<option value="${questions[index].id}">${questions[index].soru}</option>`);
                    questionsSelectorEdit.append(`<option value="${questions[index].id}">${questions[index].soru}</option>`);
                });
                questionsSelector.selectpicker('refresh');
                questionsSelectorEdit.selectpicker('refresh');
            },
            error: function (error) {
                console.log(error)
            }
        });
    }

    getQuestionsList();

    function getProductsList()
    {
        $.ajax({
            type: 'get',
            url: '{{ route('ajax.survey.product.productList') }}',
            data: {
                code: '{{ $surveyCode }}'
            },
            success: function (products) {
                $.each(products, function (index) {
                    productsSelector.append(`<option value="${products[index].kodu}">${products[index].adi}</option>`);
                    productsSelectorEdit.append(`<option value="${products[index].kodu}">${products[index].adi}</option>`);
                });
                productsSelector.selectpicker('refresh');
                productsSelectorEdit.selectpicker('refresh');
            },
            error: function (error) {
                console.log(error)
            }
        });
    }

    getProductsList();

    createAnswerButton.click(function () {
        var answer = $("#answer_create").val();
        var order_number = $("#order_number_create").val();
        var groups = $("#groups_create").val();
        var questions = $("#questions_create").val();
        var products = $("#products_create").val();
        var columns = $("#columns_create").val();
        var question_id = '{{ $questionId }}';

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.survey.answer.create') }}',
            data: {
                _token: '{{ csrf_token() }}',
                answer: answer,
                order_number: order_number,
                question_id: question_id,
                groups: groups,
                questions: questions,
                products: products,
                columns: columns
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
        editedAnswer.val(id);

        $.ajax({
            type: 'get',
            url: '{{ route('ajax.survey.answer.edit') }}',
            data: {
                id: id
            },
            success: function (response) {
                console.log(response)
                $("#answer_edit").val(response.answer.cevap);
                $("#order_number_edit").val(response.answer.siraNo);
                tagify2.removeAllTags();
                $.each(response.groups, function (index) {
                    tagify2.addTags([`${response.groups[index].kategori}`]);
                });

                $("#columns_edit").val(response.answer.zorunluKolonAdlari.split(";")).selectpicker('refresh');

                var questionsList = [];
                var productsList = [];

                $.each(response.questions, function (index) {
                    questionsList.push(response.questions[index].sorularId);
                });
                questionsSelectorEdit.selectpicker('val', []).selectpicker('refresh');
                questionsSelectorEdit.selectpicker('val', questionsList).selectpicker('refresh');

                $.each(response.products, function (index) {
                    productsList.push(response.products[index].urunKodu);
                });
                productsSelector.selectpicker('val', []).selectpicker('refresh');
                productsSelectorEdit.selectpicker('val', productsList).selectpicker('refresh');
            },
            error: function (error) {
                console.log(error)
            }
        });
    });

    updateAnswerButton.click(function () {
        var id = $("#updated_answer_id").val();
        var answer = $("#answer_edit").val();
        var order_number = $("#order_number_edit").val();
        var groups = $("#groups_edit").val();
        var questions = $("#questions_edit").val();
        var products = $("#products_edit").val();
        var columns = $("#columns_edit").val();
        var question_id = '{{ $questionId }}';

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.survey.answer.update') }}',
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                answer: answer,
                order_number: order_number,
                question_id: question_id,
                groups: groups,
                questions: questions,
                products: products,
                columns: columns,
                code: '{{ $surveyCode }}'
            },
            success: function (response) {
                if (response.status === 'Tamamlandı') {
                    toastr.success('Başarıyla Güncellendi');
                    location.reload();
                } else {
                    toastr.error('Bir Hata Oluştu. Console Loglarına Bakın');
                    console.log(response)
                }
            },
            error: function (error) {
                console.log(error)
            }
        });
    });

    $(document).delegate(".delete", "click", function () {
        deletedAnswer.val($(this).data('id'));
    });

    deleteAnswerButton.click(function () {
        var id = deletedAnswer.val();

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.survey.answer.delete') }}',
            data: {
                _token: '{{ csrf_token() }}',
                id: id
            },
            success: function (response) {
                if (response.status === 'Silindi') {
                    toastr.success('Başarıyla Silindi');
                    answers.row('#row_id_' + id).remove().draw();
                    $("#DeleteAnswer").modal('hide');
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
