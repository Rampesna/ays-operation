@extends('layouts.master')
@section('title', 'Cihaz Raporu')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <table class="table" id="devices">
                        <thead>
                        <tr>
                            <th>Cihaz Adı</th>
                            <th>Grup</th>
                            <th>Durum</th>
                            <th>Personel</th>
                            <th>Marka</th>
                            <th>Model</th>
                            <th>Seri Numarası</th>
                            <th>IP Adresi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($devices as $device)
                            <tr>
                                <td>
                                    <a href="{{ route('inventory.devices.report.show.detail', ['id' => $device->id]) }}" target="_blank">
                                        {{ $device->name }}
                                    </a>
                                </td>
                                <td>
                                    <i class="{{ $device->group->icon }}"></i>
                                    <span class="ml-3">{{ $device->group->name }}</span>
                                </td>
                                <td>
                                    <span class="btn btn-pill btn-sm btn-{{ $device->status->color }}" style="font-size: 11px; height: 20px; padding-top: 2px">{{ $device->status->name }}</span>
                                </td>
                                <td>
                                    @if($device->employee_id)
                                        <span class="btn btn-pill btn-sm btn-info" style="font-size: 11px; height: 20px; padding-top: 2px">{{ $device->employee->name }}</span>
                                    @else
                                        <span class="btn btn-pill btn-sm btn-dark-75" style="font-size: 11px; height: 20px; padding-top: 2px">Boşta</span>
                                    @endif
                                </td>
                                <td>{{ $device->brand }}</td>
                                <td>{{ $device->model }}</td>
                                <td>{{ $device->serial_number }}</td>
                                <td>{{ $device->ip_address }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Cihaz Adı</th>
                            <th>Grup</th>
                            <th>Durum</th>
                            <th>Personel</th>
                            <th>Marka</th>
                            <th>Model</th>
                            <th>Seri Numarası</th>
                            <th>IP Adresi</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.3') }}" rel="stylesheet"
          type="text/css"/>

@stop

@section('page-script')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
    <script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

    <script>
        var table = $('#devices').DataTable({
            language: {
                info: "_TOTAL_ Kayıttan _START_ - _END_ Arasındaki Kayıtlar Gösteriliyor.",
                infoEmpty: "Gösterilecek Hiç Kayıt Yok.",
                loadingRecords: "Kayıtlar Yükleniyor.",
                zeroRecords: "Tablo Boş",
                search: "Arama:",
                infoFiltered: "(Toplam _MAX_ Kayıttan Filtrelenenler)",
                lengthMenu: "Sayfa Başı _MENU_ Kayıt Göster",
                sProcessing: "Yükleniyor...",
                paginate: {
                    first: "İlk",
                    previous: "Önceki",
                    next: "Sonraki",
                    last: "Son"
                },
                select: {
                    rows: {
                        "_": "%d kayıt seçildi",
                        "0": "",
                        "1": "1 kayıt seçildi"
                    }
                },
                buttons: {
                    print: {
                        title: 'Yazdır'
                    }
                }
            },

            initComplete: function () {
                var r = $('#devices tfoot tr');
                $('#devices thead').append(r);
                this.api().columns().every(function () {
                    var column = this;
                    var input = document.createElement('input');
                    input.className = 'form-control';
                    $(input).appendTo($(column.footer()).empty())
                        .on('change', function () {
                            column.search($(this).val(), false, false, true).draw();
                        });
                });
            },

            buttons: [
                {
                    extend: 'collection',
                    text: '<i class="fa fa-download"></i> Dışa Aktar',
                    buttons: [
                        {
                            extend: 'pdf',
                            text: '<i class="fa fa-file-pdf"></i> PDF İndir'
                        },
                        {
                            extend: 'excel',
                            text: '<i class="fa fa-file-excel"></i> Excel İndir'
                        }
                    ]
                },
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i> Yazdır'
                }
            ],

            dom: 'Brtipl',

            responsive: true
        });
    </script>
@stop
