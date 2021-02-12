<div class="modal fade" id="DeleteComment" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:900px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Yorumu Sil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="deleted_comment_id" id="deleted_comment_id">
                <p>
                    Bu yorumu silmek istediğinize emin misiniz?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="delete_comment">Sil</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancelDeleteComment">Vazgeç</button>
            </div>
        </div>
    </div>
</div>
