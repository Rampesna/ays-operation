<div id="CreateRightbar" style="width: 1100px" class="offcanvas offcanvas-right p-10">
    <input type="hidden" id="create_rightbar_toggle">
    <div class="offcanvas-content">
        <div class="offcanvas-wrapper mb-5 scroll-pull">
            <form id="CreateForm">
                <div class="row">
                    <div class="col-xl-10">
                        <h5>Yeni Toplantı Oluştur</h5>
                    </div>
                </div>
                <hr>
                <div class="row mt-4">
                    <div class="col-xl-3 mt-8">
                        <span class="font-weight-bold">Toplantı Konusu: </span>
                    </div>
                    <div class="col-xl-9">
                        <label for="name_create"></label>
                        <input type="text" id="name_create" class="form-control">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-xl-3 mt-8">
                        <span class="font-weight-bold">Toplantı Tarihi: </span>
                    </div>
                    <div class="col-xl-9">
                        <label for="start_date_create"></label>
                        <input type="datetime-local" id="start_date_create" class="form-control">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-xl-3 mt-8">
                        <span class="font-weight-bold">Toplantı Türü: </span>
                    </div>
                    <div class="col-xl-9">
                        <label for="type_create"></label>
                        <select id="type_create" class="selectpicker form-control">
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
                        <label for="link_create"></label>
                        <input type="text" id="link_create" class="form-control">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-xl-3 mt-8">
                        <span class="font-weight-bold">Açıklamalar: </span>
                    </div>
                    <div class="col-xl-9">
                        <label for="description_create"></label>
                        <textarea class="form-control" id="description_create" rows="4"></textarea>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-xl-3 mt-8">
                        <span class="font-weight-bold">Katılımcılar: </span>
                    </div>
                    <div class="col-xl-9">
                        <label for="users_create"></label>
                        <select id="users_create" class="form-control" multiple>

                        </select>
                    </div>
                </div>
            </form>
        </div>
        <hr>
        <div class="offcanvas-footer">
            <div class="row">
                <div class="col-xl-12 text-right">
                    <button type="button" class="btn btn-success" id="CreateButton">Oluştur</button>
                </div>
            </div>
        </div>
    </div>
</div>
