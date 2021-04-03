<div class="modal fade" id="LeaveEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:750px;">
        <form action="{{ route('ik.employee.leave') }}" method="post" class="modal-content">
            @csrf
            <input type="hidden" name="employee_id" value="{{ $employee->id }}">
            <div class="modal-header">
                <h5 class="modal-title">Personeli İşten Çıkar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="end_date">İşten Çıkarılma Tarihi</label>
                            <input type="date" id="end_date" name="end_date" class="form-control" required>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="leaving_reason_id">İşten Çıkarılma Nedeni</label>
                            <select id="leaving_reason_id" name="leaving_reason_id" class="form-control" required>
                                @foreach($leavingReasons as $leavingReason)
                                    <option value="{{ $leavingReason->id }}">{{ $leavingReason->id . ' - ' . $leavingReason->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal Et</button>
                <button type="submit" class="btn btn-danger">İşten Çıkar</button>
            </div>
        </form>
    </div>
</div>
