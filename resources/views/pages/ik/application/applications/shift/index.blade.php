@extends('layouts.master')
@section('title', 'Uygulamalar')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    <div class="row">
        <div class="col-xl-12">
            <a href="{{ route('ik.applications.shift.robot') }}" class="btn btn-info">Vardiya Robotu</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom">
                <div class="card-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>

    @include('pages.ik.application.applications.shift.modals.create')
    @include('pages.ik.application.applications.shift.modals.show')
    @include('pages.ik.application.applications.shift.modals.edit')
    @include('pages.ik.application.applications.shift.modals.delete')

@endsection

@section('page-styles')
    @include('pages.ik.application.applications.shift.components.style')
@stop

@section('page-script')
    @include('pages.ik.application.applications.shift.components.script')
@stop
