<div class="modal fade" id="UploadDocumentModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <form action="{{ route('ik.employee.punishment.document.upload') }}" method="post" enctype="multipart/form-data" class="modal-content">
            @csrf
            <input type="hidden" name="punishment_id" id="upload_document_punishment_id">
            <div class="modal-header">
                <h5 class="modal-title">Belge Yükle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="file">Dosya Seçin</label>
                            <input type="file" name="file" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Kapat</button>
                <button type="submit" class="btn btn-round btn-info">Yükle</button>
            </div>
        </form>
    </div>
</div>
