@extends('layouts.master')
@section('title', 'Yetkinlikler')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    <div class="row">
        <div class="col-xl-12 text-right">
            <button type="button" data-toggle="modal" data-target="#CreateModal" class="btn btn-primary">Yeni Öncelik Oluştur</button>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <table class="table table-hover" id="priorities">
                                <thead>
                                <tr>
                                    <th>Firma</th>
                                    <th>Yetkinlik Adı</th>
                                    <th class="text-right"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($priorities as $priority)
                                    <tr id="row-{{ $priority->id }}">
                                        <td>{{ $priority->company->title }}</td>
                                        <td><a href="{{ route('employee.index.by-priority', $priority) }}">{{ $priority->name }}</a></td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-inline">
                                                <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ki ki-bold-more-ver"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                    <ul class="navi navi-hover">
                                                        <li class="navi-item">
                                                            <a href="#"
                                                               data-id="{{ $priority->id }}"
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
                                                               data-id="{{ $priority->id }}"
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

    @include('pages.setting.priority.modals.create')
    @include('pages.setting.priority.modals.edit')
    @include('pages.setting.priority.modals.delete')


@endsection

@section('page-styles')
    @include('pages.setting.priority.components.style')
@stop

@section('page-script')
    @include('pages.setting.priority.components.script')
@stop
