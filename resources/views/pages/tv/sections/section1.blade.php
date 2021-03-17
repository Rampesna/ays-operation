@extends('layouts.tvmaster')
@section('title', 'İş Takibi')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    <div class="row" style="margin-top: -23px; margin-bottom: -5px">
        <div class="col-xl-4">
            <h4 id="tarih"></h4>
        </div>
        <div class="col-xl-4">

        </div>
        <div class="col-xl-4 text-right">
            <a href="{{ Illuminate\Support\Facades\Route::current()->getDomain() }}"><i class="ki ki-reload"></i></a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header text-center" style="padding : 1rem 1.25rem">
                    <h1 style="font-size: 36px">
                        <span class="svg-icon svg-icon-dark svg-icon-4x">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M10.9630156,7.5 L11.0475062,7.5 C11.3043819,7.5 11.5194647,7.69464724 11.5450248,7.95024814 L12,12.5 L15.2480695,14.3560397 C15.403857,14.4450611 15.5,14.6107328 15.5,14.7901613 L15.5,15 C15.5,15.2109164 15.3290185,15.3818979 15.1181021,15.3818979 C15.0841582,15.3818979 15.0503659,15.3773725 15.0176181,15.3684413 L10.3986612,14.1087258 C10.1672824,14.0456225 10.0132986,13.8271186 10.0316926,13.5879956 L10.4644883,7.96165175 C10.4845267,7.70115317 10.7017474,7.5 10.9630156,7.5 Z" fill="#000000"/>
                                    <path d="M7.38979581,2.8349582 C8.65216735,2.29743306 10.0413491,2 11.5,2 C17.2989899,2 22,6.70101013 22,12.5 C22,18.2989899 17.2989899,23 11.5,23 C5.70101013,23 1,18.2989899 1,12.5 C1,11.5151324 1.13559454,10.5619345 1.38913364,9.65805651 L3.31481075,10.1982117 C3.10672013,10.940064 3,11.7119264 3,12.5 C3,17.1944204 6.80557963,21 11.5,21 C16.1944204,21 20,17.1944204 20,12.5 C20,7.80557963 16.1944204,4 11.5,4 C10.54876,4 9.62236069,4.15592757 8.74872191,4.45446326 L9.93948308,5.87355717 C10.0088058,5.95617272 10.0495583,6.05898805 10.05566,6.16666224 C10.0712834,6.4423623 9.86044965,6.67852665 9.5847496,6.69415008 L4.71777931,6.96995273 C4.66931162,6.97269931 4.62070229,6.96837279 4.57348157,6.95710938 C4.30487471,6.89303938 4.13906482,6.62335149 4.20313482,6.35474463 L5.33163823,1.62361064 C5.35654118,1.51920756 5.41437908,1.4255891 5.49660017,1.35659741 C5.7081375,1.17909652 6.0235153,1.2066885 6.2010162,1.41822583 L7.38979581,2.8349582 Z" fill="#000000" opacity="0.3"/>
                                </g>
                            </svg>
                        </span>
                        &nbsp;&nbsp;
                        Kuyruklar
                    </h1>
                </div>
                <div class="card-body">
                    <div class="card card-custom bg-gray-100 card-stretch gutter-b mt-n9">
                        <div id="kt_mixed_widget_1_chart_top" class="card-header text-center border-0 pt-10">
                            <h1 style="font-size: 30px; color: white"></h1>
                            <div>
                                <h2 style="float: left;color: white; font-size: 36px">Toplam: &nbsp;</h2>
                                <h1 id="total_queue_span" style="font-size: 40px; color: white;float: left"></h1>
                            </div>
                            <h1 style="font-size: 30px; color: white"></h1>
                        </div>
                        <div class="card-body p-0 position-relative overflow-hidden">
                            <div id="kt_mixed_widget_1_chart_bottom" class="card-rounded-bottom" style="height: 20px"></div>
                            <div class="card-spacer mt-0 pt-0">
                                <div class="row" id="all_queues_row">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card">
                <div class="card-header text-center" style="padding : 1rem 1.25rem">
                    <h1 style="font-size: 36px">
                        <span class="svg-icon svg-icon-dark svg-icon-4x">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M10.9630156,7.5 L11.0475062,7.5 C11.3043819,7.5 11.5194647,7.69464724 11.5450248,7.95024814 L12,12.5 L15.2480695,14.3560397 C15.403857,14.4450611 15.5,14.6107328 15.5,14.7901613 L15.5,15 C15.5,15.2109164 15.3290185,15.3818979 15.1181021,15.3818979 C15.0841582,15.3818979 15.0503659,15.3773725 15.0176181,15.3684413 L10.3986612,14.1087258 C10.1672824,14.0456225 10.0132986,13.8271186 10.0316926,13.5879956 L10.4644883,7.96165175 C10.4845267,7.70115317 10.7017474,7.5 10.9630156,7.5 Z" fill="#000000"/>
                                    <path d="M7.38979581,2.8349582 C8.65216735,2.29743306 10.0413491,2 11.5,2 C17.2989899,2 22,6.70101013 22,12.5 C22,18.2989899 17.2989899,23 11.5,23 C5.70101013,23 1,18.2989899 1,12.5 C1,11.5151324 1.13559454,10.5619345 1.38913364,9.65805651 L3.31481075,10.1982117 C3.10672013,10.940064 3,11.7119264 3,12.5 C3,17.1944204 6.80557963,21 11.5,21 C16.1944204,21 20,17.1944204 20,12.5 C20,7.80557963 16.1944204,4 11.5,4 C10.54876,4 9.62236069,4.15592757 8.74872191,4.45446326 L9.93948308,5.87355717 C10.0088058,5.95617272 10.0495583,6.05898805 10.05566,6.16666224 C10.0712834,6.4423623 9.86044965,6.67852665 9.5847496,6.69415008 L4.71777931,6.96995273 C4.66931162,6.97269931 4.62070229,6.96837279 4.57348157,6.95710938 C4.30487471,6.89303938 4.13906482,6.62335149 4.20313482,6.35474463 L5.33163823,1.62361064 C5.35654118,1.51920756 5.41437908,1.4255891 5.49660017,1.35659741 C5.7081375,1.17909652 6.0235153,1.2066885 6.2010162,1.41822583 L7.38979581,2.8349582 Z" fill="#000000" opacity="0.3"/>
                                </g>
                            </svg>
                        </span>
                        &nbsp;&nbsp;
                        Kayıplar
                    </h1>
                </div>
                <div class="card-body">
                    <div class="card card-custom bg-gray-100 card-stretch gutter-b mt-n9">
                        <div id="kt_mixed_widget_3_chart_top" class="card-header text-center border-0 pt-10">
                            <h1 style="font-size: 30px; color: white"></h1>
                            <div>
                                <h2 style="float: left;color: white; font-size: 36px">Toplam: &nbsp;</h2>
                                <h1 id="total_abandon_span" style="font-size: 40px; color: white;float: left"></h1>
                            </div>
                            <h1 style="font-size: 30px; color: white"></h1>
                        </div>
                        <div class="card-body p-0 position-relative overflow-hidden">
                            <div id="kt_mixed_widget_3_chart_bottom" class="card-rounded-bottom" style="height: 20px"></div>
                            <div class="card-spacer mt-0 pt-0">
                                <div class="row" id="all_abandons_row">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card">
                <div class="card-header text-center" style="padding : 1rem 1.25rem">
                    <h1 style="font-size: 40px">
                        <span class="svg-icon svg-icon-dark svg-icon-4x">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
                                    <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
                                    <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1"/>
                                    <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1"/>
                                    <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1"/>
                                    <rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1"/>
                                    <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1"/>
                                    <rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1"/>
                                </g>
                            </svg>
                        </span>
                        &nbsp;&nbsp;
                        Bekleyen İşler
                    </h1>
                </div>
                <div class="card-body">
                    <div class="card card-custom bg-gray-100 card-stretch gutter-b mt-n9">
                        <div id="kt_mixed_widget_4_chart_top" class="card-header text-center border-0 bg-dark-75 pt-10">
                            <h1 style="font-size: 30px; color: white"></h1>
                            <div>
                                <h2 style="float: left;color: white; font-size: 36px">Toplam: &nbsp;</h2>
                                <h1 id="total_job_span" style="font-size: 40px; color: white;float: left">--</h1>
                            </div>
                            <h1 style="font-size: 30px; color: white"></h1>
                        </div>
                        <div class="card-body p-0">
                            <div id="kt_mixed_widget_4_chart_bottom" class="card-rounded-bottom bg-dark-75" style="height: 20px"></div>
                            <div class="card-spacer">
                                <div class="row" id="all_jobs_row">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')

    <style>

        .mydisco{
            animation: background 2s cubic-bezier(1,0,0,1) infinite;
        }

        @-webkit-keyframes background {
            0% { background-color: orangered; }
            50% { background-color: darkred; }
            100% { background-color: orangered; }
        }

        @keyframes background {
            0% { background-color: orangered; }
            50% { background-color: darkred; }
            100% { background-color: orangered; }
        }

    </style>

@stop

@section('page-script')

    <script type="text/javascript">
        $(document).ready(function(){

            function calculateDate() {
                var date = new Date();
                var day = date.getDay();
                var month = date.getMonth();
                var year = date.getFullYear();
                var hour = date.getHours();
                var minute = date.getMinutes();
                var days = ['Pazar', 'Pazartesi', 'Salı','Çarşamba','Perşembe','Cuma','Cumartesi'];
                var months = ['Ocak', 'Şubat', 'Mart','Nisan','Mayıs','Haziran','Temmuz','Ağustos','Eylül','Ekim','Kasım','Aralık'];
                $('#tarih').html(date.getDate() + ' ' + months[month] + ' ' + year + ', ' + days[day] + ' - ' + hour + ':' + minute);
            }
            calculateDate();
            setInterval(function () {
                calculateDate();
            }, 30000);
        });

    </script>

    <script>

        function callApi() {
            $.ajax({
                async: true,
                type: 'get',
                url: '{{ route('ajax.queue.getQueuesByCompany') }}',
                data: {
                    company_id: 1
                },
                success: function (queues) {
                    $.ajax({
                        async: true,
                        type: "post",
                        url: "http://otscagriapi.ayssoft.com:4444/api/CallQueues",
                        dataType: 'json',
                        data: {
                            appToken: '{{ env('NETSANTRAL_API_TOKEN') }}'
                        },
                        success: function (result) {

                            var total_queue = 0;
                            var total_lost = 0;

                            var allQueuesRow = $("#all_queues_row");
                            var allAbandonsRow = $("#all_abandons_row");

                            allQueuesRow.html('');
                            allAbandonsRow.html('');

                            $.each(queues, function (index) {
                                var getQueue = result.kuyruklar.filter(quee => quee.ad === queues[index].short)[0];
                                if (typeof (getQueue) != "undefined" && getQueue !== null) {
                                    var queueName = queues[index].name;

                                    total_queue = total_queue + getQueue.bekleyen;
                                    total_lost = total_lost + (getQueue.terkedilmis - getQueue.callback);

                                    var queueBackground = '#333333';
                                    var abandonBackground = '#333333';

                                    if (getQueue.bekleyen > 5) {
                                        queueBackground = '#cc0000';
                                    } else if (getQueue.bekleyen > 0) {
                                        queueBackground = '#ff5900';
                                    } else {
                                        queueBackground = '#505050';
                                    }

                                    if (getQueue.terkedilmis - getQueue.callback > 5) {
                                        abandonBackground = '#cc0000';
                                    } else if (getQueue.terkedilmis - getQueue.callback > 0) {
                                        abandonBackground = '#ff5900';
                                    } else {
                                        abandonBackground = '#505050';
                                    }

                                    allQueuesRow.append('<div class="col-xl-6">\n' +
                                        '    <div id="job_1_card" style="background-color: ' + queueBackground + '" class="col px-6 py-8 rounded-xl mr-7 mb-7 col-xl-12 float-left">\n' +
                                        '        <span class="svg-icon svg-icon-2x svg-icon-dark d-block text-center text-white">\n' +
                                        '           <span id="" style="font-size: 45px;">' + getQueue.bekleyen + '</span>\n' +
                                        '           <br>\n' +
                                        '           <span class="text-white font-weight-bold font-size-h4">' + queueName + '</span>\n' +
                                        '        </span>\n' +
                                        '    </div>\n' +
                                        '</div>');

                                    allAbandonsRow.append('<div class="col-xl-6">\n' +
                                        '    <div id="job_1_card" style="background-color: ' + abandonBackground + '" class="col px-6 py-8 rounded-xl mr-7 mb-7 col-xl-12 float-left">\n' +
                                        '        <span class="svg-icon svg-icon-2x svg-icon-dark d-block text-center text-white">\n' +
                                        '           <span id="" style="font-size: 45px;">' + (getQueue.terkedilmis - getQueue.callback) + '</span>\n' +
                                        '           <br>\n' +
                                        '           <span class="text-white font-weight-bold font-size-h4">' + queueName + '</span>\n' +
                                        '        </span>\n' +
                                        '    </div>\n' +
                                        '</div>');
                                }
                            });

                            $("#total_queue_span").html(total_queue);
                            $("#kt_mixed_widget_1_chart_bottom").removeClass('bg-dark-75 mydisco');
                            $("#kt_mixed_widget_1_chart_top").removeClass('bg-dark-75 mydisco');
                            if (total_queue >= 10) {
                                $("#kt_mixed_widget_1_chart_bottom").addClass('mydisco');
                                $("#kt_mixed_widget_1_chart_top").addClass('mydisco');
                            } else {
                                $("#kt_mixed_widget_1_chart_bottom").addClass('bg-dark-75');
                                $("#kt_mixed_widget_1_chart_top").addClass('bg-dark-75');
                            }

                            $("#total_abandon_span").html(total_lost);
                            $("#kt_mixed_widget_3_chart_bottom").removeClass('bg-dark-75 mydisco');
                            $("#kt_mixed_widget_3_chart_top").removeClass('bg-dark-75 mydisco');
                            if (total_lost >= 50) {
                                $("#kt_mixed_widget_3_chart_bottom").addClass('mydisco');
                                $("#kt_mixed_widget_3_chart_top").addClass('mydisco');
                            } else {
                                $("#kt_mixed_widget_3_chart_bottom").addClass('bg-dark-75');
                                $("#kt_mixed_widget_3_chart_top").addClass('bg-dark-75');
                            }

                        },
                        error: function () {
                            console.log('Veriler Alınamadı');
                        }
                    });
                },
                error: function (error) {
                    console.log(error);
                }
            });

            $.ajax({
                type: "get",
                url: "{{ route('ajax.monitoring.GetJobList') }}",
                dataType: 'json',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (result) {

                    $("#total_job_span").html(result.totalNewJobs);

                    $("#all_jobs_row").html('');
                    var jobCardBackground = '#333333';
                    $.each(result.responseBody, function (index) {
                        if (
                            result.responseBody[index].baslik == "İ-Dönüşüm Yeni" ||
                            result.responseBody[index].baslik == "Eko Cari Yeni" ||
                            result.responseBody[index].baslik == "İys Yeni" ||
                            result.responseBody[index].baslik == "Uyum Yedek Yeni"
                        ) {
                            if (result.responseBody[index].sayi > 0) {
                                jobCardBackground = '#ff5900';
                            } else {
                                jobCardBackground = '#505050';
                            }
                        } else {
                            jobCardBackground = '#505050';
                        }
                        $("#all_jobs_row").append('<div class="col-xl-6">\n' +
                            '    <div id="job_1_card" style="background-color: ' + jobCardBackground + '" class="col px-6 py-8 rounded-xl mr-7 mb-7 col-xl-12 float-left">\n' +
                            '        <span class="svg-icon svg-icon-2x svg-icon-dark d-block text-center text-white">\n' +
                            '           <span id="" style="font-size: 45px;">' + result.responseBody[index].sayi + '</span>\n' +
                            '           <br>\n' +
                            '           <span class="text-white font-weight-bold font-size-h4">' + result.responseBody[index].baslik + '</span>\n' +
                            '        </span>\n' +
                            '    </div>\n' +
                            '</div>');
                    });

                },
                error: function () {
                    console.log('Veriler Alınamadı');
                }
            });
        }

        callApi();

        setInterval(function () {
            callApi();
        }, 15000);

    </script>

@stop
