@extends('layouts.master')
@section('title', 'İş Alımı Yönetimi - Alt Adımlar')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    @include('pages.ik.application.applications.recruiting.settings.settings.steps.components.edit')

    <div class="row">
        <div class="col-xl-12">
            <div class="card" id="recruitingStepCard">
                <div class="card-body">
                    <table class="table" id="recruitingSteps">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Adı</th>
                            <th>Rengi</th>
                            <th>Bağlı Olduğu Departman</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Adı</th>
                            <th>Rengi</th>
                            <th>Bağlı Olduğu Departman</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="context-menu" style="width: 300px">

        <div id="editRecruitingStepContext">
            <a onclick="editRecruitingStep()" class="dropdown-item cursor-pointer">
                <div class="row">
                    <div class="col-xl-12">
                        <i class="fas fa-pen-alt text-primary"></i><span class="ml-4">Düzenle</span>
                    </div>
                </div>
            </a>
        </div>

    </div>

@endsection

@section('page-styles')
    @include('pages.ik.application.applications.recruiting.settings.settings.steps.components.style')
@stop

@section('page-script')
    @include('pages.ik.application.applications.recruiting.settings.settings.steps.components.script')
@stop
