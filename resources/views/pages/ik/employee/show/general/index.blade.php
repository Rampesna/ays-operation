@extends('layouts.master')
@section('title', $employee->name . ' - Genel Bilgiler')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    @include('pages.ik.employee.components.subheader')
    <div class="col-xl-5 col-12 mt-15">
        <div class="card">
            <div class="card-body">
                <a class="float-right cursor-pointer">Personeli Sil
                    <span class="svg-icon svg-icon-primary svg-icon-2x">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <rect fill="#000000" opacity="0.3" transform="translate(9.000000, 12.000000) rotate(-270.000000) translate(-9.000000, -12.000000) " x="8" y="6" width="2" height="12" rx="1"/>
                                <path d="M20,7.00607258 C19.4477153,7.00607258 19,6.55855153 19,6.00650634 C19,5.45446114 19.4477153,5.00694009 20,5.00694009 L21,5.00694009 C23.209139,5.00694009 25,6.7970243 25,9.00520507 L25,15.001735 C25,17.2099158 23.209139,19 21,19 L9,19 C6.790861,19 5,17.2099158 5,15.001735 L5,8.99826498 C5,6.7900842 6.790861,5 9,5 L10.0000048,5 C10.5522896,5 11.0000048,5.44752105 11.0000048,5.99956624 C11.0000048,6.55161144 10.5522896,6.99913249 10.0000048,6.99913249 L9,6.99913249 C7.8954305,6.99913249 7,7.89417459 7,8.99826498 L7,15.001735 C7,16.1058254 7.8954305,17.0008675 9,17.0008675 L21,17.0008675 C22.1045695,17.0008675 23,16.1058254 23,15.001735 L23,9.00520507 C23,7.90111468 22.1045695,7.00607258 21,7.00607258 L20,7.00607258 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.000000, 12.000000) rotate(-90.000000) translate(-15.000000, -12.000000) "/>
                                <path d="M16.7928932,9.79289322 C17.1834175,9.40236893 17.8165825,9.40236893 18.2071068,9.79289322 C18.5976311,10.1834175 18.5976311,10.8165825 18.2071068,11.2071068 L15.2071068,14.2071068 C14.8165825,14.5976311 14.1834175,14.5976311 13.7928932,14.2071068 L10.7928932,11.2071068 C10.4023689,10.8165825 10.4023689,10.1834175 10.7928932,9.79289322 C11.1834175,9.40236893 11.8165825,9.40236893 12.2071068,9.79289322 L14.5,12.0857864 L16.7928932,9.79289322 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.500000, 12.000000) rotate(-90.000000) translate(-14.500000, -12.000000) "/>
                            </g>
                        </svg>
                    </span>
                </a>
                <br>
                <hr>
                <div class="dropdown-toggle" id="pi_selector" data-toggle="dropdown" aria-expanded="false">
                    <div class="symbol symbol-100 mr-5">
                        <img class="symbol-label" id="profile_image" src="{{ !is_null($employee->image) ? asset($employee->image) : asset('assets/media/logos/avatar.jpg') }}">
                    </div>
                    <div id="pidm" class="dropdown-menu" aria-labelledby="pi_selector">
                        <a id="image_selector" class="dropdown-item edit-process" href="#">Seç</a>
                        <a id="delete_profile_image" class="dropdown-item text-danger" href="#">Sil</a>
                    </div>
                </div>
                <h6 class="mt-3 mb-0">{{ ucwords($employee->name) }}</h6>
                <span>{{ ucwords($employee->title) }}</span>
                <hr>
                <div class="d-flex justify-content-between">
                    <div>Kimlik Numarası</div>
                    <div>{{ $employee->identification_number ?? '--' }}</div>
                </div>
                <br>
                <div class="d-flex justify-content-between">
                    <div>Şirket</div>
                    <div>{{ $employee->ik_company->name ?? '--' }}</div>
                </div>
                <br>
                <div class="d-flex justify-content-between">
                    <div>Şube</div>
                    <div>{{ $employee->ik_branch->name ?? '--' }}</div>
                </div>
                <br>
                <div class="d-flex justify-content-between">
                    <div>Departman</div>
                    <div>{{ $employee->ik_department->name ?? '--' }}</div>
                </div>
                <br>
                <div class="d-flex justify-content-between">
                    <div>Ünvan</div>
                    <div>{{ $employee->ik_title->name ?? '--' }}</div>
                </div>
                <br>
                <div class="d-flex justify-content-between">
                    <div>E-posta Adresi</div>
                    <div><a href="mailto:{{ $employee->email }}">{{ $employee->email ?? '--' }}</a></div>
                </div>
                <br>
                <div class="d-flex justify-content-between">
                    <div>Telefon Numarası</div>
                    <div><a href="tel:{{ $employee->phone_number }}">{{ $employee->phone_number ?? '--' }}</a></div>
                </div>
                <br>
                <div class="d-flex justify-content-between">
                    <div>Çağrı Dahilisi</div>
                    <div>{{ $employee->extension_number ?? '--' }}</div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')
    @include('pages.ik.employee.show.general.components.style')
@stop

@section('page-script')
    @include('pages.ik.employee.show.general.components.script')
@stop
