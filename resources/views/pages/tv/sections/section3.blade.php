@extends('layouts.tvmaster')
@section('title', 'Çağrı Takibi')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    <div class="row" id="users_row">

    </div>

@endsection

@section('page-styles')

    <style>

        .ays-column {
            -ms-flex: 0 0 16.66%;
            flex: 0 0 16.66%;
            max-width: 16.66%;
            position: relative;
            padding-right: 4px;
            padding-left: 4px;
            margin-top: -16px;
        }

        @media only screen and (max-width: 2796px) {
            .ays-column {
                -ms-flex: 0 0 16.66%;
                flex: 0 0 16.66%;
                max-width: 16.66%;
                position: relative;
                padding-right: 4px;
                padding-left: 4px;
                margin-top: -16px;
            }
        }

        @media only screen and (max-width: 2510px) {
            .ays-column {
                -ms-flex: 0 0 20%;
                flex: 0 0 20%;
                max-width: 20%;
                position: relative;
                padding-right: 4px;
                padding-left: 4px;
                margin-top: -16px;
            }
        }

        @media only screen and (max-width: 2100px) {
            .ays-column {
                -ms-flex: 0 0 25%;
                flex: 0 0 25%;
                max-width: 25%;
                position: relative;
                padding-right: 4px;
                padding-left: 4px;
                margin-top: -16px;
            }
        }

        @media only screen and (max-width: 1550px) {
            .ays-column {
                -ms-flex: 0 0 33.33%;
                flex: 0 0 33.33%;
                max-width: 33.33%;
                position: relative;
                padding-right: 4px;
                padding-left: 4px;
                margin-top: -16px;
            }
        }

        @media only screen and (max-width: 1300px) {
            .ays-column {
                -ms-flex: 0 0 50%;
                flex: 0 0 50%;
                max-width: 50%;
                position: relative;
                padding-right: 4px;
                padding-left: 4px;
                margin-top: -16px;
            }
        }

        @media only screen and (max-width: 780px) {
            .ays-column {
                -ms-flex: 0 0 100%;
                flex: 0 0 100%;
                max-width: 100%;
                position: relative;
                padding-right: 4px;
                padding-left: 4px;
                margin-top: -16px;
            }
        }

        .ays-column-2 {
            -ms-flex: 0 0 14.285%;
            flex: 0 0 14.285%;
            max-width: 14.285%;
            position: relative;
            padding-right: 4px;
            padding-left: 4px;
            margin-top: -16px;
            color: teal;
        }

    </style>

@stop

@section('page-script')

    <script>

        var SearchInArray = function (obj, name) {
            var returnKey = -1;

            $.each(obj, function (key, info) {
                if (info.ad.indexOf(name) >= 0) {
                    returnKey = key;
                    return false;
                }
            });
            return returnKey;
        }

        function callApi() {
            var breaks = [];
            breaks[4] = "(İhtiyaç Molası)";
            breaks[6] = "(Toplantı Molası)";
            breaks[9] = "(Yemek Molası)";
            breaks[10] = "(Dış Arama - Outbound)";
            breaks[11] = "(İşlem Molası)";

            $.ajax({
                type: "get",
                url: "/EmployeeAndJobTracking",
                dataType: 'json',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (result) {
                    // console.log(result);

                    $.ajax({
                        type: "get",
                        url: "/CallQuees",
                        dataType: 'json',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (quees) {
                            // console.log(quees.dahililer);

                            $("#users_row").html('');
                            $.each(result.users, function (index) {

                                var bgcolor = '#505050';
                                var callUserStatusIcon = '<div class="col-xl-6 text-left mt-n2"></div>';
                                var getCallUserStatus = "";
                                var time = "";

                                // Call Status
                                if (result.users[index].dahili != null) {
                                    var getCallUserIndex = SearchInArray(quees.dahililer, result.users[index].dahili);

                                    if (quees.dahililer[getCallUserIndex].durum == "paused") {
                                        bgcolor = 'dodgerblue';
                                        getCallUserStatus = "(Molada)";
                                        time = '<br><small style="font-size: 20px">' + quees.dahililer[getCallUserIndex].lastpausedtime + '</small>'
                                        if (quees.dahililer[getCallUserIndex].pausedreason == 10) {
                                            bgcolor = 'midnightblue';
                                            if (quees.dahililer[getCallUserIndex].talkingnum != "") {
                                                getCallUserStatus = quees.dahililer[getCallUserIndex].talkingnum;
                                                time = '<br><small style="font-size: 20px">' + quees.dahililer[getCallUserIndex].talkingnumseconds + '</small>';
                                            } else if (quees.dahililer[getCallUserIndex].pausedreason != "") {
                                                getCallUserStatus = breaks[quees.dahililer[getCallUserIndex].pausedreason];
                                            } else {
                                                getCallUserStatus = "(Molada)";
                                            }
                                            callUserStatusIcon = '<div class="col-xl-6 text-left mt-n2"><i class="fas fa-phone-volume icon-3x text-white mt-3"></i></div>';
                                        } else {
                                            if (quees.dahililer[getCallUserIndex].pausedreason != "") {
                                                getCallUserStatus = breaks[quees.dahililer[getCallUserIndex].pausedreason];
                                            } else {
                                                getCallUserStatus = "(Molada)";
                                            }
                                            callUserStatusIcon = '<div class="col-xl-6 text-left mt-n2"><i class="fas fa-clock icon-3x text-white mt-3"></i></div>';
                                        }
                                    }

                                    if (quees.dahililer[getCallUserIndex].durum == "onhook") {
                                        bgcolor = 'darkgreen';
                                        callUserStatusIcon = '<div class="col-xl-6 text-left mt-n2"><i class="fas fa-phone-alt icon-3x text-white mt-3"></i></div>';
                                        if (quees.dahililer[getCallUserIndex].talkingnum != "") {
                                            getCallUserStatus = quees.dahililer[getCallUserIndex].talkingnum;
                                            time = '<br><small style="font-size: 20px">' + quees.dahililer[getCallUserIndex].talkingnumseconds + '</small>';
                                        }
                                    }

                                    if (quees.dahililer[getCallUserIndex].durum == "empty") {
                                        bgcolor = 'orangered';
                                        callUserStatusIcon = '<div class="col-xl-6 text-left mt-n2"><i class="fas fa-check-circle icon-3x text-white mt-3"></i></div>';
                                    }

                                    if (quees.dahililer[getCallUserIndex].durum == "ringing") {
                                        bgcolor = 'purple';
                                        callUserStatusIcon = '<div class="col-xl-6 text-left mt-n2"><i class="fas fa-headset icon-3x text-white mt-3"></i></div>';
                                    }

                                    if (quees.dahililer[getCallUserIndex].durum == "unregister") {
                                        bgcolor = 'teal';
                                        getCallUserStatus = "(Santrali Kapalı)";
                                        callUserStatusIcon = '<div class="col-xl-6 text-left mt-n2"><i class="fas fa-phone-slash icon-3x text-white mt-3"></i></div>';
                                    }
                                } else {
                                    callUserStatusIcon = '<div class="col-xl-6 text-left mt-n2"><i class="fas fa-phone-slash icon-3x text-white mt-3"></i></div>';
                                    getCallUserStatus = "(Dahili Yok)";
                                }


                                $("#users_row").append('' +
                                    '<div class="ays-column">' +
                                    '<div class="card card-custom card-stretch gutter-b" style="background-color: ' + bgcolor + '">' +
                                    '<div class="card-body align-items-center mt-n2" style="padding-bottom: 25px">' +
                                    '<div class="row text-center text-white">' +
                                    callUserStatusIcon +
                                    '<div class="col-xl-12 mt-n5">' +
                                    '<h1 style="font-size: 30px">' +
                                    result.users[index].kullaniciAdSoyad +
                                    '</h1>' +
                                    '</div>' +
                                    '<div class="col-xl-12 mt-n2">' +
                                    '<br>' +
                                    '<small style="font-size: 20px">' +
                                    getCallUserStatus +
                                    '</small>' +
                                    time +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '');
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
        }, 10000);

    </script>

@stop
