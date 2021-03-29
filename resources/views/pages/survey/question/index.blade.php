@extends('layouts.master')
@section('title', 'Anket Soruları')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    @include('pages.survey.question.modals.create')
    @include('pages.survey.question.modals.edit')
    @include('pages.survey.question.modals.delete')

    <div class="row">
        <div class="col-xl-12 text-right">
            <a data-toggle="modal" data-target="#CreateQuestion" class="btn btn-primary">Yeni Oluştur</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <table class="table" id="questions">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>#</th>
                                    <th>Soru</th>
                                    <th>Soru Türü Kodu</th>
                                    <th>Ek Cevap</th>
                                    <th>Sıra Numarası</th>
                                    <th>Grup Kodu</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($questions as $question)
                                    <tr id="row_id_{{ $question['id'] }}">
                                        <td>
                                            <div class="dropdown dropdown-inline">
                                                <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ki ki-bold-more-ver"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                    <ul class="navi navi-hover">
                                                        @if($question['soruTurKodu'] == 3 || $question['soruTurKodu'] == 4)
                                                            <li class="navi-item">
                                                                <a href="{{ route('surveys.answers', ['id' => $question['id'], 'surveyCode' => $question['grupKodu']]) }}"
                                                                   target="_blank"
                                                                   data-id="{{ $question['id'] }}"
                                                                   class="navi-link cursor-pointer">
                                                                    <span class="navi-icon">
                                                                        <i class="fa fa-list-alt text-info"></i>
                                                                    </span>
                                                                    <span class="navi-text">Cevaplar</span>
                                                                </a>
                                                            </li>
                                                            <hr>
                                                        @endif
                                                        <li class="navi-item">
                                                            <a data-id="{{ $question['id'] }}"
                                                               data-toggle="modal"
                                                               data-target="#EditQuestion"
                                                               class="navi-link cursor-pointer edit">
                                                                    <span class="navi-icon">
                                                                        <i class="fa fa-edit"></i>
                                                                    </span>
                                                                <span class="navi-text">Düzenle</span>
                                                            </a>
                                                        </li>
                                                        <li class="navi-item">
                                                            <a data-id="{{ $question['id'] }}"
                                                               data-toggle="modal"
                                                               data-target="#DeleteQuestion"
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
                                        <td>{{ $question['id'] }}</td>
                                        <td>{{ $question['soru'] }}</td>
                                        <td>{{ $question['soruTurKodu'] == 1 ? 'Metin' : ($question['soruTurKodu'] == 2 ? 'Tarih' : ($question['soruTurKodu'] == 3 ? 'Tekli Seçim' : ($question['soruTurKodu'] == 4 ? 'Çoklu Seçim' : 'Diğer'))) }}</td>
                                        <td>{{ $question['ekCevapString'] }}</td>
                                        <td>{{ $question['siraNo'] }}</td>
                                        <td>{{ $question['grupKodu'] }}</td>
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
    @include('pages.survey.question.components.script')
@stop
