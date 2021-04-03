<div class="modal fade" id="CreatePositionModalWarning" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            @csrf
            <input type="hidden" name="company_id" value="1">
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12 text-center">
                        <h4>Uyarı</h4>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xl-12 text-center">
                        <p>
                            Yeni bir pozisyon eklerseniz var olan aktif pozisyon sistem tarafından otomatik olarak sonlandırılacaktır!
                            <br>
                            İşlemi onaylıyor musunuz?
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-round btn-default" data-dismiss="modal">İptal Et</button>
                <button type="button" class="btn btn-round btn-info" data-dismiss="modal" data-toggle="modal" data-target="#CreatePositionModal">Onaylıyorum</button>
            </div>
        </div>
    </div>
</div>
