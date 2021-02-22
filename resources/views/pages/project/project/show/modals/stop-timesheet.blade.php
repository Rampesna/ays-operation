<div class="modal fade" id="StopTimesheetModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <form action="{{ route('project.project.timesheet.stop') }}" method="post" class="modal-dialog" style="max-width:900px;">
        @csrf
        <input type="hidden" name="timesheet_id" id="stopped_timesheet_id" required>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Görevi Durdur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="deleted_note_id" id="deleted_note_id">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="timesheet_stop_description">Görevi Durdurma Nedeni</label>
                            <textarea id="timesheet_stop_description" name="description" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" id="stopTimesheetButton">Görevi Durdur</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Vazgeç</button>
            </div>
        </div>
    </form>
</div>
