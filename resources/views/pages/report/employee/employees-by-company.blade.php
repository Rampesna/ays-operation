@extends('layouts.master')
@section('title', 'Personel Raporu')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <table class="table table-hover" id="employees">
                                <thead>
                                <tr>
                                    <th>Ad Soyad</th>
                                    <th>Dahili</th>
                                    <th>E-posta</th>
                                    <th>Telefon</th>
                                    <th>Kimlik Numarası</th>
                                    <th>Kuyruklar</th>
                                    <th>Yetkinlikler</th>
                                    <th>Öncelikler</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employees as $employee)
                                    <tr>
                                        <td>{{ ucwords($employee->name) }}</td>
                                        <td>{{ $employee->extension_number }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->phone_number }}</td>
                                        <td>{{ $employee->identification_number }}</td>
                                        <td><textarea class="form-control" rows="2" disabled>{{ implode(" ", $employee->queues->map(function ($queue) { return '' . $queue->name . ','; })->all()) }}</textarea></td>
                                        <td><textarea class="form-control" rows="2" disabled>{{ implode(" ", $employee->competences->map(function ($competence) { return '' . $competence->name . ','; })->all()) }}</textarea></td>
                                        <td><textarea class="form-control" rows="2" disabled>{{ implode(" ", $employee->priorities->map(function ($priority) { return '' . $priority->name . ','; })->all()) }}</textarea></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.3') }}" rel="stylesheet" type="text/css"/>

@stop

@section('page-script')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
    <script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

    <script>
        var table = $('#employees').DataTable({
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

            dom: 'Bfrtipl',

            order: [
                [
                    0, "asc"
                ]
            ],

            responsive: true
        });
    </script>
@stop
