@extends('layouts.master')
@section('title', 'Personel İş Analizi')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    <form action="{{ route('analysis.employee-job-analysis-store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="start_date">Başlangıç Tarihi</label>
                                    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="end_date">Bitiş Tarihi</label>
                                    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-12 text-right">
                                <div class="form-group">
                                    <button type="submit" id="analysis" class="btn btn-primary btn-pill">Analiz Et</button>
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
    <script>
        $("#analysis").click(function () {
            $("#loader").fadeIn(250);
        });
    </script>
    <script>
        @if(session()->has('exception'))
        console.log('{{ session()->get('exception') }}');
        @endif
    </script>
@stop
