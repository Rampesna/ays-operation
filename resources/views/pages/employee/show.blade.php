@extends('layouts.master')
@section('title', ucwords($employee->name) . ' İstatistik')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    <form action="{{ route('employee.show.post') }}" method="post" class="row">
        @csrf
        <input type="hidden" name="employee_id" value="{{ $employee->id }}">
        <div class="col-xl-6">
            <h2>{{ ucwords($employee->name) }}</h2>
            <br>
            {{ !isset($request) ? strftime('%d %B %Y', strtotime(date('Y-m-01'))) . ' - ' . strftime('%d %B %Y', strtotime(date('Y-m-d'))) : strftime('%d %B %Y', strtotime($request->start_date)) . ' - ' . strftime('%d %B %Y', strtotime($request->end_date)) }} Aralığındaki İstatistikler Gösteriliyor.
        </div>
        <div class="col-xl-2">
            <div class="form-group">
                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ isset($request) ? $request->start_date : date('Y-m-01') }}" required>
            </div>
        </div>
        <div class="col-xl-2">
            <div class="form-group">
                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ isset($request) ? $request->end_date : date('Y-m-d') }}" required>
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
        <div class="col-xl-6">
            <div class="row">
                <div class="col-xl-4">
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
                            <span class="card-title font-weight-bolder text-white mb-0 mt-6 d-block" style="font-size: 24px">{{ $callAnalyses->where('employee_id', $employee->id)->sum('total_success_call') }}</span>
                            <span class="font-weight-bold text-white"  style="font-size: 20px">Toplam Çağrı</span>
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
                <div class="col-xl-4">
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
                            <span class="card-title font-weight-bolder text-white mb-0 mt-6 d-block" style="font-size: 24px">{{ $callAnalyses->where('employee_id', $employee->id)->sum('incoming_success_call') }}</span>
                            <span class="font-weight-bold text-white"  style="font-size: 20px">Gelen Çağrı</span>
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card card-custom bg-dark-75 card-stretch gutter-b" style="height: 200px">
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
                            <span class="card-title font-weight-bolder text-white mb-0 mt-6 d-block" style="font-size: 24px">{{ $callAnalyses->where('employee_id', $employee->id)->sum('outgoing_success_call') - $callAnalyses->sum('incoming_error_call') }}</span>
                            <span class="font-weight-bold text-white"  style="font-size: 20px">Giden Çağrı</span>
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card card-custom bg-danger card-stretch gutter-b" style="height: 200px">
                        <!--begin::Body-->
                        <div class="card-body cursor-pointer">
                            <span class="svg-icon svg-icon-3x svg-icon-white">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M6.58578644,8 L5.17157288,6.58578644 C4.78104858,6.19526215 4.78104858,5.56209717 5.17157288,5.17157288 C5.56209717,4.78104858 6.19526215,4.78104858 6.58578644,5.17157288 L8,6.58578644 L9.41421356,5.17157288 C9.80473785,4.78104858 10.4379028,4.78104858 10.8284271,5.17157288 C11.2189514,5.56209717 11.2189514,6.19526215 10.8284271,6.58578644 L9.41421356,8 L10.8284271,9.41421356 C11.2189514,9.80473785 11.2189514,10.4379028 10.8284271,10.8284271 C10.4379028,11.2189514 9.80473785,11.2189514 9.41421356,10.8284271 L8,9.41421356 L6.58578644,10.8284271 C6.19526215,11.2189514 5.56209717,11.2189514 5.17157288,10.8284271 C4.78104858,10.4379028 4.78104858,9.80473785 5.17157288,9.41421356 L6.58578644,8 Z" fill="#000000" opacity="0.3"/>
                                        <path d="M13.0799676,14.7839934 L15.2839934,12.5799676 C15.8927139,11.9712471 16.0436229,11.0413042 15.6586342,10.2713269 L15.5337539,10.0215663 C15.1487653,9.25158901 15.2996742,8.3216461 15.9083948,7.71292558 L18.6411989,4.98012149 C18.836461,4.78485934 19.1530435,4.78485934 19.3483056,4.98012149 C19.3863063,5.01812215 19.4179321,5.06200062 19.4419658,5.11006808 L20.5459415,7.31801948 C21.3904962,9.0071287 21.0594452,11.0471565 19.7240871,12.3825146 L13.7252616,18.3813401 C12.2717221,19.8348796 10.1217008,20.3424308 8.17157288,19.6923882 L5.75709327,18.8875616 C5.49512161,18.8002377 5.35354162,18.5170777 5.4408655,18.2551061 C5.46541191,18.1814669 5.50676633,18.114554 5.56165376,18.0596666 L8.21292558,15.4083948 C8.8216461,14.7996742 9.75158901,14.6487653 10.5215663,15.0337539 L10.7713269,15.1586342 C11.5413042,15.5436229 12.4712471,15.3927139 13.0799676,14.7839934 Z" fill="#000000"/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="card-title font-weight-bolder text-white mb-0 mt-6 d-block" style="font-size: 24px">{{ $callAnalyses->where('employee_id', $employee->id)->sum('outgoing_error_call') + $callAnalyses->sum('incoming_error_call') }}</span>
                            <span class="font-weight-bold text-white"  style="font-size: 20px">Cevapsız Çağrı</span>
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card card-custom bg-success card-stretch gutter-b" style="height: 200px">
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
                            @php($seconds = array_sum($callAnalyses->where('employee_id', $employee->id)->map(function ($analysis) { return \Illuminate\Support\Carbon::createFromDate('2021-01-01 ' . $analysis->total_call_time)->diffInSeconds('2021-01-01 00:00:00'); })->all()))
                            <span class="card-title font-weight-bolder text-white mb-0 mt-6 d-block" style="font-size: 24px">{{ sprintf('%02d:%02d:%02d', ($seconds / 3600), ($seconds / 60 % 60), $seconds % 60) }}</span>
                            <span class="font-weight-bold text-white"  style="font-size: 20px">Toplam Konuşma</span>
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card card-custom bg-warning card-stretch gutter-b" style="height: 200px">
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
                            <span class="card-title font-weight-bolder text-white mb-0 mt-6 d-block" style="font-size: 24px">{{ number_format($callAnalyses->where('employee_id', $employee->id)->sum('operational_productivity_rate') / $callAnalyses->where('employee_id', $employee->id)->count(), 2, '.', '') }}</span>
                            <span class="font-weight-bold text-white"  style="font-size: 20px">Çağrı Verimliliği</span>
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
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
        </div>
        <div class="col-xl-6">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card card-custom bg-dark-75 card-stretch gutter-b" style="height: 200px">
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
                            <span class="card-title font-weight-bolder text-white mb-0 mt-6 d-block" style="font-size: 24px">{{ $callAnalyses->sum('incoming_success_call') }}</span>
                            <span class="font-weight-bold text-white"  style="font-size: 20px">Açılan Faaliyet</span>
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
                <div class="col-xl-4">
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
                            <span class="card-title font-weight-bolder text-white mb-0 mt-6 d-block" style="font-size: 24px">{{ $callAnalyses->sum('outgoing_success_call') }}</span>
                            <span class="font-weight-bold text-white"  style="font-size: 20px">Tamamlanan İş</span>
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card card-custom bg-warning card-stretch gutter-b" style="height: 200px">
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
                            <span class="card-title font-weight-bolder text-white mb-0 mt-6 d-block" style="font-size: 24px">{{ $callAnalyses->sum('incoming_success_call') - $callAnalyses->sum('incoming_error_call') }}</span>
                            <span class="font-weight-bold text-white"  style="font-size: 20px">Kullanılan Mola</span>
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card card-custom bg-dark-75 card-stretch gutter-b" style="height: 200px">
                        <!--begin::Body-->
                        <div class="card-body cursor-pointer">
                            <span class="svg-icon svg-icon-3x svg-icon-white">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M6.58578644,8 L5.17157288,6.58578644 C4.78104858,6.19526215 4.78104858,5.56209717 5.17157288,5.17157288 C5.56209717,4.78104858 6.19526215,4.78104858 6.58578644,5.17157288 L8,6.58578644 L9.41421356,5.17157288 C9.80473785,4.78104858 10.4379028,4.78104858 10.8284271,5.17157288 C11.2189514,5.56209717 11.2189514,6.19526215 10.8284271,6.58578644 L9.41421356,8 L10.8284271,9.41421356 C11.2189514,9.80473785 11.2189514,10.4379028 10.8284271,10.8284271 C10.4379028,11.2189514 9.80473785,11.2189514 9.41421356,10.8284271 L8,9.41421356 L6.58578644,10.8284271 C6.19526215,11.2189514 5.56209717,11.2189514 5.17157288,10.8284271 C4.78104858,10.4379028 4.78104858,9.80473785 5.17157288,9.41421356 L6.58578644,8 Z" fill="#000000" opacity="0.3"/>
                                        <path d="M13.0799676,14.7839934 L15.2839934,12.5799676 C15.8927139,11.9712471 16.0436229,11.0413042 15.6586342,10.2713269 L15.5337539,10.0215663 C15.1487653,9.25158901 15.2996742,8.3216461 15.9083948,7.71292558 L18.6411989,4.98012149 C18.836461,4.78485934 19.1530435,4.78485934 19.3483056,4.98012149 C19.3863063,5.01812215 19.4179321,5.06200062 19.4419658,5.11006808 L20.5459415,7.31801948 C21.3904962,9.0071287 21.0594452,11.0471565 19.7240871,12.3825146 L13.7252616,18.3813401 C12.2717221,19.8348796 10.1217008,20.3424308 8.17157288,19.6923882 L5.75709327,18.8875616 C5.49512161,18.8002377 5.35354162,18.5170777 5.4408655,18.2551061 C5.46541191,18.1814669 5.50676633,18.114554 5.56165376,18.0596666 L8.21292558,15.4083948 C8.8216461,14.7996742 9.75158901,14.6487653 10.5215663,15.0337539 L10.7713269,15.1586342 C11.5413042,15.5436229 12.4712471,15.3927139 13.0799676,14.7839934 Z" fill="#000000"/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="card-title font-weight-bolder text-white mb-0 mt-6 d-block" style="font-size: 24px">{{ $callAnalyses->sum('outgoing_error_call') + $callAnalyses->sum('incoming_error_call') }}</span>
                            <span class="font-weight-bold text-white"  style="font-size: 20px">İş Verimliliği</span>
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card card-custom bg-info card-stretch gutter-b" style="height: 200px">
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
                            @php($seconds = array_sum($callAnalyses->map(function ($analysis) { return \Illuminate\Support\Carbon::createFromDate('2021-01-01 ' . $analysis->total_call_time)->diffInSeconds('2021-01-01 00:00:00'); })->all()))
                            <span class="card-title font-weight-bolder text-white mb-0 mt-6 d-block" style="font-size: 24px">{{ sprintf('%02d:%02d:%02d', ($seconds / 3600), ($seconds / 60 % 60), $seconds % 60) }}</span>
                            <span class="font-weight-bold text-white"  style="font-size: 20px">Kullanılan İzin</span>
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card card-custom bg-info card-stretch gutter-b" style="height: 200px">
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
                            <span class="card-title font-weight-bolder text-white mb-0 mt-6 d-block" style="font-size: 24px">{{ number_format($callAnalyses->sum('operational_productivity_rate') / $callAnalyses->count(), 2, '.', '') }}</span>
                            <span class="font-weight-bold text-white"  style="font-size: 20px">Fazla Mesai</span>
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">Çağrı Verimlilik Analizi</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin::Chart-->
                            <div id="chart_5"></div>
                            <!--end::Chart-->
                        </div>
                    </div>
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
                                @foreach($callAnalyses->where('employee_id', $employee->id) as $callAnalysis)
                                {{ $callAnalysis->incoming_success_call }}{{ !$loop->last ? ',' : null }}
                                @endforeach
                            ]
                        }, {
                            name: 'Giden Çağrı',
                            data: [
                                @foreach($callAnalyses->where('employee_id', $employee->id) as $callAnalysis)
                                {{ $callAnalysis->outgoing_success_call }}{{ !$loop->last ? ',' : null }}
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
                            @foreach($callAnalyses->where('employee_id', $employee->id) as $callAnalysis)
                                '{{ $callAnalysis->date }}'{{ !$loop->last ? ',' : null }}
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

            var _demo5 = function () {
                const apexChart = "#chart_5";
                var options = {
                    series: [{
                        name: 'Yapılan Çağrı',
                        type: 'column',
                        data: [
                            @foreach($callAnalyses->groupBy('date')->all() as $date)
                            {{ !is_null($date->where('employee_id', $employee->id)->first()) ? $date->where('employee_id', $employee->id)->first()->total_success_call : 0 }}{{ !$loop->last ? ',' : null }}
                            @endforeach
                        ]
                    }, {
                        name: 'Ortalama Çağrı',
                        type: 'column',
                        data: [
                            @foreach($callAnalyses->groupBy('date')->all() as $date)
                            {{ number_format($date->sum('total_success_call') / $employeesCount, 2, '.', '') }}{{ !$loop->last ? ',' : null }}
                            @endforeach
                        ]
                    },
                        {
                            name: 'Verimlilik Yüzdesi',
                            type: 'line',
                            data: [
                                @foreach($callAnalyses->groupBy('date')->all() as $date)
                                {{ number_format((!is_null($date->where('employee_id', $employee->id)->first()) ? $date->where('employee_id', $employee->id)->first()->total_success_call : 0) * 100 / ($date->sum('total_success_call') / $employeesCount), 2, '.', ',') }}{{ !$loop->last ? ',' : null }}
                                @endforeach
                            ]
                        }
                    ],
                    chart: {
                        height: 350,
                        type: 'line',
                        stacked: false
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        width: [1, 1, 4]
                    },
                    title: {
                        text: 'Çağrı Verimlilik İstatistiği - {{ !isset($request) ? date('01/m/Y') . ' , ' . date('d/m/Y') : date('d/m/Y', strtotime($request->start_date)) . ' - ' . date('d/m/Y', strtotime($request->end_date)) }}',
                        align: 'left',
                        offsetX: 110
                    },
                    xaxis: {
                        categories: [
                            @foreach($callAnalyses->groupBy('date')->all() as $date => $data)
                                '{{ $date }}'{{ !$loop->last ? ',' : null }}
                            @endforeach
                        ],
                    },
                    yaxis: [
                        {
                            seriesName: 'Income',
                            opposite: true,
                        },
                    ],
                    tooltip: {
                        fixed: {
                            enabled: true,
                            position: 'topLeft', // topRight, topLeft, bottomRight, bottomLeft
                            offsetY: 50,
                            offsetX: 100
                        },
                    },
                    legend: {
                        horizontalAlign: 'left',
                        offsetX: 200
                    }
                };

                var chart = new ApexCharts(document.querySelector(apexChart), options);
                chart.render();
            }

            return {
                // public functions
                init: function () {
                    _demo2();
                    _demo5();
                }
            };
        }();

        jQuery(document).ready(function () {
            KTApexChartsDemo.init();
        });

    </script>
@stop
