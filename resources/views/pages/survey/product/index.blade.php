@extends('layouts.master')
@section('title', 'Survey List')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    @include('pages.survey.product.modals.create')
    @include('pages.survey.product.modals.edit')
    @include('pages.survey.product.modals.delete')

    @Authority(41)
    <div class="row">
        <div class="col-xl-12 text-right">
            <a data-toggle="modal" data-target="#CreateProduct" class="btn btn-primary">Yeni Oluştur</a>
        </div>
    </div>
    <hr>
    @endAuthority
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <table class="table" id="products">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>#</th>
                                    <th>Kodu</th>
                                    <th>Adı</th>
                                    <th>Durum</th>
                                    <th>E-posta Başlık</th>
                                    <th>E-posta İçerik</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr id="row_id_{{ $product['id'] }}">
                                        <td>
                                            <div class="dropdown dropdown-inline">
                                                <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ki ki-bold-more-ver"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                    <ul class="navi navi-hover">
                                                        @Authority(42)
                                                        <li class="navi-item">
                                                            <a data-id="{{ $product['id'] }}"
                                                               class="navi-link cursor-pointer edit">
                                                                    <span class="navi-icon">
                                                                        <i class="fa fa-edit"></i>
                                                                    </span>
                                                                <span class="navi-text">Düzenle</span>
                                                            </a>
                                                        </li>
                                                        @endAuthority
                                                        @Authority(43)
                                                        <li class="navi-item">
                                                            <a data-id="{{ $product['id'] }}"
                                                               class="navi-link cursor-pointer delete">
                                                                    <span class="navi-icon">
                                                                        <i class="fa fa-trash-alt text-danger"></i>
                                                                    </span>
                                                                <span class="navi-text text-danger">Sil</span>
                                                            </a>
                                                        </li>
                                                        @endAuthority
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $product['id'] }}</td>
                                        <td>{{ $product['kodu'] }}</td>
                                        <td>{{ $product['adi'] }}</td>
                                        <td>{{ $product['durum'] }}</td>
                                        <td>{{ $product['epostaBaslik'] }}</td>
                                        <td>{{ $product['epostaIcerik'] }}</td>
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
    @include('pages.survey.product.components.script')
@stop
