@extends('layouts.master')
@section('title', 'Cevaplar')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    @include('pages.survey.answer.modals.create')
    @include('pages.survey.answer.modals.edit')
    @include('pages.survey.answer.modals.delete')

    <div class="row">
        <div class="col-xl-12 text-right">
            <a data-toggle="modal" data-target="#CreateAnswer" class="btn btn-primary">Yeni Oluştur</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <table class="table" id="answers">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>#</th>
                                    <th>Cevap</th>
                                    <th>Sıra</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($answers as $answer)
                                    <tr id="row_id_{{ $answer['id'] }}">
                                        <td>
                                            <div class="dropdown dropdown-inline">
                                                <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ki ki-bold-more-ver"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                    <ul class="navi navi-hover">
                                                        <li class="navi-item">
                                                            <a data-id="{{ $answer['id'] }}"
                                                               data-toggle="modal"
                                                               data-target="#EditAnswer"
                                                               class="navi-link cursor-pointer edit">
                                                                    <span class="navi-icon">
                                                                        <i class="fa fa-edit"></i>
                                                                    </span>
                                                                <span class="navi-text">Düzenle</span>
                                                            </a>
                                                        </li>
                                                        <li class="navi-item">
                                                            <a data-id="{{ $answer['id'] }}"
                                                               data-toggle="modal"
                                                               data-target="#DeleteAnswer"
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
                                        <td>{{ $answer['id'] }}</td>
                                        <td>{{ $answer['cevap'] }}</td>
                                        <td>{{ $answer['siraNo'] }}</td>
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
    @include('pages.survey.answer.components.script')
@stop
