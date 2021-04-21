@extends('layouts.master')
@section('title', 'Toplu SMS Gönder')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))
@php(setlocale(LC_TIME, 'Turkish'))

@section('content')

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('ik.applications.sms.send') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="employees">Personeller</label>
                                    <select class="form-control" id="employees" name="employees[]" required multiple>
                                        @foreach($positions as $position)
                                            <option value="{{ $position->employee_id }}">{{ ucwords($position->employee->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="sms">SMS</label>
                                    <textarea id="sms" name="sms" rows="4" class="form-control" required></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-12 text-right">
                                <button class="btn btn-sm btn-success">SMS Gönder</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('ik.applications.sms.send-others') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="numbers">Telefon Numaraları</label>
                                    <input type="text" class="form-control tagify" name="numbers" id="numbers">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="sms">SMS</label>
                                    <textarea id="sms" name="sms" rows="4" class="form-control" required></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-12 text-right">
                                <button class="btn btn-sm btn-success">SMS Gönder</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')
    @include('pages.ik.application.applications.batch-sms.components.style')
@stop

@section('page-script')
    @include('pages.ik.application.applications.batch-sms.components.script')
@stop
