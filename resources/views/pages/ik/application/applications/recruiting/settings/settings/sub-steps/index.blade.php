@extends('layouts.master')
@section('title', 'İş Alımı Yönetimi - Alt Adımlar')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    @include('pages.ik.application.applications.recruiting.settings.settings.sub-steps.components.create')
    @include('pages.ik.application.applications.recruiting.settings.settings.sub-steps.components.edit')

    @include('pages.ik.application.applications.recruiting.settings.settings.sub-steps.modals.delete')

    <div class="row">
        <div class="col-xl-12">
            <div class="card" id="recruitingStepSubStepCard">
                <div class="card-body">
                    <table class="table" id="recruitingStepSubSteps">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Adı</th>
                            <th>Bağlı Olduğu Aşama</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Adı</th>
                            <th>Bağlı Olduğu Aşama</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="context-menu" style="width: 300px">
        <div id="createRecruitingStepSubStepContext">
            <a onclick="createRecruitingStepSubStep()" class="dropdown-item cursor-pointer">
                <div class="row">
                    <div class="col-xl-12">
                        <i class="fas fa-plus-circle text-success"></i><span class="ml-4">Yeni Alt Görev Ekle</span>
                    </div>
                </div>
            </a>
        </div>
        <div id="editRecruitingStepSubStepContext">
            <hr>
            <a onclick="editRecruitingStepSubStep()" class="dropdown-item cursor-pointer">
                <div class="row">
                    <div class="col-xl-12">
                        <i class="fas fa-pen-alt text-primary"></i><span class="ml-4">Seçili Alt Görev Düzenle</span>
                    </div>
                </div>
            </a>
        </div>
        <div id="deleteRecruitingStepSubStepContext">
            <a onclick="deleteRecruitingStepSubStep()" class="dropdown-item cursor-pointer">
                <div class="row">
                    <div class="col-xl-12">
                        <i class="fas fa-trash-alt text-danger"></i><span class="ml-4">Seçili Alt Görev Sil</span>
                    </div>
                </div>
            </a>
        </div>
    </div>

@endsection

@section('page-styles')
    @include('pages.ik.application.applications.recruiting.settings.settings.sub-steps.components.style')
@stop

@section('page-script')
    @include('pages.ik.application.applications.recruiting.settings.settings.sub-steps.components.script')
@stop
