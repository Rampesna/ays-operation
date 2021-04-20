<div class="modal fade" id="CancelRecruitingModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <input type="hidden" id="cancel_recruiting_id" name="recruiting_id">
            <div class="modal-header">
                <h5 class="modal-title">Adayı İptal Et</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12">
                        <label for="cancel_recruiting_description">Aday İptali Notlarınız</label>
                        <textarea class="form-control" id="cancel_recruiting_description" name="description" rows="4"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Vazgeç</button>
                <button type="submit" class="btn btn-round btn-danger" id="cancelRecruitingButton">Adayı İptal Et</button>
            </div>
        </div>
    </div>
</div>
