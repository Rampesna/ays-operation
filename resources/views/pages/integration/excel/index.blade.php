@extends('layouts.master')
@section('title', 'Excel İş Aktarımı')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    <form action="{{ route('integration.excel.store') }}" method="post" enctype="multipart/form-data" class="row">
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
                                <label for="type">Tür Seçimi</label>
                                <select id="type" name="type" class="form-control selectpicker" required>
                                    <option value="1">I-Dönüşüm</option>
                                    <option value="3">E-Yedekleme</option>
                                    <option value="6">Eski Aktivasyon</option>
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
