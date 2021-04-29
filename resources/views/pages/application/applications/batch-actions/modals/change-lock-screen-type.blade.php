<div class="modal fade" id="ChangeLockScreenType" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <form id="change_lock_screen_type_form" method="post" class="modal-content">
            {{ csrf_field() }}
            <div class="modal-header">
                <h5 class="modal-title">Kilit Ekranı Türü</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12">
                        <label for="lock_screen_type">İşlem Türü</label>
                        <select id="lock_screen_type" name="lock_screen_type" class="form-control">
                            <option value="1">Bilgisayar Kilit Ekranı</option>
                            <option value="2">OTS Kilit Ekranı</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Kapat</button>
                <button type="button" class="btn btn-round btn-success" data-dismiss="modal" id="change_lock_screen_type_button">Kaydet</button>
            </div>
        </form>
    </div>
</div>
