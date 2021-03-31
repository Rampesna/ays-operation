@extends('layouts.master')
@section('title', 'İnsan Kaynakları - Genel Bakış')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))
@php(setlocale(LC_TIME, 'Turkish'))

@section('content')

    @include('pages.ik.dashboard.modals.today-permitted-employees')
    @include('pages.ik.dashboard.modals.employees-group-by-company')

    @include('pages.ik.dashboard.modals.edit-permit')

    <div class="row">

        <div class="col-lg-2">
            <div class="card card-custom bg-dark-75 card-stretch gutter-b">
                <div class="card-body cursor-pointer" data-toggle="modal" data-target="#EmployeesGroupByCompanyModal">
                    <span class="svg-icon svg-icon-2x svg-icon-white">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24" />
                                <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                            </g>
                        </svg>
                    </span>
                    <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">{{ count($employees) }}</span>
                    <span class="font-weight-bold text-white font-size-sm">Toplam Personel</span>
                </div>
            </div>
        </div>

        <div class="col-lg-2">
            <div class="card card-custom bg-success card-stretch gutter-b">
                <div class="card-body">
                    <span class="svg-icon svg-icon-2x svg-icon-white">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <rect fill="#000000" opacity="0.3" transform="translate(9.000000, 12.000000) rotate(-270.000000) translate(-9.000000, -12.000000) " x="8" y="6" width="2" height="12" rx="1"/>
                                <path d="M20,7.00607258 C19.4477153,7.00607258 19,6.55855153 19,6.00650634 C19,5.45446114 19.4477153,5.00694009 20,5.00694009 L21,5.00694009 C23.209139,5.00694009 25,6.7970243 25,9.00520507 L25,15.001735 C25,17.2099158 23.209139,19 21,19 L9,19 C6.790861,19 5,17.2099158 5,15.001735 L5,8.99826498 C5,6.7900842 6.790861,5 9,5 L10.0000048,5 C10.5522896,5 11.0000048,5.44752105 11.0000048,5.99956624 C11.0000048,6.55161144 10.5522896,6.99913249 10.0000048,6.99913249 L9,6.99913249 C7.8954305,6.99913249 7,7.89417459 7,8.99826498 L7,15.001735 C7,16.1058254 7.8954305,17.0008675 9,17.0008675 L21,17.0008675 C22.1045695,17.0008675 23,16.1058254 23,15.001735 L23,9.00520507 C23,7.90111468 22.1045695,7.00607258 21,7.00607258 L20,7.00607258 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.000000, 12.000000) rotate(-90.000000) translate(-15.000000, -12.000000) "/>
                                <path d="M16.7928932,9.79289322 C17.1834175,9.40236893 17.8165825,9.40236893 18.2071068,9.79289322 C18.5976311,10.1834175 18.5976311,10.8165825 18.2071068,11.2071068 L15.2071068,14.2071068 C14.8165825,14.5976311 14.1834175,14.5976311 13.7928932,14.2071068 L10.7928932,11.2071068 C10.4023689,10.8165825 10.4023689,10.1834175 10.7928932,9.79289322 C11.1834175,9.40236893 11.8165825,9.40236893 12.2071068,9.79289322 L14.5,12.0857864 L16.7928932,9.79289322 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.500000, 12.000000) rotate(-90.000000) translate(-14.500000, -12.000000) "/>
                            </g>
                        </svg>
                    </span>
                    <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">--</span>
                    <span class="font-weight-bold text-white font-size-sm">İşe Gelen</span>
                </div>
            </div>
        </div>

        <div class="col-lg-2">
            <div class="card card-custom bg-warning card-stretch gutter-b">
                <div class="card-body">
                    <span class="svg-icon svg-icon-2x svg-icon-white">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M7.14319965,19.3575259 C7.67122143,19.7615175 8.25104409,20.1012165 8.87097532,20.3649307 L7.89205065,22.0604779 C7.61590828,22.5387706 7.00431787,22.7026457 6.52602525,22.4265033 C6.04773263,22.150361 5.88385747,21.5387706 6.15999985,21.0604779 L7.14319965,19.3575259 Z M15.1367085,20.3616573 C15.756345,20.0972995 16.3358198,19.7569961 16.8634386,19.3524415 L17.8320512,21.0301278 C18.1081936,21.5084204 17.9443184,22.1200108 17.4660258,22.3961532 C16.9877332,22.6722956 16.3761428,22.5084204 16.1000004,22.0301278 L15.1367085,20.3616573 Z" fill="#000000"/>
                                <path d="M12,21 C7.581722,21 4,17.418278 4,13 C4,8.581722 7.581722,5 12,5 C16.418278,5 20,8.581722 20,13 C20,17.418278 16.418278,21 12,21 Z M19.068812,3.25407593 L20.8181344,5.00339833 C21.4039208,5.58918477 21.4039208,6.53893224 20.8181344,7.12471868 C20.2323479,7.71050512 19.2826005,7.71050512 18.696814,7.12471868 L16.9474916,5.37539627 C16.3617052,4.78960984 16.3617052,3.83986237 16.9474916,3.25407593 C17.5332781,2.66828949 18.4830255,2.66828949 19.068812,3.25407593 Z M5.29862906,2.88207799 C5.8844155,2.29629155 6.83416297,2.29629155 7.41994941,2.88207799 C8.00573585,3.46786443 8.00573585,4.4176119 7.41994941,5.00339833 L5.29862906,7.12471868 C4.71284263,7.71050512 3.76309516,7.71050512 3.17730872,7.12471868 C2.59152228,6.53893224 2.59152228,5.58918477 3.17730872,5.00339833 L5.29862906,2.88207799 Z" fill="#000000" opacity="0.3"/>
                                <path d="M11.9630156,7.5 L12.0475062,7.5 C12.3043819,7.5 12.5194647,7.69464724 12.5450248,7.95024814 L13,12.5 L16.2480695,14.3560397 C16.403857,14.4450611 16.5,14.6107328 16.5,14.7901613 L16.5,15 C16.5,15.2109164 16.3290185,15.3818979 16.1181021,15.3818979 C16.0841582,15.3818979 16.0503659,15.3773725 16.0176181,15.3684413 L11.3986612,14.1087258 C11.1672824,14.0456225 11.0132986,13.8271186 11.0316926,13.5879956 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z" fill="#000000"/>
                            </g>
                        </svg>
                    </span>
                    <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">--</span>
                    <span class="font-weight-bold text-white font-size-sm">Geç Kalan</span>
                </div>
            </div>
        </div>

        <div class="col-lg-2">
            <div class="card card-custom bg-danger card-stretch gutter-b">
                <div class="card-body">
                    <span class="svg-icon svg-icon-2x svg-icon-white">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M12,22 C6.4771525,22 2,17.5228475 2,12 C2,6.4771525 6.4771525,2 12,2 C17.5228475,2 22,6.4771525 22,12 C22,17.5228475 17.5228475,22 12,22 Z M12,20 C16.418278,20 20,16.418278 20,12 C20,7.581722 16.418278,4 12,4 C7.581722,4 4,7.581722 4,12 C4,16.418278 7.581722,20 12,20 Z M19.0710678,4.92893219 L19.0710678,4.92893219 C19.4615921,5.31945648 19.4615921,5.95262146 19.0710678,6.34314575 L6.34314575,19.0710678 C5.95262146,19.4615921 5.31945648,19.4615921 4.92893219,19.0710678 L4.92893219,19.0710678 C4.5384079,18.6805435 4.5384079,18.0473785 4.92893219,17.6568542 L17.6568542,4.92893219 C18.0473785,4.5384079 18.6805435,4.5384079 19.0710678,4.92893219 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                            </g>
                        </svg>
                    </span>
                    <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">--</span>
                    <span class="font-weight-bold text-white font-size-sm">Devamsız</span>
                </div>
            </div>
        </div>

        <div class="col-lg-2">
            <div class="card card-custom card-stretch gutter-b" style="background-color: saddlebrown">
                <div class="card-body cursor-pointer" data-toggle="modal" data-target="#TodayPermittedEmployeesModal">
                    <span class="svg-icon svg-icon-2x svg-icon-white">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M14,13.381038 L14,3.47213595 L7.99460483,15.4829263 L14,13.381038 Z M4.88230018,17.2353996 L13.2844582,0.431083506 C13.4820496,0.0359007077 13.9625881,-0.12427877 14.3577709,0.0733126292 C14.5125928,0.15072359 14.6381308,0.276261584 14.7155418,0.431083506 L23.1176998,17.2353996 C23.3152912,17.6305824 23.1551117,18.1111209 22.7599289,18.3087123 C22.5664522,18.4054506 22.3420471,18.4197165 22.1378777,18.3482572 L14,15.5 L5.86212227,18.3482572 C5.44509941,18.4942152 4.98871325,18.2744737 4.84275525,17.8574509 C4.77129597,17.6532815 4.78556182,17.4288764 4.88230018,17.2353996 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.000087, 9.191034) rotate(-315.000000) translate(-14.000087, -9.191034) "/>
                            </g>
                        </svg>
                    </span>
                    <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">{{ count($todayPermittedEmployees) }}</span>
                    <span class="font-weight-bold text-white font-size-sm">Bugün İzinliler</span>
                </div>
            </div>
        </div>

        <div class="col-lg-2">
            <div class="card card-custom bg-primary card-stretch gutter-b">
                <div class="card-body">
                    <span class="svg-icon svg-icon-2x svg-icon-white">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M21.9969433,12.1933592 C21.8948657,15.4175796 19.2490111,18 16,18 L12.0583175,18 L12.0583175,18.9825492 C12.0583175,19.2586916 11.8344599,19.4825492 11.5583175,19.4825492 C11.4509855,19.4825492 11.3465023,19.4480108 11.2603165,19.3840407 L8.40328311,17.263451 C8.18154548,17.0988696 8.13521119,16.7856962 8.29979258,16.5639585 C8.32872576,16.5249774 8.36318164,16.4904176 8.40207551,16.4613672 L11.2591089,14.3274051 C11.48035,14.1621567 11.7936615,14.2075478 11.9589099,14.4287888 C12.0234473,14.5151942 12.0583175,14.6201505 12.0583175,14.7279974 L12.0583175,16 L16,16 C17.6264832,16 19.0262317,15.0292331 19.6514501,13.6354945 C20.5364094,13.3251939 21.3338787,12.8288439 21.9969433,12.1933592 Z" fill="#000000" opacity="0.3"/>
                                <path d="M12.1000181,6 C12.5632884,3.71775968 14.5810421,2 17,2 C19.7614237,2 22,4.23857625 22,7 C22,9.76142375 19.7614237,12 17,12 C14.5810421,12 12.5632884,10.2822403 12.1000181,8 L8,8 C5.790861,8 4,9.790861 4,12 L4,13 C4,14.6568542 5.34314575,16 7,16 L7,18 C4.23857625,18 2,15.7614237 2,13 L2,12 C2,8.6862915 4.6862915,6 8,6 L12.1000181,6 Z M16.7300002,5.668 L16.7300002,9.5 L17.6900002,9.5 L17.6900002,4.5 L16.8180002,4.5 L15.0500002,5.924 L15.6100002,6.588 L16.7300002,5.668 Z" fill="#000000" fill-rule="nonzero"/>
                            </g>
                        </svg>
                    </span>
                    <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">{{ count($waitingPermits) + count($waitingOvertimes) + count($waitingPayments) }}</span>
                    <span class="font-weight-bold text-white font-size-sm">Onay Bekleyen İşlemler</span>
                </div>
            </div>
        </div>

    </div>

    <hr>

    <div class="row">

        <div class="col-xl-6">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-custom card-stretch gutter-b">
                        <div class="card-body" >
                            <div class="bg-white">
                                <h6>Onay Bekleyen İşlemler</h6>
                                <hr>
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#WaitingPermitsPanel">
                                            <span class="nav-text"><i class="fa fa-plane"></i> &nbsp;&nbsp;İzin &nbsp; {{ count($waitingPermits) > 0 ? '(' . count($waitingPermits) . ')' : null }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#WaitingOvertimesPanel" aria-controls="profile">
                                            <span class="nav-text"><i class="fa fa-clock"></i> &nbsp;&nbsp;Fazla Mesai &nbsp; {{ count($waitingOvertimes) > 0 ? '(' . count($waitingOvertimes) . ')' : null }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#WaitingPaymentsPanel" aria-controls="contact">
                                            <span class="nav-text"><i class="fa fa-credit-card"></i> &nbsp;&nbsp;Ödeme &nbsp; {{ count($waitingPayments) > 0 ? '(' . count($waitingPayments) . ')' : null }}</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content mt-5" id="myTabContent">
                                    <div class="tab-pane fade show active" id="WaitingPermitsPanel" role="tabpanel" aria-labelledby="WaitingPermitsPanel-tab">
                                        @if(count($waitingPermits) == 0)
                                            <div class="col-xl-12">
                                                <a class="card card-custom bg-primary bg-hover-state-info card-stretch gutter-b">
                                                    <div class="card-body">
                                                        <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path d="M14,13.381038 L14,3.47213595 L7.99460483,15.4829263 L14,13.381038 Z M4.88230018,17.2353996 L13.2844582,0.431083506 C13.4820496,0.0359007077 13.9625881,-0.12427877 14.3577709,0.0733126292 C14.5125928,0.15072359 14.6381308,0.276261584 14.7155418,0.431083506 L23.1176998,17.2353996 C23.3152912,17.6305824 23.1551117,18.1111209 22.7599289,18.3087123 C22.5664522,18.4054506 22.3420471,18.4197165 22.1378777,18.3482572 L14,15.5 L5.86212227,18.3482572 C5.44509941,18.4942152 4.98871325,18.2744737 4.84275525,17.8574509 C4.77129597,17.6532815 4.78556182,17.4288764 4.88230018,17.2353996 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.000087, 9.191034) rotate(-315.000000) translate(-14.000087, -9.191034) "/>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                        <div class="text-inverse-primary font-weight-bolder font-size-h5 mb-2 mt-5">Bekleyen İzin Talebi Bulunmuyor</div>
                                                    </div>
                                                </a>
                                            </div>
                                        @else
                                            <div class="mt-10"></div>
                                            @foreach($waitingPermits as $permit)
                                                <div class="d-flex align-items-center mt-4">
                                                    <span class="bullet bullet-bar bg-warning align-self-stretch"></span>
                                                    <div class="div ml-5"></div>
                                                    <a data-id="{{ $permit->id }}" class="ml-3 text-hover-primary font-weight-bold font-size-lg mb-1 cursor-pointer edit-permit">
                                                        {{  ucwords($permit->employee->name) }} - ({{ strftime("%d %B, %H:%M", strtotime($permit->start_date)) }} - {{ strftime("%d %B, %H:%M", strtotime($permit->end_date)) }})
                                                    </a>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="tab-pane fade" id="WaitingOvertimesPanel" role="tabpanel" aria-labelledby="WaitingOvertimesPanel-tab">
                                        @if(count($waitingOvertimes) == 0)
                                            <div class="col-xl-12">
                                                <a class="card card-custom bg-primary bg-hover-state-info card-stretch gutter-b">
                                                    <div class="card-body">
                                                        <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path d="M7.14319965,19.3575259 C7.67122143,19.7615175 8.25104409,20.1012165 8.87097532,20.3649307 L7.89205065,22.0604779 C7.61590828,22.5387706 7.00431787,22.7026457 6.52602525,22.4265033 C6.04773263,22.150361 5.88385747,21.5387706 6.15999985,21.0604779 L7.14319965,19.3575259 Z M15.1367085,20.3616573 C15.756345,20.0972995 16.3358198,19.7569961 16.8634386,19.3524415 L17.8320512,21.0301278 C18.1081936,21.5084204 17.9443184,22.1200108 17.4660258,22.3961532 C16.9877332,22.6722956 16.3761428,22.5084204 16.1000004,22.0301278 L15.1367085,20.3616573 Z" fill="#000000"/>
                                                                    <path d="M12,21 C7.581722,21 4,17.418278 4,13 C4,8.581722 7.581722,5 12,5 C16.418278,5 20,8.581722 20,13 C20,17.418278 16.418278,21 12,21 Z M19.068812,3.25407593 L20.8181344,5.00339833 C21.4039208,5.58918477 21.4039208,6.53893224 20.8181344,7.12471868 C20.2323479,7.71050512 19.2826005,7.71050512 18.696814,7.12471868 L16.9474916,5.37539627 C16.3617052,4.78960984 16.3617052,3.83986237 16.9474916,3.25407593 C17.5332781,2.66828949 18.4830255,2.66828949 19.068812,3.25407593 Z M5.29862906,2.88207799 C5.8844155,2.29629155 6.83416297,2.29629155 7.41994941,2.88207799 C8.00573585,3.46786443 8.00573585,4.4176119 7.41994941,5.00339833 L5.29862906,7.12471868 C4.71284263,7.71050512 3.76309516,7.71050512 3.17730872,7.12471868 C2.59152228,6.53893224 2.59152228,5.58918477 3.17730872,5.00339833 L5.29862906,2.88207799 Z" fill="#000000" opacity="0.3"/>
                                                                    <path d="M11.9630156,7.5 L12.0475062,7.5 C12.3043819,7.5 12.5194647,7.69464724 12.5450248,7.95024814 L13,12.5 L16.2480695,14.3560397 C16.403857,14.4450611 16.5,14.6107328 16.5,14.7901613 L16.5,15 C16.5,15.2109164 16.3290185,15.3818979 16.1181021,15.3818979 C16.0841582,15.3818979 16.0503659,15.3773725 16.0176181,15.3684413 L11.3986612,14.1087258 C11.1672824,14.0456225 11.0132986,13.8271186 11.0316926,13.5879956 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z" fill="#000000"/>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                        <div class="text-inverse-primary font-weight-bolder font-size-h5 mb-2 mt-5">Bekleyen Fazla Mesai Talebi Bulunmuyor</div>
                                                    </div>
                                                </a>
                                            </div>
                                        @else
                                            <div class="mt-10"></div>
                                            @foreach($waitingOvertimes as $overtime)
                                                <div class="d-flex align-items-center mt-4">
                                                    <span class="bullet bullet-bar bg-warning align-self-stretch"></span>
                                                    <div class="div ml-5"></div>
                                                    <a class="ml-3 text-hover-primary font-weight-bold font-size-lg mb-1 cursor-pointer">
                                                        {{ ucwords($overtime->employee->name) }} - ({{ strftime('%d %B', strtotime($overtime->start_date)) }} - {{ strftime('%d %B', strtotime($overtime->end_date)) }})
                                                    </a>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="tab-pane fade" id="WaitingPaymentsPanel" role="tabpanel" aria-labelledby="WaitingPaymentsPanel-tab">
                                        @if(count($waitingPayments) == 0)
                                            <div class="col-xl-12">
                                                <a class="card card-custom bg-primary bg-hover-state-info card-stretch gutter-b">
                                                    <div class="card-body">
                                                        <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z" fill="#000000" opacity="0.3" transform="translate(11.500000, 12.000000) rotate(-345.000000) translate(-11.500000, -12.000000) "/>
                                                                    <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z M11.5,14 C12.6045695,14 13.5,13.1045695 13.5,12 C13.5,10.8954305 12.6045695,10 11.5,10 C10.3954305,10 9.5,10.8954305 9.5,12 C9.5,13.1045695 10.3954305,14 11.5,14 Z" fill="#000000"/>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                        <div class="text-inverse-primary font-weight-bolder font-size-h5 mb-2 mt-5">Bekleyen Ödeme Talebi Bulunmuyor</div>
                                                    </div>
                                                </a>
                                            </div>
                                        @else
                                            <div class="mt-10"></div>
                                            @foreach($waitingPayments as $payment)
                                                <div class="d-flex align-items-center mt-4">
                                                    <span class="bullet bullet-bar bg-warning align-self-stretch"></span>
                                                    <div class="div ml-5"></div>
                                                    <a class="ml-3 text-hover-primary font-weight-bold font-size-lg mb-1">
                                                        {{ $payment->employee->name }} - {{ $payment->amount }} TL {{ $payment->type->name }} - {{ strftime("%d %B %Y", strtotime($payment->date)) }}
                                                    </a>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card card-custom card-stretch gutter-b">
                        <div class="card-header border-0"></div>
                        <div class="card-body pt-2" style="margin-top: -50px">
                            <h6>{{ date('Y') }} - Resmi Tatiller</h6>
                            <hr>
                            <div class="col-xl-12">
                                <a href="#" data-toggle="modal" data-target="#AddEducationModal"
                                   class="card card-custom bg-primary bg-hover-state-info card-stretch gutter-b">
                                    <div class="card-body">
                                        <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M12,21 C7.02943725,21 3,16.9705627 3,12 C3,7.02943725 7.02943725,3 12,3 C16.9705627,3 21,7.02943725 21,12 C21,16.9705627 16.9705627,21 12,21 Z M14.1654881,7.35483745 L9.61055177,10.3622525 C9.47921741,10.4489666 9.39637436,10.592455 9.38694497,10.7495509 L9.05991526,16.197949 C9.04337012,16.4735952 9.25341309,16.7104632 9.52905936,16.7270083 C9.63705011,16.7334903 9.74423017,16.7047714 9.83451193,16.6451626 L14.3894482,13.6377475 C14.5207826,13.5510334 14.6036256,13.407545 14.613055,13.2504491 L14.9400847,7.80205104 C14.9566299,7.52640477 14.7465869,7.28953682 14.4709406,7.27299168 C14.3629499,7.26650974 14.2557698,7.29522855 14.1654881,7.35483745 Z" fill="#000000"/>
                                                </g>
                                            </svg>
                                        </span>
                                        <div class="text-inverse-primary font-weight-bolder font-size-h5 mb-2 mt-5">Yaklaşan Resmi Tatil Yok</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('page-styles')
    @include('pages.ik.dashboard.components.style')
@stop

@section('page-script')
    @include('pages.ik.dashboard.components.script')
@stop
