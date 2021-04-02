@extends('layouts.master')
@section('title', 'Profil')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    <div class="row">
        <div class="col-xl-6">
            <form action="{{ route('profile.changePassword') }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5>Şifre Değiştirme</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="old_password">Eski Şifrenizi Giriniz</label>
                                    <input type="password" id="old_password" name="old_password" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="password">Yeni Şifrenizi Giriniz</label>
                                    <input type="password" id="password" name="password" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="confirm_password">Yeni Şifrenizi Tekrar Giriniz</label>
                                    <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-12 text-right">
                                <button class="btn btn-sm btn-success">Şifreyi Değiştir</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-xl-6">

        </div>
    </div>

@endsection

@section('page-styles')
    @include('pages.profile.components.style')
@stop

@section('page-script')
    @include('pages.profile.components.script')
@stop

