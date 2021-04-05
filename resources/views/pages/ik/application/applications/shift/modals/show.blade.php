<div class="modal fade" id="ShowModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <form action="#" method="post" class="modal-content">
            {{ csrf_field() }}
            <input type="hidden" name="shift_id" id="shift_id">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Vardiya Bilgileri</h5>
                <button id="closemymodal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row text-center">
                    <div class="col-12">
                        <h3 id="shift_employee_name" class="mb-0">--</h3>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-6 border-right pb-4 pt-4">
                        <label class="mb-0">Başlangıç</label>
                        <h6 id="shift_start_date" class="font-20 font-weight-bold text-col-blue">--</h6>
                    </div>
                    <div class="col-6 pb-4 pt-4">
                        <label class="mb-0">Bitiş</label>
                        <h6 id="shift_end_date" class="font-20 font-weight-bold text-col-blue">--</h6>
                    </div>
                </div>
                <div>
                    <hr>
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <div class="mt-2">Mola Süresi</div>
                            <div id="shift_break_duration" style="margin-top: 5px"></div>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-12 pb-4 pt-4">
                        <p id="shift_description">

                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button name="edit_shift" id="edit_shift" type="button" class="btn btn-round btn-primary">Düzenle</button>
                <button name="shift_delete" id="shift_delete" type="button" class="btn btn-round btn-danger">Sil</button>
            </div>
        </form>
    </div>
</div>
