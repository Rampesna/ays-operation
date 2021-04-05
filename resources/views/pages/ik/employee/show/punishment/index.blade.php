@extends('layouts.master')
@section('title', $employee->name . ' - Cezalar')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    @include('pages.ik.employee.components.subheader')

    @include('pages.ik.employee.show.punishment.modals.create')
    @include('pages.ik.employee.show.punishment.modals.edit')
    @include('pages.ik.employee.show.punishment.modals.delete')

    @include('pages.ik.employee.show.punishment.modals.upload-document')
    @include('pages.ik.employee.show.punishment.modals.delete-document')

    <div class="row mt-15">
        <div class="col-xl-12 text-right">
            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#CreatePunishmentModal">Yeni Ceza Ekle</button>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <table class="table" id="punishments">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Evrak</th>
                            <th>Tarih</th>
                            <th>Kategori</th>
                            <th>Ücret Kesintisi</th>
                            <th>Açıklama</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($punishments as $punishment)
                            <tr>
                                <td>
                                    <div class="dropdown dropdown-inline">
                                        <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ki ki-bold-more-ver"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <ul class="navi navi-hover">

                                                @if($punishment->file)
                                                    <li class="navi-item">
                                                        <a data-id="{{ $punishment->id }}" class="navi-link cursor-pointer delete-document">
                                                            <span class="navi-icon">
                                                                <i class="fas fa-trash text-warning"></i>
                                                            </span>
                                                            <span class="navi-text">Belgeyi Sil</span>
                                                        </a>
                                                    </li>
                                                    <hr>
                                                @else
                                                    <li class="navi-item">
                                                        <a href="{{ route('ik.employee.punishment.document.create', ['id' => $punishment->id]) }}" class="navi-link cursor-pointer">
                                                            <span class="navi-icon">
                                                                <i class="fa fa-file-alt text-dark-75"></i>
                                                            </span>
                                                            <span class="navi-text">Belge Oluştur</span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a data-id="{{ $punishment->id }}" data-toggle="modal" data-target="#UploadDocumentModal" class="navi-link cursor-pointer upload-document">
                                                            <span class="navi-icon">
                                                                <i class="fa fa-upload text-info"></i>
                                                            </span>
                                                            <span class="navi-text">Belge Yükle</span>
                                                        </a>
                                                    </li>
                                                    <hr>
                                                @endif

                                                <li class="navi-item">
                                                    <a data-id="{{ $punishment->id }}" class="navi-link cursor-pointer edit">
                                                        <span class="navi-icon">
                                                            <i class="fa fa-edit"></i>
                                                        </span>
                                                        <span class="navi-text">Düzenle</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a data-id="{{ $punishment->id }}" class="navi-link cursor-pointer delete">
                                                        <span class="navi-icon">
                                                            <i class="fa fa-trash text-danger"></i>
                                                        </span>
                                                        <span class="navi-text">Sil</span>
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @if($punishment->file)
                                        <a href="{{ asset($punishment->file) }}" download><i class="fa fa-file text-success mt-4"></i></a>
                                    @else
                                        <i class="fa fa-file text-danger mt-4"></i>
                                    @endif
                                </td>
                                <td data-sort="{{ $punishment->date }}">{{ date('d.m.Y', strtotime($punishment->date)) }}</td>
                                <td>{{ $punishment->category->name }}</td>
                                <td>{{ number_format($punishment->amount, 2) }}</td>
                                <td><label style="width: 100%"><textarea class="form-control" rows="2" disabled>{{ $punishment->description }}</textarea></label></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')
    @include('pages.ik.employee.show.punishment.components.style')
@stop

@section('page-script')
    @include('pages.ik.employee.show.punishment.components.script')
@stop
