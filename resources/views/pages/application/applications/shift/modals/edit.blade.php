<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <input type="hidden" name="updated_shift_id" id="updated_shift_id">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Vardiya Düzenle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body demo-masked-input">
                <div class="row">
                    <div class="col-xl-12 text-center">
                        <h3 id="shift_edit_name">--</h3>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-4 pt-4">
                        <label class="ml-2"><i class="text-info fa fa-clock"></i>
                            &nbsp;&nbsp;Vardiya</label>
                    </div>
                    <div class="col-lg-4">
                        <label for="shift_start_date_edit">Başlangıç</label>
                        <div class="input-group">
                            <input name="shift_start_date_edit" id="shift_start_date_edit" type="date" class="form-control">
                        </div>
                        <label for="shift_start_hour_edit"></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-clock"></i></span>
                            </div>
                            <input required name="shift_start_hour_edit" id="shift_start_hour_edit" type="text" class="form-control aysselector" placeholder="Örn: 23:59">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label for="shift_end_date_edit">Bitiş</label>
                        <div class="input-group">
                            <input name="shift_end_date_edit" id="shift_end_date_edit" type="date" class="form-control">
                        </div>
                        <label for="shift_end_hour_edit"></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-clock"></i></span>
                            </div>
                            <input required name="shift_end_hour_edit" id="shift_end_hour_edit" type="text" class="form-control aysselector" placeholder="Örn: 23:59">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-4 pt-4">
                        <label class="ml-2"><i class="text-info fa fa-lg fa-coffee"></i> &nbsp;&nbsp;Mola</label>
                    </div>
                    <div class="col-lg-8">
                        <label for="break_duration_edit">Mola Süresi</label>
                        <div class="input-group">
                            <input required name="break_duration_edit" id="break_duration_edit" type="text" class="form-control onlyNumber">
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
                        <label for="description_edit"></label>
                        <textarea class="form-control" name="description_edit" id="description_edit" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-round btn-default" data-dismiss="modal">İptal</button>
                <button type="button" id="update_shift" class="btn btn-round btn-primary">Güncelle</button>
            </div>
        </div>
    </div>
</div>
