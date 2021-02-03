@extends('layouts.master')
@section('title', 'Vardiya Robotu')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    <form action="{{ route('applications.shift.robot.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-xl-6 col-12">
                <div class="row mt-1">
                    <div class="col-xl-12">
                        <button type="submit" id="robot" class="btn btn-success btn-block">Oluştur</button>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="company_id">Firma</label>
                                            <select name="company_id" id="company_id" class="form-control selectpicker">
                                                @foreach($companies as $company)
                                                    <option value="{{ $company->id }}">{{ $company->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="group_id">Firma Vardiya Grupları</label>
                                            <select name="group_id" id="group_id" class="form-control selectpicker">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="add_type">Eklenme Türü</label>
                                            <select name="add_type" id="add_type" class="form-control selectpicker">
                                                <option value="1">Her Güne Herkes Eklensin</option>
                                                <option value="0">Her Güne Belirli Sayıda Kişi Eklensin</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6" id="perDayColumn">
                                        <div class="form-group">
                                            <label for="per_day">Her Güne Eklenecek Kişi Sayısı</label>
                                            <input name="per_day" id="per_day" type="text" class="form-control onlyNumber">
                                        </div>
                                    </div>
                                </div>
                                <hr>
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
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="years">İşlem Yapılacak Yılları Seçin</label>
                                            <select class="form-control selectpicker" name="years[]" id="years" data-live-search="true" multiple required>
                                                @for($yearCounter = date('Y') ; $yearCounter <= 2030; $yearCounter++)
                                                    <option @if(date('Y') == $yearCounter) selected @endif value="{{ $yearCounter }}">{{ $yearCounter }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="months">İşlem Yapılacak Ayları Seçin</label>
                                            <select class="form-control selectpicker" name="months[]" id="months" data-live-search="true" multiple required>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="days">İşlem Yapılacak Günleri Seçin</label>
                                            <select class="form-control selectpicker" name="days[]" id="days" data-live-search="true" multiple required>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label>Mola Süresini Girin (Dakika)</label>
                                            <div class="input-daterange input-group">
                                                <label for="break_duration"></label>
                                                <input id="break_duration" name="break_duration" type="text" class="form-control onlyNumber" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="form-group">
                                            <label>Açıklama</label>
                                            <textarea class="form-control" rows="4" name="description"></textarea>
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
                            <div class="card-header">
                                <h5>Ek Ayarlar</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="form-group">
                                            <div class="checkbox-inline">
                                                <label class="checkbox checkbox-success">
                                                    <input name="delete_if_exist" id="delete_if_exist" type="checkbox" checked="checked" /> Zaten Vardiya Mevcutsa, Var Olan Silinsin Yenisi Eklensin
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
                                                    <input name="after_sunday" id="after_sunday" type="checkbox" checked="checked" /> Pazar Vardiyası Olan Personele, Pazartesi Günü Vardiya Eklenmesin
                                                    <span></span>
                                                </label>
                                            </div>
                                            <span class="form-text text-muted"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12 mt-5">
                                <div class="row">
                                    <div class="col-xl-5 mt-10">
                                        <div class="form-group">
                                            <div class="checkbox-inline">
                                                <label class="checkbox checkbox-success">
                                                    <input name="day1" id="day1" type="checkbox" checked="checked" />Pazartesi
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
                                                <input value="09:00" value="09:00" required name="day1_start_hour" id="day1_start_hour" type="text" class="form-control aysselector" placeholder="Örn: 09:00">
                                                <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-ellipsis-h"></i>
                                                </span>
                                                </div>
                                                <input value="18:00" required name="day1_end_hour" id="day1_end_hour" type="text" class="form-control aysselector" placeholder="Örn: 18:00">
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
                                                    <input name="day2" id="day2" type="checkbox" checked="checked" />Salı
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
                                                <input value="09:00" required name="day2_start_hour" id="day2_start_hour" type="text" class="form-control aysselector" placeholder="Örn: 09:00">
                                                <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-ellipsis-h"></i>
                                                </span>
                                                </div>
                                                <input value="18:00" required name="day2_end_hour" id="day2_end_hour" type="text" class="form-control aysselector" placeholder="Örn: 18:00">
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
                                                    <input name="day3" id="day3" type="checkbox" checked="checked" />Çarşamba
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
                                                <input value="09:00" required name="day3_start_hour" id="day3_start_hour" type="text" class="form-control aysselector" placeholder="Örn: 09:00">
                                                <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-ellipsis-h"></i>
                                                </span>
                                                </div>
                                                <input value="18:00" required name="day3_end_hour" id="day3_end_hour" type="text" class="form-control aysselector" placeholder="Örn: 18:00">
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
                                                    <input name="day4" id="day4" type="checkbox" checked="checked" />Perşembe
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
                                                <input value="09:00" required name="day4_start_hour" id="day4_start_hour" type="text" class="form-control aysselector" placeholder="Örn: 09:00">
                                                <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-ellipsis-h"></i>
                                                </span>
                                                </div>
                                                <input value="18:00" required name="day4_end_hour" id="day4_end_hour" type="text" class="form-control aysselector" placeholder="Örn: 18:00">
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
                                                    <input name="day5" id="day5" type="checkbox" checked="checked" />Cuma
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
                                                <input value="09:00" required name="day5_start_hour" id="day5_start_hour" type="text" class="form-control aysselector" placeholder="Örn: 09:00">
                                                <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-ellipsis-h"></i>
                                                </span>
                                                </div>
                                                <input value="18:00" required name="day5_end_hour" id="day5_end_hour" type="text" class="form-control aysselector" placeholder="Örn: 18:00">
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
                                                    <input name="day6" id="day6" type="checkbox" checked="checked" />Cumartesi
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
                                                <input value="09:00" required name="day6_start_hour" id="day6_start_hour" type="text" class="form-control aysselector" placeholder="Örn: 09:00">
                                                <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-ellipsis-h"></i>
                                                </span>
                                                </div>
                                                <input value="18:00" required name="day6_end_hour" id="day6_end_hour" type="text" class="form-control aysselector" placeholder="Örn: 18:00">
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
                                                    <input name="day0" id="day0" type="checkbox" checked="checked" />Pazar
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
                                                <input value="09:00" required name="day0_start_hour" id="day0_start_hour" type="text" class="form-control aysselector" placeholder="Örn: 09:00">
                                                <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-ellipsis-h"></i>
                                                </span>
                                                </div>
                                                <input value="18:00" required name="day0_end_hour" id="day0_end_hour" type="text" class="form-control aysselector" placeholder="Örn: 18:00">
                                            </div>
                                        </div>
                                    </div>
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
    <script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0.3') }}"></script>

    <script>

        $(".onlyNumber").keypress(function (e) {
            if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        }).bind('cut copy paste', function(e) {
            return false;
        });

        $("#is_everyday_everyone_input").hide();

        $("#is_everyday_everyone").change(function () {
            if ($(this).is(":checked")) {
                $("#is_create_standard_shifts_label").html('Her Güne Herkes Eklensin');
                $("#is_everyday_everyone_input").hide();
                $("#everyday_how_many").prop('required', false);

            } else {
                $("#is_create_standard_shifts_label").html('Her Güne Şu Kadar Kişi Eklensin');
                $("#is_everyday_everyone_input").show();
                $("#everyday_how_many").prop('required', true);
            }
        });

        $("#create_shift_for_all_employees").change(function () {
            if ($(this).is(":checked")) {
                $("#group_id").prop('required', false);
            } else {
                $("#group_id").prop('required', true);
            }
        });

        $("#day1").change(function () {
            if ($(this).is(":checked")) {
                $("#day1_start_hour").prop('required', true);
                $("#day1_end_hour").prop('required', true);
            } else {
                $("#day1_start_hour").prop('required', false);
                $("#day1_end_hour").prop('required', false);
            }
        });

        $("#day2").change(function () {
            if ($(this).is(":checked")) {
                $("#day2_start_hour").prop('required', true);
                $("#day2_end_hour").prop('required', true);
            } else {
                $("#day2_start_hour").prop('required', false);
                $("#day2_end_hour").prop('required', false);
            }
        });

        $("#day3").change(function () {
            if ($(this).is(":checked")) {
                $("#day3_start_hour").prop('required', true);
                $("#day3_end_hour").prop('required', true);
            } else {
                $("#day3_start_hour").prop('required', false);
                $("#day3_end_hour").prop('required', false);
            }
        });

        $("#day4").change(function () {
            if ($(this).is(":checked")) {
                $("#day4_start_hour").prop('required', true);
                $("#day4_end_hour").prop('required', true);
            } else {
                $("#day4_start_hour").prop('required', false);
                $("#day4_end_hour").prop('required', false);
            }
        });

        $("#day5").change(function () {
            if ($(this).is(":checked")) {
                $("#day5_start_hour").prop('required', true);
                $("#day5_end_hour").prop('required', true);
            } else {
                $("#day5_start_hour").prop('required', false);
                $("#day5_end_hour").prop('required', false);
            }
        });

        $("#day6").change(function () {
            if ($(this).is(":checked")) {
                $("#day6_start_hour").prop('required', true);
                $("#day6_end_hour").prop('required', true);
            } else {
                $("#day6_start_hour").prop('required', false);
                $("#day6_end_hour").prop('required', false);
            }
        });

        $("#day0").change(function () {
            if ($(this).is(":checked")) {
                $("#day0_start_hour").prop('required', true);
                $("#day0_end_hour").prop('required', true);
            } else {
                $("#day0_start_hour").prop('required', false);
                $("#day0_end_hour").prop('required', false);
            }
        });


    </script>

    <script>

        var yearsSelector = $("#years");
        var monthsSelector = $("#months");
        var daysSelector = $("#days");
        var companyIdSelector = $("#company_id");
        var groupIdSelector = $("#group_id");
        var add_type = $("#add_type");
        var per_day = $("#per_day");
        var perDayColumn = $("#perDayColumn");
        var robotSelector = $("#robot");

        perDayColumn.hide();
        per_day.prop('required', false);

        function getDaysByMonths() {
            var months = monthsSelector.val();
            $.ajax({
                type: 'get',
                url: '{{ route('ajax.general.getDaysByMonths') }}',
                dataType: 'JSON',
                data: {
                    months: months
                },
                success: function (result) {
                    daysSelector.empty().selectpicker('refresh');
                    $.each(result, function (index) {
                        daysSelector.append('<option value="' + result[index].data + '">' + result[index].view + '</option>');
                    });
                    daysSelector.selectpicker('refresh');
                },
                error: function () {
                    alert("Bir Hata Oluştu. Lütfen Bir Süre Bekleyip Tekrar Deneyin.");
                }
            });
        }

        function getMonthsByYears() {
            var years = yearsSelector.val();
            $.ajax({
                type: 'get',
                url: '{{ route('ajax.general.getMonthsByYears') }}',
                dataType: 'JSON',
                data: {
                    years: years
                },
                success: function (result) {
                    // console.log(result);
                    monthsSelector.empty().selectpicker('refresh');
                    $.each(result, function (index) {
                        var today = new Date();
                        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                        var yyyy = today.getFullYear();
                        today = yyyy + '-' + mm;
                        if (result[index].data === today) {
                            monthsSelector.append('<option selected value="' + result[index].data + '">' + result[index].view + '</option>');
                        } else {
                            monthsSelector.append('<option value="' + result[index].data + '">' + result[index].view + '</option>');
                        }
                    });
                    monthsSelector.selectpicker('refresh');
                    getDaysByMonths();
                },
                error: function () {
                    alert("Bir Hata Oluştu. Lütfen Bir Süre Bekleyip Tekrar Deneyin.");
                }
            });
        }

        function getShiftGroupsByCompanyId() {
            var company_id = companyIdSelector.val();
            $.ajax({
                type: 'get',
                url: '{{ route('ajax.application.shift.getShiftGroupsByCompanyId') }}',
                data: {
                    company_id: company_id
                },
                success: function (groups) {
                    groupIdSelector.empty().selectpicker('refresh');
                    var optgroup = '<option value="0">Tüm Çalışanlara Eklensin</option><optgroup label="Vardiya Grupları">';
                    $.each(groups, function (index) {
                        optgroup += "<option value='" + groups[index].id + "'>" + groups[index].name + "</option>"
                    });
                    optgroup += "</optgroup>"
                    groupIdSelector.append(optgroup);
                    groupIdSelector.selectpicker('refresh');
                },
                error: function (error) {
                    console.log(error);
                    toastr.error('Sistemsel Bir Hata Oluştu!');
                }
            });
        }

        getMonthsByYears();
        getShiftGroupsByCompanyId();

        yearsSelector.change(function () {
            getMonthsByYears();
        });

        monthsSelector.change(function () {
            getDaysByMonths();
        });

        companyIdSelector.change(function () {
            getShiftGroupsByCompanyId();
        });

        daysSelector.selectpicker({
            selectAllText: 'Your select-all-text',
            deselectAllText: 'Your deselect-all-text'
        });

        add_type.change(function () {
            if ($(this).val() == 1) {
                perDayColumn.hide();
                per_day.prop('required', false);
            } else {
                perDayColumn.show();
                per_day.prop('required', true);
            }
        });

        robotSelector.click(function () {
            $("#loader").fadeIn(250);
        });

    </script>

@stop
