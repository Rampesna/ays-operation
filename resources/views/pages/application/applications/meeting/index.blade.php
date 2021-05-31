@extends('layouts.master')
@section('title', 'Toplantılar')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    @include('pages.application.applications.meeting.components.create')
    @include('pages.application.applications.meeting.components.edit')

    @include('pages.application.applications.meeting.modals.delete')

    <div class="row">
        <div class="col-xl-12">
            <div class="card" id="meetingsCard">
                <div class="card-body">
                    <table class="table" id="meetings">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Konu</th>
                            <th>Tarih</th>
                            <th>Tür</th>
                            <th>Durum</th>
                            <th>Yer</th>
                            <th>Katılımcılar</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Konu</th>
                            <th>Tarih</th>
                            <th>Tür</th>
                            <th>Durum</th>
                            <th>Yer</th>
                            <th>Katılımcılar</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="context-menu" style="width: 300px">
        @Authority(101)
        <a onclick="allAgendas()" class="dropdown-item cursor-pointer">
            <div class="row">
                <div class="col-xl-12">
                    <i class="fas fa-exchange-alt text-info"></i><span class="ml-4">Tüm Gündemler</span>
                </div>
            </div>
        </a>
        <hr>
        @endAuthority
        <a onclick="create()" class="dropdown-item cursor-pointer">
            <div class="row">
                <div class="col-xl-12">
                    <i class="fas fa-plus-circle text-success"></i><span class="ml-4">Yeni Oluştur</span>
                </div>
            </div>
        </a>
        <div id="EditingContexts">
            <hr>
            <a onclick="edit()" class="dropdown-item cursor-pointer">
                <div class="row">
                    <div class="col-xl-12">
                        <i class="fas fa-pen text-primary"></i><span class="ml-4">Düzenle</span>
                    </div>
                </div>
            </a>
            <a onclick="show()" class="dropdown-item cursor-pointer">
                <div class="row">
                    <div class="col-xl-12">
                        <i class="fas fa-clipboard-list text-dark-75"></i><span class="ml-4">Detaylar</span>
                    </div>
                </div>
            </a>
            <a onclick="downloadMeeting()" class="dropdown-item cursor-pointer">
                <div class="row">
                    <div class="col-xl-12">
                        <i class="fas fa-download text-warning"></i><span class="ml-4">İndir</span>
                    </div>
                </div>
            </a>
            <a onclick="drop()" class="dropdown-item cursor-pointer">
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
    @include('pages.application.applications.meeting.components.style')
@stop

@section('page-script')
    @include('pages.application.applications.meeting.components.script')
@stop
