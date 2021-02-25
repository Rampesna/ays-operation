<div class="modal fade" id="CreateDeviceModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <form id="create_device_form" class="modal-dialog" role="document" style="max-width:900px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Yeni Cihaz Oluştur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="device_create_employee_id">Personel Ataması</label>
                            <select name="device_create_employee_id" id="device_create_employee_id" class="form-control selectpicker" data-live-search="true">
                                <optgroup label="">
                                    <option value="0">Personele Atanmayacak</option>
                                </optgroup>
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="device_create_group_id">Cihaz Grubu</label>
                            <select name="device_create_group_id" id="device_create_group_id" class="form-control selectpicker">
                                <option selected hidden disabled></option>
                                @foreach($groups as $group)
                                    <option value="{{ $group->id }}" data-content="<i class='{{ $group->icon }}'></i>&nbsp;&nbsp;&nbsp;{{ $group->name }}"></option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="device_create_status_id">Cihaz Durumu</label>
                            <select name="device_create_status_id" id="device_create_status_id" class="form-control selectpicker">
                                <option selected hidden disabled></option>
                                @foreach($statuses as $status)
                                    <option value="{{ $status->id }}" data-content="<i class='btn btn-{{ $status->color }}'></i>&nbsp;&nbsp;&nbsp;{{ $status->name }}"></option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="device_create_name">Cihaz Adı</label>
                            <input type="text" class="form-control" id="device_create_name" name="device_create_name">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="device_create_brand">Cihaz Markası</label>
                            <input type="text" class="form-control" id="device_create_brand" name="device_create_brand">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="device_create_model">Cihaz Modeli</label>
                            <input type="text" class="form-control" id="device_create_model" name="device_create_model">
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="device_create_serial_number">Cihaz Seri Numarası</label>
                            <input type="text" class="form-control" id="device_create_serial_number" name="device_create_serial_number">
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="device_create_ip_address">Cihaz IP Adresi</label>
                            <input type="text" class="form-control" id="device_create_ip_address" name="device_create_ip_address">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="create_device">Oluştur</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancelCreateDevice">Vazgeç</button>
            </div>
        </div>
    </form>
</div>
