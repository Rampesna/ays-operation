@extends('layouts.master')
@section('title', 'Envanter Yönetimi')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    @include('pages.inventory.components.subheader')
    <input type="hidden" name="company_id" id="company_id" value="{{ $companyId }}">
    <input type="hidden" id="kt_quick_cart_toggle">
    <div class="row mt-15"></div>
    <div id="inventories"></div>

    @include('pages.inventory.modals.create-device')
    @include('pages.inventory.modals.remove-employee')
    @Authority(74)
    @include('pages.inventory.components.device-rightbar')
    @endAuthority

@endsection

@section('page-styles')
    @include('pages.inventory.components.style')
@stop

@section('page-script')
    @include('pages.inventory.components.script')
@stop
