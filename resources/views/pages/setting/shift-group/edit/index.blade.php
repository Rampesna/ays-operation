@extends('layouts.master')
@section('title', 'Vardiya Grubu Düzenle')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    <div class="row">
        <input type="hidden" id="id" value="{{ $shiftGroup->id }}">
        <div class="col-xl-4 col-12">
            <div class="row mt-1">
                <div class="col-xl-12">
                    <button type="button" class="btn btn-success btn-block" id="UpdateButton">Güncele</button>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-2">
                                    <div class="form-group">
                                        <label for="order">Sıra</label>
                                        <input type="text" id="order" class="form-control onlyNumber" value="{{ @$shiftGroup->order }}">
                                    </div>
                                </div>
                                <div class="col-xl-10">
                                    <div class="form-group">
                                        <label for="name">Vardiya Grubu Adı</label>
                                        <input type="text" id="name" class="form-control" value="{{ @$shiftGroup->name }}">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="add_type">Eklenme Türü</label>
                                        <select id="add_type" class="form-control selectpicker">
                                            <option @if($shiftGroup->add_type === 1) selected @endif value="1">Her Güne Herkes Eklensin</option>
                                            <option @if($shiftGroup->add_type === 0) selected @endif value="0">Her Güne Belirli Sayıda Kişi Eklensin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6" id="perDayColumn">
                                    <div class="form-group">
                                        <label for="per_day">Her Güne Eklenecek Kişi Sayısı</label>
                                        <input id="per_day" type="text" class="form-control onlyNumber" value="{{ @$shiftGroup->per_day }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label for="break_duration">Mola Süresini Girin (Dakika)</label>
                                        <input id="break_duration" type="text" class="form-control onlyNumber" value="{{ @$shiftGroup->break_duration }}">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label for="description">Açıklama</label>
                                        <textarea class="form-control" rows="4" id="description">{{ @$shiftGroup->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12 mt-5">
                            <div class="row">
                                <div class="col-xl-5 mt-10">
                                    <div class="form-group">
                                        <div class="checkbox-inline">
                                            <label class="checkbox checkbox-success">
                                                <input id="day1" type="checkbox" @if($shiftGroup->day1 === 1) checked @endif value="1" />Pazartesi
                                                <span></span>
                                            </label>
                                        </div>
                                        <span class="form-text text-muted"></span>
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <div class="form-group">
                                        <label>Saat Aralığını Belirleyin</label>
                                        <div class="input-daterange input-group">
                                            <label for="day1_start_time"></label>
                                            <input value="{{ $shiftGroup->day1_start_time }}" id="day1_start_time" type="time" class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-ellipsis-h"></i>
                                                </span>
                                            </div>
                                            <label for="day1_end_time"></label>
                                            <input value="{{ $shiftGroup->day1_end_time }}" id="day1_end_time" type="time" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 mt-5">
                            <div class="row">
                                <div class="col-xl-5 mt-10">
                                    <div class="form-group">
                                        <div class="checkbox-inline">
                                            <label class="checkbox checkbox-success">
                                                <input id="day2" type="checkbox" @if($shiftGroup->day2 === 1) checked @endif />Salı
                                                <span></span>
                                            </label>
                                        </div>
                                        <span class="form-text text-muted"></span>
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <div class="form-group">
                                        <label>Saat Aralığını Belirleyin</label>
                                        <div class="input-daterange input-group">
                                            <label for="day2_start_time"></label>
                                            <input value="{{ $shiftGroup->day2_start_time }}" id="day2_start_time" type="time" class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-ellipsis-h"></i>
                                                </span>
                                            </div>
                                            <label for="day2_end_time"></label>
                                            <input value="{{ $shiftGroup->day2_end_time }}" id="day2_end_time" type="time" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 mt-5">
                            <div class="row">
                                <div class="col-xl-5 mt-10">
                                    <div class="form-group">
                                        <div class="checkbox-inline">
                                            <label class="checkbox checkbox-success">
                                                <input id="day3" type="checkbox" @if($shiftGroup->day3 === 1) checked @endif />Çarşamba
                                                <span></span>
                                            </label>
                                        </div>
                                        <span class="form-text text-muted"></span>
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <div class="form-group">
                                        <label>Saat Aralığını Belirleyin</label>
                                        <div class="input-daterange input-group">
                                            <label for="day3_start_time"></label>
                                            <input value="{{ $shiftGroup->day3_start_time }}" id="day3_start_time" type="time" class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-ellipsis-h"></i>
                                                </span>
                                            </div>
                                            <label for="day3_end_time"></label>
                                            <input value="{{ $shiftGroup->day3_end_time }}" id="day3_end_time" type="time" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 mt-5">
                            <div class="row">
                                <div class="col-xl-5 mt-10">
                                    <div class="form-group">
                                        <div class="checkbox-inline">
                                            <label class="checkbox checkbox-success">
                                                <input id="day4" type="checkbox" @if($shiftGroup->day4 === 1) checked @endif />Perşembe
                                                <span></span>
                                            </label>
                                        </div>
                                        <span class="form-text text-muted"></span>
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <div class="form-group">
                                        <label>Saat Aralığını Belirleyin</label>
                                        <div class="input-daterange input-group">
                                            <label for="day4_start_time"></label>
                                            <input value="{{ $shiftGroup->day4_start_time }}" id="day4_start_time" type="time" class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-ellipsis-h"></i>
                                                </span>
                                            </div>
                                            <label for="day4_end_time"></label>
                                            <input value="{{ $shiftGroup->day4_end_time }}" id="day4_end_time" type="time" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 mt-5">
                            <div class="row">
                                <div class="col-xl-5 mt-10">
                                    <div class="form-group">
                                        <div class="checkbox-inline">
                                            <label class="checkbox checkbox-success">
                                                <input id="day5" type="checkbox" @if($shiftGroup->day5 === 1) checked @endif />Cuma
                                                <span></span>
                                            </label>
                                        </div>
                                        <span class="form-text text-muted"></span>
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <div class="form-group">
                                        <label>Saat Aralığını Belirleyin</label>
                                        <div class="input-daterange input-group">
                                            <label for="day5_start_time"></label>
                                            <input value="{{ $shiftGroup->day5_start_time }}" id="day5_start_time" type="time" class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-ellipsis-h"></i>
                                                </span>
                                            </div>
                                            <label for="day5_end_time"></label>
                                            <input value="{{ $shiftGroup->day5_end_time }}" id="day5_end_time" type="time" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 mt-5">
                            <div class="row">
                                <div class="col-xl-5 mt-10">
                                    <div class="form-group">
                                        <div class="checkbox-inline">
                                            <label class="checkbox checkbox-success">
                                                <input id="day6" type="checkbox" @if($shiftGroup->day6 === 1) checked @endif />Cumartesi
                                                <span></span>
                                            </label>
                                        </div>
                                        <span class="form-text text-muted"></span>
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <div class="form-group">
                                        <label>Saat Aralığını Belirleyin</label>
                                        <div class="input-daterange input-group">
                                            <label for="day6_start_time"></label>
                                            <input value="{{ $shiftGroup->day6_start_time }}" id="day6_start_time" type="time" class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-ellipsis-h"></i>
                                                </span>
                                            </div>
                                            <label for="day6_end_time"></label>
                                            <input value="{{ $shiftGroup->day6_end_time }}" id="day6_end_time" type="time" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 mt-5">
                            <div class="row">
                                <div class="col-xl-5 mt-10">
                                    <div class="form-group">
                                        <div class="checkbox-inline">
                                            <label class="checkbox checkbox-success">
                                                <input id="day0" type="checkbox" @if($shiftGroup->day0 === 1) checked @endif />Pazar
                                                <span></span>
                                            </label>
                                        </div>
                                        <span class="form-text text-muted"></span>
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <div class="form-group">
                                        <label>Saat Aralığını Belirleyin</label>
                                        <div class="input-daterange input-group">
                                            <label for="day0_start_time"></label>
                                            <input value="{{ $shiftGroup->day0_start_time }}" id="day0_start_time" type="time" class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-ellipsis-h"></i>
                                                </span>
                                            </div>
                                            <label for="day0_end_time"></label>
                                            <input value="{{ $shiftGroup->day0_end_time }}" id="day0_end_time" type="time" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Ek Ayarlar</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <div class="checkbox-inline">
                                            <label class="checkbox checkbox-success">
                                                <input id="delete_if_exist" type="checkbox" @if($shiftGroup->delete_if_exist === 1) checked @endif /> Zaten Vardiya Mevcutsa, Var Olan Silinsin Yenisi Eklensin
                                                <span></span>
                                            </label>
                                        </div>
                                        <span class="form-text text-muted"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <div class="checkbox-inline">
                                            <label class="checkbox checkbox-success">
                                                <input id="after_sunday" type="checkbox" @if($shiftGroup->after_sunday === 1) checked @endif /> Pazar Vardiyası Olan Personele, Cumartesi Günü Vardiya Eklenmesin
                                                <span></span>
                                            </label>
                                        </div>
                                        <span class="form-text text-muted"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <div class="checkbox-inline">
                                            <label class="checkbox checkbox-success">
                                                <input id="set_group_weekly" type="checkbox" @if($shiftGroup->set_group_weekly === 1) checked @endif /> Seçili Grup Hafta Boyunca Sabit Eklensin
                                                <span></span>
                                            </label>
                                        </div>
                                        <span class="form-text text-muted"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            <label for="employees">Personeller</label>
                            <select id="employees" class="form-control selectpicker" data-live-search="true" multiple>
                                @foreach($employees as $employee)
                                    <option @if($employee->id == $shiftGroup->employees()->where('employee_id', $employee->id)->exists()) selected @endif value="{{ $employee->id }}">{{ $employee->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')
    @include('pages.setting.shift-group.edit.components.style')
@stop

@section('page-script')
    @include('pages.setting.shift-group.edit.components.script')
@stop
