<div class="modal fade" id="CreateOvertimeModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <form action="{{ route('employee-panel.overtime.create') }}" method="post" class="modal-content">
            @csrf
            <input type="hidden" name="employee_id" value="{{ auth()->user()->getId() }}">
            <input type="hidden" name="status_id" value="1">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Fazla Mesai Talep Et</h5>
            </div>
            <div class="modal-body demo-masked-input">
                <div class="row ">
                    <div class="col-lg-4">
                        <label for="reason_id">Fazla Mesai Sebebi</label>
                        <select id="reason_id" name="reason_id" class="form-control" required>
                            @foreach($reasons as $reason)
                                <option value="{{ $reason->id }}">{{ $reason->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="start_date">Başlangıç Tarihi</label>
                        <input type="datetime-local" id="start_date" name="start_date" class="form-control" required>
                    </div>
                    <div class="col-lg-4">
                        <label for="end_date">Bitiş Tarihi</label>
                        <input type="datetime-local" id="end_date" name="end_date" class="form-control" required>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <label for="description">Açıklama</label>
                        <textarea name="description" id="description" class="form-control" rows="4"></textarea>
                    </div>
                </div>
                <hr>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Kapat</button>
                <button type="submit" class="btn btn-round btn-primary">Kaydet</button>
            </div>
        </form>
    </div>
</div>
