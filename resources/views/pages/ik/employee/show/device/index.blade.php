@extends('layouts.master')
@section('title', $employee->name . ' - Genel Bilgiler')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    @include('pages.ik.employee.components.subheader')
    <div class="row mt-15">
        <div class="col-xl-12">
            {{ $employee->name }} - Zimmetler
        </div>
    </div>

@endsection

@section('page-styles')
    @include('pages.ik.employee.show.device.components.style')
@stop

@section('page-script')
    @include('pages.ik.employee.show.device.components.script')
@stop
