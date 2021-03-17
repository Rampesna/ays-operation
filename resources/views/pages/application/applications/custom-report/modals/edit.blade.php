<div class="modal fade" id="EditCustomReport" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <form id="edit_custom_report_form" method="post" class="modal-content">
            {{ csrf_field() }}
            <input type="hidden" id="updated_custom_report_id">
            <div class="modal-header">
                <h5 class="modal-title">Özel Rapor Düzenle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="name_edit">Rapor Başlığı</label>
                            <input type="text" class="form-control" id="name_edit">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="query_edit">SQL Sorgu</label>
                            <textarea id="query_edit" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Kapat</button>
                <button type="button" class="btn btn-round btn-success" id="update_custom_report_button">Güncelle</button>
            </div>
        </form>
    </div>
</div>
