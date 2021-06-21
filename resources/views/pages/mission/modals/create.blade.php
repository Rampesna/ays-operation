<div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:900px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Yeni Görev Oluştur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="CreateForm">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="assigned_type_create">Görevi Yapacak Olan Tür</label>
                                <select id="assigned_type_create" class="form-control">
                                    <option value="App\Models\User">Kullanıcı</option>
                                    <option value="App\Models\Employee">Personel</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="assigned_id_create">Görevi Yapacak Olan Kişi</label>
                                <select id="assigned_id_create" class="form-control">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="start_date_create">Başlangıç Tarihi</label>
                                <input type="datetime-local" id="start_date_create" class="form-control">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="end_date_create">Bitiş Tarihi</label>
                                <input type="datetime-local" id="end_date_create" class="form-control">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="subject_create">Görev Konusu</label>
                                <input type="text" id="subject_create" class="form-control">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="status_id_create">Görev Durumu</label>
                                <select id="status_id_create" class="form-control">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label for="description_create">Açıklamalar</label>
                                <textarea id="description_create" class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="CreateButton">Oluştur</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Vazgeç</button>
            </div>
        </div>
    </div>
</div>
