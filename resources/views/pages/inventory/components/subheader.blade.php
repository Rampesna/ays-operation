<div class="subheader subheader-solid" id="kt_subheader">
    <div class="container-fluid align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="row">
            <div class="col-xl-10">
                @if(Request::segment(1) === 'inventory' && Request::segment(2) === 'index')
                    <a href="{{ route('inventory.devices') }}" class="btn btn-sm btn-primary mt-n2 mb-n2">
                        <i class="fas fa-hdd fa-sm text-white"></i> &nbsp;&nbsp; Cihaz Listesi
                    </a>
                @else
                    <a href="{{ route('inventory.index') }}" class="btn btn-sm btn-primary mt-n2 mb-n2">
                        <i class="fa fa-user fa-sm text-white"></i> &nbsp;&nbsp; Personel Listesi
                    </a>
                    <a href="{{ route('inventory.devices.report') }}" class="btn btn-sm btn-dark-75 mt-n2 mb-n2">
                        <i class="fas fa-clipboard fa-sm text-white"></i> &nbsp;&nbsp; Rapor Oluştur
                    </a>
                @endif
{{--                <ul class="nav nav-tabs nav-tabs-line mb-n4">--}}
{{--                    --}}
{{--                </ul>--}}
            </div>
            <div class="col-xl-2 text-right">
                <button type="button" class="btn btn-sm btn-success mt-n2 mb-n2" data-toggle="modal" data-target="#CreateDeviceModal">
                    <i class="fas fa-plus fa-sm text-white"></i> &nbsp;&nbsp; Yeni Cihaz Oluştur
                </button>
            </div>
        </div>
    </div>
</div>
