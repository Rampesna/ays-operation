@extends('layouts.master')
@section('title', 'Proje Detayı')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    @include('pages.project.project.show.components.subheader')


@endsection

@section('page-styles')
    @include('pages.project.project.show.components.style')
@stop

@section('page-script')
    @include('pages.project.project.show.components.script')
@stop
