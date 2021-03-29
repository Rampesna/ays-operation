@extends('layouts.master')
@section('title', 'Sınav Sonuçları')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <table class="table" id="list">
                                <thead>
                                <tr>
                                    <th>Personel</th>
                                    <th>Sınav Sonucu</th>
                                    <th>Durum</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($results as $result)
                                    <tr>
                                        <td>{{ $result['kullaniciAdSoyad'] }}</td>
                                        <td>{{ $result['puan'] }}</td>
                                        <td>
                                            @if($result['puan'] >= 70)
                                                <i class="fa fa-check-circle text-success"></i><span class="text-success"> Başarılı</span>
                                            @else
                                                <i class="fa fa-times-circle text-danger"></i><span class="text-danger"> Başarısız</span>
                                            @endif
                                        </td>
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
        let table = $('#list').DataTable({
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

            columnDefs: [
                {
                    width: "80%",
                    targets: 0
                }
            ],

            buttons: [
                'excel', 'pdf', 'print', 'csv', 'copy'
            ],

            responsive: true,
            select: false
        });
    </script>

@stop
