@extends('layouts.master')
@section('title', 'Faaliyet Sil')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    <form action="{{ route('integration.activity.delete') }}" method="post" class="row">
        @csrf
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label for="id">Faaliyet ID'si</label>
                                <input type="text" id="id" name="id" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xl-12 text-right">
                            <button type="submit" class="btn btn-primary">Faaliyeti Sil</button>
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
