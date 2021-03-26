@extends('layouts.master')
@section('title', 'Firma Yönetimi')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    <div class="row">
        <div class="col-xl-12 text-right">
            <a href="{{ route('setting.company.sync-employees') }}" class="btn btn-primary">Personelleri Ana Sistemden Senkronize Et</a>
        </div>
    </div>
    <hr>

@endsection

@section('page-styles')

@stop

@section('page-script')

@stop
