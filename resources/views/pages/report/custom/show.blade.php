@extends('layouts.master')
@section('title', 'Özel Rapor')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <table class="table" id="report">
                        <thead>
                        <tr>
                            @foreach($response as $data)
                                @foreach(array_keys($data) as $key)
                                    <th>{{ $key }}</th>
                                @endforeach
                                @if($loop->first) @break @endif
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($response as $data)
                            <tr>
                                @foreach(array_keys($data) as $key)
                                    <td>{{ $data[$key] }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
        var report = $('#report').DataTable({
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

            responsive: true
        });
    </script>
@stop
