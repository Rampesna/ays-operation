<div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Vardiya Ekle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body demo-masked-input">
                <div class="row">
                    <div class="col-xl-6">
                        <label for="company_id_create">Şirketi Seçin</label>
                        <select id="company_id_create" name="company_id_create" class="form-control" data-live-search="true">
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xl-6">
                        <label for="employees_create">Personel(ler)i Seçin</label>
                        <select id="employees_create" name="employees_create" class="form-control selectpicker" data-live-search="true" multiple>

                        </select>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-4 pt-4">
                        <label class="ml-2"><i class="text-info fa fa-clock"></i>
                            &nbsp;&nbsp;Vardiya</label>
                    </div>
                    <div class="col-lg-4">
                        <label for="shift_start_date_create">Başlangıç</label>
                        <div class="input-group">
                            <input name="shift_start_date_create" id="shift_start_date_create" type="date" class="form-control">
                        </div>
                        <label for="shift_start_hour_create"></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-clock"></i></span>
                            </div>
                            <input required name="shift_start_hour_create" id="shift_start_hour_create" type="text" class="form-control aysselector" placeholder="Örn: 23:59">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label for="shift_end_date_create">Bitiş</label>
                        <div class="input-group">
                            <input name="shift_end_date_create" id="shift_end_date_create" type="date" class="form-control">
                        </div>
                        <label for="shift_end_hour_create"></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-clock"></i></span>
                            </div>
                            <input required name="shift_end_hour_create" id="shift_end_hour_create" type="text" class="form-control aysselector" placeholder="Örn: 23:59">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-4 pt-4">
                        <label class="ml-2"><i class="text-info fa fa-lg fa-coffee"></i> &nbsp;&nbsp;Mola</label>
                    </div>
                    <div class="col-lg-8">
                        <label for="break_duration_create">Mola Süresi</label>
                        <div class="input-group">
                            <input required name="break_duration_create" id="break_duration_create" type="text" class="form-control onlyNumber">
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
                        <label for="description_create"></label>
                        <textarea class="form-control" name="description_create" id="description_create" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-round btn-default" data-dismiss="modal">İptal</button>
                <button type="button" id="create_shift" class="btn btn-round btn-primary">Oluştur</button>
            </div>
        </div>
    </div>
</div>
