<div class="modal fade" id="SyncModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:1000px;">
        <div class="modal-content" style="margin-top: 25%">
            <div class="modal-header">
                <h5 class="modal-title">Personel Senkronizasyonu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="company_id">Senkronize Edilecek Personellerin Bağlı Olacağı Firmayı Seçin</label>
                            <select name="company_id" id="company_id" class="form-control selectpicker">
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="force">Var Olanları Güncelle <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" title="Evet seçilirse API'den gelecek verilerde dahilisi sistemde elşelen kullanıcının Ad/Soyad ve E-posta bilgisi API'den gelen veriler ile değiştirilerek güncellenir."></i></label>
                            <select name="force" id="force" class="form-control">
                                <option value="0" selected>Hayır</option>
                                <option value="1">Evet</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="sync">Senkronize Et</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Vazgeç</button>
            </div>
        </div>
    </div>
</div>
