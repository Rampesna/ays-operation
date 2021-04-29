@extends('layouts.master')
@section('title', 'Personel Takibi')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    @include('pages.management-report.screen-monitoring.detail.modals.show-image')

    <form action="#">
        <input type="hidden" name="guid" value="{{ $guid }}">
        <div class="row">
            <div class="col-xl-3">
                <div class="form-group">
                    <label for="start_date">Başlangıç Tarihi</label>
                    <input type="datetime-local" id="start_date" name="start_date" class="form-control" value="{{ date('Y-m-d', strtotime($startDate)) . 'T' . date('H:i', strtotime($startDate)) }}">
                </div>
            </div>
            <div class="col-xl-3">
                <div class="form-group">
                    <label for="end_date">Bitiş Tarihi</label>
                    <input type="datetime-local" id="end_date" name="end_date" class="form-control" value="{{ date('Y-m-d', strtotime($endDate)) . 'T' . date('H:i', strtotime($endDate)) }}">
                </div>
            </div>
            <div class="col-xl-6">
                <button type="submit" class="btn btn-success btn-sm mt-9">Ara</button>
            </div>
        </div>
    </form>
    <hr>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <table class="table" id="details">
                        <thead>
                        <tr>
                            <th>Ad Soyad</th>
                            <th>Aktif Ekran Adı</th>
                            <th>Local PC IP</th>
                            <th>Dış IP</th>
                            <th>Tarih</th>
                            <th>Resim</th>
                            <th>Url</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($details as $item)
                            <tr>
                                <td>{{ $item['kullaniciAdSoyad'] }}</td>
                                <td>{{ $item['aktifEkranAdi'] }}</td>
                                <td>{{ $item['localPcIp'] }}</td>
                                <td>{{ $item['disPcIp'] }}</td>
                                <td>{{ $item['kayitTarihi'] }}</td>
                                <td><img style="width: 250px; height: auto" src="{{ $item['aktifEkranLink'] }}"></td>
                                <td>{{ $item['aktifEkranLink'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Ad Soyad</th>
                            <th>Aktif Ekran Adı</th>
                            <th>Local PC IP</th>
                            <th>Dış IP</th>
                            <th>Tarih</th>
                            <th>Resim</th>
                            <th>Url</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
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
    </div>

    <input type="hidden" id="selectedImage">

@endsection

@section('page-styles')
    @include('pages.management-report.screen-monitoring.detail.components.style')
@stop

@section('page-script')
    @include('pages.management-report.screen-monitoring.detail.components.script')
@stop
