@extends('layouts.master')
@section('title', 'Kullanıcılar')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    <div class="row">
        <div class="col-xl-12 text-right">
            <button type="button" data-toggle="modal" data-target="#CreateModal" class="btn btn-primary">Yeni Kullanıcı Oluştur</button>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <table class="table table-hover" id="users">
                                <thead>
                                <tr>
                                    <th>Ad Soyad</th>
                                    <th>Rol</th>
                                    <th>Durum</th>
                                    <th>E-posta</th>
                                    <th>Telefon Numarası</th>
                                    <th>Kimlik Numarası</th>
                                    <th class="text-right"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr id="row-{{ $user->id }}">
                                        <td>{{ ucwords($user->name) }}</td>
                                        <td>{{ ucwords($user->role->name) }}</td>
                                        <td>
                                            @if($user->email_verified_at)
                                                @if($user->suspend == 1)
                                                    <i class="fas fa-exclamation-triangle text-danger"></i><span class="text-danger"> Engellenmiş</span>
                                                @else
                                                    <i class="fa fa-check-circle text-success"></i><span class="text-success"> Aktif</span>
                                                @endif
                                            @else
                                                <i class="fa fa-clock text-warning"></i><span class="text-warning"> Mail Onayı Bekliyor</span>
                                            @endif
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone_number }}</td>
                                        <td>{{ $user->identification_number }}</td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-inline">
                                                <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ki ki-bold-more-ver"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                    <ul class="navi navi-hover">
                                                        @if($user->suspend == 1)
                                                            <li class="navi-item">
                                                                <a href="#"
                                                                   data-id="{{ $user->id }}"
                                                                   data-toggle="modal"
                                                                   data-target="#ActivateModal"
                                                                   class="navi-link activate">
                                                                    <span class="navi-icon">
                                                                        <i class="fas fa-user-clock text-warning"></i>
                                                                    </span>
                                                                    <span class="navi-text text-warning">Engeli Kaldır</span>
                                                                </a>
                                                            </li>
                                                        @else
                                                            <li class="navi-item">
                                                                <a href="#"
                                                                   data-id="{{ $user->id }}"
                                                                   data-toggle="modal"
                                                                   data-target="#SuspendedModal"
                                                                   class="navi-link activate">
                                                                    <span class="navi-icon">
                                                                        <i class="fas fa-user-lock text-warning"></i>
                                                                    </span>
                                                                    <span class="navi-text text-warning">Engelle</span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                        @if(!$user->email_verified_at)
                                                            <li class="navi-item">
                                                                <a href="#"
                                                                   data-id="{{ $user->id }}"
                                                                   data-toggle="modal"
                                                                   data-target="#VerifyModal"
                                                                   class="navi-link activate">
                                                                    <span class="navi-icon">
                                                                        <i class="fas fa-user-check text-success"></i>
                                                                    </span>
                                                                    <span class="navi-text text-success">Hesabı Onayla</span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                        <li class="navi-item">
                                                            <a href="#"
                                                               data-id="{{ $user->id }}"
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
                                                               data-id="{{ $user->id }}"
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

    @include('pages.setting.user.modals.create')
    @include('pages.setting.user.modals.edit')
    @include('pages.setting.user.modals.delete')

@endsection

@section('page-styles')
    @include('pages.setting.user.components.style')
@stop

@section('page-script')
    @include('pages.setting.user.components.script')
@stop
