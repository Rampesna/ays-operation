@extends('layouts.master')
@section('title', 'Takvim')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    <button style="display: none" id="show_meeting_toggle"></button>
    <button style="display: none" id="show_note_toggle"></button>
    <button style="display: none" id="show_information_toggle"></button>
    <button style="display: none" id="show_reminder_toggle"></button>
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
    @include('pages.calendar.modals.create-reminder')

    @include('pages.calendar.modals.delete-meeting')
    @include('pages.calendar.modals.delete-note')
    @include('pages.calendar.modals.delete-information')
    @include('pages.calendar.modals.delete-reminder')

    @include('pages.calendar.components.show-meeting')
    @include('pages.calendar.components.show-note')
    @include('pages.calendar.components.show-information')
    @include('pages.calendar.components.show-reminder')

@endsection

@section('page-styles')
    @include('pages.calendar.components.style')
@stop

@section('page-script')
    @include('pages.calendar.components.script')
@stop
