@extends('layouts.master')
@section('title', 'Cihaz Grupları')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    <div class="row">
        <div class="col-xl-12 text-right">
            <button type="button" data-toggle="modal" data-target="#CreateModal" class="btn btn-primary">Yeni Cihaz Grubu Oluştur</button>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <table class="table table-hover" id="groups">
                                <thead>
                                <tr>
                                    <th>Firma</th>
                                    <th>Grup Adı</th>
                                    <th>Grup İkonu</th>
                                    <th class="text-right"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($groups as $group)
                                    <tr id="row-{{ $group->id }}">
                                        <td>{{ $group->company->title }}</td>
                                        <td>{{ $group->name }}</td>
                                        <td><i class="{{ $group->icon }}"></i></td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-inline">
                                                <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ki ki-bold-more-ver"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                    <ul class="navi navi-hover">
                                                        <li class="navi-item">
                                                            <a href="#"
                                                               data-id="{{ $group->id }}"
                                                               data-toggle="modal"
                                                               data-target="#EditModal"
                                                               class="navi-link edit">
                                                                    <span class="navi-icon">
                                                                        <i class="fa fa-edit"></i>
                                                                    </span>
                                                                <span class="navi-text">Düzenle</span>
                                                            </a>
                                                        </li>
                                                        <li class="navi-item">
                                                            <a href="#"
                                                               data-id="{{ $group->id }}"
                                                               data-toggle="modal"
                                                               data-target="#DeleteModal"
                                                               class="navi-link delete">
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

    @include('pages.setting.device-group.modals.create')
    @include('pages.setting.device-group.modals.edit')
    @include('pages.setting.device-group.modals.delete')


@endsection

@section('page-styles')
    @include('pages.setting.device-group.components.style')
@stop

@section('page-script')
    @include('pages.setting.device-group.components.script')
@stop
