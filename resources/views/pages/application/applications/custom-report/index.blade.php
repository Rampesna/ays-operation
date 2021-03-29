@extends('layouts.master')
@section('title', 'Toplu İşlemler')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    <div class="row">
        <div class="col-xl-12 text-right">
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#CreateCustomReport">Yeni Özel Rapor Oluştur</button>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <table class="table" id="customReports">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Rapor Başlığı</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customReports as $customReport)
                            <tr id="row_id_{{ $customReport->id }}">
                                <td>
                                    <div class="dropdown dropdown-inline">
                                        <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ki ki-bold-more-ver"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <ul class="navi navi-hover">
                                                <li class="navi-item">
                                                    <a href="#" data-id="{{ $customReport->id }}" data-toggle="modal" data-target="#EditCustomReport" class="navi-link edit">
                                                        <span class="navi-icon">
                                                            <i class="fa fa-edit"></i>
                                                        </span>
                                                        <span class="navi-text">Düzenle</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" data-id="{{ $customReport->id }}" data-toggle="modal" data-target="#DeleteCustomReport" class="navi-link delete">
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
                                <td>{{ $customReport->name }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('pages.application.applications.custom-report.modals.create')
    @include('pages.application.applications.custom-report.modals.edit')
    @include('pages.application.applications.custom-report.modals.delete')

@endsection

@section('page-styles')
    @include('pages.application.applications.custom-report.components.style')
@stop

@section('page-script')
    @include('pages.application.applications.custom-report.components.script')
@stop
