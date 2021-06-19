@extends('layouts.master')
@section('title', 'Survey List')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    @include('pages.survey.script.modals.create')
    @include('pages.survey.script.modals.edit')
    @include('pages.survey.script.modals.delete')

    @include('pages.survey.script.modals.connect-survey')
    @include('pages.survey.script.modals.create-seller')

    <div class="row">
        <div class="col-xl-12 text-right">
            <a onclick="createRandomCode()" data-toggle="modal" data-target="#CreateSurvey" class="btn btn-primary">Script Oluştur</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <table class="table" id="surveyList">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>#</th>
                                    <th>Kodu</th>
                                    <th>Adı</th>
                                    <th>Çağrı Nedeni</th>
                                    <th>Açıklaması</th>
                                    <th>Müşteri Bilgilendirmesi 1</th>
                                    <th>Müşteri Bilgilendirmesi 2</th>
                                    <th>Hizmet/Ürün</th>
                                    <th>Fırsat</th>
                                    <th>Çağrı</th>
                                    <th>Arama Planı</th>
                                    <th>Satıcıya Yönlendir Durumunda Fırsat Gönderilsin mi?</th>
                                    <th>Satıcıya Yönlendir Durumunda Arama Planı Gönderilsin mi?</th>
                                    <th>Oluşturulma Tarihi</th>
                                    <th>Durum</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($surveyList as $survey)
                                    <tr id="row_id_{{ @$survey['id'] }}">
                                        <td>
                                            <div class="dropdown dropdown-inline">
                                                <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ki ki-bold-more-ver"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                    <ul class="navi navi-hover">
                                                        <li class="navi-item">
                                                            <a data-code="{{ @$survey['kodu'] }}"
                                                               data-toggle="modal"
                                                               data-target="#ConnectSurvey"
                                                               class="navi-link cursor-pointer connect-survey">
                                                                    <span class="navi-icon">
                                                                        <i class="fa fa-check-circle text-success"></i>
                                                                    </span>
                                                                <span class="navi-text">Alt Script Bağla</span>
                                                            </a>
                                                        </li>
                                                        <li class="navi-item">
                                                            <a href="{{ route('surveys.questions', ['code' => @$survey['kodu'], 'name' => $survey['adi']]) }}"
                                                               target="_blank"
                                                               class="navi-link cursor-pointer">
                                                                    <span class="navi-icon">
                                                                        <i class="fa fa-list-alt text-info"></i>
                                                                    </span>
                                                                <span class="navi-text">Sorular</span>
                                                            </a>
                                                        </li>
                                                        <li class="navi-item">
                                                            <a href="{{ route('surveys.diagram', ['id' => @$survey['id']]) }}"
                                                               target="_blank"
                                                               class="navi-link cursor-pointer">
                                                                    <span class="navi-icon">
                                                                        <i class="fa fa-eye text-primary"></i>
                                                                    </span>
                                                                <span class="navi-text">İncele</span>
                                                            </a>
                                                        </li>
                                                        <li class="navi-item">
                                                            <a href="{{ route('surveys.report.show', ['code' => @$survey['kodu'], 'name' => $survey['adi']]) }}"
                                                               target="_blank"
                                                               class="navi-link cursor-pointer">
                                                                    <span class="navi-icon">
                                                                        <i class="fas fa-chart-bar text-dark-75"></i>
                                                                    </span>
                                                                <span class="navi-text">Rapor</span>
                                                            </a>
                                                        </li>
                                                        <li class="navi-item">
                                                            <a href="{{ route('surveys.report.showByEmployee', ['code' => @$survey['kodu'], 'name' => $survey['adi']]) }}"
                                                               target="_blank"
                                                               class="navi-link cursor-pointer">
                                                                    <span class="navi-icon">
                                                                        <i class="fas fa-user text-danger"></i>
                                                                    </span>
                                                                <span class="navi-text">Personel Raporu</span>
                                                            </a>
                                                        </li>
                                                        <hr>
                                                        <li class="navi-item">
                                                            <a data-id="{{ @$survey['id'] }}"
                                                               data-toggle="modal"
                                                               data-target="#EditSurvey"
                                                               class="navi-link cursor-pointer edit">
                                                                    <span class="navi-icon">
                                                                        <i class="fa fa-edit"></i>
                                                                    </span>
                                                                <span class="navi-text">Düzenle</span>
                                                            </a>
                                                        </li>
                                                        <li class="navi-item">
                                                            <a data-id="{{ @$survey['id'] }}"
                                                               data-toggle="modal"
                                                               data-target="#DeleteSurvey"
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
                                        <td>{{ @$survey['id'] }}</td>
                                        <td>{{ @$survey['kodu'] }}</td>
                                        <td>{{ @$survey['adi'] }}</td>
                                        <td>{{ @$survey['uyumCrmCagriNedeni'] }}</td>
                                        <td><textarea class="form-control" rows="2" style="width: 240px" disabled>{{ @$survey['aciklama'] }}</textarea></td>
                                        <td><textarea class="form-control" rows="2" style="width: 240px" disabled>{{ @$survey['musteriBilgilendirme'] }}</textarea></td>
                                        <td><textarea class="form-control" rows="2" style="width: 240px" disabled>{{ @$survey['musteriBilgilendirme2'] }}</textarea></td>
                                        <td><textarea class="form-control" rows="2" style="width: 240px" disabled>{{ @$survey['uyumCrmHizmetUrun'] }}</textarea></td>
                                        <td>{{ @$survey['uyumCrmFirsat'] == 1 ? 'Evet' : 'Hayır' }}</td>
                                        <td>{{ @$survey['uyumCrmCagri'] == 1 ? 'Evet' : 'Hayır' }}</td>
                                        <td>{{ @$survey['uyumCrmAramaPlani'] == 1 ? 'Evet' : 'Hayır' }}</td>
                                        <td>{{ @$survey['uyumCrmFirsatSaticiyaYonlendir'] == 1 ? 'Evet' : 'Hayır' }}</td>
                                        <td>{{ @$survey['uyumCrmAramaPlaniSaticiyaYonlendir'] == 1 ? 'Evet' : 'Hayır' }}</td>
                                        <td>{{ @$survey['durum'] }}</td>
                                        <td>{{ @$survey['tarih'] }}</td>
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
    @include('pages.survey.script.components.script')
@stop
