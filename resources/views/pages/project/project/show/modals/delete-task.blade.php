<div class="modal fade" id="DeleteTaskModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:900px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Görevi Sil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="deleted_note_id" id="deleted_note_id">
                <p>
                    Bu görevi silmek istediğinize emin misiniz?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="deleteTask">Sil</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Vazgeç</button>
            </div>
        </div>
    </div>
</div>
