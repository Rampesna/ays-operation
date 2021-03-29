@extends('layouts.master')
@section('title', 'Toplu İşlemler')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    <div class="row clearfix">
        <div class="col-12">
            <div class="row">
                <div class="col-xl-3">
                    <label style="width: 100%">
                        <input type="text" id="search_employee" class="form-control" placeholder="Arayın...">
                    </label>
                </div>
                <div class="col-xl-3 col-md-3 col-sm-12">
                    <label style="width: 100%">
                        <select class="form-control selectpicker" id="typeFilterer">
                            <option value="all">Tümü</option>
                            <option value="yetkiEgitim">Eğitim Yetkisi</option>
                            <option value="yetkiGorevlendirme">Görevlendirme Yetkisi</option>
                            <option value="takimLideri">Takım Lideri Yetkisi</option>
                            <option value="takimLideriYardimcisi">Takım Lideri Yardımcısı Yetkisi</option>
                        </select>
                    </label>
                </div>
                <div class="col-xl-2 col-md-2 col-sm-12">
                    <button type="button" id="select_all" class="btn btn-block btn-success">Tümünü Seç</button>
                </div>
                <div class="col-xl-2 col-md-2 col-sm-12">
                    <button type="button" id="deselect_all" class="btn btn-block btn-secondary">Tümünü Kaldır</button>
                </div>
                <div class="col-xl-2 col-md-3 col-sm-12">
                    <div id="" class="input-group ui-select">
                        <label for="batch_action_type"></label>
                        <select name="batch_action_type" id="batch_action_type" class="form-control" data-live-search="true">
                            <option value="" disabled selected hidden>İşlem Seçin</option>
                            <option value="1">Eğitim Yetkisi</option>
                            <option value="2">Görevlendirme Yetkisi</option>
                            <option value="3">Takım Destek Yetkisi</option>
                            <option value="4">Takım Lideri Yardımcısı Yetkisi</option>
                        </select>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row clearfix">
                @foreach($employees as $data)
                    @if($employee = \App\Models\Employee::where('guid', $data['id'])->first())
                    <div onclick="setChecked({{ $employee->id }})"
                         class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12 cursor-pointer each_employee @if($data['yetkiEgitim'] == 1) yetkiEgitim @endif @if($data['yetkiGorevlendirme'] == 1) yetkiGorevlendirme @endif @if($data['takimLideri'] == 1) takimLideri @endif @if($data['takimLideriYardimcisi'] == 1) takimLideriYardimcisi @endif">
                        <div class="card card-custom gutter-b card-stretch">
                            <div class="card-body pt-4 pb-5">
                                <div class="d-flex align-items-center">
                                    <label class="checkbox checkbox-primary" style="margin-top: -20px; margin-right:10px">
                                        <input class="employee_selector" multiple id="checkbox_{{ $employee->id }}" type="checkbox" name="employees[]" value="{{ $employee->id }}" />
                                        <span></span>
                                    </label>
                                    <div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
                                        <div class="symbol symbol-circle symbol-lg-75">
                                            <img src="{{ !is_null($employee->image) ? asset($employee->image) : asset('assets/media/logos/avatar.jpg') }}" alt="image" />
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="text-dark font-weight-bold font-size-h6 mb-0 employee-name">{{ ucwords($employee->name) }}</span>
                                        <p>
                                            @if($data['yetkiEgitim'] == 1)
                                                <span class="btn btn-pill btn-sm btn-warning m-1" style="font-size: 11px; height: 20px; padding-top: 2px">Eğitim Yetkisi</span>
                                            @endif
                                            @if($data['yetkiGorevlendirme'] == 1)
                                                <span class="btn btn-pill btn-sm btn-info m-1" style="font-size: 11px; height: 20px; padding-top: 2px">Görevlendirme Yetkisi</span>
                                            @endif
                                            @if($data['takimLideri'] == 1)
                                                <span class="btn btn-pill btn-sm btn-danger m-1" style="font-size: 11px; height: 20px; padding-top: 2px">Takım Lideri Yetkisi</span>
                                            @endif
                                            @if($data['takimLideriYardimcisi'] == 1)
                                                <span class="btn btn-pill btn-sm btn-primary m-1" style="font-size: 11px; height: 20px; padding-top: 2px">Takım Lideri Yardımcısı Yetkisi</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    @include('pages.application.applications.batch-actions.modals.change-education')
    @include('pages.application.applications.batch-actions.modals.change-assignment')
    @include('pages.application.applications.batch-actions.modals.change-team-support')
    @include('pages.application.applications.batch-actions.modals.change-team-support-assistant')

@endsection

@section('page-styles')

@stop

@section('page-script')
    @include('pages.application.applications.batch-actions.components.script')
@stop
