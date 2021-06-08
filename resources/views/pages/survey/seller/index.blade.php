@extends('layouts.master')
@section('title', 'Survey List')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    @include('pages.survey.seller.modals.create')
    @include('pages.survey.seller.modals.edit')
    @include('pages.survey.seller.modals.delete')


    <div class="row">
        <div class="col-xl-12 text-right">
            <a data-toggle="modal" data-target="#CreateSeller" class="btn btn-primary">Yeni Oluştur</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <table class="table" id="sellers">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>#</th>
                                    <th>Satıcı Kodu</th>
                                    <th>Satıcı Adı</th>
                                    <th>Script Kodu</th>
                                    <th>Ürün Kodu</th>
                                    <th>Script Adı</th>
                                    <th>Durum</th>
                                    <th>Atama Sayısı</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sellers as $seller)
                                    <tr>
                                        <td>
                                            <div class="dropdown dropdown-inline">
                                                <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ki ki-bold-more-ver"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                    <ul class="navi navi-hover">
                                                        <li class="navi-item">
                                                            <a data-id="{{ $seller['id'] }}"
                                                               data-code="{{ $seller['saticiKodu'] }}"
                                                               class="navi-link cursor-pointer edit">
                                                                <span class="navi-icon">
                                                                    <i class="fa fa-edit"></i>
                                                                </span>
                                                                <span class="navi-text">Düzenle</span>
                                                            </a>
                                                        </li>
                                                        <li class="navi-item">
                                                            <a data-id="{{ $seller['id'] }}"
                                                               data-code="{{ $seller['saticiKodu'] }}"
                                                               class="navi-link cursor-pointer delete">
                                                                <span class="navi-icon">
                                                                    <i class="fa fa-trash-alt text-danger"></i>
                                                                </span>
                                                                <span class="navi-text text-danger">Sil</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $seller['id'] }}</td>
                                        <td>{{ $seller['saticiKodu'] }}</td>
                                        <td>{{ $seller['saticiAdi'] }}</td>
                                        <td>{{ $seller['grupKodu'] }}</td>
                                        <td>{{ $seller['urunKodu'] }}</td>
                                        <td>{{ $seller['adi'] }}</td>
                                        <td>{{ $seller['durum'] }}</td>
                                        <td>{{ $seller['atamaSayisi'] }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.3') }}" rel="stylesheet" type="text/css"/>

    <style>
        .ays-col-5 {
            -ms-flex: 0 0 20.00%;
            flex: 0 0 20.00%;
            max-width: 20.00%;
            position: relative;
            padding-right: 4px;
            padding-left: 4px;
            margin-top: -5px;
        }
    </style>
@stop

@section('page-script')
    @include('pages.survey.seller.components.script')
@stop
