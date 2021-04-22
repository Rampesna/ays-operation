@extends('layouts.master')
@section('title', 'İş Alımı Yönetimi - Alt Adımlar')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    @include('pages.ik.application.applications.recruiting.settings.settings.evaluation-parameter.components.create')
    @include('pages.ik.application.applications.recruiting.settings.settings.evaluation-parameter.components.edit')

    @include('pages.ik.application.applications.recruiting.settings.settings.evaluation-parameter.modals.delete')

    <div class="row">
        <div class="col-xl-12">
            <div class="card" id="evaluationParameterCard">
                <div class="card-body">
                    <table class="table" id="evaluationParameters">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Parametre</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Parametre</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="context-menu" style="width: 300px">
        <div id="createEvaluationParameterContext">
            <a onclick="createEvaluationParameter()" class="dropdown-item cursor-pointer">
                <div class="row">
                    <div class="col-xl-12">
                        <i class="fas fa-plus-circle text-success"></i><span class="ml-4">Yeni Parametre Ekle</span>
                    </div>
                </div>
            </a>
        </div>
        <div id="editEvaluationParameterContext">
            <hr>
            <a onclick="editEvaluationParameter()" class="dropdown-item cursor-pointer">
                <div class="row">
                    <div class="col-xl-12">
                        <i class="fas fa-pen-alt text-primary"></i><span class="ml-4">Düzenle</span>
                    </div>
                </div>
            </a>
        </div>
        <div id="deleteEvaluationParameterContext">
            <a onclick="deleteEvaluationParameter()" class="dropdown-item cursor-pointer">
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
    @include('pages.ik.application.applications.recruiting.settings.settings.evaluation-parameter.components.style')
@stop

@section('page-script')
    @include('pages.ik.application.applications.recruiting.settings.settings.evaluation-parameter.components.script')
@stop
