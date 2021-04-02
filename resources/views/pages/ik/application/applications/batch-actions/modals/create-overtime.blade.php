<div class="modal fade" id="CreateOvertimeModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <form id="createOvertimeForm" action="{{ route('ik.application.batch-actions.createOvertime') }}" method="post" class="modal-content">
            @csrf
            <input type="hidden" name="employees" id="createOvertimeEmployees">
            <div class="modal-header">
                <h5 class="modal-title">Fazla Mesai Oluştur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="reason_id">Mesai Nedeni</label>
                            <select id="reason_id" name="reason_id" class="form-control" required>
                                @foreach($overtimeReasons as $overtimeReason)
                                    <option value="{{ $overtimeReason->id }}">{{ $overtimeReason->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="status_id">Durum</label>
                            <select class="form-control" id="status_id" name="status_id">
                                @foreach($overtimeStatuses as $overtimeStatuse)
                                    <option value="{{ $overtimeStatuse->id }}">{{ $overtimeStatuse->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="start_date">Başlangıç Tarihi</label>
                            <input type="datetime-local" id="start_date" name="start_date" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="end_date">Bitiş Tarihi</label>
                            <input type="datetime-local" id="end_date" name="end_date" class="form-control" required>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <label for="description">Açıklama</label>
                        <textarea id="description" class="form-control" name="description" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Kapat</button>
                <button type="submit" class="btn btn-round btn-info">Oluştur</button>
            </div>
        </form>
    </div>
</div>
