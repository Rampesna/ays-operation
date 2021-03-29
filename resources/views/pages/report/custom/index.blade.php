@extends('layouts.master')
@section('title', 'Özel Raporlar')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    <form id="comparison_form" action="{{ route('report.custom.show') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-xl-12 text-right">
                <button type="submit" id="comparison" class="btn btn-primary btn-pill">Rapor Oluştur</button>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="start_date">Başlangıç Tarihi</label>
                                    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ date('Y-m-01') }}" required>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="end_date">Bitiş Tarihi</label>
                                    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="report_id">Alınacak Özel Raporu Seçin</label>
                                    <select name="report_id" id="report_id" class="form-control selectpicker" required>
                                        @foreach($customReports as $customReport)
                                            <option value="{{ $customReport->id }}">{{ $customReport->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

@section('page-styles')

@stop

@section('page-script')

@stop
