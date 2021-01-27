@extends('layouts.tvmaster')
@section('title', 'Rapor')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    <div class="row mt-n10">

        <div class="col-lg-2">
            <!--begin::Card-->
            <div class="card card-custom bg-dark card-stretch gutter-b mb-n1">
                <!--begin::Body-->
                <div class="card-body mt-n4">
                    <div class="row">
                        <div class="col-xl-10">
                            <span class="font-weight-bold text-white font-size-h1-xxl">Siyah Takım</span>
                            <br>
                            <small style="color: white;font-size: 16px">Uyumsoft İ-Dönüşüm</small>
                        </div>
                        <div class="col-xl-2 text-right">
                            <h1 id="black_team_in_job" class="text-white mt-1" style="font-size: 30px">--</h1>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xl-12" style="border: solid 0.3px white"></div>
                    </div>
                    <div class="row mt-3 text-white">
                        <div class="col-xl-9 text-left">
                            <h2 style="margin-top: 12px">Toplam Yapılan İş</h2>
                        </div>
                        <div class="col-xl-3 text-right">
                            <h1 id="black_team_total_job" style="font-size: 45px">--</h1>
                        </div>
                    </div>
                    <div class="row text-white">
                        <div class="col-xl-6 text-left">
                            <h6 style="margin-top: 5px">Toplam Kişi Sayısı</h6>
                        </div>
                        <div class="col-xl-6 text-right">
                            <h3 id="black_team_users">--</h3>
                        </div>
                    </div>
                    <div class="row text-white">
                        <div class="col-xl-6 text-left">
                            <h6 style="margin-top: 5px">Aktif Kişi Sayısı</h6>
                        </div>
                        <div class="col-xl-6 text-right">
                            <h3 id="black_team_arrived">--</h3>
                        </div>
                    </div>
                    <div class="row text-white">
                        <div class="col-xl-6 text-left">
                            <h6 style="margin-top: 5px">Moladaki Kişi</h6>
                        </div>
                        <div class="col-xl-6 text-right">
                            <h3 id="black_team_not_job">--</h3>
                        </div>
                    </div>
                    <div class="row text-white">
                        <div class="col-xl-6 text-left">
                            <h6 style="margin-top: 5px">Takım Destek</h6>
                        </div>
                        <div class="col-xl-6 text-right">
                            <h3 id="black_team_support">--</h3>
                        </div>
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
        <div class="col-lg-2">
            <!--begin::Card-->
            <div class="card card-custom bg-success card-stretch gutter-b mb-n1">
                <!--begin::Body-->
                <div class="card-body mt-n4">
                    <div class="row">
                        <div class="col-xl-10">
                            <span class="font-weight-bold text-white font-size-h1-xxl">Yeşil Takım</span>
                            <br>
                            <small style="color: white;font-size: 16px">Uyumsoft İ-Dönüşüm</small>
                        </div>
                        <div class="col-xl-2 text-right">
                            <h1 id="green_team_in_job" class="text-white mt-1" style="font-size: 30px">--</h1>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xl-12" style="border: solid 0.3px white"></div>
                    </div>
                    <div class="row mt-3 text-white">
                        <div class="col-xl-9 text-left">
                            <h2 style="margin-top: 12px">Toplam Yapılan İş</h2>
                        </div>
                        <div class="col-xl-3 text-right">
                            <h1 id="green_team_total_job" style="font-size: 45px">--</h1>
                        </div>
                    </div>
                    <div class="row text-white">
                        <div class="col-xl-6 text-left">
                            <h6 style="margin-top: 5px">Toplam Kişi Sayısı</h6>
                        </div>
                        <div class="col-xl-6 text-right">
                            <h3 id="green_team_users">--</h3>
                        </div>
                    </div>
                    <div class="row text-white">
                        <div class="col-xl-6 text-left">
                            <h6 style="margin-top: 5px">Aktif Kişi Sayısı</h6>
                        </div>
                        <div class="col-xl-6 text-right">
                            <h3 id="green_team_arrived">--</h3>
                        </div>
                    </div>
                    <div class="row text-white">
                        <div class="col-xl-6 text-left">
                            <h6 style="margin-top: 5px">Moladaki Kişi</h6>
                        </div>
                        <div class="col-xl-6 text-right">
                            <h3 id="green_team_not_job">--</h3>
                        </div>
                    </div>
                    <div class="row text-white">
                        <div class="col-xl-6 text-left">
                            <h6 style="margin-top: 5px">Takım Destek</h6>
                        </div>
                        <div class="col-xl-6 text-right">
                            <h3 id="green_team_support">--</h3>
                        </div>
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
        <div class="col-lg-2">
            <!--begin::Card-->
            <div class="card card-custom bg-primary card-stretch gutter-b mb-n1">
                <!--begin::Body-->
                <div class="card-body mt-n4">
                    <div class="row">
                        <div class="col-xl-10">
                            <span class="font-weight-bold text-white font-size-h1-xxl">Mavi Takım</span>
                            <br>
                            <small style="color: white;font-size: 16px">Uyumsoft İ-Dönüşüm</small>
                        </div>
                        <div class="col-xl-2 text-right">
                            <h1 id="blue_team_in_job" class="text-white mt-1" style="font-size: 30px">--</h1>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xl-12" style="border: solid 0.3px white"></div>
                    </div>
                    <div class="row mt-3 text-white">
                        <div class="col-xl-9 text-left">
                            <h2 style="margin-top: 12px">Toplam Yapılan İş</h2>
                        </div>
                        <div class="col-xl-3 text-right">
                            <h1 id="blue_team_total_job" style="font-size: 45px">--</h1>
                        </div>
                    </div>
                    <div class="row text-white">
                        <div class="col-xl-6 text-left">
                            <h6 style="margin-top: 5px">Toplam Kişi Sayısı</h6>
                        </div>
                        <div class="col-xl-6 text-right">
                            <h3 id="blue_team_users">--</h3>
                        </div>
                    </div>
                    <div class="row text-white">
                        <div class="col-xl-6 text-left">
                            <h6 style="margin-top: 5px">Aktif Kişi Sayısı</h6>
                        </div>
                        <div class="col-xl-6 text-right">
                            <h3 id="blue_team_arrived">--</h3>
                        </div>
                    </div>
                    <div class="row text-white">
                        <div class="col-xl-6 text-left">
                            <h6 style="margin-top: 5px">Moladaki Kişi</h6>
                        </div>
                        <div class="col-xl-6 text-right">
                            <h3 id="blue_team_not_job">--</h3>
                        </div>
                    </div>
                    <div class="row text-white">
                        <div class="col-xl-6 text-left">
                            <h6 style="margin-top: 5px">Takım Destek</h6>
                        </div>
                        <div class="col-xl-6 text-right">
                            <h3 id="blue_team_support">--</h3>
                        </div>
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
        <div class="col-lg-2">
            <!--begin::Card-->
            <div class="card card-custom bg-danger card-stretch gutter-b mb-n1">
                <!--begin::Body-->
                <div class="card-body mt-n4">
                    <div class="row">
                        <div class="col-xl-10">
                            <span class="font-weight-bold text-white font-size-h1-xxl">Kırmızı Takım</span>
                            <br>
                            <small style="color: white;font-size: 16px">Bien İ-Dönüşüm</small>
                        </div>
                        <div class="col-xl-2 text-right">
                            <h1 id="red_team_in_job" class="text-white mt-1" style="font-size: 30px">--</h1>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xl-12" style="border: solid 0.3px white"></div>
                    </div>
                    <div class="row mt-3 text-white">
                        <div class="col-xl-9 text-left">
                            <h2 style="margin-top: 12px">Toplam Yapılan İş</h2>
                        </div>
                        <div class="col-xl-3 text-right">
                            <h1 id="red_team_total_job" style="font-size: 45px">--</h1>
                        </div>
                    </div>
                    <div class="row text-white">
                        <div class="col-xl-6 text-left">
                            <h6 style="margin-top: 5px">Toplam Kişi Sayısı</h6>
                        </div>
                        <div class="col-xl-6 text-right">
                            <h3 id="red_team_users">--</h3>
                        </div>
                    </div>
                    <div class="row text-white">
                        <div class="col-xl-6 text-left">
                            <h6 style="margin-top: 5px">Aktif Kişi Sayısı</h6>
                        </div>
                        <div class="col-xl-6 text-right">
                            <h3 id="red_team_arrived">--</h3>
                        </div>
                    </div>
                    <div class="row text-white">
                        <div class="col-xl-6 text-left">
                            <h6 style="margin-top: 5px">Moladaki Kişi</h6>
                        </div>
                        <div class="col-xl-6 text-right">
                            <h3 id="red_team_not_job">--</h3>
                        </div>
                    </div>
                    <div class="row text-white">
                        <div class="col-xl-6 text-left">
                            <h6 style="margin-top: 5px">Takım Destek</h6>
                        </div>
                        <div class="col-xl-6 text-right">
                            <h3 id="red_team_support">--</h3>
                        </div>
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
        <div class="col-lg-2">
            <!--begin::Card-->
            <div class="card card-custom bg-info card-stretch gutter-b mb-n1">
                <!--begin::Body-->
                <div class="card-body mt-n4">
                    <div class="row">
                        <div class="col-xl-10">
                            <span class="font-weight-bold text-white font-size-h1-xxl">Mor Takım</span>
                            <br>
                            <small style="color: white;font-size: 16px">Ekocari</small>
                        </div>
                        <div class="col-xl-2 text-right">
                            <h1 id="purple_team_in_job" class="text-white mt-1" style="font-size: 30px">--</h1>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xl-12" style="border: solid 0.3px white"></div>
                    </div>
                    <div class="row mt-3 text-white">
                        <div class="col-xl-9 text-left">
                            <h2 style="margin-top: 12px">Toplam Yapılan İş</h2>
                        </div>
                        <div class="col-xl-3 text-right">
                            <h1 id="purple_team_total_job" style="font-size: 45px">--</h1>
                        </div>
                    </div>
                    <div class="row text-white">
                        <div class="col-xl-6 text-left">
                            <h6 style="margin-top: 5px">Toplam Kişi Sayısı</h6>
                        </div>
                        <div class="col-xl-6 text-right">
                            <h3 id="purple_team_users">--</h3>
                        </div>
                    </div>
                    <div class="row text-white">
                        <div class="col-xl-6 text-left">
                            <h6 style="margin-top: 5px">Aktif Kişi Sayısı</h6>
                        </div>
                        <div class="col-xl-6 text-right">
                            <h3 id="purple_team_arrived">--</h3>
                        </div>
                    </div>
                    <div class="row text-white">
                        <div class="col-xl-6 text-left">
                            <h6 style="margin-top: 5px">Moladaki Kişi</h6>
                        </div>
                        <div class="col-xl-6 text-right">
                            <h3 id="purple_team_not_job">--</h3>
                        </div>
                    </div>
                    <div class="row text-white">
                        <div class="col-xl-6 text-left">
                            <h6 style="margin-top: 5px">Takım Destek</h6>
                        </div>
                        <div class="col-xl-6 text-right">
                            <h3 id="purple_team_support">--</h3>
                        </div>
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
        <div class="col-lg-2">
            <!--begin::Card-->
            <div class="card card-custom card-stretch gutter-b mb-n1" style="background-color: saddlebrown;">
                <!--begin::Body-->
                <div class="card-body mt-n4">
                    <div class="row">
                        <div class="col-xl-10">
                            <span class="font-weight-bold text-white font-size-h1-xxl">Kahverengi Takım</span>
                            <br>
                            <small style="color: white;font-size: 16px">Pazarlama</small>
                        </div>
                        <div class="col-xl-2 text-right">
                            <h1 id="brown_team_in_job" class="text-white mt-1" style="font-size: 22px">--</h1>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xl-12" style="border: solid 0.3px white"></div>
                    </div>
                    <div class="row mt-3 text-white">
                        <div class="col-xl-9 text-left">
                            <h2 style="margin-top: 12px">Toplam Yapılan İş</h2>
                        </div>
                        <div class="col-xl-3 text-right">
                            <h1 id="brown_team_total_job" style="font-size: 45px">--</h1>
                        </div>
                    </div>
                    <div class="row text-white">
                        <div class="col-xl-6 text-left">
                            <h6 style="margin-top: 5px">Toplam Kişi Sayısı</h6>
                        </div>
                        <div class="col-xl-6 text-right">
                            <h3 id="brown_team_users">--</h3>
                        </div>
                    </div>
                    <div class="row text-white">
                        <div class="col-xl-6 text-left">
                            <h6 style="margin-top: 5px">Aktif Kişi Sayısı</h6>
                        </div>
                        <div class="col-xl-6 text-right">
                            <h3 id="brown_team_arrived">--</h3>
                        </div>
                    </div>
                    <div class="row text-white">
                        <div class="col-xl-6 text-left">
                            <h6 style="margin-top: 5px">Moladaki Kişi</h6>
                        </div>
                        <div class="col-xl-6 text-right">
                            <h3 id="brown_team_not_job">--</h3>
                        </div>
                    </div>
                    <div class="row text-white">
                        <div class="col-xl-6 text-left">
                            <h6 style="margin-top: 5px">Takım Destek</h6>
                        </div>
                        <div class="col-xl-6 text-right">
                            <h3 id="brown_team_support">--</h3>
                        </div>
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>

    </div>

    <hr class="mt-n5">
    <br>



    <div class="row mt-n1 mb-n7" id="stars_row">

    </div>

    <hr>
    <br>

    <div class="row mt-n2 mb-n7">

        <div class="ays-column-2">

            <div class="card card-custom card-stretch gutter-b" style="background-color: darkgreen">

                <div class="card-body rounded align-items-center mt-n9" style="padding-bottom: 5px">
                    <div class="row">
                        <div class="col-xl-12 text-center">
                            <span id="total_user_count" class="font-weight-bold text-white" style="font-size: 40px">--</span>
                            <br>
                            <a href="#" class="card-title font-weight-bolder text-white font-size-h5 mb-2">Takımlardaki
                                Çalışanların Toplamı</a>
                        </div>
                    </div>
                </div>
                <!--end::Body-->
            </div>

        </div>
        <div class="ays-column-2">

            <div class="card card-custom card-stretch gutter-b" style="background-color: darkgreen">

                <div class="card-body rounded align-items-center mt-n9" style="padding-bottom: 5px">
                    <div class="row">
                        <div class="col-xl-12 text-center">
                            <span id="active_user_count" class="font-weight-bold text-white" style="font-size: 40px">--</span>
                            <br>
                            <a href="#" class="card-title font-weight-bolder text-white font-size-h5 mb-2">Ofiste Olanlar</a>
                        </div>
                    </div>
                </div>
                <!--end::Body-->
            </div>

        </div>
        <div class="ays-column-2">

            <div class="card card-custom card-stretch gutter-b" style="background-color: darkgreen">

                <div class="card-body rounded align-items-center mt-n9" style="padding-bottom: 5px">
                    <div class="row">
                        <div class="col-xl-12 text-center">
                            <span id="all_active_users" class="font-weight-bold text-white" style="font-size: 40px">--</span>
                            <br>
                            <a href="#" class="card-title font-weight-bolder text-white font-size-h5 mb-2">Aktif Çalışanlar</a>
                        </div>
                    </div>
                </div>
                <!--end::Body-->
            </div>

        </div>
        <div class="ays-column-2">

            <div class="card card-custom card-stretch gutter-b" style="background-color: darkgreen">

                <div class="card-body rounded align-items-center mt-n9" style="padding-bottom: 5px">
                    <div class="row">
                        <div class="col-xl-12 text-center">
                            <span id="need_break_count" class="font-weight-bold text-white" style="font-size: 40px">--</span>
                            <br>
                            <a href="#" class="card-title font-weight-bolder text-white font-size-h5 mb-2">İhtiyaç
                                Molası Toplamı</a>
                        </div>
                    </div>
                </div>
                <!--end::Body-->
            </div>

        </div>
        <div class="ays-column-2">

            <div class="card card-custom card-stretch gutter-b" style="background-color: darkgreen">

                <div class="card-body rounded align-items-center mt-n9" style="padding-bottom: 5px">
                    <div class="row">
                        <div class="col-xl-12 text-center">
                            <span id="food_break_count" class="font-weight-bold text-white" style="font-size: 40px">--</span>
                            <br>
                            <a href="#" class="card-title font-weight-bolder text-white font-size-h5 mb-2">Yemek Molası
                                Toplamı</a>
                        </div>
                    </div>
                </div>
                <!--end::Body-->
            </div>

        </div>
        <div class="ays-column-2">

            <div class="card card-custom card-stretch gutter-b" style="background-color: darkgreen">

                <div class="card-body rounded align-items-center mt-n9" style="padding-bottom: 5px">
                    <div class="row">
                        <div class="col-xl-12 text-center">
                            <span id="other_break_count" class="font-weight-bold text-white" style="font-size: 40px">--</span>
                            <br>
                            <a href="#" class="card-title font-weight-bolder text-white font-size-h5 mb-2">Eğitim/Görevlendirme/T.Destek<br>Molalar
                                Toplamı</a>
                        </div>
                    </div>
                </div>
                <!--end::Body-->
            </div>

        </div>


        <div class="ays-column-2">

            <div class="card card-custom card-stretch gutter-b" style="background-color: darkgreen">

                <div class="card-body rounded align-items-center mt-n9" style="padding-bottom: 5px">
                    <div class="row">
                        <div class="col-xl-12 text-center">
                            <span id="absentee_user_count" class="font-weight-bold text-white" style="font-size: 40px">--</span>
                            <br>
                            <a href="#" class="card-title font-weight-bolder text-white font-size-h5 mb-2">İş Sonu<br>Toplamı</a>
                        </div>
                    </div>
                </div>
                <!--end::Body-->
            </div>

        </div>

    </div>

    <hr>
    <br>

    <div class="row" id="users_row">

    </div>

@endsection

@section('page-styles')

    <style>

        .ays-column {
            -ms-flex: 0 0 14.28%;
            flex: 0 0 14.28%;
            max-width: 14.28%;
            position: relative;
            padding-right: 4px;
            padding-left: 4px;
            margin-top: -16px;
        }

        .ays-column-2 {
            -ms-flex: 0 0 14.285%;
            flex: 0 0 14.285%;
            max-width: 14.285%;
            position: relative;
            padding-right: 4px;
            padding-left: 4px;
            margin-top: -16px;
        }

    </style>

@stop

@section('page-script')

    <script>

        var SearchInArray = function (obj, name) {
            var returnKey = -1;

            $.each(obj, function(key, info) {
                if (info.ad.indexOf(name) >= 0) {
                    returnKey = key;
                    return false;
                }
            });
            return returnKey;
        }

        function callApi()
        {
            $.ajax({
                type: "get",
                url: "/EmployeeAndJobTracking",
                dataType: 'json',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (result) {
                    console.log(result);

                    $.ajax({
                        type: "get",
                        url: "/CallQuees",
                        dataType: 'json',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (quees) {
                            console.log(quees.dahililer);

                            var sundayShiftUserList = null;
                            if (new Date().getDay() == 1) {
                                $.ajax({
                                    type: "get",
                                    url: "/ShiftEmployeesLastSunday",
                                    dataType: 'json',
                                    data: {
                                        _token: '{{ csrf_token() }}'
                                    },
                                    success: function (sundayShiftUsers) {
                                        sundayShiftUserList = sundayShiftUsers;
                                    },
                                    error: function (error) {
                                        sundayShiftUserList = null;
                                    }
                                });
                            }

                            var breaks = [];
                            breaks[4] = "(İhtiyaç Molasında)";
                            breaks[6] = "(Toplantıda)";
                            breaks[9] = "(Yemek Molasında)";
                            breaks[10] = "(Dış Aramada)";
                            breaks[11] = "(İşlemde)";

                            $("#black_team_in_job").html(result.blackTeam.in_job);
                            $("#black_team_total_job").html(result.blackTeam.total_job);
                            if (result.blackTeam.total_job.toString().length >= 4) {
                                $("#black_team_total_job").css({"font-size": "14px", "margin-top" : "18px"});
                            } else if (result.blackTeam.total_job.toString().length >= 3) {
                                $("#black_team_total_job").css({"font-size": "24px", "margin-top" : "12px"});
                            } else if (result.blackTeam.total_job.toString().length >= 2) {
                                $("#black_team_total_job").css({"font-size": "30px", "margin-top" : "4px"});
                            } else {
                                $("#black_team_total_job").css({"font-size": "45px"});
                            }
                            $("#black_team_users").html(result.blackTeam.users);
                            $("#black_team_arrived").html(result.blackTeam.arrived);
                            $("#black_team_not_job").html(result.blackTeam.not_job);
                            $("#black_team_support").html(result.blackTeam.support);

                            $("#green_team_in_job").html(result.greenTeam.in_job);
                            $("#green_team_total_job").html(result.greenTeam.total_job);
                            if (result.greenTeam.total_job.toString().length >= 4) {
                                $("#green_team_total_job").css({"font-size": "14px", "margin-top" : "18px"});
                            } else if (result.greenTeam.total_job.toString().length >= 3) {
                                $("#green_team_total_job").css({"font-size": "24px", "margin-top" : "12px"});
                            } else if (result.greenTeam.total_job.toString().length >= 2) {
                                $("#green_team_total_job").css({"font-size": "30px", "margin-top" : "4px"});
                            } else {
                                $("#green_team_total_job").css({"font-size": "45px"});
                            }
                            $("#green_team_users").html(result.greenTeam.users);
                            $("#green_team_arrived").html(result.greenTeam.arrived);
                            $("#green_team_not_job").html(result.greenTeam.not_job);
                            $("#green_team_support").html(result.greenTeam.support);

                            $("#blue_team_in_job").html(result.blueTeam.in_job);
                            $("#blue_team_total_job").html(result.blueTeam.total_job);
                            if (result.blueTeam.total_job.toString().length >= 4) {
                                $("#blue_team_total_job").css({"font-size": "14px", "margin-top" : "18px"});
                            } else if (result.blueTeam.total_job.toString().length >= 3) {
                                $("#blue_team_total_job").css({"font-size": "24px", "margin-top" : "12px"});
                            } else if (result.blueTeam.total_job.toString().length >= 2) {
                                $("#blue_team_total_job").css({"font-size": "30px", "margin-top" : "4px"});
                            } else {
                                $("#blue_team_total_job").css({"font-size": "45px"});
                            }
                            $("#blue_team_users").html(result.blueTeam.users);
                            $("#blue_team_arrived").html(result.blueTeam.arrived);
                            $("#blue_team_not_job").html(result.blueTeam.not_job);
                            $("#blue_team_support").html(result.blueTeam.support);

                            $("#red_team_in_job").html(result.redTeam.in_job);
                            $("#red_team_total_job").html(result.redTeam.total_job);
                            if (result.redTeam.total_job.toString().length >= 4) {
                                $("#red_team_total_job").css({"font-size": "14px", "margin-top" : "18px"});
                            } else if (result.redTeam.total_job.toString().length >= 3) {
                                $("#red_team_total_job").css({"font-size": "24px", "margin-top" : "12px"});
                            } else if (result.redTeam.total_job.toString().length >= 2) {
                                $("#red_team_total_job").css({"font-size": "30px", "margin-top" : "4px"});
                            } else {
                                $("#red_team_total_job").css({"font-size": "45px"});
                            }
                            $("#red_team_users").html(result.redTeam.users);
                            $("#red_team_arrived").html(result.redTeam.arrived);
                            $("#red_team_not_job").html(result.redTeam.not_job);
                            $("#red_team_support").html(result.redTeam.support);

                            $("#purple_team_in_job").html(result.purpleTeam.in_job);
                            $("#purple_team_total_job").html(result.purpleTeam.total_job);
                            if (result.purpleTeam.total_job.toString().length >= 4) {
                                $("#purple_team_total_job").css({"font-size": "14px", "margin-top" : "18px"});
                            } else if (result.purpleTeam.total_job.toString().length >= 3) {
                                $("#purple_team_total_job").css({"font-size": "24px", "margin-top" : "12px"});
                            } else if (result.purpleTeam.total_job.toString().length >= 2) {
                                $("#purple_team_total_job").css({"font-size": "30px", "margin-top" : "4px"});
                            } else {
                                $("#purple_team_total_job").css({"font-size": "45px"});
                            }
                            $("#purple_team_users").html(result.purpleTeam.users);
                            $("#purple_team_arrived").html(result.purpleTeam.arrived);
                            $("#purple_team_not_job").html(result.purpleTeam.not_job);
                            $("#purple_team_support").html(result.purpleTeam.support);

                            $("#brown_team_in_job").html(result.brownTeam.in_job);
                            $("#brown_team_total_job").html(result.brownTeam.total_job);
                            if (result.brownTeam.total_job.toString().length >= 4) {
                                $("#brown_team_total_job").css({"font-size": "14px", "margin-top" : "18px"});
                            } else if (result.brownTeam.total_job.toString().length >= 3) {
                                $("#brown_team_total_job").css({"font-size": "24px", "margin-top" : "12px"});
                            } else if (result.brownTeam.total_job.toString().length >= 2) {
                                $("#brown_team_total_job").css({"font-size": "30px", "margin-top" : "4px"});
                            } else {
                                $("#brown_team_total_job").css({"font-size": "45px"});
                            }
                            $("#brown_team_users").html(result.brownTeam.users);
                            $("#brown_team_arrived").html(result.brownTeam.arrived);
                            $("#brown_team_not_job").html(result.brownTeam.not_job);
                            $("#brown_team_support").html(result.brownTeam.support);

                            $("#total_user_count").html(result.totalUserCount);
                            $("#need_break_count").html(result.needBreakCount);
                            $("#food_break_count").html(result.foodBreakCount);
                            $("#other_break_count").html(result.otherBreakCount);
                            $("#all_active_users").html(result.allActiveUsers);
                            $("#active_user_count").html(result.activeUserCount);
                            $("#absentee_user_count").html(result.absenteeUserCount);

                            $("#users_row").html('');
                            $.each(result.users, function (index) {
                                var leftIcon = '';
                                var rightIcon = '';
                                var callStatus = '';
                                var time = '';
                                var bgcolor = '#505050';

                                var shiftControl = 0;
                                $.each(result.todayShiftEmployees, function (shiftIndex) {
                                    if (result.users[index].kullaniciMail == result.todayShiftEmployees[shiftIndex].user.email) {
                                        shiftControl = 1;
                                    }
                                });

                                permitControl = 0;
                                $.each(result.todayPermittedEmployees, function (permitIndex) {
                                    if (result.users[index].kullaniciMail == result.todayPermittedEmployees[permitIndex].email) {
                                        permitControl = 1;
                                    }
                                });

                                overtimePermitControl = 0;
                                $.each(result.todayOvertimePermittedEmployees, function (permitIndex) {
                                    if (result.users[index].kullaniciMail == result.todayOvertimePermittedEmployees[permitIndex].email) {
                                        overtimePermitControl = 1;
                                    }
                                });

                                sundayShiftControl = 0;
                                if (sundayShiftUserList != null) {
                                    $.each(sundayShiftUserList, function (sundayShiftIndex) {
                                        if (result.users[index].kullaniciMail == sundayShiftUserList[sundayShiftIndex].email) {
                                            sundayShiftControl = 1;
                                        }
                                    });
                                }

                                if (shiftControl == 1) {
                                    rightIcon = '<i class="fas fa-house-user icon-2x text-white" style="margin-right: -20px"></i>';
                                } else if (permitControl == 1) {
                                    rightIcon = '<i class="fas fa-paper-plane icon-2x text-white" style="margin-right: -20px"></i>';
                                } else if (sundayShiftControl == 1) {
                                    rightIcon = '<i class="fas fa-calendar icon-2x text-white" style="margin-right: -20px"></i>';
                                } else if (overtimePermitControl == 1) {
                                    rightIcon = '<i class="fas fa-user-shield icon-2x text-white" style="margin-right: -20px"></i>';
                                } else {
                                    rightIcon = '<i class="" style="margin-right: -20px"></i>';
                                }

                                if (result.users[index].durumKodu === 1) {
                                    bgcolor = 'darkgreen';
                                } else if (result.users[index].durumKodu === 5 || result.users[index].durumKodu === 4 ||result.users[index].durumKodu === 8) {
                                    bgcolor = 'orangered';
                                } else if (result.users[index].durumKodu === 3 || result.users[index].durumKodu === 2) {
                                    bgcolor = 'dodgerblue';
                                }

                                // Call Status
                                if (result.users[index].dahili != null) {
                                    var getCallUserIndex = SearchInArray(quees.dahililer, result.users[index].dahili);

                                    if (getCallUserIndex != -1) {
                                        if (quees.dahililer[getCallUserIndex].durum == "paused") {
                                            if (quees.dahililer[getCallUserIndex].pausedreason == "") {
                                                callStatus = "(Molada)";
                                                time = quees.dahililer[getCallUserIndex].lastpausedtime;
                                                leftIcon = '<i class="fas fa-clock icon-2x text-white" style="margin-left: -20px"></i>';
                                            } else {
                                                if (quees.dahililer[getCallUserIndex].pausedreason == 10) {
                                                    leftIcon = '<i class="fas fa-phone-alt icon-2x text-white" style="margin-left: -20px"></i>';
                                                    if (quees.dahililer[getCallUserIndex].talkingnum == "") {
                                                        callStatus = breaks[quees.dahililer[getCallUserIndex].pausedreason];
                                                        time = quees.dahililer[getCallUserIndex].lastpausedtime;
                                                    } else {
                                                        callStatus = quees.dahililer[getCallUserIndex].talkingnum;
                                                        time = quees.dahililer[getCallUserIndex].talkingnumseconds;
                                                    }
                                                } else {
                                                    leftIcon = '<i class="fas fa-clock icon-2x text-white" style="margin-left: -20px"></i>';
                                                    callStatus = breaks[quees.dahililer[getCallUserIndex].pausedreason];
                                                    time = quees.dahililer[getCallUserIndex].lastpausedtime;
                                                }
                                            }
                                        }

                                        if (quees.dahililer[getCallUserIndex].durum == "onhook") {
                                            leftIcon = '<i class="fas fa-phone-volume icon-2x text-white" style="margin-left: -20px"></i>';
                                            if (quees.dahililer[getCallUserIndex].talkingnum != "") {
                                                callStatus = quees.dahililer[getCallUserIndex].talkingnum;
                                                time = quees.dahililer[getCallUserIndex].talkingnumseconds;
                                            }
                                        }

                                        if (quees.dahililer[getCallUserIndex].durum == "empty") {
                                            leftIcon = '<i class="fas fa-check-circle icon-2x text-white" style="margin-left: -20px"></i>';
                                        }

                                        if (quees.dahililer[getCallUserIndex].durum == "ringing") {
                                            leftIcon = '<i class="fas fa-headset icon-2x text-white" style="margin-left: -20px"></i>';
                                        }

                                        if (quees.dahililer[getCallUserIndex].durum == "unregister") {
                                            callStatus = '(Santrali Kapalı)';
                                            leftIcon = '<i class="fas fa-phone-slash icon-2x text-white" style="margin-left: -20px"></i>';
                                        }
                                    } else {
                                        callStatus = '(Santrali Kapalı)';
                                        leftIcon = '<i class="fas fa-phone-slash icon-2x text-white" style="margin-left: -20px"></i>';
                                    }
                                } else {
                                    callStatus = '(Dahili Yok)';
                                    leftIcon = '<i class="fas fa-phone-slash icon-2x text-white" style="margin-left: -20px"></i>';
                                }

                                if (result.users[index].kullaniciAdSoyad.length > 11) {
                                    name = result.users[index].kullaniciAdSoyad.substr(0,11) + '...';
                                } else {
                                    name = result.users[index].kullaniciAdSoyad;
                                }

                                var small = callStatus + (time != "" ? " - " + time : "");
                                var break_time = result.users[index].molaSuresi;
                                if (break_time == null) {
                                    break_time = 0;
                                }
                                var break_small = '<small class="float-right" style="font-size: 20px; margin-right: -20px; margin-top: -2px">' + break_time + '</small>';

                                $("#users_row").append('' +
                                    '<div class="ays-column">' +
                                    '<div class="card card-custom card-stretch gutter-b" style="background-color: ' + bgcolor + '">' +
                                    '<div class="card-body align-items-center mt-n2" style="height: 95px">' +
                                    '<div class="row text-center text-white">' +
                                    '<div class="col-xl-6 text-left mt-n2">' +
                                    leftIcon +
                                    '</div>' +
                                    '<div class="col-xl-6 text-right mt-n2">' +
                                    rightIcon +
                                    '</div>' +
                                    '<div class="col-xl-12 mt-n10">' +
                                    '<h2>' +
                                    name +
                                    '</h2>' +
                                    '</div>' +
                                    '<div class="col-xl-12 mt-n2">' +
                                    '<small style="font-size: 16px">' +
                                    result.users[index].durumAdi +
                                    '</small>' +
                                    '<br>' +
                                    '<small style="font-size: 15px; margin-right: -20px">' +
                                    small +
                                    '</small>' +
                                    break_small +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '');
                            });

                            $("#stars_row").html('');
                            $.each(result.starList, function (index) {
                                var name = result.starList[index].adSoyad;
                                $("#stars_row").append('<div class="ays-column">\n' +
                                    '\n' +
                                    '                <div class="card card-custom card-stretch gutter-b bg-dark-75">\n' +
                                    '\n' +
                                    '                    <div class="card-body d-flex align-items-center mt-n2" style="padding-bottom: 25px">\n' +
                                    '                        <div class="row">\n' +
                                    '                            <div class="col-xl-12">\n' +
                                    '                                <div class="row">\n' +
                                    '                                    <div class="col-xl-4">\n' +
                                    '                                        <i class="fa fa-star fa-4x" style="color:yellow"></i>\n' +
                                    '                                    </div>\n' +
                                    '                                    <div class="col-xl-8">\n' +
                                    '                                        <span class="font-weight-bold text-white font-size-h4-xl">' + name.substring(0,12) + '...</span>\n' +
                                    '                                        <br>\n' +
                                    '                                        <span href="#"\n' +
                                    '                                              class="card-title text-primary font-weight-bolder font-size-lg mb-2">' + result.starList[index].baslik + '</span>\n' +
                                    '                                    </div>\n' +
                                    '                                </div>\n' +
                                    '                            </div>\n' +
                                    '                        </div>\n' +
                                    '                    </div>\n' +
                                    '                    <!--end::Body-->\n' +
                                    '                </div>\n' +
                                    '\n' +
                                    '            </div>');
                            });
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    });

                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        callApi();

        setInterval(function () {
            callApi();
        }, 30000);

    </script>

@stop
