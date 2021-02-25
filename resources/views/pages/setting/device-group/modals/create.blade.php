<div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:900px;">
        <div class="modal-content" style="margin-top: 25%">
            <div class="modal-header">
                <h5 class="modal-title">Oluştur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="company_id_create">Grubun Bağlı Olacağı Firma</label>
                            <select name="company_id_create" id="company_id_create" class="form-control selectpicker">
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="name_create">Cihaz Grubu Adı</label>
                            <input type="text" name="name_create" id="name_create" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="form-group">
                            <label for="icon_create">Grup İkonu</label>
                            <select id="icon_create" name="icon_create" class="selectpicker form-control">
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
                <button type="button" class="btn btn-success" id="device_group_create">Oluştur</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Vazgeç</button>
            </div>
        </div>
    </div>
</div>
