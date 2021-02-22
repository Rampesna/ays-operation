@extends('layouts.master')
@section('title', 'Proje Hareketleri')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    @include('pages.project.project.show.components.subheader')

    <div class="row mt-15">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <table class="table" id="timesheets">
                        <thead>
                        <tr>
                            <th>İşlemi Yapan</th>
                            <th>Görev</th>
                            <th>Başlangıç Zamanı</th>
                            <th>Bitiş Zamanı</th>
                            <th>Toplam Süre</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($project->timesheets()->orderBy('created_at')->get() as $timesheet)
                            <tr>
                                <td><a href="{{ route('project.project.timeline', ['project' => $project, 'timesheetId' => $timesheet->id]) }}">{{ @$timesheet->starter->name }}</a></td>
                                <td>{{ $timesheet->task->name }}</td>
                                <td>{{ $timesheet->start_time }}</td>
                                <td>{{ $timesheet->end_time }}</td>
                                <td>{{ \App\Helpers\General::getDurationByMinutes(\Illuminate\Support\Carbon::createFromDate($timesheet->start_time)->diffInMinutes($timesheet->end_time)) }}</td>
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
        var table = $('#timesheets').DataTable({
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

            dom: 'frtipl',

            order: [
                [
                    2,
                    "desc"
                ]
            ],

            responsive: true
        });
    </script>
@stop
