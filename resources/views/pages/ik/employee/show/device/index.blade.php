@extends('layouts.master')
@section('title', $employee->name . ' - Zimmetler')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))
@php(setlocale(LC_TIME, 'Turkish'))

@section('content')

    @include('pages.ik.employee.components.subheader')

    @include('pages.ik.employee.show.device.modals.create')
    @include('pages.ik.employee.show.device.modals.edit')
    @include('pages.ik.employee.show.device.modals.delete')

    <div class="row mt-15">
        <div class="col-xl-6">
            <a class="btn btn-sm btn-dark-75" href="{{ route('ik.employee.employee-device.downloadEmployeeDevicesDocument', ['employee_id' => $employee->id]) }}">Zimmet Formu İndir</a>
        </div>
        <div class="col-xl-6 text-right">
            <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#CreateEmployeeDeviceModal">Yeni Zimmet Ekle</button>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <table class="table" id="devices">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Personel</th>
                            <th>Kategori</th>
                            <th>Cihaz Adı</th>
                            <th>Seri Numarası</th>
                            <th>Açıklama</th>
                            <th>Veriliş Tarihi</th>
                            <th>Teslim Tarihi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employeeDevices as $employeeDevice)
                            <tr>
                                <td>
                                    <div class="dropdown dropdown-inline">
                                        <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ki ki-bold-more-ver"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <ul class="navi navi-hover">
                                                <li class="navi-item">
                                                    <a data-id="{{ $employeeDevice->id }}" class="navi-link cursor-pointer edit">
                                                        <span class="navi-icon">
                                                            <i class="fa fa-edit"></i>
                                                        </span>
                                                        <span class="navi-text">Düzenle</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a data-id="{{ $employeeDevice->id }}" class="navi-link cursor-pointer delete">
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
                                <td>{{ $employeeDevice->employee->name }}</td>
                                <td>{{ $employeeDevice->category->name }}</td>
                                <td>{{ $employeeDevice->name }}</td>
                                <td>{{ $employeeDevice->serial_number }}</td>
                                <td><label style="width: 100%"><textarea class="form-control" rows="2" disabled>{{ $employeeDevice->description }}</textarea></label></td>
                                <td data-sort="{{ $employeeDevice->start_date }}">{{ strftime("%d %B %Y", strtotime($employeeDevice->start_date)) }}</td>
                                <td>{{ $employeeDevice->end_date ? strftime("%d %B %Y", strtotime($employeeDevice->end_date)) : '--' }}</td>
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
    @include('pages.ik.employee.show.device.components.style')
@stop

@section('page-script')
    @include('pages.ik.employee.show.device.components.script')
@stop
