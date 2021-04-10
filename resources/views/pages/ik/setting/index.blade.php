@extends('layouts.master')
@section('title', 'İnsan Kaynakları - Ayarlar')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    <div class="row">

        <div class="col-xl-3 col-6">
            <a href="{{ route('ik.setting.show', ['tab' => 'permit']) }}" class="card card-custom card-stretch gutter-b">
                <div class="card-body">
                    <span class="svg-icon svg-icon-dark-75 svg-icon-3x ml-n1">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M3,13.5 L19,12 L3,10.5 L3,3.7732928 C3,3.70255344 3.01501031,3.63261921 3.04403925,3.56811047 C3.15735832,3.3162903 3.45336217,3.20401298 3.70518234,3.31733205 L21.9867539,11.5440392 C22.098181,11.5941815 22.1873901,11.6833905 22.2375323,11.7948177 C22.3508514,12.0466378 22.2385741,12.3426417 21.9867539,12.4559608 L3.70518234,20.6826679 C3.64067359,20.7116969 3.57073936,20.7267072 3.5,20.7267072 C3.22385763,20.7267072 3,20.5028496 3,20.2267072 L3,13.5 Z" fill="#000000"/>
                            </g>
                        </svg>
                    </span>
                    <div class="text-inverse-white font-weight-bolder font-size-h5 mb-2 mt-5">İzin Ayarları</div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-6">
            <a href="{{ route('ik.setting.show', ['tab' => 'overtime']) }}" class="card card-custom card-stretch gutter-b">
                <div class="card-body">
                    <span class="svg-icon svg-icon-dark-75 svg-icon-3x ml-n1">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M3,13.5 L19,12 L3,10.5 L3,3.7732928 C3,3.70255344 3.01501031,3.63261921 3.04403925,3.56811047 C3.15735832,3.3162903 3.45336217,3.20401298 3.70518234,3.31733205 L21.9867539,11.5440392 C22.098181,11.5941815 22.1873901,11.6833905 22.2375323,11.7948177 C22.3508514,12.0466378 22.2385741,12.3426417 21.9867539,12.4559608 L3.70518234,20.6826679 C3.64067359,20.7116969 3.57073936,20.7267072 3.5,20.7267072 C3.22385763,20.7267072 3,20.5028496 3,20.2267072 L3,13.5 Z" fill="#000000"/>
                            </g>
                        </svg>
                    </span>
                    <div class="text-inverse-white font-weight-bolder font-size-h5 mb-2 mt-5">Fazla Mesai Ayarları</div>
                </div>
            </a>
        </div>

    </div>

@endsection

@section('page-styles')

@stop

@section('page-script')

@stop
