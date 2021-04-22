@extends('layouts.master')
@section('title', 'İş Alımı Yönetimi')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    @include('pages.ik.application.applications.recruiting.components.create-recruiting')
    @include('pages.ik.application.applications.recruiting.components.edit-recruiting')

    @include('pages.ik.application.applications.recruiting.modals.delete')
    @include('pages.ik.application.applications.recruiting.modals.delete-evaluation-parameter')
    @include('pages.ik.application.applications.recruiting.modals.reactivate')

    <div class="row">
        <div class="col-xl-12 text-right">
            <a href="{{ route('ik.application.recruiting.calendar') }}" class="btn btn-sm btn-primary">Randevu Takvimi</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <table class="table" id="recruitings">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Aşama</th>
                            <th>Ad Soyad</th>
                            <th>E-posta Adresi</th>
                            <th>Telefon Numarası</th>
                            <th>Kimlik Numarası</th>
                            <th>Doğum Tarihi</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Aşama</th>
                            <th>Ad Soyad</th>
                            <th>E-posta Adresi</th>
                            <th>Telefon Numarası</th>
                            <th>Kimlik Numarası</th>
                            <th>Doğum Tarihi</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="context-menu" style="width: 300px">
        <div id="openSettingContext">
            <a onclick="openSettings()" class="dropdown-item cursor-pointer">
                <div class="row">
                    <div class="col-xl-12">
                        <i class="fas fa-cog text-dark-75"></i><span class="ml-4">Ayarlara Git</span>
                    </div>
                </div>
            </a>
        </div>

        <div id="createRecruitingContext">
            <hr>
            <a onclick="createRecruiting()" class="dropdown-item cursor-pointer">
                <div class="row">
                    <div class="col-xl-12">
                        <i class="fas fa-plus-circle text-success"></i><span class="ml-4">Yeni İşe Alım Başlat</span>
                    </div>
                </div>
            </a>
        </div>

        <div id="showRecruitingContext">
            <a onclick="showRecruiting()" class="dropdown-item cursor-pointer">
                <div class="row">
                    <div class="col-xl-12">
                        <i class="fas fa-fast-forward text-info"></i><span class="ml-4">İlerlemeyi Görüntüle</span>
                    </div>
                </div>
            </a>
        </div>

        <div id="editRecruitingContext">
            <a onclick="editRecruiting()" class="dropdown-item cursor-pointer">
                <div class="row">
                    <div class="col-xl-12">
                        <i class="fas fa-pen-alt text-primary"></i><span class="ml-4">Düzenle</span>
                    </div>
                </div>
            </a>
        </div>

        <div id="deleteRecruitingContext">
            <a onclick="deleteRecruiting()" class="dropdown-item cursor-pointer">
                <div class="row">
                    <div class="col-xl-12">
                        <i class="fas fa-trash-alt text-danger"></i><span class="ml-4">Sil</span>
                    </div>
                </div>
            </a>
        </div>

        <div id="reactivateRecruitingContext">
            <a onclick="reactivateRecruiting()" class="dropdown-item cursor-pointer">
                <div class="row">
                    <div class="col-xl-12">
                        <i class="fas fa-undo-alt text-warning"></i><span class="ml-4">Tekrar Havuza Aktar</span>
                    </div>
                </div>
            </a>
        </div>

    </div>

@endsection

@section('page-styles')
    @include('pages.ik.application.applications.recruiting.components.style')
@stop

@section('page-script')
    @include('pages.ik.application.applications.recruiting.components.script')
@stop
