<div class="modal fade" id="AddShiftModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Vardiya Ekle</h5>
                <button id="closemymodal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body demo-masked-input">
                <div class="row">
                    <div class="col-xl-12">
                        <label>Çalışanı Seçin</label>
                        <select id="user_id" name="user_id" required class="form-control" data-live-search="true">

                        </select>
                    </div>
                </div>
                <hr>
                <input type="hidden" name="shift_start_day" id="shift_start_day">
                <input type="hidden" name="shift_end_day" id="shift_end_day">
                <div class="row">
                    <div class="col-lg-4 pt-4">
                        <label class="ml-2"><i class="text-info fa fa-clock"></i>
                            &nbsp;&nbsp;Vardiya</label>
                    </div>
                    <div class="col-lg-4">
                        <label>Başlangıç</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                            <input disabled name="shift_start_day_view" id="shift_start_day_view" type="text"
                                   class="form-control">
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-clock"></i></span>
                            </div>
                            <input required name="shift_start" id="shift_start" type="text"
                                   class="form-control aysselector" placeholder="Örn: 23:59">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label>Bitiş</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                            <input disabled name="shift_end_day_view" id="shift_end_day_view" type="text"
                                   class="form-control">
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-clock"></i></span>
                            </div>
                            <input required name="shift_end" id="shift_end" type="text"
                                   class="form-control aysselector" placeholder="Örn: 23:59">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-4 pt-4">
                        <label class="ml-2"><i class="text-info fa fa-lg fa-coffee"></i> &nbsp;&nbsp;Mola</label>
                    </div>
                    <div class="col-lg-8">
                        <label>Mola Süresi</label>
                        <div class="input-group">
                            <input required name="break_duration" id="break_duration" type="text"
                                   class="form-control">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-clock"></i> &nbsp;&nbsp;&nbsp;Dakika</span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-4 pt-4">
                        <label class="ml-2"><i class="text-info fa fa-lg fa-sticky-note"></i>&nbsp;&nbsp;Not</label>
                    </div>
                    <div class="col-lg-8">
                        <label> </label>
                        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Kapat</button>
                <button type="button" id="add_shift_submit" class="btn btn-round btn-primary">Kaydet</button>
            </div>
        </div>
    </div>
</div>
