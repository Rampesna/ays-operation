@extends('layouts.master')
@section('title', 'Toplu İşlemler')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))
@php(setlocale(LC_TIME, 'Turkish'))

@section('content')

    @include('pages.ik.application.applications.batch-actions.modals.create-overtime')

    <div class="row clearfix">
        <div class="col-12">
            <div class="row">
                <div class="col-xl-3">
                    <label style="width: 100%">
                        <input type="text" id="search_employee" class="form-control" placeholder="Arayın...">
                    </label>
                </div>
                <div class="col-xl-3 col-md-3 col-sm-12">

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
                            <option value="1">Fazla Mesai Oluştur</option>
                        </select>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row clearfix">
                @foreach($positions as $position)
                    <div onclick="setChecked({{ $position->employee->id }})" class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12 cursor-pointer each_employee">
                        <div class="card card-custom gutter-b card-stretch">
                            <div class="card-body pt-4 pb-5">
                                <div class="d-flex align-items-center">
                                    <label class="checkbox checkbox-primary" style="margin-top: -20px; margin-right:10px">
                                        <input class="employee_selector" multiple id="checkbox_{{ $position->employee->id }}" type="checkbox" name="employees[]" value="{{ $position->employee->id }}" />
                                        <span></span>
                                    </label>
                                    <div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
                                        <div class="symbol symbol-circle symbol-lg-75">
                                            <img src="{{ !is_null($position->employee->image) ? asset($position->employee->image) : asset('assets/media/logos/avatar.jpg') }}" alt="image" />
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="text-dark font-weight-bold font-size-h6 mb-0 employee-name">{{ ucwords($position->employee->name) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection

@section('page-styles')
    @include('pages.ik.application.applications.batch-actions.components.style')
@stop

@section('page-script')
    @include('pages.ik.application.applications.batch-actions.components.script')
@stop
