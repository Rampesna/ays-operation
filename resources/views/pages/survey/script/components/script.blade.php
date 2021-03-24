<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
<script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

<script>
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
            },
            {
                width: "2%",
                targets: 2
            },
            {
                width: "6%",
                targets: 3
            },
            {
                width: "6%",
                targets: 4
            }
        ],

        responsive: true,
        select: false
    });

    var createSurveyButton = $("#createSurveyButton");
    var deleteSurveyButton = $("#deleteSurveyButton");
    var updateSurveyButton = $("#updateSurveyButton");
    var connectSurveyButton = $("#connectSurveyButton");
    var additionalSurveySelector = $("#additional_survey_code");
    var deletedSurvey = $("#deleted_survey_id");
    var editedSurvey = $("#id_edit");

    createSurveyButton.click(function () {
        var code = $("#code_create").val();
        var name = $("#name_create").val();
        var description = $("#description_create").val();
        var service_or_product = $("#service_or_product_create").val();
        var call_reason = $("#call_reason_create").val();
        var customer_information_1 = $("#customer_information_1_create").val();
        var customer_information_2 = $("#customer_information_2_create").val();
        var opportunity = $("#opportunity_create").val();
        var call = $("#call_create").val();
        var dial_plan = $("#dial_plan_create").val();
        var opportunity_redirect_to_seller = $("#opportunity_redirect_to_seller_create").val();
        var dial_plan_redirect_to_seller = $("#dial_plan_redirect_to_seller_create").val();

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.survey.create') }}',
            data: {
                _token: '{{ csrf_token() }}',
                code: code,
                name: name,
                description: description,
                service_or_product: service_or_product,
                call_reason: call_reason,
                customer_information_1: customer_information_1,
                customer_information_2: customer_information_2,
                opportunity: opportunity,
                call: call,
                dial_plan: dial_plan,
                opportunity_redirect_to_seller: opportunity_redirect_to_seller,
                dial_plan_redirect_to_seller: dial_plan_redirect_to_seller
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

    $(document).delegate(".connect-survey", "click", function () {
        var except = $(this).data('code');
        $("#main_survey_code").val(except);
        $.ajax({
            type: 'get',
            url: '{{ route('ajax.survey.getSurveyList') }}',
            data: {},
            success: function (surveyList) {
                additionalSurveySelector.html('').selectpicker('refresh');
                $.each(surveyList, function (index) {
                    if (surveyList[index].kodu != except) {
                        additionalSurveySelector.append(`<option value="${surveyList[index].kodu}">${surveyList[index].adi}</option>`);
                    }
                });
                additionalSurveySelector.selectpicker('refresh');
            },
            error: function (error) {
                console.log(error)
            }
        });
    });

    $(document).delegate(".edit", "click", function () {
        var id = $(this).data('id');
        editedSurvey.val(id);

        $.ajax({
            type: 'get',
            url: '{{ route('ajax.survey.edit') }}',
            data: {
                id: id
            },
            success: function (survey) {

                console.log(survey)

                $("#code_edit").val(survey.kodu);
                $("#name_edit").val(survey.adi);
                $("#service_or_product_edit").val(survey.uyumCrmHizmetUrun);
                $("#call_reason_edit").val(survey.uyumCrmCagriNedeni);
                $("#description_edit").val(survey.aciklama);
                $("#customer_information_1_edit").val(survey.musteriBilgilendirme);
                $("#customer_information_2_edit").val(survey.musteriBilgilendirme2);
                $("#opportunity_edit").val(survey.uyumCrmFirsat);
                $("#call_edit").val(survey.uyumCrmCagri);
                $("#dial_plan_edit").val(survey.uyumCrmAramaPlani);
                $("#opportunity_redirect_to_seller_edit").val(survey.uyumCrmFirsatSaticiyaYonlendir);
                $("#dial_plan_redirect_to_seller_edit").val(survey.uyumCrmAramaPlaniSaticiyaYonlendir);
            },
            error: function () {

            }
        });
    });

    updateSurveyButton.click(function () {
        var id = $("#id_edit").val();
        var code = $("#code_edit").val();
        var name = $("#name_edit").val();
        var description = $("#description_edit").val();
        var service_or_product = $("#service_or_product_edit").val();
        var call_reason = $("#call_reason_edit").val();
        var customer_information_1 = $("#customer_information_1_edit").val();
        var customer_information_2 = $("#customer_information_2_edit").val();
        var opportunity = $("#opportunity_edit").val();
        var call = $("#call_edit").val();
        var dial_plan = $("#dial_plan_edit").val();
        var opportunity_redirect_to_seller = $("#opportunity_redirect_to_seller_edit").val();
        var dial_plan_redirect_to_seller = $("#dial_plan_redirect_to_seller_edit").val();

        console.log(id)
        console.log(code)

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.survey.update') }}',
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                code: code,
                name: name,
                description: description,
                service_or_product: service_or_product,
                call_reason: call_reason,
                customer_information_1: customer_information_1,
                customer_information_2: customer_information_2,
                opportunity: opportunity,
                call: call,
                dial_plan: dial_plan,
                opportunity_redirect_to_seller: opportunity_redirect_to_seller,
                dial_plan_redirect_to_seller: dial_plan_redirect_to_seller
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
        deletedSurvey.val($(this).data('id'));
    });

    deleteSurveyButton.click(function () {
        var id = deletedSurvey.val();

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.survey.delete') }}',
            data: {
                _token: '{{ csrf_token() }}',
                id: id
            },
            success: function (response) {
                if (response.status === 'Silindi') {
                    toastr.success('Başarıyla Silindi');
                    surveyList.row('#row_id_' + id).remove().draw();
                    $("#DeleteSurvey").modal('hide');
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

    connectSurveyButton.click(function () {
        var main_code = $("#main_survey_code").val();
        var additional_code = $("#additional_survey_code").val();

        console.log(main_code)
        console.log(additional_code)

        $.ajax({
            type: 'post',
            url: '{{ route('ajax.survey.setSurveyGroupConnect') }}',
            data: {
                _token: '{{ csrf_token() }}',
                main_code: main_code,
                additional_code: additional_code
            },
            success: function (response) {
                if (response.status === 'Connected') {
                    toastr.success('Başarıyla Bağlandı');
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
</script>
