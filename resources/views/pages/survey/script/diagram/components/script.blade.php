<script>
    var allQuestions = [];
    var questionsCard = $("#questionsCard");

    var SearchInArray = function (searchingArray, searchingData) {
        var returnKey = -1;
        $.each(searchingArray, function (index, data) {
            if (data.id == searchingData) {
                returnKey = index;
                return false;
            }
        });
        return returnKey;
    }

    function getQuestions() {
        var code = '{{ @$survey['kodu'] }}'

        $.ajax({
            async: false,
            type: 'get',
            url: '{{ route('ajax.survey.question.questionList') }}',
            data: {
                code: code
            },
            success: function (questions) {
                questions.sort(function (a, b) {
                    var a1 = a.siraNo, b1 = b.siraNo;
                    if (a1 == b1) return 0;
                    return a1 > b1 ? 1 : -1;
                });

                allQuestions = questions;

                questionsCard.html('');
                $.each(questions, function (index) {
                    questionsCard.append(`
                    <div class="row mb-2">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body py-2 cursor-pointer questionSelector" id="question_${questions[index].id}" data-id="${questions[index].id}">
                                    <i class="mr-2 fa fa-at"></i><span>${questions[index].soru}</span>
                                </div>
                            </div>
                            <div style="display: none" id="question_${questions[index].id}_answers">

                            </div>
                        </div>
                    </div>
                    `);
                });

            },
            error: function (error) {
                toastr.error('Script Soruları Alınırken Sistemsel Bir Hata Oluştu!');
                console.log(error)
            }
        });
    }

    getQuestions();

    $(document).delegate('.questionSelector', 'click', function () {
        var id = $(this).data('id');
        var answersCard = $("#question_" + id + "_answers");

        if(answersCard.css('display') == 'none') {
            $.ajax({
                type: 'get',
                url: '{{ route('ajax.survey.answer.answerList') }}',
                data: {
                    id: id
                },
                success: function (answers) {

                    answersCard.html('');
                    answersCard.append(`
                    <div class="mt-2 ml-10">
                        <h6>Cevaplar</h6>
                    </div>
                    `);
                    $.each(answers, function (index) {
                        answersCard.append(`
                    <div class="card mt-2 ml-10">
                        <div class="card-body py-2 cursor-pointer answerSelector" id="answer_${answers[index].id}" data-id="${answers[index].id}">
                            <i class="mr-2 fa fa-at"></i><span>${answers[index].cevap}</span>
                        </div>
                    </div>
                    <div id="answer_${answers[index].id}_sub_questions" style="display: none">

                    </div>
                    <div id="answer_${answers[index].id}_products" style="display: none">

                    </div>
                    `);
                    });
                    answersCard.slideToggle();
                },
                error: function () {

                }
            });
        } else {
            answersCard.slideToggle();
        }
    });

    $(document).delegate('.answerSelector', 'click', function () {
        var id = $(this).data('id');
        var answerSubQuestionsCard = $("#answer_" + id + "_sub_questions");
        var answerProductsCard = $("#answer_" + id + "_products");

        if(answerSubQuestionsCard.css('display') == 'none') {
            $.ajax({
                type: 'get',
                url: '{{ route('ajax.survey.answer.edit') }}',
                data: {
                    id: id
                },
                success: function (answer) {
                    if (answer.questions != null) {
                        answerSubQuestionsCard.html('');
                        answerSubQuestionsCard.append(`
                    <div class="mt-2 ml-20">
                        <h6>Alt Sorular</h6>
                    </div>
                    `);
                        $.each(answer.questions, function (index) {
                            answerSubQuestionsCard.append(`
                        <div class="card mt-2 ml-20">
                            <div class="card-body py-2">
                                <i class="mr-2 fa fa-at"></i><span>${allQuestions[SearchInArray(allQuestions, answer.questions[index].sorularId)].soru}</span>
                            </div>
                        </div>
                        `);
                        });
                        answerSubQuestionsCard.slideToggle();
                    }

                    if (answer.products != null) {
                        answerProductsCard.html('');
                        answerProductsCard.append(`
                    <div class="mt-2 ml-20">
                        <h6>Cevaba Bağlı Ürünler</h6>
                    </div>
                    `);
                        $.each(answer.products, function (index) {
                            answerProductsCard.append(`
                        <div class="card mt-2 ml-20">
                            <div class="card-body py-2">
                                <i class="mr-2 fa fa-at"></i><span>${answer.products[index].urunKodu}</span>
                            </div>
                        </div>
                        `);
                        });
                        answerProductsCard.slideToggle();
                    }
                },
                error: function () {

                }
            });
        } else {
            answerSubQuestionsCard.slideToggle();
        }


    });


</script>
