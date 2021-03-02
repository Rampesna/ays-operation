@extends('layouts.master')
@section('title', 'Takvim')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    <button style="display: none" id="show_meeting_toggle">Toplantı</button>
    <button style="display: none" id="show_note_toggle">Not</button>
    <button style="display: none" id="show_information_toggle">Bilgilendirme</button>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>

    @include('pages.calendar.modals.modal-selector')
    @include('pages.calendar.modals.create-meeting')
    @include('pages.calendar.modals.create-note')
    @include('pages.calendar.modals.create-information')
    @include('pages.calendar.modals.delete-meeting')

    @include('pages.calendar.components.show-meeting')
    @include('pages.calendar.components.show-note')
    @include('pages.calendar.components.show-information')

@endsection

@section('page-styles')
    @include('pages.calendar.components.style')
@stop

@section('page-script')
    @include('pages.calendar.components.script')
@stop
