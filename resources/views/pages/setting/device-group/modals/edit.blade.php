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
                <input type="hidden" name="updated_device_group_id" id="updated_device_group_id">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="company_id_edit">Grubun Bağlı Olacağı Firma</label>
                            <select name="company_id_edit" id="company_id_edit" class="form-control selectpicker">
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="name_edit">Cihaz Grubu Adı</label>
                            <input type="text" name="name_edit" id="name_edit" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="form-group">
                            <label for="icon_edit">Grup İkonu</label>
                            <select id="icon_edit" name="icon_edit" class="selectpicker form-control">
                                <option selected hidden disabled></option>
                                <option class="text-center" value="fas fa-tv" data-content="<i class='fas fa-tv'></i>"></option>
                                <option class="text-center" value="fas fa-headphones-alt" data-content="<i class='fas fa-headphones-alt'></i>"></option>
                                <option class="text-center" value="far fa-keyboard" data-content="<i class='far fa-keyboard'></i>"></option>
                                <option class="text-center" value="fas fa-mouse" data-content="<i class='fas fa-mouse'></i>"></option>
                                <option class="text-center" value="fas fa-hdd" data-content="<i class='fas fa-hdd'></i>"></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="device_group_update">Güncelle</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Vazgeç</button>

            </div>
        </div>
    </div>
</div>
