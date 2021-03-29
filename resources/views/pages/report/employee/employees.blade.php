@extends('layouts.master')
@section('title', 'Personel Raporu')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    <form id="comparison_form" action="{{ route('report.employees.by-company') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="company_id">Firmayı Seçin</label>
                                    <select id="company_id" name="company_id" class="form-control selectpicker" required>
                                        @foreach($companies as $company)
                                            <option value="{{ $company->id }}">{{ $company->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-12 text-right">
                                <button type="submit" class="btn btn-primary">Sorgula</button>
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
