@extends('layouts.master')
@section('title', $meeting->name . ' - Gündemler')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    @include('pages.application.applications.meeting.show.index.components.create')
    @include('pages.application.applications.meeting.show.index.components.edit')

    @include('pages.application.applications.meeting.show.index.modals.delete')

    <div class="row">
        <div class="col-xl-12">
            <div class="card" id="agendasCard">
                <div class="card-body">
                    <table class="table" id="agendas">
                        <thead>
                        <tr>
                            <th>Konu</th>
                            <th>Katılımcılar</th>
                            <th>Tartışmalar</th>
                            <th>Sonuç</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Konu</th>
                            <th>Katılımcılar</th>
                            <th>Tartışmalar</th>
                            <th>Sonuç</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="context-menu" style="width: 300px">
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
    @include('pages.application.applications.meeting.show.index.components.style')
@stop

@section('page-script')
    @include('pages.application.applications.meeting.show.index.components.script')
@stop
