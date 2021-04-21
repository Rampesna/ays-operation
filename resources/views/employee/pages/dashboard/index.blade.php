@extends('employee.layouts.master')
@section('title', 'Anasayfa')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@php(setlocale(LC_TIME, 'Turkish'))

@section('content')

    @include('employee.pages.dashboard.components.show-permit')
    @include('employee.pages.dashboard.components.show-overtime')
    @include('employee.pages.dashboard.components.show-shift')

    @include('employee.pages.dashboard.modals.create-permit')
    @include('employee.pages.dashboard.modals.create-overtime')

    @include('employee.pages.dashboard.modals.show-food')

    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-12">

            <div class="row">
                <div class="col-xl-12">
                    <a data-toggle="modal" data-target="#CreatePermitModal" class="card card-custom card-stretch gutter-b cursor-pointer">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-primary svg-icon-3x ml-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M3,13.5 L19,12 L3,10.5 L3,3.7732928 C3,3.70255344 3.01501031,3.63261921 3.04403925,3.56811047 C3.15735832,3.3162903 3.45336217,3.20401298 3.70518234,3.31733205 L21.9867539,11.5440392 C22.098181,11.5941815 22.1873901,11.6833905 22.2375323,11.7948177 C22.3508514,12.0466378 22.2385741,12.3426417 21.9867539,12.4559608 L3.70518234,20.6826679 C3.64067359,20.7116969 3.57073936,20.7267072 3.5,20.7267072 C3.22385763,20.7267072 3,20.5028496 3,20.2267072 L3,13.5 Z" fill="#000000"/>
                                    </g>
                                </svg>
                            </span>
                            <div class="text-inverse-white font-weight-bolder font-size-h5 mb-2 mt-5">İzin Talebi Oluştur</div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-12">
                    <a data-toggle="modal" data-target="#CreateOvertimeModal" class="card card-custom card-stretch gutter-b cursor-pointer">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-warning svg-icon-3x ml-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <path d="M12,22 C7.02943725,22 3,17.9705627 3,13 C3,8.02943725 7.02943725,4 12,4 C16.9705627,4 21,8.02943725 21,13 C21,17.9705627 16.9705627,22 12,22 Z" fill="#000000" opacity="0.3"/>
                                        <path d="M11.9630156,7.5 L12.0475062,7.5 C12.3043819,7.5 12.5194647,7.69464724 12.5450248,7.95024814 L13,12.5 L16.2480695,14.3560397 C16.403857,14.4450611 16.5,14.6107328 16.5,14.7901613 L16.5,15 C16.5,15.2109164 16.3290185,15.3818979 16.1181021,15.3818979 C16.0841582,15.3818979 16.0503659,15.3773725 16.0176181,15.3684413 L11.3986612,14.1087258 C11.1672824,14.0456225 11.0132986,13.8271186 11.0316926,13.5879956 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z" fill="#000000"/>
                                    </g>
                                </svg>
                            </span>
                            <div class="text-inverse-white font-weight-bolder font-size-h5 mb-2 mt-5">Fazla Mesai Talep Et</div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-12">
                    <a data-toggle="modal" data-target="#CreatePaymentModal" class="card card-custom card-stretch gutter-b cursor-pointer">
                        <div class="card-body">
                        <span class="svg-icon svg-icon-success svg-icon-3x ml-n1">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z" fill="#000000" opacity="0.3" transform="translate(11.500000, 12.000000) rotate(-345.000000) translate(-11.500000, -12.000000) "/>
                                    <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z M11.5,14 C12.6045695,14 13.5,13.1045695 13.5,12 C13.5,10.8954305 12.6045695,10 11.5,10 C10.3954305,10 9.5,10.8954305 9.5,12 C9.5,13.1045695 10.3954305,14 11.5,14 Z" fill="#000000"/>
                                </g>
                            </svg>
                        </span>
                            <div class="text-inverse-white font-weight-bolder font-size-h5 mb-2 mt-5">Ödeme Talep Et</div>
                        </div>
                    </a>
                </div>

            </div>

        </div>
        <div class="col-xl-9 col-lg-8 col-md-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-custom">
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')
    @include('employee.pages.dashboard.components.style')
@stop

@section('page-script')
    @include('employee.pages.dashboard.components.script')
@stop

