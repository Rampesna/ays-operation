@extends('layouts.master')
@section('title', 'Yıllık İzin Hakedişi Hesaplayıcı')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('ik.application.permit-progress.report') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="permitTypes">Hesaplamaya Dahil Edilecek İzin Türleri</label>
                                    <select id="permitTypes" name="permit_types[]" class="form-control selectpicker" multiple>
                                        @foreach($permitTypes as $permitType)
                                            <option value="{{ $permitType->id }}">{{ $permitType->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-12 text-right">
                                <button type="submit" class="btn btn-sm btn-success">Hesapla</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')

@stop

@section('page-script')

@stop
