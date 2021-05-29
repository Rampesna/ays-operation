<div class="modal fade" id="CalledReportDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:1200px;">
        <div class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Detaylar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12">
                        <table class="table table-hover" id="callDetails">
                            <thead>
                            <tr>
                                <th>Personel</th>
                                <th>Cari ID</th>
                                <th>Müşteri</th>
                                <th>Görüşme Notları</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Personel</th>
                                <th>Cari ID</th>
                                <th>Müşteri</th>
                                <th>Görüşme Notları</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
            </div>
        </div>
    </div>
</div>
