<div class="modal fade" id="CreateRecruitingReservationModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <input type="hidden" id="create_recruiting_reservation_id">
            <div class="modal-header">
                <h5 class="modal-title">Randevu Oluştur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="create_recruiting_reservation_date">Randevu Tarihi</label>
                            <input type="datetime-local" class="form-control" id="create_recruiting_reservation_date">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="create_recruiting_reservation_content">Randevu İçeriği</label>
                            <textarea class="form-control" rows="3" id="create_recruiting_reservation_content"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Vazgeç</button>
                <button type="submit" class="btn btn-round btn-success" id="createRecruitingReservationButton">Oluştur</button>
            </div>
        </div>
    </div>
</div>
