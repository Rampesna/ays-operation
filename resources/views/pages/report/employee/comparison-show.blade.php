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
                                                <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) "/>
                                                <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                            </div>
                            <!--end::Symbol-->
                            <!--begin::Title-->
                            <div>
                                <a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Toplam Faaliyet Sayısı - {{ $comparison['job_activity_count'] }}</a>
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
                                                <path d="M3.5,3 L5,3 L5,19.5 C5,20.3284271 4.32842712,21 3.5,21 L3.5,21 C2.67157288,21 2,20.3284271 2,19.5 L2,4.5 C2,3.67157288 2.67157288,3 3.5,3 Z" fill="#000000"/>
                                                <path d="M6.99987583,2.99995344 L19.754647,2.99999303 C20.3069317,2.99999474 20.7546456,3.44771138 20.7546439,3.99999613 C20.7546431,4.24703684 20.6631995,4.48533385 20.497938,4.66895776 L17.5,8 L20.4979317,11.3310353 C20.8673908,11.7415453 20.8341123,12.3738351 20.4236023,12.7432941 C20.2399776,12.9085564 20.0016794,13 19.7546376,13 L6.99987583,13 L6.99987583,2.99995344 Z" fill="#000000" opacity="0.3"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                            </div>
                            <!--end::Symbol-->
                            <!--begin::Title-->
                            <div>
                                <a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Tamamlanan İş Sayısı - {{ $comparison['job_complete_count'] }}</a>
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
                    series: [{{ number_format($comparison['total_rate'],2,'.',',') }}],
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
                    series: [
                        {
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
                        }, {
                            name: 'Faaliyet',
                            data: [
                                @foreach($comparisons as $comparison)
                                {{ $comparison['job_activity_count'] }}{{ !$loop->last ? ',' : null }}
                                @endforeach
                            ]
                        }, {
                            name: 'Tamamlanan İş',
                            data: [
                                @foreach($comparisons as $comparison)
                                {{ $comparison['job_complete_count'] }}{{ !$loop->last ? ',' : null }}
                                @endforeach
                            ]
                        }
                    ],
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
                                return val
                            }
                        }
                    },
                    colors: [primary, success, warning, info, danger]
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
