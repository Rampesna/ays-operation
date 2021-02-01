<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <input type="hidden" name="updated_shift_id" id="updated_shift_id">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Vardiya Sil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body demo-masked-input">
                <input type="hidden" name="deleted_shift_id" id="deleted_shift_id">
                <p>
                    Bu vardiyayı silmek istediğinize emin misiniz?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-round btn-default" data-dismiss="modal">İptal</button>
                <button type="button" id="delete_shift" class="btn btn-round btn-danger">Sil</button>
            </div>
        </div>
    </div>
</div>
