@extends('layouts.master')
@section('title', 'Çalışanlar')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    <div class="row mt-n5">
        <div class="col-xl-4">
            <div class="form-group">
                <label for="name-searching"></label>
                <input type="text" name="name-searching" id="name-searching" class="form-control" placeholder="İsme Göre Arayın...">
            </div>
        </div>
        <div class="col-xl-4 mt-8">Toplam <strong>{{ count($employees) }}</strong> Personel</div>
        <div class="col-xl-4 text-right">
            <div class="form-group">
                <label for="company_id"></label>
                <select name="company_id" id="company_id" class="form-control selectpicker" data-live-search="true">
                    @foreach($companies as $company)
                        <option @if($company->id == $company_id) selected @endif value="{{ $company->id }}">{{ $company->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <hr class="mt-n3">
    <div class="row">
        @foreach($employees as $employee)
            <div class="col-xxl-4 col-xl-6 col-md-12 each_employee">
                <div class="card card-custom gutter-b">
                    <div class="card-body">
                        <!--begin::Details-->
                        <div class="d-flex mb-9">
                            <!--begin: Pic-->
                            <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                                <div class="symbol symbol-50 symbol-lg-120">
                                    <img src="{{ !is_null($employee->image) ? asset($employee->image) : asset('assets/media/logos/avatar.jpg') }}" alt="image" />
                                </div>
                                <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
                                    <span class="font-size-h3 symbol-label font-weight-boldest">{{ @strtoupper(substr(explode(' ',$employee->name)[0],0,1) . substr(explode(' ',$employee->name)[1],0,1)) }}</span>
                                </div>
                            </div>
                            <!--end::Pic-->
                            <!--begin::Info-->
                            <div class="flex-grow-1">
                                <!--begin::Title-->
                                <div class="d-flex justify-content-between flex-wrap mt-1">
                                    <div class="d-flex mr-3">
                                        <a @if(!is_null($employee->extension_number) && $employee->extension_number != '') href="{{ route('employee.show', $employee) }}" @endif class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3 employee-name">{{ ucwords($employee->name) }}</a>
                                        <a>
                                            <i class="flaticon2-correct text-success font-size-h5"></i>
                                        </a>
                                    </div>
                                    <div class="dropdown dropdown-inline mt-n5 mr-n5">
                                        <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ki ki-more-hor"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <!--begin::Navigation-->
                                            <ul class="navi navi-hover">
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                            <span class="navi-icon">
                                                                <i class="fa fa-eye"></i>
                                                            </span>
                                                        <span class="navi-text">Detaylı İncele</span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <!--end::Navigation-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Title-->
                                <!--begin::Content-->
                                <div class="d-flex flex-wrap justify-content-between mt-1">
                                    <div class="d-flex flex-column flex-grow-1 pr-8">
                                        <div class="flex-wrap mb-4 mt-4 pt-1">
                                            <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-5">
                                                <i class="flaticon2-phone mr-2 font-size-lg"></i> {{ $employee->extension_number ?? 'Dahili Numara Yok' }}
                                            </a>
                                            <br>
                                            <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-5">
                                                <i class="flaticon2-new-email mr-2 font-size-lg"></i> {{ $employee->email ?? 'E-posta Adresi Yok' }}
                                            </a>
                                            <br>
                                            <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-5">
                                                <i class="flaticon2-calendar-3 mr-2 font-size-lg"></i> {{ $employee->identification_number ?? '--' }}
                                            </a>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-xl-6 mt-4">
                                Kuyruklar
                            </div>
                            <div class="col-xl-6 mb-2 text-right">
                                <button class="btn btn-sm btn-pill btn-secondary queue_edit_icon" type="button" id="{{ $employee->id }}_queue_edit_icon" data-employee-id="{{ $employee->id }}"><i class="fa fa-edit"></i>Düzenle</button>
                                <button class="btn btn-sm btn-pill btn-success queue_save_icon" type="button" id="{{ $employee->id }}_queue_save_icon" data-employee-id="{{ $employee->id }}"><i class="fa fa-save"></i>Kaydet</button>
                            </div>
                        </div>
                        <div class="separator separator-solid"></div>
                        <div class="d-flex align-items-center flex-wrap mt-2">
                            <div id="{{ $employee->id }}_queues_list_card" class="col-xl-12 mt-2">
                                <div class="row" id="{{ $employee->id }}_queues_list_row">
                                    @foreach($employee->queues as $queue)
                                        <div class="btn btn-dark-75 btn-square btn-sm m-1" style="cursor:context-menu;">
                                            {{ $queue->name }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div id="{{ $employee->id }}_queues_selection_card" class="col-xl-12 mt-2 queue_selection_card">
                                <div class="form-group">
                                    <label for="{{ $employee->id }}_queues_selection"></label>
                                    <select id="{{ $employee->id }}_queues_selection" name="{{ $employee->id }}_queues[]" class="form-control selectpicker" multiple>
                                        @foreach($queues as $queue)
                                            <option @if($employee->queues()->where('queue_id', $queue->id)->exists()) selected @endif value="{{ $queue->id }}">{{ $queue->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <br>
                        <br>

                        <div class="row">
                            <div class="col-xl-6 mt-4">
                                Yetkinlikler
                            </div>
                            <div class="col-xl-6 mb-2 text-right">
                                <button class="btn btn-sm btn-pill btn-secondary competence_edit_icon" type="button" id="{{ $employee->id }}_competence_edit_icon" data-employee-id="{{ $employee->id }}"><i class="fa fa-edit"></i>Düzenle</button>
                                <button class="btn btn-sm btn-pill btn-success competence_save_icon" type="button" id="{{ $employee->id }}_competence_save_icon" data-employee-id="{{ $employee->id }}"><i class="fa fa-save"></i>Kaydet</button>
                            </div>
                        </div>
                        <div class="separator separator-solid"></div>
                        <div class="d-flex align-items-center flex-wrap mt-2">
                            <div id="{{ $employee->id }}_competences_list_card" class="col-xl-12 mt-2">
                                <div class="row" id="{{ $employee->id }}_competences_list_row">
                                    @foreach($employee->competences as $competence)
                                        <div class="btn btn-dark-75 btn-square btn-sm m-1" style="cursor:context-menu;">
                                            {{ $competence->name }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div id="{{ $employee->id }}_competences_selection_card" class="col-xl-12 mt-2 competence_selection_card">
                                <div class="form-group">
                                    <label for="{{ $employee->id }}_competences_selection"></label>
                                    <select id="{{ $employee->id }}_competences_selection" name="{{ $employee->id }}_competences[]" class="form-control selectpicker" multiple>
                                        @foreach($competences as $competence)
                                            <option @if($employee->competences()->where('competence_id', $competence->id)->exists()) selected @endif value="{{ $competence->id }}">{{ $competence->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <br>
                        <br>

                        <div class="row">
                            <div class="col-xl-6 mt-4">
                                Öncelikler
                            </div>
                            <div class="col-xl-6 mb-2 text-right">
                                <a href="{{ route('employee.priorities.edit', $employee) }}" class="btn btn-sm btn-pill btn-secondary" type="button"><i class="fa fa-edit"></i>Düzenle</a>
                            </div>
                        </div>
                        <div class="separator separator-solid"></div>
                        <div class="d-flex align-items-center flex-wrap mt-2">
                            <div id="{{ $employee->id }}_priorities_list_card" class="col-xl-12 mt-2">
                                <div class="row" id="{{ $employee->id }}_priorities_list_row">
                                    @foreach($employee->priorities as $priority)
                                        <a href="{{ route('employee.index.by-priority', $priority) }}" class="btn btn-dark-75 btn-square btn-sm m-1">
                                            {{ $priority->name }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @include('pages.employee.modals.create')
    @include('pages.employee.modals.sync')

@endsection

@section('page-styles')
    @include('pages.employee.components.style')
@stop

@section('page-script')
    @include('pages.employee.components.script')
@stop
