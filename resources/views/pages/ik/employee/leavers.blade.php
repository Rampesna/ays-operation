@extends('layouts.master')
@section('title', 'İşten Ayrılanlar')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    <div class="row">
        <div class="card-body bg-white">
            <table class="table table-separate table-head-custom table-checkable" id="positions">
                <thead>
                <tr>
                    <th>Ad Soyad</th>
                    <th>Şirket</th>
                    <th>İş Başlangıç Tarihi</th>
                    <th>Ayrılma Tarihi</th>
                </tr>
                </thead>
                <tbody>
                @foreach(collect($leavers)->groupBy('employee_id') as $positions)
                    <tr>
                        <td>
                            <div class="font-15">
                                <strong>
                                    <a class="cursor-pointer">
                                        {{ $positions->sortByDesc('end_date')->first()->employee->name }}
                                    </a>
                                </strong>
                            </div>
                        </td>
                        <td><span>{{ $positions->sortByDesc('end_date')->first()->company->name }}</span></td>
                        <td data-sort="{{ $positions->sortBy('start_date')->first()->start_date }}">{{ date('d/m/Y', strtotime($positions->sortBy('start_date')->first()->start_date)) }}</td>
                        <td data-sort="{{ $positions->sortByDesc('end_date')->first()->end_date }}">{{ date('d/m/Y', strtotime($positions->sortByDesc('end_date')->first()->end_date)) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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
        var positions = $('#positions').DataTable({
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
                }
            },
            dom: 'Bfrtipl',

            buttons: [
                'excel', 'pdf', 'print', 'csv', 'copy'
            ],

            responsive: true,
            select: false
        });
    </script>
@stop
