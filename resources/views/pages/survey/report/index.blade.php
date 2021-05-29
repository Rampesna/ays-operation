@extends('layouts.master')
@section('title', 'Raporlar')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    <div class="row">
        @for($counter = 1; $counter <= 7; $counter++)
            <div class="col-xl-3 mb-4">
                <div class="card bg-white">
                    <div class="card-header border-0 bg-dark-75 py-5 text-center">
                        <h3 class="font-weight-bolder text-white text-center">Başlık</h3>
                    </div>
                    <div class="card-body p-0 position-relative overflow-hidden">
                        <div class="card-rounded-bottom bg-dark-75" style="height: 60px; min-height: 60px;"></div>
                        <div class="card-spacer mt-n25">
                            <div class="row m-0">
                                <div class="col-6 mb-4">
                                    <div class="card dataCardSelector" data-id="0">
                                        <div class="card-body">
                                            <span class="card-title font-weight-bolder font-size-h2 mb-0 d-block dataCardSelectorCounter">#</span>
                                            <span class="font-weight-bold font-size-sm dataCardSelectorTitle">#</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-4">
                                    <div class="card dataCardSelector" data-id="0">
                                        <div class="card-body">
                                            <span class="card-title font-weight-bolder font-size-h2 mb-0 d-block dataCardSelectorCounter">#</span>
                                            <span class="font-weight-bold font-size-sm dataCardSelectorTitle">#</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-4">
                                    <div class="card dataCardSelector" data-id="0">
                                        <div class="card-body">
                                            <span class="card-title font-weight-bolder font-size-h2 mb-0 d-block dataCardSelectorCounter">#</span>
                                            <span class="font-weight-bold font-size-sm dataCardSelectorTitle">#</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-4">
                                    <div class="card dataCardSelector" data-id="0">
                                        <div class="card-body">
                                            <span class="card-title font-weight-bolder font-size-h2 mb-0 d-block dataCardSelectorCounter">#</span>
                                            <span class="font-weight-bold font-size-sm dataCardSelectorTitle">#</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="resize-triggers">
                            <div class="expand-trigger">
                                <div style="width: 365px; height: 496px;"></div>
                            </div>
                            <div class="contract-trigger"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>

@endsection

@section('page-styles')
    @include('pages.survey.report.components.style')
@stop

@section('page-script')
    @include('pages.survey.report.components.script')
@stop
