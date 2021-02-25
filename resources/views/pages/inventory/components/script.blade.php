<script src="{{ asset('assets/plugins/custom/kanban/kanban.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/crud/forms/editors/summernote.js') }}"></script>

<script>
    "use strict";

    var createDeviceSelector = $("#create_device");
    var createDeviceFormSelector = $("#create_device_form");
    var createDeviceModalSelector = $("#CreateDeviceModal");

    var kanban = new jKanban({
        element: '#inventories',
        gutter: '0',
        widthBoard: '370px',
        dragBoards: false,
        click: function (el) {

        },
        dropEl: function (el, source) {

        },
        dragendBoard: function (el) {

        },
        boards: [
            @foreach($employees as $employee)
            {
                id: '{{ $employee->id }}',
                title: '{{ $employee->name }}',
                item: [
                    @foreach($employee->devices()->with(['group','status'])->get() as $device)
                    {
                        id: '{{ $device->id }}',
                        title:
                            '<div class="row" style="font-size: 11px">' +
                            '   <div class="col-xl-6">' +
                            '       <i class="{{ $device->group->icon }}"></i><span class="ml-3 cursor-pointer">{{ $device->name }}</span>' +
                            '   </div>' +
                            '   <div class="col-xl-6 text-right">' +
                            '       <span class="btn btn-pill btn-sm btn-{{ $device->status->color }}" style="font-size: 11px; height: 20px; padding-top: 2px">{{ $device->status->name }}</span>' +
                            '   </div>' +
                            '</div>'
                    },
                    @endforeach
                ]
            },
            @endforeach
        ]
    });

    createDeviceSelector.click(function () {
        var company_id = $("#company_id").val();
        var employee_id = $("#device_create_employee_id").val();
        var group_id = $("#device_create_group_id").val();
        var status_id = $("#device_create_status_id").val();
        var name = $("#device_create_name").val();
        var brand = $("#device_create_brand").val();
        var model = $("#device_create_model").val();
        var serial_number = $("#device_create_serial_number").val();
        var ip_address = $("#device_create_ip_address").val();

        if (company_id == null || company_id === '') {
            toastr.error('Bir Hata Oluştu! Sayfayı Yenilemeyi Deneyin');
        } else if (group_id == null || group_id === '') {
            toastr.warning('Grup Seçilmesi Zorunludur!');
        } else if (status_id == null || status_id === '') {
            toastr.warning('Durum Seçilmesi Zorunludur!');
        } else if (name == null || name === '') {
            toastr.warning('Cihaz Adı Girilmesi Zorunludur!');
        } else {
            $.ajax({
                type: 'post',
                url: '{{ route('ajax.inventory.device.create') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    company_id: company_id,
                    employee_id: employee_id,
                    group_id: group_id,
                    status_id: status_id,
                    name: name,
                    brand: brand,
                    model: model,
                    serial_number: serial_number,
                    ip_address: ip_address
                },
                success: function (device) {
                    createDeviceFormSelector.trigger("reset");
                    $("#device_create_employee_id").selectpicker('refresh');
                    $("#device_create_group_id").selectpicker('refresh');
                    $("#device_create_status_id").selectpicker('refresh');
                    createDeviceModalSelector.modal('hide');
                    kanban.addElement(employee_id, {
                        id: '{{ $device->id }}',
                        title:
                            '<div class="row" style="font-size: 11px">' +
                            '   <div class="col-xl-6">' +
                            '       <i class="' + device.group.icon + '"></i><span class="ml-3 cursor-pointer">' + device.name + '</span>' +
                            '   </div>' +
                            '   <div class="col-xl-6 text-right">' +
                            '       <span class="btn btn-pill btn-sm btn-' + device.status.color + '" style="font-size: 11px; height: 20px; padding-top: 2px">' + device.status.name + '</span>' +
                            '   </div>' +
                            '</div>'
                    });
                },
                error: function (error) {
                    console.log(error)
                }
            });

        }
    });
</script>
