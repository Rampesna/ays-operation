@extends('layouts.master')
@section('title', 'Covid-19 Çalışma Belgesi Oluştur')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))
@php(setlocale(LC_TIME, 'Turkish'))

@section('content')

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('ik.application.covid-document.create') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="form-group">
                                    <label for="employees">Çalışanları Seçin</label>
                                    <select class="form-control selectpicker" name="employees[]" id="employees" multiple data-live-search="true" required>
                                        @foreach($positions as $position)
                                            <option value="{{ $position->employee_id }}">{{ ucwords($position->employee->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="form-group">
                                    <label for="date_type">Tarih Biçimi</label>
                                    <select class="form-control selectpicker" name="date_type" id="date_type" required>
                                        <option value="0" selected>Tek Tarih</option>
                                        <option value="1">Tarih Aralığı</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <button type="button" id="select_all" class="btn btn-block btn-success">Tümünü Seç</button>
                                    </div>
                                    <div class="col-xl-6">
                                        <button type="button" id="deselect_all" class="btn btn-block btn-secondary">Tümünü Kaldır</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-6 col-sm-12 onedate">
                                <div class="form-group">
                                    <label for="date">Tarih</label>
                                    <input type="date" class="form-control" id="date" name="date" style="width: 100%">
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-12 multidate">
                                <div class="form-group">
                                    <label for="start_date">Başlangıç Tarihi</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date" style="width: 100%">
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-12 multidate">
                                <div class="form-group">
                                    <label for="end_date">Bitiş Tarihi</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date" style="width: 100%">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="start_hour">İş Başlangıç Saati</label>
                                    <input required type="text" class="form-control aysselector" id="start_hour" name="start_hour">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="end_hour">İş Bitiş Saati</label>
                                    <input required type="text" class="form-control aysselector" id="end_hour" name="end_hour">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="input-group">
                                    <button type="submit" class="btn btn-block btn-round btn-info">İzin Belgesi Oluştur</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')
    @include('pages.ik.application.applications.covid-document.components.style')
@stop

@section('page-script')
    @include('pages.ik.application.applications.covid-document.components.script')
@stop
