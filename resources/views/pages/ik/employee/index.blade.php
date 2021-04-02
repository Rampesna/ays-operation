@extends('layouts.master')
@section('title', 'Aktif Çalışan Personeller')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    @include('pages.ik.employee.modals.create')

    <div class="row">
        <div class="col-xl-12 text-right">
            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#CreateEmployeeModal">Yeni Personel Oluştur</button>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="card-body bg-white">
            <table class="table table-separate table-head-custom table-checkable" id="positions">
                <thead>
                <tr>
                    <th>Ad Soyad</th>
                    <th>Şirket</th>
                    <th>İş Başlangıç Tarihi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($positions as $position)
                    <tr>
                        <td>
                            <div class="font-15">
                                <strong>
                                    <a href="{{ route('ik.employee.show', ['id' => $position->employee->id, 'tab' => 'general']) }}" class="cursor-pointer">
                                        {{ $position->employee->name }}
                                    </a>
                                </strong>
                            </div>
                        </td>
                        <td><span>{{ $position->company->name }}</span></td>
                        <td data-sort="{{ $position->start_date }}">{{ date('d/m/Y', strtotime($position->start_date)) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('page-styles')
    @include('pages.ik.employee.components.style')
@stop

@section('page-script')
    @include('pages.ik.employee.components.script')
@stop
