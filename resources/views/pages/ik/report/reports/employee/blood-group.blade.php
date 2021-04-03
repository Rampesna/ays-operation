@extends('layouts.master')
@section('title', 'İnsan Kaynakları - Eğitim Durumu Raporu')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))
@php(setlocale(LC_TIME, 'Turkish'))

@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card-body bg-white">
                <table class="table" id="overtimes">
                    <thead>
                    <tr>
                        <th>Ad Soyad</th>
                        <th>Kimlik Numarası</th>
                        <th>Kan Grubu</th>
                        <th>Acil Durumlarda Aranılacak Kişi</th>
                        <th>Acil Durumlarda Aranılacak Kişi Yakınlık Derecesi</th>
                        <th>Acil Durumlarda Aranılacak Kişi Telefon Numarası</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($positions as $position)
                        <tr>
                            <td>{{ @ucwords($position->employee->name) }}</td>
                            <td>{{ @$position->employee->personalInformations->identification_number }}</td>
                            <td>
                                @if($position->employee->personalInformations)
                                    @if(!is_null($position->employee->personalInformations->blood_group_id))
                                        {{ @$position->employee->personalInformations->bloodGroup->name }}
                                    @endif
                                @endif
                            </td>
                            <td>
                                @if($position->employee->personalInformations)
                                    @if($position->employee->personalInformations->emergency_person)
                                        {{ $position->employee->personalInformations->emergency_person }}
                                    @endif
                                @endif
                            </td>
                            <td>
                                @if($position->employee->personalInformations)
                                    @if($position->employee->personalInformations->emergency_person_degree)
                                        {{ $position->employee->personalInformations->emergency_person_degree }}
                                    @endif
                                @endif
                            </td>
                            <td>
                                @if($position->employee->personalInformations)
                                    @if($position->employee->personalInformations->emergency_person_phone_number)
                                        {{ $position->employee->personalInformations->emergency_person_phone_number }}
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
        var overtimes = $('#overtimes').DataTable({
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
