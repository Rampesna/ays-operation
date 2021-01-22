@extends('layouts.master')
@section('title', 'Karşılaştırma Raporu')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    <div class="row">
        <div class="col-xl-12">
            <h4>{{ strftime("%d %B %Y", strtotime($request->start_date)) . ' - ' . strftime("%d %B %Y", strtotime($request->end_date)) }}</h4>
            <br>
            <div>Karşılaştırma Raporu</div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Karşılaştırma Tablosu</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin::Chart-->
                    <div id="chart_3"></div>
                    <!--end::Chart-->
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        @foreach($comparisons as $key => $comparison)
        <div class="col-xl-3">
            <div class="card card-custom gutter-b card-stretch">
                <!--begin::Header-->
                <div class="border-0 pt-5 text-center mb-n15">
                    <div class="card-title font-weight-bolder">
                        <h4 class="card-label">{{ ucwords($comparison['employee']->name) }}</h4>
                    </div>
                    <div class="card-toolbar">

                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Chart-->
                    <div id="kt_mixed_widget_{{ $key }}_chart" style="height: 250px"></div>
                    <!--end::Chart-->
                    <!--begin::Items-->
                    <div class="mt-n12 position-relative zindex-0">
                        <!--begin::Widget Item-->
                        <div class="d-flex align-items-center mb-8">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-circle symbol-40 symbol-light mr-3 flex-shrink-0">
                                <div class="symbol-label">
                                    <span class="svg-icon svg-icon-lg svg-icon-info">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M13.0799676,14.7839934 L15.2839934,12.5799676 C15.8927139,11.9712471 16.0436229,11.0413042 15.6586342,10.2713269 L15.5337539,10.0215663 C15.1487653,9.25158901 15.2996742,8.3216461 15.9083948,7.71292558 L18.6411989,4.98012149 C18.836461,4.78485934 19.1530435,4.78485934 19.3483056,4.98012149 C19.3863063,5.01812215 19.4179321,5.06200062 19.4419658,5.11006808 L20.5459415,7.31801948 C21.3904962,9.0071287 21.0594452,11.0471565 19.7240871,12.3825146 L13.7252616,18.3813401 C12.2717221,19.8348796 10.1217008,20.3424308 8.17157288,19.6923882 L5.75709327,18.8875616 C5.49512161,18.8002377 5.35354162,18.5170777 5.4408655,18.2551061 C5.46541191,18.1814669 5.50676633,18.114554 5.56165376,18.0596666 L8.21292558,15.4083948 C8.8216461,14.7996742 9.75158901,14.6487653 10.5215663,15.0337539 L10.7713269,15.1586342 C11.5413042,15.5436229 12.4712471,15.3927139 13.0799676,14.7839934 Z" fill="#000000"/>
                                                <path d="M14.1480759,6.00715131 L13.9566988,7.99797396 C12.4781389,7.8558405 11.0097207,8.36895892 9.93933983,9.43933983 C8.8724631,10.5062166 8.35911588,11.9685602 8.49664195,13.4426352 L6.50528978,13.6284215 C6.31304559,11.5678496 7.03283934,9.51741319 8.52512627,8.02512627 C10.0223249,6.52792766 12.0812426,5.80846733 14.1480759,6.00715131 Z M14.4980938,2.02230302 L14.313049,4.01372424 C11.6618299,3.76737046 9.03000738,4.69181803 7.1109127,6.6109127 C5.19447112,8.52735429 4.26985715,11.1545872 4.51274152,13.802405 L2.52110319,13.985098 C2.22450978,10.7517681 3.35562581,7.53777247 5.69669914,5.19669914 C8.04101739,2.85238089 11.2606138,1.72147333 14.4980938,2.02230302 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                            </div>
                            <!--end::Symbol-->
                            <!--begin::Title-->
                            <div>
                                <a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Toplam Çağrı - {{ $comparison['total_success_call'] }}</a>
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Widget Item-->
                        <!--begin::Widget Item-->
                        <div class="d-flex align-items-center mb-8">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-circle symbol-40 symbol-light mr-3 flex-shrink-0">
                                <div class="symbol-label">
                                    <span class="svg-icon svg-icon-lg svg-icon-success">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Chart-pie.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M9.8604543,6.01162174 C9.94073619,5.93133984 10.0459506,5.88077119 10.1587919,5.86823326 C10.4332453,5.83773844 10.6804547,6.03550595 10.7109496,6.30995936 L11.2341533,11.0187935 C11.2382309,11.0554911 11.2382309,11.0925274 11.2341533,11.129225 C11.2036585,11.4036784 10.9564491,11.6014459 10.6819957,11.5709511 L5.97316161,11.0477473 C5.86032028,11.0352094 5.75510588,10.9846407 5.67482399,10.9043588 C5.47956184,10.7090967 5.47956184,10.3925142 5.67482399,10.197252 L7.06053236,8.81154367 L5.55907018,7.31008149 C5.36380803,7.11481935 5.36380803,6.79823686 5.55907018,6.60297471 L6.26617696,5.89586793 C6.46143911,5.70060578 6.7780216,5.70060578 6.97328374,5.89586793 L8.47474592,7.39733011 L9.8604543,6.01162174 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                <path d="M12.0799676,14.7839934 L14.2839934,12.5799676 C14.8927139,11.9712471 15.0436229,11.0413042 14.6586342,10.2713269 L14.5337539,10.0215663 C14.1487653,9.25158901 14.2996742,8.3216461 14.9083948,7.71292558 L17.6411989,4.98012149 C17.836461,4.78485934 18.1530435,4.78485934 18.3483056,4.98012149 C18.3863063,5.01812215 18.4179321,5.06200062 18.4419658,5.11006808 L19.5459415,7.31801948 C20.3904962,9.0071287 20.0594452,11.0471565 18.7240871,12.3825146 L12.7252616,18.3813401 C11.2717221,19.8348796 9.12170075,20.3424308 7.17157288,19.6923882 L4.75709327,18.8875616 C4.49512161,18.8002377 4.35354162,18.5170777 4.4408655,18.2551061 C4.46541191,18.1814669 4.50676633,18.114554 4.56165376,18.0596666 L7.21292558,15.4083948 C7.8216461,14.7996742 8.75158901,14.6487653 9.52156634,15.0337539 L9.77132688,15.1586342 C10.5413042,15.5436229 11.4712471,15.3927139 12.0799676,14.7839934 Z" fill="#000000"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                            </div>
                            <!--end::Symbol-->
                            <!--begin::Title-->
                            <div>
                                <a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Toplam Gelen Çağrı - {{ $comparison['incoming_success_call'] }}</a>
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Widget Item-->
                        <!--begin::Widget Item-->
                        <div class="d-flex align-items-center">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-circle symbol-40 symbol-light mr-3 flex-shrink-0">
                                <div class="symbol-label">
                                    <span class="svg-icon svg-icon-lg svg-icon-primary">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M7.14296018,11.6653622 C7.06267828,11.7456441 6.95746388,11.7962128 6.84462255,11.8087507 C6.57016914,11.8392455 6.32295974,11.641478 6.29246492,11.3670246 L5.76926113,6.65819047 C5.76518362,6.62149288 5.76518362,6.58445654 5.76926113,6.54775895 C5.79975595,6.27330553 6.04696535,6.07553802 6.32141876,6.10603284 L11.0302529,6.62923663 C11.1430942,6.64177456 11.2483086,6.69234321 11.3285905,6.77262511 C11.5238526,6.96788726 11.5238526,7.28446974 11.3285905,7.47973189 L9.94288211,8.86544026 L11.4443443,10.3669024 C11.6396064,10.5621646 11.6396064,10.8787471 11.4443443,11.0740092 L10.7372375,11.781116 C10.5419754,11.9763782 10.2253929,11.9763782 10.0301307,11.781116 L8.52866855,10.2796538 L7.14296018,11.6653622 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                <path d="M12.0799676,14.7839934 L14.2839934,12.5799676 C14.8927139,11.9712471 15.0436229,11.0413042 14.6586342,10.2713269 L14.5337539,10.0215663 C14.1487653,9.25158901 14.2996742,8.3216461 14.9083948,7.71292558 L17.6411989,4.98012149 C17.836461,4.78485934 18.1530435,4.78485934 18.3483056,4.98012149 C18.3863063,5.01812215 18.4179321,5.06200062 18.4419658,5.11006808 L19.5459415,7.31801948 C20.3904962,9.0071287 20.0594452,11.0471565 18.7240871,12.3825146 L12.7252616,18.3813401 C11.2717221,19.8348796 9.12170075,20.3424308 7.17157288,19.6923882 L4.75709327,18.8875616 C4.49512161,18.8002377 4.35354162,18.5170777 4.4408655,18.2551061 C4.46541191,18.1814669 4.50676633,18.114554 4.56165376,18.0596666 L7.21292558,15.4083948 C7.8216461,14.7996742 8.75158901,14.6487653 9.52156634,15.0337539 L9.77132688,15.1586342 C10.5413042,15.5436229 11.4712471,15.3927139 12.0799676,14.7839934 Z" fill="#000000"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                            </div>
                            <!--end::Symbol-->
                            <!--begin::Title-->
                            <div>
                                <a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Toplam Giden Çağrı - {{ $comparison['outgoing_success_call'] }}</a>
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Widget Item-->
                    </div>
                    <!--end::Items-->
                </div>
                <!--end::Body-->
            </div>
        </div>
        @endforeach
    </div>

@endsection

@section('page-styles')


@stop

@section('page-script')
    <script>
        "use strict";

        // Class definition
        var KTWidgets = function() {

            @foreach($comparisons as $key => $comparison)
            var _initMixedWidget_{{ $key }} = function() {
                var element = document.getElementById("kt_mixed_widget_{{ $key }}_chart");
                var height = parseInt(KTUtil.css(element, 'height'));

                if (!element) {
                    return;
                }

                var options = {
                    series: [{{ round($comparison['total_success_call_rate']) }}],
                    chart: {
                        height: height,
                        type: 'radialBar',
                        offsetY: 0
                    },
                    plotOptions: {
                        radialBar: {
                            startAngle: -90,
                            endAngle: 90,

                            hollow: {
                                margin: 0,
                                size: "75%"
                            },
                            dataLabels: {
                                showOn: "always",
                                name: {
                                    show: true,
                                    fontSize: "13px",
                                    fontWeight: "700",
                                    offsetY: -5,
                                    color: KTApp.getSettings()['colors']['gray']['gray-500']
                                },
                                value: {
                                    color: KTApp.getSettings()['colors']['gray']['gray-700'],
                                    fontSize: "30px",
                                    fontWeight: "700",
                                    offsetY: -40,
                                    show: true
                                }
                            },
                            track: {
                                background: KTApp.getSettings()['colors']['theme']['light']['primary'],
                                strokeWidth: '100%'
                            }
                        }
                    },
                    colors: [KTApp.getSettings()['colors']['theme']['base']['primary']],
                    stroke: {
                        lineCap: "round",
                    },
                    labels: ["Verimlilik"]
                };

                var chart = new ApexCharts(element, options);
                chart.render();
            }
            @endforeach

            return {
                init: function() {
                    @foreach($comparisons as $key => $comparison)
                    _initMixedWidget_{{ $key }}();
                    @endforeach
                }
            }
        }();

        // Webpack support
        if (typeof module !== 'undefined') {
            module.exports = KTWidgets;
        }

        jQuery(document).ready(function() {
            KTWidgets.init();
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

            var _demo3 = function () {
                const apexChart = "#chart_3";
                var options = {
                    series: [{
                        name: 'Toplam Çağrı',
                        data: [
                            @foreach($comparisons as $comparison)
                            {{ $comparison['total_success_call'] }}{{ !$loop->last ? ',' : null }}
                            @endforeach
                        ]
                    }, {
                        name: 'Gelen Çağrı',
                        data: [
                            @foreach($comparisons as $comparison)
                            {{ $comparison['incoming_success_call'] }}{{ !$loop->last ? ',' : null }}
                            @endforeach
                        ]
                    }, {
                        name: 'Giden Çağrı',
                        data: [
                            @foreach($comparisons as $comparison)
                            {{ $comparison['outgoing_success_call'] }}{{ !$loop->last ? ',' : null }}
                            @endforeach
                        ]
                    }],
                    chart: {
                        type: 'bar',
                        height: 350
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '55%',
                            endingShape: 'rounded'
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: [
                            @foreach($comparisons as $comparison)
                            '{{ $comparison['employee']->name }}'{{ !$loop->last ? ',' : null }}
                            @endforeach
                        ],
                    },
                    yaxis: {
                        title: {
                            text: ' Çağrı'
                        }
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return val + " Çağrı"
                            }
                        }
                    },
                    colors: [primary, success, warning]
                };

                var chart = new ApexCharts(document.querySelector(apexChart), options);
                chart.render();
            }

            return {
                // public functions
                init: function () {
                    _demo3();
                }
            };
        }();

        jQuery(document).ready(function () {
            KTApexChartsDemo.init();
        });
    </script>

    <script src="{{ asset('assets/plugins/custom/flot/flot.bundle.js?v=7.0.3') }}"></script>
@stop
