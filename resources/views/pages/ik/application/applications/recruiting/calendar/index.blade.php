@extends('layouts.master')
@section('title', 'İş Alımı Yönetimi - Randevu Takvimi')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    @include('pages.ik.application.applications.recruiting.calendar.components.show-recruiting')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div id="recruitingReservations"></div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')
    @include('pages.ik.application.applications.recruiting.calendar.components.style')
@stop

@section('page-script')
    @include('pages.ik.application.applications.recruiting.calendar.components.script')
@stop
