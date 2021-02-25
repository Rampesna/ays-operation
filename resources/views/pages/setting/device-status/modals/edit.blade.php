<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:900px;">
        <div class="modal-content" style="margin-top: 25%">
            <div class="modal-header">
                <h5 class="modal-title">Düzenle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="updated_device_status_id" id="updated_device_status_id">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="form-status">
                            <label for="company_id_edit">Durumun Bağlı Olacağı Firma</label>
                            <select name="company_id_edit" id="company_id_edit" class="form-control selectpicker">
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-status">
                            <label for="name_edit">Durum Adı</label>
                            <input type="text" name="name_edit" id="name_edit" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="form-status">
                            <label for="color_edit">Durum Rengi</label>
                            <select id="color_edit" name="color_edit" class="selectpicker form-control">
                                <option selected hidden disabled></option>
                                <option class="text-center" value="primary" data-content="<i class='btn btn-block btn-primary'></i>"></option>
                                <option class="text-center" value="secondary" data-content="<i class='btn btn-block btn-secondary'></i>"></option>
                                <option class="text-center" value="success" data-content="<i class='btn btn-block btn-success'></i>"></option>
                                <option class="text-center" value="warning" data-content="<i class='btn btn-block btn-warning'></i>"></option>
                                <option class="text-center" value="danger" data-content="<i class='btn btn-block btn-danger'></i>"></option>
                                <option class="text-center" value="info" data-content="<i class='btn btn-block btn-info'></i>"></option>
                                <option class="text-center" value="dark-75" data-content="<i class='btn btn-block btn-dark-75'></i>"></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="device_status_update">Güncelle</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Vazgeç</button>
            </div>
        </div>
    </div>
</div>
