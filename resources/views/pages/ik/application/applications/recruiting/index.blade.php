@extends('layouts.master')
@section('title', 'İş Alımı Yönetimi')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    @include('pages.ik.application.applications.recruiting.components.create-recruiting')
    @include('pages.ik.application.applications.recruiting.components.show-recruiting')

    @include('pages.ik.application.applications.recruiting.modals.next-step-recruiting')
    @include('pages.ik.application.applications.recruiting.modals.cancel-recruiting')
    @include('pages.ik.application.applications.recruiting.modals.set-recruiting-step-sub-step-check')
    @include('pages.ik.application.applications.recruiting.modals.show-recruiting-step-sub-step-check-activities')

    <input type="hidden" id="create_recruiting_rightbar_toggle">
    <input type="hidden" id="show_recruiting_rightbar_toggle">

    <div class="row">
        <div class="col-xl-6">
            <a href="{{ route('ik.application.recruiting.list') }}" class="btn btn-sm btn-info">Tüm Alımları Listele</a>
        </div>
        <div class="col-xl-6 text-right">
            <button class="btn btn-sm btn-primary" id="createRecruitingRightbarOpenerButton">Yeni İşe Alım Başlat</button>
        </div>
    </div>
    <hr>
    <div id="tasks"></div>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="context-menu" style="width: 300px">

        <div id="openSettingsContext">
            <a onclick="openSettings()" class="dropdown-item cursor-pointer">
                <div class="row">
                    <div class="col-xl-12">
                        <i class="fas fa-plus-circle text-success"></i><span class="ml-4">Ayarlara Git</span>
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
