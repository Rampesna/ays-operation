@extends('layouts.master')
@section('title', 'Vardiya Grupları')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    <div class="row">
        <div class="col-xl-12 text-right">
            <button type="button" data-toggle="modal" data-target="#CreateModal" class="btn btn-primary">Vardiya Grubu Oluştur</button>
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
                                    <th></th>
                                    <th>Firma</th>
                                    <th>Grup Adı</th>
                                    <th class="text-right mr-20">Personeller</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($groups as $group)
                                    <tr id="row-{{ $group->id }}">
                                        <td style="width: 3%" class="pt-4">
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
                                        <td class="pt-6">{{ $group->company->title }}</td>
                                        <td class="pt-6">{{ $group->name }}</td>
                                        <td class="text-right">
                                            <label for="{{ $group->id }}_employees"></label>
                                            <select style="width: 100%" class="selectpicker" id="{{ $group->id }}_employees" data-live-search="true" multiple>
                                                @foreach($group->company->employees as $employee)
                                                    <option @if($group->employees()->where('employee_id', $employee->id)->exists()) selected @endif value="{{ $employee->id }}">{{ ucwords($employee->name) }}</option>
                                                @endforeach
                                            </select>
                                            <button type="button" data-group-id="{{ $group->id }}" class="btn btn-success btn-square employeesUpdate"><i class="far fa-save"></i> Kaydet</button>
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

    @include('pages.setting.shift-group.modals.create')
    @include('pages.setting.shift-group.modals.edit')
    @include('pages.setting.shift-group.modals.delete')


@endsection

@section('page-styles')
    @include('pages.setting.shift-group.components.style')
@stop

@section('page-script')
    @include('pages.setting.shift-group.components.script')
@stop
