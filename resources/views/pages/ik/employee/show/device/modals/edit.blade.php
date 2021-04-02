<div class="modal fade" id="EditEmployeeDeviceModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <form action="{{ route('ik.employee.employee-device.update') }}" method="post" class="modal-content">
            @csrf
            <input type="hidden" name="employee_id" id="employee_id_edit" value="{{ $employee->id }}">
            <input type="hidden" name="employee_device_id" id="employee_device_id_edit">
            <div class="modal-header">
                <h5 class="modal-title">İzin Düzenle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="category_id_edit">Zimmet Kategorisi</label>
                            <select id="category_id_edit" name="category_id" class="form-control" required>
                                @foreach($employeeDeviceCategories as $employeeDeviceCategory)
                                    <option value="{{ $employeeDeviceCategory->id }}">{{ $employeeDeviceCategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="name_edit">Zimmet Adı</label>
                            <input class="form-control" type="text" name="name" id="name_edit" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="serial_number_edit">Seri Numarası</label>
                            <input class="form-control" type="text" name="serial_number" id="serial_number_edit">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="start_date_edit">Veriliş Tarihi</label>
                            <input type="date" id="start_date_edit" name="start_date" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="end_date_edit">Teslim Tarihi</label>
                            <input type="date" id="end_date_edit" name="end_date" class="form-control">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <label for="description_edit">Açıklama</label>
                        <textarea id="description_edit" class="form-control" name="description" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Kapat</button>
                <button type="submit" class="btn btn-round btn-info">Güncelle</button>
            </div>
        </form>
    </div>
</div>
