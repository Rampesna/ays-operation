@extends('layouts.master')
@section('title', 'Anasayfa')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    <form action="{{ route('index') }}" class="row mt-n5">
        <div class="col-xl-3">
            <label for="company_id">Firma</label>
            <select name="company_id" id="company_id" class="form-control selectpicker" data-live-search="true">
                @foreach($companies as $company)
                    <option @if($company->id == $companyId) selected @endif value="{{ $company->id }}">{{ $company->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-xl-2">
            <div class="form-group">
                <label for="start_date">Başlangıç Tarihi</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $startDate }}">
            </div>
        </div>
        <div class="col-xl-2">
            <div class="form-group">
                <label for="end_date">Bitiş Tarihi</label>
                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $endDate }}">
            </div>
        </div>
        <div class="col-xl-5">
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-sm mt-8"><i class="fab fa-sistrix"></i></button>
            </div>
        </div>
    </form>
    <hr>
    <div class="row">
        <div class="col-xl-2 col-12">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Personel Sayısı</h2>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-12 pb-4 pt-4">
                            <span class="svg-icon svg-icon-3x svg-icon-primary">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <h4 class="font-30 font-weight-bold text-col-blue" style="font-size: 30px">{{ count($employees) }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-5 col-12">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Çağrı Durumu</h2>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6 border-right pb-4 pt-4">

                            <label class="mb-0 mr-5">Gelen Çağrı</label>
                            <span class="svg-icon svg-icon-3x svg-icon-success">
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
                            <h4 class="font-30 font-weight-bold text-col-blue" style="font-size: 30px">{{ $todayCalls->sum('incoming_success_call') }}</h4>

                        </div>
                        <div class="col-6 pb-4 pt-4">
                            <label class="mb-0 mr-5">Giden Çağrı</label>
                            <span class="svg-icon svg-icon-3x svg-icon-info">
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
                            <h4 class="font-30 font-weight-bold text-col-blue" style="font-size: 30px">{{ $todayCalls->sum('outgoing_success_call') }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-5 col-12">
            <div class="card">
                <div class="card-header text-center">
                    <h2>İş Durumu</h2>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6 border-right pb-4 pt-4">
                            <label class="mb-0 mr-5">Faaliyet Sayısı</label>
                            <span class="svg-icon svg-icon-3x svg-icon-warning">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) "/>
                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <h4 class="font-30 font-weight-bold text-col-blue" style="font-size: 30px">{{ $todayJobs->sum('job_activity_count') }}</h4>
                        </div>
                        <div class="col-6 pb-4 pt-4">
                            <label class="mb-0 mr-5">Tamamlanan İş</label>
                            <span class="svg-icon svg-icon-3x svg-icon-dark-75">
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
                            <h4 class="font-30 font-weight-bold text-col-blue" style="font-size: 30px">{{ $todayJobs->sum('job_complete_count') }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div id="chart_00"></div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')
    @include('pages.dashboard.components.style')
@stop

@section('page-script')
    @include('pages.dashboard.components.script')
@stop

