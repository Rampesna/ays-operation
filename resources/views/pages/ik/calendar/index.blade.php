@extends('layouts.master')
@section('title', 'İnsan Kaynakları - Takvim')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')
    @include('pages.ik.calendar.components.style')
@stop

@section('page-script')
    @include('pages.ik.calendar.components.script')
@stop
