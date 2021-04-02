@extends('layouts.master')
@section('title', 'Puantaj')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))
@php(setlocale(LC_TIME, 'Turkish'))

@section('content')

    <div class="col-12">
        <form action="#" method="get" class="row">
            <div class="col-xl-2">
                <label style="width: 100%">
                    <input class="form-control" type="month" name="date" value="{{ @$date }}">
                </label>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-12">
                <div class="input-group">
                    <button type="submit" class="btn btn-block btn-round btn-info">Puantaj Oluştur</button>
                </div>
            </div>
        </form>
        <hr>
    </div>

@endsection

@section('page-styles')

@stop

@section('page-script')

@stop
