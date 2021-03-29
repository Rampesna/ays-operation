@extends('layouts.tvmaster')
@section('title', 'İş sıralaması')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')
    <div class="row text-center mt-n12">
        <div class="col-xl-12">
            <h2> -- Günlük Puan Sıralaması -- </h2>
        </div>
    </div>
    <div class="row mt-7" id="daily_row">

    </div>
    <hr class=" mt-n6">
    <div class="row text-center">
        <div class="col-xl-12">
            <h2> -- Haftalık Puan Sıralaması -- </h2>
        </div>
    </div>
    <div class="row mt-7" id="weekly_row">

    </div>
    <hr class="mt-n6">
    <div class="row text-center">
        <div class="col-xl-12">
            <h2> -- Aylık İş Sıralaması -- </h2>
        </div>
    </div>
    <div class="row mt-7" id="monthly_row">

    </div>

@endsection

@section('page-styles')

    <style>

        .ays-column {
            -ms-flex: 0 0 20%;
            flex: 0 0 20%;
            max-width: 20%;
            position: relative;
            padding: 5px;
            margin-top: -30px;
        }

        @media only screen and (max-width: 2000px) {
            .ays-column {
                -ms-flex: 0 0 25%;
                flex: 0 0 25%;
                max-width: 25%;
                position: relative;
                padding: 5px;
                margin-top: -30px;
            }
        }

        @media only screen and (max-width: 1800px) {
            .ays-column {
                -ms-flex: 0 0 33.33%;
                flex: 0 0 33.33%;
                max-width: 33.33%;
                position: relative;
                padding: 5px;
                margin-top: -30px;
            }
        }

        @media only screen and (max-width: 1350px) {
            .ays-column {
                -ms-flex: 0 0 50%;
                flex: 0 0 50%;
                max-width: 50%;
                position: relative;
                padding: 5px;
                margin-top: -30px;
            }
        }

        @media only screen and (max-width: 800px) {
            .ays-column {
                -ms-flex: 0 0 100%;
                flex: 0 0 100%;
                max-width: 100%;
                position: relative;
                padding: 5px;
                margin-top: -30px;
            }
        }

    </style>

@stop

@section('page-script')

    <script>

        var SearchInArray = function (obj, name) {
            var returnKey = -1;

            $.each(obj, function (key, info) {
                if (info.key.indexOf(name) >= 0) {
                    returnKey = key;
                    return false;
                }
            });
            return returnKey;
        }

        var oldDaily = null;
        var oldWeekly = null;
        var oldMonthly = null;

        function callApi() {

            var bgcolor = '#ff5900';

            $.ajax({
                type: "get",
                url: "{{ route('ajax.monitoring.GetPointDay') }}",
                dataType: 'json',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (daily) {
                    console.log(daily);
                    $('#daily_row').html('');
                    $.each(daily, function (index) {
                        var bottom = '';
                        if (oldDaily != null) {

                            var oldIndex = -1;
                            $.each(oldDaily, function (old) {
                                if (oldDaily[old].kullaniciId == daily[index].kullaniciId) {
                                    oldIndex = old;
                                }
                            });

                            var fark = 0;

                            if (oldIndex == -1 || oldDaily[oldIndex].sira == null) {
                                fark = 0;
                            } else {
                                fark = oldDaily[oldIndex].sira - daily[index].sira;
                            }

                            bottom = '<div class="col-xl-12 mt-n3 ml-n7 text-left"></div>';
                            if (fark < 0) {
                                bottom = '<div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-down" style="color: red"></i> ' + Math.abs(fark) + '</div>';
                            } else if (fark > 0) {
                                bottom = '<div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-up" style="color: green"></i> ' + Math.abs(fark) + '</div>';
                            }
                        } else {
                            bottom = '<div class="col-xl-12 mt-n3 ml-n7 text-left"></div>';
                        }
                        $("#daily_row").append('' +
                            '<div class="ays-column">' +
                            '<div class="card card-custom card-stretch gutter-b" style="background-color: ' + bgcolor + '">' +
                            '<div class="card-body align-items-center mt-n2" style="height: 65px">' +
                            '<div class="row text-center text-white">' +
                            '<div class="col-xl-6 text-left mt-n5 ml-n6">' +
                            '<span class="text-white" style="font-size: 18px">' + daily[index].sira + '.</span>' +
                            '</div>' +
                            '<div class="col-xl-6 mt-n3 text-right">' +
                            '<span class="text-white mr-n10"><a style="font-size: 12px">Faaliyet: </a><a style="font-size: 22px">' + daily[index].yapilanIsSayisi + '</a> | <a style="font-size: 12px">Puan: </a>: <a style="font-size: 22px">' + daily[index].puan + '</a></span>' +
                            '</div>' +
                            '<div class="col-xl-12 mt-n10 ml-5 text-left">' +
                            '<h2>' +
                            daily[index].kullaniciAdSoyad +
                            '</h2>' +
                            '</div>' +
                            bottom +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '');
                    });
                    oldDaily = daily;
                },
                error: function (error) {
                    console.log(error);
                }
            });

            $.ajax({
                type: "get",
                url: "{{ route('ajax.monitoring.GetPointWeek') }}",
                dataType: 'json',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (weekly) {
                    console.log(weekly);
                    $('#weekly_row').html('');
                    $.each(weekly, function (index) {
                        var bottom = '';
                        if (oldWeekly != null) {

                            var oldIndex = -1;
                            $.each(oldWeekly, function (old) {
                                if (oldWeekly[old].kullaniciId == weekly[index].kullaniciId) {
                                    oldIndex = old;
                                }
                            });

                            var fark = 0;

                            if (oldIndex == -1 || oldWeekly[oldIndex].sira == null) {
                                fark = 0;
                            } else {
                                fark = oldWeekly[oldIndex].sira - weekly[index].sira;
                            }

                            bottom = '<div class="col-xl-12 mt-n3 ml-n7 text-left"></div>';
                            if (fark < 0) {
                                bottom = '<div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-down" style="color: red"></i> ' + Math.abs(fark) + '</div>';
                            } else if (fark > 0) {
                                bottom = '<div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-up" style="color: green"></i> ' + Math.abs(fark) + '</div>';
                            }
                        } else {
                            bottom = '<div class="col-xl-12 mt-n3 ml-n7 text-left"></div>';
                        }
                        $("#weekly_row").append('' +
                            '<div class="ays-column">' +
                            '<div class="card card-custom card-stretch gutter-b" style="background-color: ' + bgcolor + '">' +
                            '<div class="card-body align-items-center mt-n2" style="height: 65px">' +
                            '<div class="row text-center text-white">' +
                            '<div class="col-xl-6 text-left mt-n5 ml-n6">' +
                            '<span class="text-white" style="font-size: 18px">' + weekly[index].sira + '.</span>' +
                            '</div>' +
                            '<div class="col-xl-6 mt-n3 text-right">' +
                            '<span class="text-white mr-n10"><a style="font-size: 12px">Faaliyet: </a><a style="font-size: 26px">' + weekly[index].yapilanIsSayisi + '</a> | <a style="font-size: 12px">Puan: </a>: <a style="font-size: 26px">' + weekly[index].puan + '</a></span>' +
                            '</div>' +
                            '<div class="col-xl-12 mt-n10 ml-5 text-left">' +
                            '<h2>' +
                            weekly[index].kullaniciAdSoyad +
                            '</h2>' +
                            '</div>' +
                            bottom +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '');
                    });
                    oldWeekly = weekly;
                },
                error: function (error) {
                    console.log(error);
                }
            });

            $.ajax({
                type: "get",
                url: "{{ route('ajax.monitoring.GetMonthJobRanking') }}",
                dataType: 'json',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (monthly) {
                    console.log(monthly);
                    $('#monthly_row').html('');
                    $.each(monthly, function (index) {
                        var bottom = '';
                        if (oldMonthly != null) {

                            var oldIndex = -1;
                            $.each(oldMonthly, function (old) {
                                if (oldMonthly[old].kullaniciId == monthly[index].kullaniciId) {
                                    oldIndex = old;
                                }
                            });

                            var fark = 0;

                            if (oldIndex == -1 || oldMonthly[oldIndex].sira == null) {
                                fark = 0;
                            } else {
                                fark = oldMonthly[oldIndex].sira - monthly[index].sira;
                            }

                            bottom = '<div class="col-xl-12 mt-n3 ml-n7 text-left"></div>';
                            if (fark < 0) {
                                bottom = '<div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-down" style="color: red"></i> ' + Math.abs(fark) + '</div>';
                            } else if (fark > 0) {
                                bottom = '<div class="col-xl-12 mt-n3 ml-n7 text-left"><i class="fa fa-arrow-up" style="color: green"></i> ' + Math.abs(fark) + '</div>';
                            }
                        } else {
                            bottom = '<div class="col-xl-12 mt-n3 ml-n7 text-left"></div>';
                        }
                        $("#monthly_row").append('' +
                            '<div class="ays-column">' +
                            '<div class="card card-custom card-stretch gutter-b" style="background-color: ' + bgcolor + '">' +
                            '<div class="card-body align-items-center mt-n2" style="height: 65px">' +
                            '<div class="row text-center text-white">' +
                            '<div class="col-xl-6 text-left mt-n5 ml-n6">' +
                            '<span class="text-white" style="font-size: 18px">' + monthly[index].sira + '.</span>' +
                            '</div>' +
                            '<div class="col-xl-6 mt-n3 text-right">' +
                            '<span class="text-white mr-n10" style="font-size: 26px">' + monthly[index].yapilanIsSayisi + '</span>' +
                            '</div>' +
                            '<div class="col-xl-12 mt-n10 ml-5 text-left">' +
                            '<h2>' +
                            monthly[index].kullaniciAdSoyad +
                            '</h2>' +
                            '</div>' +
                            bottom +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '');
                        oldMonthly = monthly;
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
