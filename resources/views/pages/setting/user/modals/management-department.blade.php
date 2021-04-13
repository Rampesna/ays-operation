<div class="modal fade" id="ManagementDepartmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:900px;">
        <div class="modal-content" style="margin-top: 50%">
            <div class="modal-header">
                <h5 class="modal-title">Kullanıcı Yönetim Departmanları</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="management_department_user_id" id="management_department_user_id">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="management_departments">Departmanlar</label>
                            <select name="management_departments" id="management_departments" class="form-control selectpicker" multiple>
                                @foreach($managementDepartments as $managementDepartment)
                                    <option value="{{ $managementDepartment->id }}">{{ $managementDepartment->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="updateUserManagementDepartmentsButton">Güncelle</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Vazgeç</button>
            </div>
        </div>
    </div>
</div>
