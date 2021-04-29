@extends('layouts.master')
@section('title', 'Personel Takibi')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    <form action="#">
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
                    <table class="table" id="positions">
                        <thead>
                        <tr>
                            <th>Ad Soyad</th>
                            <th>Aktif Ekran Adı</th>
                            <th>Local PC IP</th>
                            <th>Dış IP</th>
                            <th>PC Adı</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list as $item)
                            <tr>
                                <td>{{ $item['kullaniciAdSoyad'] }}</td>
                                <td>{{ $item['aktifEkranAdi'] }}</td>
                                <td>{{ $item['localPcIp'] }}</td>
                                <td>{{ $item['disPcIp'] }}</td>
                                <td>{{ $item['pcName'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Ad Soyad</th>
                            <th>Aktif Ekran Adı</th>
                            <th>Local PC IP</th>
                            <th>Dış IP</th>
                            <th>PC Adı</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')
    @include('pages.management-report.employee-monitoring.components.style')
@stop

@section('page-script')
    @include('pages.management-report.employee-monitoring.components.script')
@stop
