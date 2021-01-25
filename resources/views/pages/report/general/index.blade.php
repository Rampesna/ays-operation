@extends('layouts.master')
@section('title', 'Genel İş Raporu')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    <form action="{{ route('report.general.by-date') }}" method="post" class="row">
        @csrf
        <div class="col-xl-6">
            <br>
            {{ strftime("%d %B %Y", strtotime($startDate)) . ' - ' . strftime("%d %B %Y", strtotime($endDate)) }}, Aralığındaki İstatistikler Gösteriliyor.
        </div>
        <div class="col-xl-2">
            <div class="form-group">
                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $startDate }}" required>
            </div>
        </div>
        <div class="col-xl-2">
            <div class="form-group">
                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $endDate }}" required>
            </div>
        </div>
        <div class="col-xl-2">
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Sorgula</button>
            </div>
        </div>
    </form>
    <hr>
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-2">
                    <div class="card card-custom bg-primary card-stretch gutter-b" style="height: 200px">
                        <!--begin::Body-->
                        <div class="card-body cursor-pointer">
                            <span class="svg-icon svg-icon-3x svg-icon-white">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M13.0799676,14.7839934 L15.2839934,12.5799676 C15.8927139,11.9712471 16.0436229,11.0413042 15.6586342,10.2713269 L15.5337539,10.0215663 C15.1487653,9.25158901 15.2996742,8.3216461 15.9083948,7.71292558 L18.6411989,4.98012149 C18.836461,4.78485934 19.1530435,4.78485934 19.3483056,4.98012149 C19.3863063,5.01812215 19.4179321,5.06200062 19.4419658,5.11006808 L20.5459415,7.31801948 C21.3904962,9.0071287 21.0594452,11.0471565 19.7240871,12.3825146 L13.7252616,18.3813401 C12.2717221,19.8348796 10.1217008,20.3424308 8.17157288,19.6923882 L5.75709327,18.8875616 C5.49512161,18.8002377 5.35354162,18.5170777 5.4408655,18.2551061 C5.46541191,18.1814669 5.50676633,18.114554 5.56165376,18.0596666 L8.21292558,15.4083948 C8.8216461,14.7996742 9.75158901,14.6487653 10.5215663,15.0337539 L10.7713269,15.1586342 C11.5413042,15.5436229 12.4712471,15.3927139 13.0799676,14.7839934 Z" fill="#000000"/>
                                        <path d="M14.1480759,6.00715131 L13.9566988,7.99797396 C12.4781389,7.8558405 11.0097207,8.36895892 9.93933983,9.43933983 C8.8724631,10.5062166 8.35911588,11.9685602 8.49664195,13.4426352 L6.50528978,13.6284215 C6.31304559,11.5678496 7.03283934,9.51741319 8.52512627,8.02512627 C10.0223249,6.52792766 12.0812426,5.80846733 14.1480759,6.00715131 Z M14.4980938,2.02230302 L14.313049,4.01372424 C11.6618299,3.76737046 9.03000738,4.69181803 7.1109127,6.6109127 C5.19447112,8.52735429 4.26985715,11.1545872 4.51274152,13.802405 L2.52110319,13.985098 C2.22450978,10.7517681 3.35562581,7.53777247 5.69669914,5.19669914 C8.04101739,2.85238089 11.2606138,1.72147333 14.4980938,2.02230302 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="card-title font-weight-bolder text-white mb-0 mt-6 d-block" style="font-size: 24px">{{ $analyses['callAnalyses']->sum('total_success_call') }}</span>
                            <span class="font-weight-bold text-white"  style="font-size: 20px">Toplam Çağrı</span>
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
                <div class="col-xl-2">
                    <div class="card card-custom bg-success card-stretch gutter-b" style="height: 200px">
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
                            <span class="card-title font-weight-bolder text-white mb-0 mt-6 d-block" style="font-size: 24px">{{ $analyses['callAnalyses']->sum('incoming_success_call') }}</span>
                            <span class="font-weight-bold text-white"  style="font-size: 20px">Gelen Çağrı</span>
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
                <div class="col-xl-2">
                    <div class="card card-custom bg-info card-stretch gutter-b" style="height: 200px">
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
                            <span class="card-title font-weight-bolder text-white mb-0 mt-6 d-block" style="font-size: 24px">{{ $analyses['callAnalyses']->sum('outgoing_success_call') }}</span>
                            <span class="font-weight-bold text-white"  style="font-size: 20px">Giden Çağrı</span>
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
                <div class="col-xl-2">
                    <div class="card card-custom bg-warning card-stretch gutter-b" style="height: 200px">
                        <!--begin::Body-->
                        <div class="card-body cursor-pointer">
                            <span class="svg-icon svg-icon-3x svg-icon-white">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M12,21 C7.581722,21 4,17.418278 4,13 C4,8.581722 7.581722,5 12,5 C16.418278,5 20,8.581722 20,13 C20,17.418278 16.418278,21 12,21 Z" fill="#000000" opacity="0.3"/>
                                        <path d="M13,5.06189375 C12.6724058,5.02104333 12.3386603,5 12,5 C11.6613397,5 11.3275942,5.02104333 11,5.06189375 L11,4 L10,4 C9.44771525,4 9,3.55228475 9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 C15,3.55228475 14.5522847,4 14,4 L13,4 L13,5.06189375 Z" fill="#000000"/>
                                        <path d="M16.7099142,6.53272645 L17.5355339,5.70710678 C17.9260582,5.31658249 18.5592232,5.31658249 18.9497475,5.70710678 C19.3402718,6.09763107 19.3402718,6.73079605 18.9497475,7.12132034 L18.1671361,7.90393167 C17.7407802,7.38854954 17.251061,6.92750259 16.7099142,6.53272645 Z" fill="#000000"/>
                                        <path d="M11.9630156,7.5 L12.0369844,7.5 C12.2982526,7.5 12.5154733,7.70115317 12.5355117,7.96165175 L12.9585886,13.4616518 C12.9797677,13.7369807 12.7737386,13.9773481 12.4984096,13.9985272 C12.4856504,13.9995087 12.4728582,14 12.4600614,14 L11.5399386,14 C11.2637963,14 11.0399386,13.7761424 11.0399386,13.5 C11.0399386,13.4872031 11.0404299,13.4744109 11.0414114,13.4616518 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z" fill="#000000"/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            @php(@$seconds = array_sum($analyses['callAnalyses']->map(function ($analysis) { return \Illuminate\Support\Carbon::createFromDate('2021-01-01 ' . $analysis->total_call_time)->diffInSeconds('2021-01-01 00:00:00'); })->all()))
                            <span class="card-title font-weight-bolder text-white mb-0 mt-6 d-block" style="font-size: 24px">{{ @(sprintf('%02d:%02d:%02d', ($seconds / 3600), ($seconds / 60 % 60), $seconds % 60)) }}</span>
                            <span class="font-weight-bold text-white"  style="font-size: 20px">Konuşma Süresi</span>
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
                <div class="col-xl-2">
                    <div class="card card-custom bg-danger card-stretch gutter-b" style="height: 200px">
                        <!--begin::Body-->
                        <div class="card-body cursor-pointer">
                            <span class="svg-icon svg-icon-3x svg-icon-white">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="card-title font-weight-bolder text-white mb-0 mt-6 d-block" style="font-size: 24px">{{ $analyses['jobAnalyses']->sum('job_activity_count') }}</span>
                            <span class="font-weight-bold text-white"  style="font-size: 20px">Faaliyet Sayısı</span>
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
                <div class="col-xl-2">
                    <div class="card card-custom bg-dark-75 card-stretch gutter-b" style="height: 200px">
                        <!--begin::Body-->
                        <div class="card-body cursor-pointer">
                            <span class="svg-icon svg-icon-3x svg-icon-white">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M3.5,3 L5,3 L5,19.5 C5,20.3284271 4.32842712,21 3.5,21 L3.5,21 C2.67157288,21 2,20.3284271 2,19.5 L2,4.5 C2,3.67157288 2.67157288,3 3.5,3 Z" fill="#000000"/>
                                        <path d="M6.99987583,2.99995344 L19.754647,2.99999303 C20.3069317,2.99999474 20.7546456,3.44771138 20.7546439,3.99999613 C20.7546431,4.24703684 20.6631995,4.48533385 20.497938,4.66895776 L17.5,8 L20.4979317,11.3310353 C20.8673908,11.7415453 20.8341123,12.3738351 20.4236023,12.7432941 C20.2399776,12.9085564 20.0016794,13 19.7546376,13 L6.99987583,13 L6.99987583,2.99995344 Z" fill="#000000" opacity="0.3"/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="card-title font-weight-bolder text-white mb-0 mt-6 d-block" style="font-size: 24px">{{ $analyses['jobAnalyses']->sum('job_complete_count') }}</span>
                            <span class="font-weight-bold text-white"  style="font-size: 20px">Tamamlanan İş</span>
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-6">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Çağrı Analizi Grafiği</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin::Chart-->
                    <div id="chart_2"></div>
                    <!--end::Chart-->
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">İş Analizi Grafiği</h3>
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
        <div class="col-xl-12">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Yıl Bazlı Günlük Toplam Çağrı Yoğunluk Raporu</h3>
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
    <div class="row">
        <div class="col-xl-6">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Yıl Bazlı Günlük Faaliyet Yoğunluk Raporu</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin::Chart-->
                    <div id="chart_11"></div>
                    <!--end::Chart-->
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Yıl Bazlı Günlük İş Yoğunluk Raporu</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin::Chart-->
                    <div id="chart_12"></div>
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
                            name: 'Gelen Çağrı',
                            data: [
                                @foreach($analyses['callAnalyses']->sortBy('date')->groupBy('date')->all() as $date)
                                {{ $date->sum('incoming_success_call') }}{{ !$loop->last ? ',' : null }}
                                @endforeach
                            ]
                        },
                        {
                            name: 'Giden Çağrı',
                            data: [
                                @foreach($analyses['callAnalyses']->sortBy('date')->groupBy('date')->all() as $date)
                                {{ $date->sum('outgoing_success_call') }}{{ !$loop->last ? ',' : null }}
                                @endforeach
                            ]
                        },
                        {
                            name: 'Toplam Çağrı',
                            data: [
                                @foreach($analyses['callAnalyses']->sortBy('date')->groupBy('date')->all() as $date)
                                {{ $date->sum('total_success_call') }}{{ !$loop->last ? ',' : null }}
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
                            @foreach($analyses['callAnalyses']->sortBy('date')->groupBy('date')->all() as $date => $data)
                                '{{ $date }}'{{ !$loop->last ? ',' : null }}
                            @endforeach
                        ]
                    },
                    tooltip: {
                        x: {
                            format: 'yy-MM-dd'
                        },
                    },
                    colors: [primary, success, warning]
                };

                var chart = new ApexCharts(document.querySelector(apexChart), options);
                chart.render();
            }

            var _demo3 = function () {
                const apexChart = "#chart_3";
                var options = {
                    series: [
                        {
                            name: 'Faaliyet Sayısı',
                            data: [
                                @foreach($analyses['jobAnalyses']->sortBy('date')->groupBy('date')->all() as $date)
                                {{ $date->sum('job_activity_count') }}{{ !$loop->last ? ',' : null }}
                                @endforeach
                            ]
                        },
                        {
                            name: 'Tamamlanan İş',
                            data: [
                                @foreach($analyses['jobAnalyses']->sortBy('date')->groupBy('date')->all() as $date)
                                {{ $date->sum('job_complete_count') }}{{ !$loop->last ? ',' : null }}
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
                            @foreach($analyses['jobAnalyses']->sortBy('date')->groupBy('date')->all() as $date => $data)
                                '{{ $date }}'{{ !$loop->last ? ',' : null }}
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
                                    y: {{ $analyses['yearlyCallAnalyses']->where('month_of_year', $month)->where('day_of_month', $day)->first()->total_call ?? 0 }}
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

            var _demo11 = function () {
                const apexChart = "#chart_11";
                var options = {
                    series: [
                            @for($month = 12 ; $month >= 1 ; $month--)
                        {
                            name: '{{ strftime("%B", strtotime(date('Y-') . $month)) }}',
                            data: [
                                    @for($day = 1 ; $day <= 31 ; $day++)
                                {
                                    x: '{{ $day }}',
                                    y: {{ $analyses['yearlyJobActivityAnalyses']->where('month_of_year', $month)->where('day_of_month', $day)->first()->total_job_activity ?? 0 }}
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

            var _demo12 = function () {
                const apexChart = "#chart_12";
                var options = {
                    series: [
                            @for($month = 12 ; $month >= 1 ; $month--)
                        {
                            name: '{{ strftime("%B", strtotime(date('Y-') . $month)) }}',
                            data: [
                                    @for($day = 1 ; $day <= 31 ; $day++)
                                {
                                    x: '{{ $day }}',
                                    y: {{ $analyses['yearlyJobCompleteAnalyses']->where('month_of_year', $month)->where('day_of_month', $day)->first()->total_job_complete ?? 0 }}
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
                    _demo3();
                    _demo10();
                    _demo11();
                    _demo12();
                }
            };
        }();

        jQuery(document).ready(function () {
            KTApexChartsDemo.init();
        });

    </script>

@stop
