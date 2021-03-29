@extends('employee.layouts.master')
@section('title', 'Anasayfa')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@php(setlocale(LC_TIME, 'Turkish'))

@section('content')

    <div class="row">
        <div class="col-xl-12">
            Personel Sayfası
        </div>
    </div>

@endsection

@section('page-styles')
    @include('employee.pages.dashboard.components.style')
@stop

@section('page-script')
    @include('employee.pages.dashboard.components.script')
@stop

