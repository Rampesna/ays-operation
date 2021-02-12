<div class="modal fade" id="EditComment" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:900px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Yorumu Düzenle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="comment_edit">Yorum</label>
                            <textarea class="form-control" name="comment_edit" id="comment_edit" rows="5"></textarea>
                            <input type="hidden" name="updated_comment_id" id="updated_comment_id">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="update_comment">Güncelle</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancelEditComment">Vazgeç</button>
            </div>
        </div>
    </div>
</div>
