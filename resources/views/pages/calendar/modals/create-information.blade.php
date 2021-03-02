<div class="modal fade" id="CreateInformationModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div id="create_device_form" class="modal-dialog" role="document" style="max-width:900px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Yeni Bilgilendirme Oluştur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form id="create_information_form" class="modal-body">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="create_information_title">Bilgilendirme Başlığı</label>
                            <input type="text" class="form-control" id="create_information_title">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="create_information_date">Bilgilendirme Tarihi</label>
                            <input type="datetime-local" id="create_information_date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="create_information_information">Bilgilendirme İçeriği</label>
                            <textarea id="create_information_information" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="createInformationButton">Oluştur</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancelCreateInformationButton">Vazgeç</button>
            </div>
        </div>
    </div>
</div>
