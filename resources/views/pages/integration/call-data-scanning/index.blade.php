@extends('layouts.master')
@section('title', 'Excel Çağrı Data Taraması Aktarımı')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    <form action="{{ route('integration.call-data-scanning.store') }}" method="post" enctype="multipart/form-data" class="row">
        @csrf
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label for="file">Dosyayı Seçin</label>
                                <input type="file" id="file" name="file" required>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label for="survey_id">Anket Seçimi</label>
                                <select id="survey_id" name="survey_id" class="form-control selectpicker">
                                    @foreach($surveys as $survey)
                                        <option value="{{ $survey['id'] }}">{{ $survey['kodu'] . ' - ' . $survey['adi'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xl-12 text-right">
                            <button type="submit" class="btn btn-primary">İşleri Aktar</button>
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
