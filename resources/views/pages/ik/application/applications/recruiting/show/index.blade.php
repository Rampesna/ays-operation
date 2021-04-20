@extends('layouts.master')
@section('title', 'İş Alımı Yönetimi')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    @include('pages.ik.application.applications.recruiting.show.components.show-recruiting')

    @include('pages.ik.application.applications.recruiting.show.modals.next-step-recruiting')
    @include('pages.ik.application.applications.recruiting.show.modals.cancel-recruiting')
    @include('pages.ik.application.applications.recruiting.show.modals.set-recruiting-step-sub-step-check')
    @include('pages.ik.application.applications.recruiting.show.modals.show-recruiting-step-sub-step-check-activities')

    @include('pages.ik.application.applications.recruiting.show.modals.create-reservation')

    <input type="hidden" id="show_recruiting_rightbar_toggle">

    <div id="tasks"></div>

@endsection

@section('page-styles')
    @include('pages.ik.application.applications.recruiting.show.components.style')
@stop

@section('page-script')
    @include('pages.ik.application.applications.recruiting.show.components.script')
@stop
