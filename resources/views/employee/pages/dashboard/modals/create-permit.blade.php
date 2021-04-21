<div class="modal fade" id="CreatePermitModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <form action="{{ route('employee-panel.permit.create') }}" method="post" class="modal-content">
            @csrf
            <input type="hidden" name="employee_id" value="{{ auth()->user()->getId() }}">
            <input type="hidden" name="status_id" value="1">
            <div class="modal-header">
                <h5 class="modal-title">İzin Talebi Oluştur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4">
                        <label for="type_id">İzin Türü</label>
                        <select id="type_id" name="type_id" class="form-control" required>
                            @foreach($permitTypes as $permitType)
                                <option value="{{ $permitType->id }}">{{ $permitType->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="permit_start_date">Başlangıç Tarihi</label>
                        <input type="datetime-local" id="permit_start_date" name="start_date" class="form-control" required>
                    </div>
                    <div class="col-lg-4">
                        <label for="permit_end_date">Bitiş Tarihi</label>
                        <input type="datetime-local" id="end_date" name="permit_end_date" class="form-control" required>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <label for="permit_description">Açıklama</label>
                        <textarea id="permit_description" class="form-control" name="description" rows="3"></textarea>
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
