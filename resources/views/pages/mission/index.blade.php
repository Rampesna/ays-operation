@extends('layouts.master')
@section('title', 'Görevlendirmeler')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pt-4 pb-3">
                    Detaylı Arama
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="start_date">Başlangıç Tarihi</label>
                                <input type="datetime-local" id="start_date" value="{{ date('Y-m-d') . 'T00:00' }}" name="start_date" class="form-control receiptsFilterer">
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="end_date">Bitiş Tarihi</label>
                                <input type="datetime-local" id="end_date" value="{{ date('Y-m-d') . 'T23:59' }}" name="end_date" class="form-control receiptsFilterer">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 text-right">
                            <button class="btn btn-sm btn-primary" id="clearFilterButton">Temizle</button>
                            <button class="btn btn-sm btn-success" id="filterButton">Filtrele</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <table class="table" id="missions">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Görev Konusu</th>
                            <th>Durum</th>
                            <th>Oluşturan Hesap</th>
                            <th>Görevi Açan</th>
                            <th>Atanan Hesap</th>
                            <th>İşi Yapacak Olan</th>
                            <th>Başlangıç Tarihi</th>
                            <th>Bitiş Tarihi</th>
                            <th>Tamamlanma Tarihi</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Görev Konusu</th>
                            <th>Durum</th>
                            <th>Oluşturan Hesap</th>
                            <th>Görevi Açan</th>
                            <th>Atanan Hesap</th>
                            <th>İşi Yapacak Olan</th>
                            <th>Başlangıç Tarihi</th>
                            <th>Bitiş Tarihi</th>
                            <th>Tamamlanma Tarihi</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')
    @include('pages.mission.components.style')
@stop

@section('page-script')
    @include('pages.mission.components.script')
@stop
