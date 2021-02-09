<div class="modal fade" id="EditProjectEmployees" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:600px;">
        <form action="{{ route('project.project.employees.update') }}" method="post" class="modal-content" style="margin-top: 25%">
            @csrf
            <input type="hidden" name="project_id" value="{{ $project->id }}">
            <div class="modal-header">
                <h5 class="modal-title">Personeller</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="employees">Personeller</label>
                            <select name="employees[]" id="employees" class="form-control selectpicker" data-live-search="true" multiple>
                                @foreach($employees as $employee)
                                    <option @if($project->employees()->where('employee_id', $employee->id)->exists()) selected @endif value="{{ $employee->id }}">{{ $employee->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Kaydet</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Vazgeç</button>
            </div>
        </form>
    </div>
</div>
