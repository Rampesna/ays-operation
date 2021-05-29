<div id="EditRightbar" style="width: 1100px" class="offcanvas offcanvas-right p-10">
    <input type="hidden" id="edit_rightbar_toggle">
    <input type="hidden" id="id_edit">
    <div class="offcanvas-content">
        <div class="offcanvas-wrapper mb-5 scroll-pull">
            <form id="EditForm">
                <div class="row">
                    <div class="col-xl-10">
                        <h5>Gündemi Düzenle</h5>
                    </div>
                </div>
                <hr>
                <div class="row mt-4">
                    <div class="col-xl-3 mt-8">
                        <span class="font-weight-bold">Toplantı Bağlantısı: </span>
                    </div>
                    <div class="col-xl-9">
                        <label for="meeting_id_edit"></label>
                        <select id="meeting_id_edit" class="form-control">

                        </select>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-xl-3 mt-8">
                        <span class="font-weight-bold">Gündem Konusu: </span>
                    </div>
                    <div class="col-xl-9">
                        <label for="subject_edit"></label>
                        <input type="text" id="subject_edit" class="form-control">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-xl-3 mt-8">
                        <span class="font-weight-bold">Katılımcılar: </span>
                    </div>
                    <div class="col-xl-9">
                        <label for="users_edit"></label>
                        <select id="users_edit" class="form-control" multiple>

                        </select>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-xl-3 mt-8">
                        <span class="font-weight-bold">Tartışmalar: </span>
                    </div>
                    <div class="col-xl-9">
                        <label for="discussions_edit"></label>
                        <textarea class="form-control" id="discussions_edit" rows="10"></textarea>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-xl-3 mt-8">
                        <span class="font-weight-bold">Sonuç: </span>
                    </div>
                    <div class="col-xl-9">
                        <label for="result_edit"></label>
                        <textarea class="form-control" id="result_edit" rows="4"></textarea>
                    </div>
                </div>
            </form>
        </div>
        <hr>
        <div class="offcanvas-footer">
            <div class="row">
                <div class="col-xl-12 text-right">
                    <button type="button" class="btn btn-success" id="UpdateButton">Güncelle</button>
                </div>
            </div>
        </div>
    </div>
</div>
