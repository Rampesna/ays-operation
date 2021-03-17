<div class="modal fade" id="DeleteCustomReport" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:900px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Özel Raporu Sil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="deleted_custom_report_id">
                <input type="hidden" name="deleted_note_id" id="deleted_note_id">
                <p>
                    Bu özel raporu silmek istediğinize emin misiniz?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="delete_custom_report">Sil</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancelDeleteCustomReport">Vazgeç</button>
            </div>
        </div>
    </div>
</div>
