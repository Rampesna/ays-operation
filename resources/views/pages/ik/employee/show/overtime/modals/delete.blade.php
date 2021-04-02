<div class="modal fade" id="DeleteOvertimeModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <form action="{{ route('ik.application.overtime.delete') }}" method="post" class="modal-content">
            @csrf
            <input type="hidden" name="id" id="deleted_overtime_id">
            <div class="modal-header">
                <h5 class="modal-title">Fazla Mesaiyi Sil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Bu fazla mesaiyi silmek istediğinize emin misiniz?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Kapat</button>
                <button type="submit" class="btn btn-round btn-info">Sil</button>
            </div>
        </form>
    </div>
</div>
