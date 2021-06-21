@extends('layouts.master')
@section('title', 'Görevlendirmeler')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    @include('pages.mission.modals.create')
    @include('pages.mission.modals.edit')
    @include('pages.mission.modals.delete')

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
            <div class="card" id="missionsCard">
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

    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="context-menu" style="width: 300px">
        <a onclick="create()" class="dropdown-item cursor-pointer">
            <div class="row">
                <div class="col-xl-12">
                    <i class="fas fa-plus-circle text-success"></i><span class="ml-4">Yeni Oluştur</span>
                </div>
            </div>
        </a>
        <div id="EditingContexts">
            <hr>

            <a onclick="edit()" class="dropdown-item cursor-pointer">
                <div class="row">
                    <div class="col-xl-12">
                        <i class="fas fa-pen text-primary"></i><span class="ml-4">Düzenle</span>
                    </div>
                </div>
            </a>

            <a onclick="drop()" class="dropdown-item cursor-pointer">
                <div class="row">
                    <div class="col-xl-12">
                        <i class="fas fa-trash-alt text-danger"></i><span class="ml-4">Sil</span>
                    </div>
                </div>
            </a>
        </div>
    </div>

@endsection

@section('page-styles')
    @include('pages.mission.components.style')
@stop

@section('page-script')
    @include('pages.mission.components.script')
@stop
