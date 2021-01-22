<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:500px;">
        <div class="modal-content" style="margin-top: 50%">
            <div class="modal-header">
                <h5 class="modal-title">Düzenle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="updated_queue_id" id="updated_queue_id">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="company_id_edit">Kuyruğun Bağlı Olacağı Firmayı Seçin</label>
                            <select name="company_id_edit" id="company_id_edit" class="form-control selectpicker">
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="short_edit">Kısa Ad (Kuyruğun Santraldeki İsmi)</label>
                            <input type="text" name="short_edit" id="short_edit" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="name_edit">Kuyruğun Sistemde Görünecek Adı</label>
                            <input type="text" name="name_edit" id="name_edit" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="queue_update">Güncelle</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Vazgeç</button>

            </div>
        </div>
    </div>
</div>
