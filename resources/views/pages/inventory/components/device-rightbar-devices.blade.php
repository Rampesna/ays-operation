<div id="kt_quick_cart" style="width: 700px" class="offcanvas offcanvas-right p-10">
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-7">
        <input type="hidden" id="selectedDeviceSelector">
    </div>
    <div class="offcanvas-content">
        <div class="offcanvas-wrapper mb-5 scroll-pull">
            <div class="row">
                <div class="col-xl-10">
                    <label for="deviceNameSelector" style="display: none"></label>
                    <input class="form-control font-weight-bold" type="text" style="border: none; background: transparent; font-size: 18px" id="deviceNameSelector">
                </div>
{{--                <div class="col-xl-2 text-right">--}}
{{--                    <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="deviceDeleteButton" data-toggle="modal" data-target="#DeleteTaskModal">--}}
{{--                        <i class="fa fa-trash text-danger"></i>--}}
{{--                    </a>--}}
{{--                </div>--}}
            </div>
            <hr>
            <div class="row mt-6">
                <div class="col-xl-3">
                    <span class="font-weight-bold">Atanan Personel: </span>
                </div>
                <div class="col-xl-9">
                    <div class="form-group">
                        <select class="selectpicker form-control" id="deviceEmployeeSelector" data-live-search="true">
                            <optgroup label="">
                                <option value="0" selected>Personel Ataması Yok</option>
                            </optgroup>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endforeach
                        </select>
                        <label for="deviceEmployeeSelector"></label>
                    </div>
                </div>
            </div>
            <div class="row mt-6">
                <div class="col-xl-3">
                    <span class="font-weight-bold">Cihaz Grubu: </span>
                </div>
                <div class="col-xl-9">
                    <div class="form-group">
                        <select class="selectpicker form-control" id="deviceGroupSelector">
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}" data-content="<i class='{{ $group->icon }}'></i>&nbsp;&nbsp;&nbsp;{{ $group->name }}"></option>
                            @endforeach
                        </select>
                        <label for="deviceGroupSelector"></label>
                    </div>
                </div>
            </div>
            <div class="row mt-6">
                <div class="col-xl-3">
                    <span class="font-weight-bold">Cihaz Durumu: </span>
                </div>
                <div class="col-xl-9">
                    <select class="selectpicker form-control" id="deviceStatusSelector">
                        @foreach($statuses as $status)
                            <option value="{{ $status->id }}" data-content="<i class='btn btn-{{ $status->color }}'></i>&nbsp;&nbsp;&nbsp;{{ $status->name }}"></option>
                        @endforeach
                    </select>
                    <label for="deviceStatusSelector"></label>
                </div>
            </div>
            <div class="row mt-6">
                <div class="col-xl-3">
                    <span class="font-weight-bold">Cihaz Markası: </span>
                </div>
                <div class="col-xl-9">
                    <input type="text" class="form-control" id="deviceBrandSelector">
                    <label for="deviceBrandSelector"></label>
                </div>
            </div>
            <div class="row mt-6">
                <div class="col-xl-3">
                    <span class="font-weight-bold">Cihaz Modeli: </span>
                </div>
                <div class="col-xl-9">
                    <input type="text" class="form-control" id="deviceModelSelector">
                    <label for="deviceModelSelector"></label>
                </div>
            </div>
            <div class="row mt-6">
                <div class="col-xl-3">
                    <span class="font-weight-bold">Cihaz Seri Numarası: </span>
                </div>
                <div class="col-xl-9">
                    <input type="text" class="form-control" id="deviceSerialSelector">
                    <label for="deviceSerialSelector"></label>
                </div>
            </div>
            <div class="row mt-6">
                <div class="col-xl-3">
                    <span class="font-weight-bold">Cihaz IP Adresi: </span>
                </div>
                <div class="col-xl-9">
                    <input type="text" class="form-control" id="deviceIpSelector">
                    <label for="deviceIpSelector"></label>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xl-12 text-right">
                    <button type="button" id="deviceUpdateButton" class="btn btn-success">Güncelle</button>
                </div>
            </div>
        </div>

        <div class="offcanvas-footer">

        </div>
    </div>
</div>
