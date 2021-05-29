<div id="CreateRightbar" style="width: 1100px" class="offcanvas offcanvas-right p-10">
    <input type="hidden" id="create_rightbar_toggle">
    <div class="offcanvas-content">
        <div class="offcanvas-wrapper mb-5 scroll-pull">
            <form id="CreateForm">
                <div class="row">
                    <div class="col-xl-10">
                        <h5>Yeni Gündem Oluştur</h5>
                    </div>
                </div>
                <hr>
                <div class="row mt-4">
                    <div class="col-xl-3 mt-8">
                        <span class="font-weight-bold">Gündem Konusu: </span>
                    </div>
                    <div class="col-xl-9">
                        <label for="subject_create"></label>
                        <input type="text" id="subject_create" class="form-control">
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
                <div class="row mt-4">
                    <div class="col-xl-3 mt-8">
                        <span class="font-weight-bold">Tartışmalar: </span>
                    </div>
                    <div class="col-xl-9">
                        <label for="discussions_create"></label>
                        <textarea class="form-control" id="discussions_create" rows="10"></textarea>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-xl-3 mt-8">
                        <span class="font-weight-bold">Sonuç: </span>
                    </div>
                    <div class="col-xl-9">
                        <label for="result_create"></label>
                        <textarea class="form-control" id="result_create" rows="4"></textarea>
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
