@extends('layouts.master')
@section('title', 'Sınavlar')
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
                                    <th></th>
                                    <th>Sınav Adı</th>
                                    <th>Sınav Açıklaması</th>
                                    <th>Sınav Süresi</th>
                                    <th class="text-right"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($exams as $exam)
                                    <tr>
                                        <td>
                                            <div class="dropdown dropdown-inline">
                                                <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ki ki-bold-more-ver"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                    <ul class="navi navi-hover">
                                                        <li class="navi-item">
                                                            <a href="{{ route('exams.getExamEmployees', ['id' => $exam['id']]) }}"
                                                               class="navi-link cursor-pointer edit">
                                                                    <span class="navi-icon">
                                                                        <i class="fas fa-book-open"></i>
                                                                    </span>
                                                                <span class="navi-text">Sınav Okuma</span>
                                                            </a>
                                                        </li>
                                                        <li class="navi-item">
                                                            <a href="{{ route('exams.getResults', ['id' => $exam['id']]) }}"
                                                               class="navi-link cursor-pointer edit">
                                                                    <span class="navi-icon">
                                                                        <i class="fas fa-border-style"></i>
                                                                    </span>
                                                                <span class="navi-text">Sonuçlar</span>
                                                            </a>
                                                        </li>
                                                        <hr>
                                                        <li class="navi-item">
                                                            <a data-id="{{ $exam['id'] }}"
                                                               data-toggle="modal"
                                                               data-target="#EditExam"
                                                               class="navi-link cursor-pointer edit">
                                                                    <span class="navi-icon">
                                                                        <i class="fa fa-edit"></i>
                                                                    </span>
                                                                <span class="navi-text">Düzenle</span>
                                                            </a>
                                                        </li>
                                                        <li class="navi-item">
                                                            <a data-id="{{ $exam['id'] }}"
                                                               data-toggle="modal"
                                                               data-target="#DeleteExam"
                                                               class="navi-link cursor-pointer delete">
                                                                    <span class="navi-icon">
                                                                        <i class="fa fa-trash-alt text-danger"></i>
                                                                    </span>
                                                                <span class="navi-text text-danger">Sil</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                        <td><a href="{{ route('exams.questions', ['exam' => $exam['id']]) }}">{{ $exam['sinavAdi'] }}</a></td>
                                        <td><label style="width: 100%"><textarea class="form-control" rows="2" disabled>{{ $exam['sinavAciklama'] }}</textarea></label></td>
                                        <td>{{ \App\Helpers\General::getDurationBySeconds($exam['sinavSuresi']) }}</td>
                                        <td class="text-right"></td>
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
                    width: "3%",
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
