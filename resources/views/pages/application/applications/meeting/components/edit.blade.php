<div id="EditRightbar" style="width: 1100px" class="offcanvas offcanvas-right p-10">
    <input type="hidden" id="edit_rightbar_toggle">
    <input type="hidden" id="id_edit">
    <div class="offcanvas-content">
        <div class="offcanvas-wrapper mb-5 scroll-pull">
            <form id="EditForm">
                <div class="row">
                    <div class="col-xl-10">
                        <h5>Toplantı Düzenle</h5>
                    </div>
                </div>
                <hr>
                <div class="row mt-4">
                    <div class="col-xl-3 mt-8">
                        <span class="font-weight-bold">Toplantı Konusu: </span>
                    </div>
                    <div class="col-xl-9">
                        <label for="name_edit"></label>
                        <input type="text" id="name_edit" class="form-control">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-xl-3 mt-8">
                        <span class="font-weight-bold">Toplantı Tarihi: </span>
                    </div>
                    <div class="col-xl-9">
                        <label for="start_date_edit"></label>
                        <input type="datetime-local" id="start_date_edit" class="form-control">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-xl-3 mt-8">
                        <span class="font-weight-bold">Toplantı Türü: </span>
                    </div>
                    <div class="col-xl-9">
                        <label for="type_edit"></label>
                        <select id="type_edit" class="selectpicker form-control">
                            <option value="0">Yüzyüze</option>
                            <option value="1">Online</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-xl-3 mt-8">
                        <span class="font-weight-bold">Toplantı Yeri (Toplantı Online İse Linki Yazın): </span>
                    </div>
                    <div class="col-xl-9">
                        <label for="link_edit"></label>
                        <input type="text" id="link_edit" class="form-control">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-xl-3 mt-8">
                        <span class="font-weight-bold">Açıklamalar: </span>
                    </div>
                    <div class="col-xl-9">
                        <label for="description_edit"></label>
                        <textarea class="form-control" id="description_edit" rows="4"></textarea>
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
