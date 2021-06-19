@extends('layouts.master')
@section('title', 'Personel Raporu')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    @include('pages.survey.report.showByEmployee.modals.report')
    @include('pages.survey.report.showByEmployee.modals.called-report')
    @include('pages.survey.report.showByEmployee.modals.remaining-report')

    <div class="row">
        <div class="col-xl-8">
            <h4>{{ $name }}</h4>
        </div>
        <div class="col-xl-4 text-right">
            <button class="btn btn-sm btn-primary" id="getReports" style="display: none">Raporla</button>
        </div>
    </div>
    <input type="hidden" id="selecteds">
    <input type="hidden" id="selected_name">
    <hr>
    <div class="row">
        <div class="col-xl-3">
            <div class="card card-custom gutter-b" style="height: 100px;">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex align-items-center justify-content-between flex-grow-1">
                        <div class="mr-2">
                            <h3 class="font-weight-bolder">Toplam Arama Sayısı</h3>
                        </div>
                        <div class="font-weight-boldest font-size-h1 text-primary">{{ $list ? @$list[0]['toplamadata'] : '' }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card card-custom gutter-b cursor-pointer" id="getCallReports" style="height: 100px;">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex align-items-center justify-content-between flex-grow-1">
                        <div class="mr-2">
                            <h3 class="font-weight-bolder">Toplam Aranan Firma</h3>
                        </div>
                        <div class="font-weight-boldest font-size-h1 text-success">{{ $list ? @$list[0]['aranandata'] : '' }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card card-custom gutter-b cursor-pointer" id="getRemainingReports" style="height: 100px;">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex align-items-center justify-content-between flex-grow-1">
                        <div class="mr-2">
                            <h3 class="font-weight-bolder">Kalan Arama Sayısı</h3>
                        </div>
                        <div class="font-weight-boldest font-size-h1 text-warning">{{ $list ? @$list[0]['kalandata'] : '' }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card card-custom gutter-b cursor-pointer" id="getNotContactCustomers" style="height: 100px;" data-id="{{ $list ? @$list[\App\Helpers\General::searchForKeyword('pazarlamaDurumKodu', 1, $list)]['pazarlamaDurumKodu'] : '' }}">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex align-items-center justify-content-between flex-grow-1">
                        <div class="mr-2">
                            <h3 class="font-weight-bolder">Müşteriye Ulaşılamadı</h3>
                        </div>
                        <div class="font-weight-boldest font-size-h1 text-danger">{{ $list ? @$list[\App\Helpers\General::searchForKeyword('pazarlamaDurumKodu', 1, $list)]['aranandatA1'] : '' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="mt-n3">
    <div class="row">
        @foreach($employees as $employee)
            <div class="col-xl-2 mb-3">
                <div class="card">
                    <div class="card-header">
                        <h6>{{ @$employee['name'] }}</h6>
                    </div>
                    <div class="card-body">
                        @foreach($employee['data'] as $key => $data)
                            <span data-status-id="{{ $key }}" data-employee-name="{{ $employee['name'] }}" id="employee_{{ $employee['name'] }}_status_{{ $key }}" class="btn btn-pill btn-sm btn-secondary mb-2 statusSelector" style="font-size: 11px; height: auto; padding-top: 2px; width: 100%">{{ @$data['name'] }} ({{ @$data['count'] }})</span><br>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection

@section('page-styles')
    @include('pages.survey.report.showByEmployee.components.style')
@stop

@section('page-script')
    @include('pages.survey.report.showByEmployee.components.script')
@stop
