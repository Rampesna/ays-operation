@extends('layouts.master')
@section('title', 'Yemek Listesi')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <table class="table" id="employees">
                        <thead>
                        <tr>
                            <th>Personel</th>
                            <th>Durum</th>
                            <th>Açıklama</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($foodListChecks as $foodListCheck)
                            <tr @if($foodListCheck->checked != null && $foodListCheck->checked == 1) class="printableRow" @endif>
                                <td>{{ ucwords($foodListCheck->employee->name) }}</td>
                                <td>
                                    @if($foodListCheck->checked === null)
                                            <i class="fas fa-circle text-warning"></i> Cevap Verilmedi
                                    @else
                                        @if($foodListCheck->checked == 1)
                                            <i class="far fa-check-circle text-success"></i> Yiyecek
                                        @endif
                                        @if($foodListCheck->checked == 0)
                                            <i class="far fa-times-circle text-danger"></i> Yemeyecek
                                        @endif
                                    @endif
                                </td>
                                <td><label style="width: 100%"><textarea class="form-control" rows="2" disabled>{{ $foodListCheck->description }}</textarea></label></td>
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
                }
            },

            dom: 'Bfrtipl',

            buttons: [
                {
                    extend: 'collection',
                    text: '<i class="fa fa-download"></i> Dışa Aktar',
                    buttons: [
                        {
                            extend: 'pdf',
                            text: '<i class="fa fa-file-pdf"></i> PDF İndir',
                            exportOptions: {
                                columns: [0]
                            }
                        },
                        {
                            extend: 'excel',
                            text: '<i class="fa fa-file-excel"></i> Excel İndir',
                            exportOptions: {
                                columns: [0]
                            }
                        }
                    ]
                },
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i> Yazdır',
                    exportOptions: {
                        columns: [0]
                    }
                }
            ],

            responsive: true
        });
    </script>

@stop
