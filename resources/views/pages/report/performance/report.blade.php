@extends('layouts.master')
@section('title', 'Performans Raporu')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <table class="table" id="employees">
                                <thead>
                                <tr>
                                    <th>Ad Soyad</th>
                                    <th>Toplam Çağrı</th>
                                    <th>Gelen Çağrı</th>
                                    <th>Giden Çağrı</th>
                                    <th>Cevapsız Çağrı</th>
                                    <th>Toplam Konuşma</th>
                                    <th>Çağrı Verimliliği</th>
                                    <th>Açılan Faaliyet</th>
                                    <th>Tamamlanan İş</th>
                                    <th>Kullanılan Mola</th>
                                    <th>Faaliyet Verimliliği</th>
                                    <th>İş Verimliliği</th>
                                    <th>Ortalama Verimlilik</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employees as $employee)
                                    <tr>
                                        <td>{{ ucwords($employee->name) }}</td>
                                        <td>{{ @$employee->callAnalyses->sum('total_success_call') }}</td>
                                        <td>{{ @$employee->callAnalyses->sum('incoming_success_call') }}</td>
                                        <td>{{ @$employee->callAnalyses->sum('outgoing_success_call') }}</td>
                                        <td>{{ @$employee->callAnalyses->sum('total_error_call') }}</td>
                                        @php(@$seconds = array_sum($employee->callAnalyses->map(function ($analysis) { return \Illuminate\Support\Carbon::createFromDate('2021-01-01 ' . $analysis->total_call_time)->diffInSeconds('2021-01-01 00:00:00'); })->all()))
                                        <td>{{ @(sprintf('%02d:%02d:%02d', ($seconds / 3600), ($seconds / 60 % 60), $seconds % 60)) }}</td>
                                        <td>{{ @$employee->callAnalyses->avg('operational_productivity_rate') ?? 0 }}%</td>
                                        <td>{{ @$employee->jobAnalyses->sum('job_activity_count') . ' / ' . @$companyJobAnalyses->sum('job_activity_count') }}</td>
                                        <td>{{ @$employee->jobAnalyses->sum('job_complete_count') . ' / ' . @$companyJobAnalyses->sum('job_complete_count') }}</td>
                                        <td>{{ @$employee->jobAnalyses->sum('used_break_duration') . ' / ' . (@$employee->jobAnalyses->count() * 100) }}</td>
                                        @if(count($employee->customPercents) > 0)
                                            <td>{{ @number_format((($employee->jobAnalyses->sum('job_activity_count') * 100 / ($companyJobAnalyses->sum('job_activity_count') / $employees->count())) + $employee->customPercents->sum('percent')) / ($employee->customPercents->count() + 1),2,'.',',') }}%</td>
                                            <td>{{ @number_format((($employee->jobAnalyses->sum('job_complete_count') * 100 / ($companyJobAnalyses->sum('job_complete_count') / $employees->count())) + $employee->customPercents->sum('percent')) / ($employee->customPercents->count() + 1),2,'.',',') }}%</td>
                                            <td>{{ @number_format((((($employee->jobAnalyses->sum('job_activity_count') * 100 / ($companyJobAnalyses->sum('job_activity_count') / $employees->count())) + $employee->customPercents->sum('percent')) / ($employee->customPercents->count() + 1)) + ((($employee->jobAnalyses->sum('job_complete_count') * 100 / ($companyJobAnalyses->sum('job_complete_count') / $employees->count())) + $employee->customPercents->sum('percent')) / ($employee->customPercents->count() + 1))) / 2,2,'.',',') }}%</td>
                                        @else
                                            <td>{{ @number_format($employee->jobAnalyses->sum('job_activity_count') * 100 / ($companyJobAnalyses->sum('job_activity_count') / $employees->count()),2,'.',',') }}%</td>
                                            <td>{{ @number_format($employee->jobAnalyses->sum('job_complete_count') * 100 / ($companyJobAnalyses->sum('job_complete_count') / $employees->count()),2,'.',',') }}%</td>
                                            <td>{{ @number_format((($employee->jobAnalyses->sum('job_activity_count') * 100 / ($companyJobAnalyses->sum('job_activity_count') / $employees->count())) + ($employee->jobAnalyses->sum('job_complete_count') * 100 / ($companyJobAnalyses->sum('job_complete_count') / $employees->count()))) / 2,2,'.',',') }}%</td>
                                        @endif
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
        var employees = $('#employees').DataTable({
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

            dom: 'Bfrtipl',

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

            responsive: true
        });
    </script>
@stop
