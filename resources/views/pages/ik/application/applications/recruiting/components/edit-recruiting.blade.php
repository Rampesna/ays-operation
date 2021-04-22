<div id="edit_recruiting_rightbar" style="width: 800px" class="offcanvas offcanvas-show-recruiting p-10">
    <input type="hidden" id="edit_recruiting_rightbar_toggle">
    <input type="hidden" id="editing_recruiting_id">
    <input type="hidden" id="edit_recruiting_step_id">

    <div class="offcanvas-content">
        <div class="row">
            <div class="col-xl-9">
                <div class="form-group">
                    <h5>Personel İşe Alımı Düzenle</h5>
                </div>
            </div>
            <div class="col-xl-3 text-right">
                <button type="button" class="btn btn-sm btn-success" id="updateRecruitingButton">Güncelle</button>
            </div>
        </div>
        <hr class="mt-n1">
        <form id="editRecruitingForm">
            <div class="offcanvas-wrapper scroll-pull">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="edit_recruiting_name">Ad Soyad</label>
                            <input type="text" class="form-control" id="edit_recruiting_name">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="edit_recruiting_email">E-posta Adresi</label>
                            <input type="text" class="form-control email-input-mask" id="edit_recruiting_email">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="edit_recruiting_phone_number">Telefon Numarası</label>
                            <input type="text" class="form-control mobile-phone-number" id="edit_recruiting_phone_number">
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="edit_recruiting_identification_number">Kimlik Numarası</label>
                            <input type="text" maxlength="11" class="form-control" id="edit_recruiting_identification_number">
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="edit_recruiting_birth_date">Doğum Tarihi</label>
                            <input type="date" class="form-control" id="edit_recruiting_birth_date">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="edit_recruiting_cv">CV'yi Tekrar Yükleyin</label>
                            <input id="edit_recruiting_cv" type="file">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xl-8">
                        <h5 class="cursor-pointer">Değerlendirme Parametreleri</h5>
                    </div>
                    <div class="col-xl-4">
                        <div class="input-group">
                            <label for="createNewEvaluationParameterInput"></label>
                            <input type="text" class="form-control" id="createNewEvaluationParameterInput" placeholder="Yeni Parametre Ekle">
                            <div class="input-group-append">
                                <button class="btn btn-success" id="createNewEvaluationParameterButton" type="button">+</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-n6">
                    <div class="col-xl-12">
                        <div id="showRecruitingEvaluationParameters" class="mt-2">

                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xl-12">
                        <h5 class="cursor-pointer" id="showRecruitingActivitiesToggle">Geçmiş İşlemler</h5>
                    </div>
                </div>
                <div id="showRecruitingActivities" class="mt-2">

                </div>
            </div>
        </form>
        <div class="offcanvas-footer">

        </div>
    </div>
</div>
