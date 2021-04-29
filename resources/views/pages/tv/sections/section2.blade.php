@extends('layouts.tvmaster')
@section('title', 'Rapor')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

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
            </div>
        </div>
        <div class="ays-column-2">
            <div class="card card-custom card-stretch gutter-b" style="background-color: darkgreen">
                <div class="card-body rounded align-items-center mt-n9" style="padding-bottom: 5px">
                    <div class="row">
                        <div class="col-xl-12 text-center">
                            <span id="need_break_count" class="font-weight-bold text-white" style="font-size: 40px">--</span>
                            <br>
                            <a href="#" class="card-title font-weight-bolder text-white font-size-h5 mb-2">İhtiyaç Molası Toplamı</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ays-column-2">
            <div class="card card-custom card-stretch gutter-b" style="background-color: darkgreen">
                <div class="card-body rounded align-items-center mt-n9" style="padding-bottom: 5px">
                    <div class="row">
                        <div class="col-xl-12 text-center">
                            <span id="food_break_count" class="font-weight-bold text-white" style="font-size: 40px">--</span>
                            <br>
                            <a href="#" class="card-title font-weight-bolder text-white font-size-h5 mb-2">Yemek Molası Toplamı</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ays-column-2">
            <div class="card card-custom card-stretch gutter-b" style="background-color: darkgreen">
                <div class="card-body rounded align-items-center mt-n9" style="padding-bottom: 5px">
                    <div class="row">
                        <div class="col-xl-12 text-center">
                            <span id="other_break_count" class="font-weight-bold text-white" style="font-size: 40px">--</span>
                            <br>
                            <a href="#" class="card-title font-weight-bolder text-white font-size-h5 mb-2">Eğitim/Görevlendirme/T.Destek<br>Molalar Toplamı</a>
                        </div>
                    </div>
                </div>
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

        const breaks = [];
        breaks[4] = "(İhtiyaç Molasında)";
        breaks[6] = "(Toplantıda)";
        breaks[9] = "(Yemek Molasında)";
        breaks[10] = "(Dış Aramada)";
        breaks[11] = "(İşlemde)";

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

        function callApi() {
            $.ajax({
                type: "get",
                url: "{{ route('ajax.monitoring.EmployeeAndJobTracking') }}",
                dataType: 'json',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (result) {
                    $.ajax({
                        type: "post",
                        url: "http://otscagriapi.ayssoft.com:4444/api/CallQueues",
                        dataType: 'json',
                        data: {
                            appToken: '{{ env('NETSANTRAL_API_TOKEN') }}'
                        },
                        success: function (quees) {
                            var sundayShiftUserList = null;
                            if (new Date().getDay() === 6) {
                                $.ajax({
                                    type: "get",
                                    url: "{{ route('ajax.monitoring.ShiftEmployeesLastSunday') }}",
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
                                    if (result.todayShiftEmployees[shiftIndex].employee) {
                                        if (result.todayShiftEmployees[shiftIndex].employee.email) {
                                            if (result.users[index].kullaniciMail == result.todayShiftEmployees[shiftIndex].employee.email) {
                                                shiftControl = 1;
                                            }
                                        }
                                    }
                                });

                                permitControl = 0;
                                $.each(result.todayPermittedEmployees, function (permitIndex) {
                                    if (result.todayPermittedEmployees[permitIndex].employee) {
                                        if (result.todayPermittedEmployees[permitIndex].employee.email) {
                                            if (result.users[index].kullaniciMail == result.todayPermittedEmployees[permitIndex].employee.email) {
                                                permitControl = 1;
                                            }
                                        }
                                    }
                                });

                                oldShiftControl = 0;
                                if (result.oldShiftEmployeeList != null) {
                                    $.each(result.oldShiftEmployeeList, function (oldShiftIndex) {
                                        if (result.oldShiftEmployeeList[oldShiftIndex].employee) {
                                            if (result.oldShiftEmployeeList[oldShiftIndex].employee.email) {
                                                if (result.users[index].kullaniciMail == result.oldShiftEmployeeList[oldShiftIndex].employee.email) {
                                                    oldShiftControl = 1;
                                                }
                                            }
                                        }
                                    });
                                }

                                if (shiftControl === 1) {
                                    rightIcon = '<i class="fas fa-house-user icon-2x text-white" style="margin-right: -20px"></i>';
                                } else if (permitControl === 1) {
                                    rightIcon = '<i class="fas fa-paper-plane icon-2x text-white" style="margin-right: -20px"></i>';
                                } else if (oldShiftControl === 1) {
                                    rightIcon = '<i class="fas fa-calendar icon-2x text-white" style="margin-right: -20px"></i>';
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
                        },
                        error: function (error) {
                            var sundayShiftUserList = null;
                            if (new Date().getDay() === 6) {
                                $.ajax({
                                    type: "get",
                                    url: "{{ route('ajax.monitoring.ShiftEmployeesLastSunday') }}",
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
                                    if (result.todayShiftEmployees[shiftIndex].employee) {
                                        if (result.todayShiftEmployees[shiftIndex].employee.email) {
                                            if (result.users[index].kullaniciMail == result.todayShiftEmployees[shiftIndex].employee.email) {
                                                shiftControl = 1;
                                            }
                                        }
                                    }
                                });

                                permitControl = 0;
                                $.each(result.todayPermittedEmployees, function (permitIndex) {
                                    if (result.todayPermittedEmployees[permitIndex].employee) {
                                        if (result.todayPermittedEmployees[permitIndex].employee.email) {
                                            if (result.users[index].kullaniciMail == result.todayPermittedEmployees[permitIndex].employee.email) {
                                                permitControl = 1;
                                            }
                                        }
                                    }
                                });

                                oldShiftControl = 0;
                                if (result.oldShiftEmployeeList != null) {
                                    $.each(result.oldShiftEmployeeList, function (oldShiftIndex) {
                                        if (result.oldShiftEmployeeList[oldShiftIndex].employee) {
                                            if (result.oldShiftEmployeeList[oldShiftIndex].employee.email) {
                                                if (result.users[index].kullaniciMail == result.oldShiftEmployeeList[oldShiftIndex].employee.email) {
                                                    oldShiftControl = 1;
                                                }
                                            }
                                        }
                                    });
                                }

                                if (shiftControl === 1) {
                                    rightIcon = '<i class="fas fa-house-user icon-2x text-white" style="margin-right: -20px"></i>';
                                } else if (permitControl === 1) {
                                    rightIcon = '<i class="fas fa-paper-plane icon-2x text-white" style="margin-right: -20px"></i>';
                                } else if (oldShiftControl === 1) {
                                    rightIcon = '<i class="fas fa-calendar icon-2x text-white" style="margin-right: -20px"></i>';
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

                                callStatus = '(Dahili Yok)';
                                leftIcon = '<i class="fas fa-phone-slash icon-2x text-white" style="margin-left: -20px"></i>';

                                if (result.users[index].kullaniciAdSoyad.length > 11) {
                                    name = result.users[index].kullaniciAdSoyad.substr(0,11) + '...';
                                } else {
                                    name = result.users[index].kullaniciAdSoyad;
                                }

                                var small = '';
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
        }, 60000);

    </script>

@stop
