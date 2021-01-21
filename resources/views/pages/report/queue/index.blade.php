@extends('layouts.master')
@section('title', 'Kuyruk Raporu')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    <div class="row mt-n10">
        <div class="col-xl-4"></div>
        <div class="col-xl-4"></div>
        <div class="col-xl-4 text-right">
            <div class="form-group">
                <label for="queue_id"></label>
                <select name="queue_id" id="queue_id" class="form-control selectpicker" data-live-search="true">
                    @foreach($queues as $queue)
                        <option @if($queue->id == $queueId) selected @endif value="{{ $queue->id }}">{{ $queue->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-4">
            <div class="row mt-7">
                <div class="col-xl-6">
                    <div class="card card-custom bg-info card-stretch gutter-b" style="height: 200px">
                        <!--begin::Body-->
                        <div class="card-body cursor-pointer">
                            <span class="svg-icon svg-icon-3x svg-icon-white">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M9.8604543,6.01162174 C9.94073619,5.93133984 10.0459506,5.88077119 10.1587919,5.86823326 C10.4332453,5.83773844 10.6804547,6.03550595 10.7109496,6.30995936 L11.2341533,11.0187935 C11.2382309,11.0554911 11.2382309,11.0925274 11.2341533,11.129225 C11.2036585,11.4036784 10.9564491,11.6014459 10.6819957,11.5709511 L5.97316161,11.0477473 C5.86032028,11.0352094 5.75510588,10.9846407 5.67482399,10.9043588 C5.47956184,10.7090967 5.47956184,10.3925142 5.67482399,10.197252 L7.06053236,8.81154367 L5.55907018,7.31008149 C5.36380803,7.11481935 5.36380803,6.79823686 5.55907018,6.60297471 L6.26617696,5.89586793 C6.46143911,5.70060578 6.7780216,5.70060578 6.97328374,5.89586793 L8.47474592,7.39733011 L9.8604543,6.01162174 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        <path d="M12.0799676,14.7839934 L14.2839934,12.5799676 C14.8927139,11.9712471 15.0436229,11.0413042 14.6586342,10.2713269 L14.5337539,10.0215663 C14.1487653,9.25158901 14.2996742,8.3216461 14.9083948,7.71292558 L17.6411989,4.98012149 C17.836461,4.78485934 18.1530435,4.78485934 18.3483056,4.98012149 C18.3863063,5.01812215 18.4179321,5.06200062 18.4419658,5.11006808 L19.5459415,7.31801948 C20.3904962,9.0071287 20.0594452,11.0471565 18.7240871,12.3825146 L12.7252616,18.3813401 C11.2717221,19.8348796 9.12170075,20.3424308 7.17157288,19.6923882 L4.75709327,18.8875616 C4.49512161,18.8002377 4.35354162,18.5170777 4.4408655,18.2551061 C4.46541191,18.1814669 4.50676633,18.114554 4.56165376,18.0596666 L7.21292558,15.4083948 C7.8216461,14.7996742 8.75158901,14.6487653 9.52156634,15.0337539 L9.77132688,15.1586342 C10.5413042,15.5436229 11.4712471,15.3927139 12.0799676,14.7839934 Z" fill="#000000"/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="card-title font-weight-bolder text-white mb-0 mt-6 d-block" style="font-size: 24px">{{ $queueAnalyses->sum('total_incoming_call') }}</span>
                            <span class="font-weight-bold text-white"  style="font-size: 20px">Toplam Gelen Çağrı</span>
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card card-custom bg-success card-stretch gutter-b" style="height: 200px">
                        <!--begin::Body-->
                        <div class="card-body cursor-pointer">
                            <span class="svg-icon svg-icon-3x svg-icon-white">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M7.14296018,11.6653622 C7.06267828,11.7456441 6.95746388,11.7962128 6.84462255,11.8087507 C6.57016914,11.8392455 6.32295974,11.641478 6.29246492,11.3670246 L5.76926113,6.65819047 C5.76518362,6.62149288 5.76518362,6.58445654 5.76926113,6.54775895 C5.79975595,6.27330553 6.04696535,6.07553802 6.32141876,6.10603284 L11.0302529,6.62923663 C11.1430942,6.64177456 11.2483086,6.69234321 11.3285905,6.77262511 C11.5238526,6.96788726 11.5238526,7.28446974 11.3285905,7.47973189 L9.94288211,8.86544026 L11.4443443,10.3669024 C11.6396064,10.5621646 11.6396064,10.8787471 11.4443443,11.0740092 L10.7372375,11.781116 C10.5419754,11.9763782 10.2253929,11.9763782 10.0301307,11.781116 L8.52866855,10.2796538 L7.14296018,11.6653622 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        <path d="M12.0799676,14.7839934 L14.2839934,12.5799676 C14.8927139,11.9712471 15.0436229,11.0413042 14.6586342,10.2713269 L14.5337539,10.0215663 C14.1487653,9.25158901 14.2996742,8.3216461 14.9083948,7.71292558 L17.6411989,4.98012149 C17.836461,4.78485934 18.1530435,4.78485934 18.3483056,4.98012149 C18.3863063,5.01812215 18.4179321,5.06200062 18.4419658,5.11006808 L19.5459415,7.31801948 C20.3904962,9.0071287 20.0594452,11.0471565 18.7240871,12.3825146 L12.7252616,18.3813401 C11.2717221,19.8348796 9.12170075,20.3424308 7.17157288,19.6923882 L4.75709327,18.8875616 C4.49512161,18.8002377 4.35354162,18.5170777 4.4408655,18.2551061 C4.46541191,18.1814669 4.50676633,18.114554 4.56165376,18.0596666 L7.21292558,15.4083948 C7.8216461,14.7996742 8.75158901,14.6487653 9.52156634,15.0337539 L9.77132688,15.1586342 C10.5413042,15.5436229 11.4712471,15.3927139 12.0799676,14.7839934 Z" fill="#000000"/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="card-title font-weight-bolder text-white mb-0 mt-6 d-block" style="font-size: 24px">{{ $queueAnalyses->sum('total_outgoing_call') }}</span>
                            <span class="font-weight-bold text-white"  style="font-size: 20px">Toplam Giden Çağrı</span>
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card card-custom bg-dark-75 card-stretch gutter-b" style="height: 200px">
                        <!--begin::Body-->
                        <div class="card-body cursor-pointer">
                            <span class="svg-icon svg-icon-3x svg-icon-white">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M16.0322024,5.68722152 L5.75790403,15.945742 C5.12139076,16.5812778 5.12059836,17.6124773 5.75613416,18.2489906 C5.75642891,18.2492858 5.75672377,18.2495809 5.75701875,18.2498759 L5.75701875,18.2498759 C6.39304347,18.8859006 7.42424328,18.8859006 8.060268,18.2498759 C8.06056298,18.2495809 8.06085784,18.2492858 8.0611526,18.2489906 L18.3196731,7.9746922 C18.9505124,7.34288268 18.9501191,6.31942463 18.3187946,5.68810005 L18.3187946,5.68810005 C17.68747,5.05677547 16.6640119,5.05638225 16.0322024,5.68722152 Z" fill="#000000" fill-rule="nonzero"/>
                                        <path d="M9.85714286,6.92857143 C9.85714286,8.54730513 8.5469533,9.85714286 6.93006028,9.85714286 C5.31316726,9.85714286 4,8.54730513 4,6.92857143 C4,5.30983773 5.31316726,4 6.93006028,4 C8.5469533,4 9.85714286,5.30983773 9.85714286,6.92857143 Z M20,17.0714286 C20,18.6901623 18.6898104,20 17.0729174,20 C15.4560244,20 14.1428571,18.6901623 14.1428571,17.0714286 C14.1428571,15.4497247 15.4560244,14.1428571 17.0729174,14.1428571 C18.6898104,14.1428571 20,15.4497247 20,17.0714286 Z" fill="#000000" opacity="0.3"/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="card-title font-weight-bolder text-white mb-0 mt-6 d-block" style="font-size: 24px">{{ number_format(0, 2, '.', '') }}</span>
                            <span class="font-weight-bold text-white"  style="font-size: 20px">Gelen Çağrı Şirket Yüzdesi</span>
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card card-custom bg-dark-75 card-stretch gutter-b" style="height: 200px">
                        <!--begin::Body-->
                        <div class="card-body cursor-pointer">
                            <span class="svg-icon svg-icon-3x svg-icon-white">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M16.0322024,5.68722152 L5.75790403,15.945742 C5.12139076,16.5812778 5.12059836,17.6124773 5.75613416,18.2489906 C5.75642891,18.2492858 5.75672377,18.2495809 5.75701875,18.2498759 L5.75701875,18.2498759 C6.39304347,18.8859006 7.42424328,18.8859006 8.060268,18.2498759 C8.06056298,18.2495809 8.06085784,18.2492858 8.0611526,18.2489906 L18.3196731,7.9746922 C18.9505124,7.34288268 18.9501191,6.31942463 18.3187946,5.68810005 L18.3187946,5.68810005 C17.68747,5.05677547 16.6640119,5.05638225 16.0322024,5.68722152 Z" fill="#000000" fill-rule="nonzero"/>
                                        <path d="M9.85714286,6.92857143 C9.85714286,8.54730513 8.5469533,9.85714286 6.93006028,9.85714286 C5.31316726,9.85714286 4,8.54730513 4,6.92857143 C4,5.30983773 5.31316726,4 6.93006028,4 C8.5469533,4 9.85714286,5.30983773 9.85714286,6.92857143 Z M20,17.0714286 C20,18.6901623 18.6898104,20 17.0729174,20 C15.4560244,20 14.1428571,18.6901623 14.1428571,17.0714286 C14.1428571,15.4497247 15.4560244,14.1428571 17.0729174,14.1428571 C18.6898104,14.1428571 20,15.4497247 20,17.0714286 Z" fill="#000000" opacity="0.3"/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="card-title font-weight-bolder text-white mb-0 mt-6 d-block" style="font-size: 24px">{{ number_format($queueAnalyses->sum('total_outgoing_in_of_company_call') * 100 / $queueAnalyses->sum('total_outgoing_call'), 2, '.', '') }}</span>
                            <span class="font-weight-bold text-white"  style="font-size: 20px">Giden Çağrı Şirket Yüzdesi</span>
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Çağrı Analizi</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin::Chart-->
                    <div id="chart_2"></div>
                    <!--end::Chart-->
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Yıl Bazlı Haftalık Yoğunluk Raporu</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin::Chart-->
                    <div id="chart_10"></div>
                    <!--end::Chart-->
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')

@stop

@section('page-script')
    <script>
        $("#queue_id").change(function () {
            window.location.replace("{{ route('report.queue-call-report') }}/" + $(this).val());
        });
    </script>
    <script>
        "use strict";

        // Shared Colors Definition
        const primary = '#6993FF';
        const success = '#1BC5BD';
        const info = '#8950FC';
        const warning = '#FFA800';
        const danger = '#F64E60';

        // Class definition
        function generateBubbleData(baseval, count, yrange) {
            var i = 0;
            var series = [];
            while (i < count) {
                var x = Math.floor(Math.random() * (750 - 1 + 1)) + 1;;
                var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
                var z = Math.floor(Math.random() * (75 - 15 + 1)) + 15;

                series.push([x, y, z]);
                baseval += 86400000;
                i++;
            }
            return series;
        }

        function generateData(count, yrange) {
            var i = 0;
            var series = [];
            while (i < count) {
                var x = 'w' + (i + 1).toString();
                var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

                series.push({
                    x: x,
                    y: y
                });
                i++;
            }
            return series;
        }

        var KTApexChartsDemo = function () {

            var _demo2 = function () {
                const apexChart = "#chart_2";
                var options = {
                    series: [
                        {
                            name: 'Toplam Gelen Çağrı',
                            data: [
                                @foreach($queueAnalyses as $queueAnalysis)
                                {{ $queueAnalysis->total_incoming_call ?? 0 }}{{ !$loop->last ? ',' : null }}
                                @endforeach
                            ]
                        }, {
                            name: 'Toplam Giden Çağrı',
                            data: [
                                @foreach($queueAnalyses as $queueAnalysis)
                                {{ $queueAnalysis->total_outgoing_call ?? 0 }}{{ !$loop->last ? ',' : null }}
                                @endforeach
                            ]
                        }
                    ],
                    chart: {
                        height: 350,
                        type: 'area'
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth'
                    },
                    xaxis: {
                        type: 'datetime',
                        categories: [
                            @foreach($queueAnalyses as $queueAnalysis)
                            '{{ $queueAnalysis->date }}'{{ !$loop->last ? ',' : null }}
                            @endforeach
                        ]
                    },
                    tooltip: {
                        x: {
                            format: 'yy-MM-dd'
                        },
                    },
                    colors: [primary, success]
                };

                var chart = new ApexCharts(document.querySelector(apexChart), options);
                chart.render();
            }

            var _demo10 = function () {
                const apexChart = "#chart_10";
                var options = {
                    series: [
                        @for($month = 12 ; $month >= 1 ; $month--)
                            {
                                name: '{{ strftime("%B", strtotime(date('Y-') . $month)) }}',
                                data: [
                                    @for($day = 1 ; $day <= 31 ; $day++)
                                    {
                                        x: '{{ $day }}',
                                        y: {{ $yearlyAnalyses->where('month_of_year', $month)->where('day_of_month', $day)->first()->total_call ?? 0 }}
                                    }{{ $day != 31 ? ',' : null }}
                                    @endfor
                                ]
                            }{{ $day != 1 ? ',' : null }}
                        @endfor
                    ],
                    chart: {
                        height: 350,
                        type: 'heatmap',
                    },
                    plotOptions: {
                        heatmap: {
                            shadeIntensity: 0.5,

                            colorScale: {
                                ranges: [
                                    {
                                        from: 0,
                                        to: 100,
                                        name: 'Düşük',
                                        color: success
                                    },
                                    {
                                        from: 101,
                                        to: 250,
                                        name: 'Orta',
                                        color: primary
                                    },
                                    {
                                        from: 251,
                                        to: 1000,
                                        name: 'Yüksek',
                                        color: warning
                                    },
                                    {
                                        from: 1001,
                                        to: 5000,
                                        name: 'Riskli',
                                        color: info
                                    },
                                    {
                                        from: 5001,
                                        to: 10000,
                                        name: 'Maksimum',
                                        color: danger
                                    }
                                ]
                            }
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                };

                var chart = new ApexCharts(document.querySelector(apexChart), options);
                chart.render();
            }

            return {
                // public functions
                init: function () {
                    _demo2();
                    _demo10();
                }
            };
        }();

        jQuery(document).ready(function () {
            KTApexChartsDemo.init();
        });

    </script>
@stop
