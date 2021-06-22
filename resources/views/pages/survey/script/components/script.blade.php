<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
<script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

<script>

    function createRandomCode() {
        $("#code_create").val(parseInt(Math.floor((Math.random() * 100000) + 10000) / 10) * 10);
    }

    var createSellecIcon = $("#createSellecIcon");
    var createSellerButton = $("#createSellerButton");
    var cancelCreateSellerButton = $("#cancelCreateSellerButton");

    createSellerButton.click(function () {
        var code = $("#code_create_seller").val();
        var name = $("#name_create_seller").val();
        var products = $("#products_create_seller").val();

        sellers.row.add([
            code,
            name,
            products
        ]).draw(false);
        $("#CreateSeller").modal('hide');
        $("#CreateSurvey").fadeIn(250);
    });

    cancelCreateSellerButton.click(function () {
        $("#CreateSurvey").fadeIn(250);
    });

    createSellecIcon.click(function () {
        $("#CreateSurvey").fadeOut(250);

        $("#code_create_seller").val(null);
        $("#name_create_seller").val(null);
        $("#products_create_seller").val([]).selectpicker('refresh');

        $("#CreateSeller").modal('show');
    });

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

    var sellers = $('#sellers').DataTable({
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
        dom: 'rtipl',

        responsive: true,
        select: 'single'
    });

    var createSurveyButton = $("#createSurveyButton");
    var deleteSurveyButton = $("#deleteSurveyButton");
    var updateSurveyButton = $("#updateSurveyButton");
    var connectSurveyButton = $("#connectSurveyButton");
    var additionalSurveySelector = $("#additional_survey_code");
    var deletedSurvey = $("#deleted_survey_id");
    var editedSurvey = $("#id_edit");

    var surveySellerConnectionSellerCodeSelector = $("#survey_seller_connection_seller_code");

    createSurveyButton.click(function () {
        $("#loader").fadeIn(250);
        var data = new FormData();

        var selectedRows = sellers.rows();
        if (selectedRows.count() > 0) {
            $.each(selectedRows.data(), function (index) {
                data.append('new_sellers[' + index + '][code]', code = selectedRows.data()[index][0]);
                data.append('new_sellers[' + index + '][name]', code = selectedRows.data()[index][1]);
                data.append('new_sellers[' + index + '][products]', code = selectedRows.data()[index][2]);
            });
        }

        data.append('_token', '{{ csrf_token() }}');
        data.append('code', $("#code_create").val());
        data.append('name', $("#name_create").val());
        data.append('description', $("#description_create").val());
        data.append('service_or_product', $("#service_or_product_create").val());
        data.append('call_reason', $("#call_reason_create").val());
        data.append('customer_information_1', $("#customer_information_1_create").val());
        data.append('customer_information_2', $("#customer_information_2_create").val());
        data.append('opportunity', $("#opportunity_create").val());
        data.append('call', $("#call_create").val());
        data.append('dial_plan', $("#dial_plan_create").val());
        data.append('opportunity_redirect_to_seller', $("#opportunity_redirect_to_seller_create").val());
        data.append('dial_plan_redirect_to_seller', $("#dial_plan_redirect_to_seller_create").val());
        data.append('seller_redirection_type', $("#seller_redirection_type_create").val());
        data.append('email_title', $("#email_title_create").val());
        data.append('job_resource', $("#job_resource_create").val());
        data.append('status', $("#status_create").val());
        data.append('additional_product_opportunity', $("#additional_product_opportunity_create").val());
        data.append('additional_product_call_plan', $("#additional_product_call_plan_create").val());
        data.append('file', $('#file_selector_create')[0].files[0] ?? null);
        data.append('call_file', $('#call_file_selector_create')[0].files[0] ?? null);

        $.ajax({
            async: false,
            processData: false,
            contentType: false,
            type: 'post',
            url: '{{ route('ajax.survey.create') }}',
            data: data,
            success: function (response) {
                if (response.status === 'Tamamlandı') {
                    toastr.success('İşlem Tamamlandı!');
                    location.reload();
                } else {
                    toastr.error('Sistemsel Bir Hata Oluştu!');
                    console.log(response)
                    $("#loader").fadeOut(250);
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
                $("#customer_information_1_edit").val(survey.musteriBilgilendirme2);
                $("#customer_information_2_edit").val(survey.musteriBilgilendirme);
                $("#opportunity_edit").val(survey.uyumCrmFirsat);
                $("#call_edit").val(survey.uyumCrmCagri);
                $("#dial_plan_edit").val(survey.uyumCrmAramaPlani);
                $("#opportunity_redirect_to_seller_edit").val(survey.uyumCrmFirsatSaticiyaYonlendir);
                $("#dial_plan_redirect_to_seller_edit").val(survey.uyumCrmAramaPlaniSaticiyaYonlendir);
                $("#email_title_edit").val(survey.epostaBaslik);
                $("#job_resource_edit").val(survey.uyumCrmIsKaynagi);
                $("#seller_redirection_type_edit").val(survey.uyumCrmSaticiKoduTurKodu);
                $("#status_edit").val(survey.durum);
                $("#additional_product_opportunity_edit").val(survey.UyumCrmEkUrunFirsat);
                $("#additional_product_call_plan_edit").val(survey.UyumCrmEkUrunAramaPlani);
                $("#file_selector_edit_control").html(survey.epostaIcerik !== '' || survey.epostaIcerik != null ? '(İçerik Dolu)' : '(İçerik Boş)');
            },
            error: function () {

            }
        });
    });

    updateSurveyButton.click(function () {
        $("#EditSurvey").modal('hide');
        $("#loader").fadeIn(250);
        toastr.info('İşlem Yapılıyor Lütfen Bekleyin!');
        var data = new FormData();
        data.append('_token', '{{ csrf_token() }}');
        data.append('id', $("#id_edit").val());
        data.append('code', $("#code_edit").val());
        data.append('name', $("#name_edit").val());
        data.append('description', $("#description_edit").val());
        data.append('service_or_product', $("#service_or_product_edit").val());
        data.append('call_reason', $("#call_reason_edit").val());
        data.append('customer_information_1', $("#customer_information_1_edit").val());
        data.append('customer_information_2', $("#customer_information_2_edit").val());
        data.append('opportunity', $("#opportunity_edit").val());
        data.append('call', $("#call_edit").val());
        data.append('dial_plan', $("#dial_plan_edit").val());
        data.append('opportunity_redirect_to_seller', $("#opportunity_redirect_to_seller_edit").val());
        data.append('dial_plan_redirect_to_seller', $("#dial_plan_redirect_to_seller_edit").val());
        data.append('seller_redirection_type', $("#seller_redirection_type_edit").val());
        data.append('email_title', $("#email_title_edit").val());
        data.append('job_resource', $("#job_resource_edit").val());
        data.append('file', $('#file_selector_edit')[0].files[0] ?? null);
        data.append('status', $("#status_edit").val());
        data.append('additional_product_opportunity', $("#additional_product_opportunity_edit").val());
        data.append('additional_product_call_plan', $("#additional_product_call_plan_edit").val());
        data.append('call_file', $('#call_file_selector_edit')[0].files[0] ?? null);

        setTimeout(function(){
            $.ajax({
                async: false,
                processData: false,
                contentType: false,
                type: 'post',
                url: '{{ route('ajax.survey.update') }}',
                data: data,
                success: function (response) {
                    if (response.status === 'Tamamlandı') {
                        toastr.success('Başarıyla Güncellendi');
                        location.reload();
                    } else {
                        $("#loader").fadeOut(250);
                        toastr.error('Bir Hata Oluştu!');
                        console.log(response)
                    }
                },
                error: function (error) {
                    console.log(error)
                }
            });
        },2000);
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

    ////////////////////////////////////////////////////

    var tagsCreate = document.getElementById('tags_create');
    var tagsEdit = document.getElementById('tags_edit');

    var tagifyCreate = new Tagify(tagsCreate);
    var tagifyEdit = new Tagify(tagsEdit);

    tagifyCreate.on('add', onAddTagCreate);
    tagifyEdit.on('add', onAddTagEdit);

    function onAddTagCreate(e) {
        tagify.off('add', onAddTagCreate) // exmaple of removing a custom Tagify event
    }

    function onAddTagEdit(e) {
        tagify.off('add', onAddTagEdit) // exmaple of removing a custom Tagify event
    }
</script>
