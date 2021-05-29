@extends('layouts.master')
@section('title', 'Rapor')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    @include('pages.survey.report.show.modals.report')
    @include('pages.survey.report.show.modals.called-report')
    @include('pages.survey.report.show.modals.remaining-report')

    <div class="row">
        <div class="col-xl-12">
            <h4>{{ $name }}</h4>
        </div>
    </div>
    <hr>
    <input type="hidden" id="selecteds">
    <div class="row">
        <div class="col-xl-3">
            <div class="corm-group">
                <label for="start_date">Başlangıç Tarihi</label>
                <input type="datetime-local" class="form-control" id="start_date">
            </div>
        </div>
        <div class="col-xl-3">
            <div class="corm-group">
                <label for="end_date">Başlangıç Tarihi</label>
                <input type="datetime-local" class="form-control" id="end_date">
            </div>
        </div>
        <div class="col-xl-3"></div>
        <div class="col-xl-3 mt-9">
            <button class="btn btn-sm btn-block btn-primary" id="getReports" style="display: none">Raporla</button>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-3">
            <div class="card card-custom gutter-b" style="height: 100px;">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex align-items-center justify-content-between flex-grow-1">
                        <div class="mr-2">
                            <h3 class="font-weight-bolder">Toplam Arama Sayısı</h3>
                        </div>
                        <div class="font-weight-boldest font-size-h1 text-primary">{{ @$list[0]['toplamadata'] }}</div>
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
                        <div class="font-weight-boldest font-size-h1 text-success">{{ @$list[0]['aranandata'] }}</div>
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
                        <div class="font-weight-boldest font-size-h1 text-warning">{{ @$list[0]['kalandata'] }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card card-custom gutter-b" style="height: 100px;">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex align-items-center justify-content-between flex-grow-1">
                        <div class="mr-2">
                            <h3 class="font-weight-bolder">Müşteriye Ulaşılamadı</h3>
                        </div>
                        <div class="font-weight-boldest font-size-h1 text-danger">{{ $list[\App\Helpers\General::searchForKeyword('pazarlamaDurumKodu', 1, $list)]['aranandatA1'] }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="mt-n3">
    <div class="row">
        @foreach($list as $data)
            @if($data['pazarlamaDurumKodu'] != 1 && ($data['adi'] != null || $data['adi'] != ''))
                <div class="col-xl-2 mb-3">
                    <div class="card dataCardSelector" data-id="{{ $data['pazarlamaDurumKodu'] }}">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-2x svg-icon-dark-75 dataCardSelectorIcon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     width="24px" height="24px" viewBox="0 0 24 24">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                        <rect fill="#000000" x="11" y="10" width="2" height="7" rx="1"/>
                                        <rect fill="#000000" x="11" y="7" width="2" height="2" rx="1"/>
                                    </g>
                                </svg>
                            </span>
                            <span class="card-title font-weight-bolder font-size-h2 mb-0 mt-6 d-block dataCardSelectorCounter">{{ $data['aranandatA1'] }} ({{ number_format(($data['aranandatA1'] * 100) / ($data['aranandata'] - $list[\App\Helpers\General::searchForKeyword('pazarlamaDurumKodu', 1, $list)]['aranandatA1']), 2) }}%)</span>
                            <span class="font-weight-bold font-size-sm dataCardSelectorTitle">{{ $data['adi'] }}</span>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div id="reportChart"></div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')
    @include('pages.survey.report.show.components.style')
@stop

@section('page-script')
    @include('pages.survey.report.show.components.script')
@stop
