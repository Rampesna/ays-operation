@extends('layouts.master')
@section('title', 'Uygulamalar')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-6 text-left">
                    <a href="#" type="button" class="btn btn-warning">Vardiya Değiştir</a>
                </div>
                <div class="col-xl-6 text-right">
                    <a href="#" type="button" class="btn btn-primary">Vardiya Robotu</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-custom">
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')

@stop

@section('page-script')

@stop
