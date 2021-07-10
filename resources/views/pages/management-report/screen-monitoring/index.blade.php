@extends('layouts.master')
@section('title', 'Ekran Takibi')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    @include('pages.management-report.screen-monitoring.modals.show-image')

    <form action="#">
        <div class="row mt-n5">
            <div class="col-xl-3 mt-2">
                <div class="form-group">
                    <label for="name-searching"></label>
                    <input type="text" name="name-searching" id="name-searching" class="form-control" placeholder="İsme Göre Arayın...">
                </div>
            </div>
            <div class="col-xl-3">

            </div>
            <div class="col-xl-2 text-right">
                <button class="btn btn-success btn-sm mt-9">Ara</button>
            </div>
            <div class="col-xl-2 text-right">
                <div class="form-group">
                    <label for="start_date">Başlangıç Tarihi</label>
                    <input type="datetime-local" id="start_date" name="start_date" class="form-control" value="{{ date('Y-m-d', strtotime($startDate)) . 'T' . date('H:i', strtotime($startDate)) }}">
                </div>
            </div>
            <div class="col-xl-2 text-right">
                <div class="form-group">
                    <label for="end_date">Bitiş Tarihi</label>
                    <input type="datetime-local" id="end_date" name="end_date" class="form-control" value="{{ date('Y-m-d', strtotime($endDate)) . 'T' . date('H:i', strtotime($endDate)) }}">
                </div>
            </div>
        </div>
    </form>
    <hr class="mt-n3">
    <div class="row">
        @foreach(collect($list)->sortBy('kullaniciAdSoyad')->all() as $item)
            <div id="employee_{{ $item->kullanicilarId }}" data-guid="{{ $item->kullanicilarId }}" data-image="{{ $item->resim ?? asset('assets/media/logos/avatar.jpg') }}" class="col-xl-3 col-12 mb-5 each_employee">
                <div class="card">
                    <div class="card-header pt-5 pb-2 text-center">
                        <h4 class="employee-name">{{ $item->kullaniciAdSoyad }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <img style="width: 100%; height: auto" src="{{ $item->resim ?? asset('assets/media/logos/avatar.jpg') }}" alt="image" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    </div>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="context-menu" style="width: 300px">
        <div id="createExtraContext">
            <a onclick="showImage()" class="dropdown-item cursor-pointer">
                <div class="row">
                    <div class="col-xl-12">
                        <i class="far fa-image text-success"></i><span class="ml-4">Resmi Görüntüle</span>
                    </div>
                </div>
            </a>
        </div>
        @Authority(52)
        <div id="editExtraContext">
            <hr>
            <a onclick="showDetail()" class="dropdown-item cursor-pointer">
                <div class="row">
                    <div class="col-xl-12">
                        <i class="far fa-list-alt text-primary"></i><span class="ml-4">Detaylara Git</span>
                    </div>
                </div>
            </a>
        </div>
        @endAuthority
    </div>

    <input type="hidden" id="selectedEmployee">

@endsection

@section('page-styles')
    @include('pages.management-report.screen-monitoring.components.style')
@stop

@section('page-script')
    @include('pages.management-report.screen-monitoring.components.script')
@stop
