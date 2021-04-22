<div id="show_recruiting_rightbar" style="width: 800px" class="offcanvas offcanvas-show-recruiting p-10">
    <input type="hidden" id="show_recruiting_rightbar_toggle">
    <input type="hidden" id="selected_reservation_id">
    <input type="hidden" id="selected_reservation_recruiting_id">
    <div class="offcanvas-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="form-group">
                    <h5 id="show_recruiting_name">Randevu Detayları</h5>
                </div>
            </div>
        </div>
        <hr class="mt-n2">
        <div class="row mt-6">
            <div class="col-xl-3">
                <span class="font-weight-bold">Randevu Tarihi: </span>
            </div>
            <div class="col-xl-9">
                <span id="show_recruiting_reservation_date"></span>
            </div>
        </div>
        <hr>
        <div class="row mt-6">
            <div class="col-xl-3">
                <span class="font-weight-bold">Durum: </span>
            </div>
            <div class="col-xl-9">
                <span id="show_recruiting_step"></span>
            </div>
        </div>
        <div class="row mt-6">
            <div class="col-xl-3">
                <span class="font-weight-bold">E-posta Adresi: </span>
            </div>
            <div class="col-xl-9">
                <span id="show_recruiting_email">--</span>
            </div>
        </div>
        <div class="row mt-6">
            <div class="col-xl-3">
                <span class="font-weight-bold">Telefon Numarası: </span>
            </div>
            <div class="col-xl-9">
                <span id="show_recruiting_phone_number">--</span>
            </div>
        </div>
        <div class="row mt-6">
            <div class="col-xl-3">
                <span class="font-weight-bold">Kimlik Numarası: </span>
            </div>
            <div class="col-xl-9">
                <span id="show_recruiting_identification_number">--</span>
            </div>
        </div>
        <div class="row mt-6">
            <div class="col-xl-3">
                <span class="font-weight-bold">Doğum Tarihi: </span>
            </div>
            <div class="col-xl-9">
                <span id="show_recruiting_birth_date">--</span>
            </div>
        </div>
        <div class="row mt-6">
            <div class="col-xl-3">
                <span class="font-weight-bold">CV: </span>
            </div>
            <div class="col-xl-9">
                <a id="show_recruiting_cv" href="" download></a>
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
        <hr class="mt-15">
        <div class="row">
            <div class="col-xl-12">
                <div class="form-group">
                    <h5 class="cursor-pointer" id="showRecruitingActivitiesToggle">Geçmiş İşlemler</h5>
                </div>
            </div>
        </div>
        <div id="showRecruitingActivities">
            <div class="row ml-2 mb-3">
                <div class="col-xl-3">
                    <label for="title_">İşlemi Yapan</label>
                    <input type="text" class="form-control" value="Test" disabled>
                </div>
                <div class="col-xl-3 text-center">
                    <label for="">Aday Durumu</label><br>
                    <span class="btn btn-pill btn-sm btn-warning mt-3" style="font-size: 11px; height: 20px; padding-top: 2px">Havuzda</span>
                </div>
                <div class="col-xl-6">
                    <label for="description_">Açıklamalar</label>
                    <textarea id="description_" rows="3" class="form-control" disabled></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
