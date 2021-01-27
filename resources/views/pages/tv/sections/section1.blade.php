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
                        <!--begin::Header-->
                        <div id="kt_mixed_widget_1_chart_top" class="card-header text-center border-0 pt-10">
                            <h1 style="font-size: 30px; color: white"></h1>
                            <div>
                                <h2 style="float: left;color: white; font-size: 36px">Toplam: &nbsp;</h2>
                                <h1 id="total_quee_span" style="font-size: 40px; color: white;float: left"></h1>
                            </div>
                            <h1 style="font-size: 30px; color: white"></h1>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body p-0 position-relative overflow-hidden">
                            <!--begin::Chart-->
                            <div id="kt_mixed_widget_1_chart_bottom" class="card-rounded-bottom" style="height: 20px"></div>
                            <!--end::Chart-->
                            <!--begin::Stats-->
                            <div class="card-spacer mt-0 pt-0">

                                <div class="row m-0">
                                    <div id="iuyum_waiting_card" style="" class="col px-6 py-8 rounded-xl mr-7 mb-7">
                                       <span class="svg-icon svg-icon-2x svg-icon-dark d-block text-center text-white">
                                           <span id="iuyum_waiting_span" style="font-size: 45px;">--</span>
                                           <br>
                                           <span class="text-white font-weight-bold font-size-h4">I-Uyum</span>
                                        </span>
                                    </div>
                                    <div id="efaturaearsiv_waiting_card" style="" class="col px-6 py-8 rounded-xl mr-7 mb-7">
                                       <span class="svg-icon svg-icon-2x svg-icon-dark d-block text-center text-white">
                                           <span id="efaturaearsiv_waiting_span" style="font-size: 45px;">--</span>
                                           <br>
                                           <span class="text-white font-weight-bold font-size-h4">E-Fatura | E-Arşiv</span>
                                        </span>

                                    </div>
                                </div>

                                <div class="row m-0">
                                    <div id="hesapaktivasyon_waiting_card"  class="col px-6 py-8 rounded-xl mr-7 mb-7">
                                       <span class="svg-icon svg-icon-2x svg-icon-dark d-block text-center text-white">
                                           <span id="hesapaktivasyon_waiting_span" style="font-size: 45px;">--</span>
                                           <br>
                                           <span class="text-white font-weight-bold font-size-h4">Hesap Aktivasyon</span>
                                        </span>

                                    </div>
                                    <div id="eirsaliyehesapacilis_waiting_card"  class="col px-6 py-8 rounded-xl mr-7 mb-7">
                                       <span class="svg-icon svg-icon-2x svg-icon-dark d-block text-center text-white">
                                           <span id="eirsaliyehesapacilis_waiting_span" style="font-size: 45px;">--</span>
                                           <br>
                                           <span class="text-white font-weight-bold font-size-h4">İrsaliye Aktivasyon</span>
                                        </span>

                                    </div>
                                </div>

                                <div class="row m-0">
                                    <div id="eirsaliyedestek_waiting_card"  class="col px-6 py-8 rounded-xl mr-7 mb-7">
                                       <span class="svg-icon svg-icon-2x svg-icon-dark d-block text-center text-white">
                                           <span id="eirsaliyedestek_waiting_span" style="font-size: 45px;">--</span>
                                           <br>
                                           <span class="text-white font-weight-bold font-size-h4">E-İrsaliye Destek</span>
                                        </span>

                                    </div>
                                    <div id="edefter_waiting_card"  class="col px-6 py-8 rounded-xl mr-7 mb-7">
                                       <span class="svg-icon svg-icon-2x svg-icon-dark d-block text-center text-white">
                                           <span id="edefter_waiting_span" style="font-size: 45px;">--</span>
                                           <br>
                                           <span class="text-white font-weight-bold font-size-h4">E-Defter</span>
                                        </span>

                                    </div>
                                </div>

                                <div class="row m-0">
                                    <div id="edefterimzalama_waiting_card"  class="col px-6 py-8 rounded-xl mr-7 mb-7">
                                       <span class="svg-icon svg-icon-2x svg-icon-dark d-block text-center text-white">
                                           <span id="edefterimzalama_waiting_span" style="font-size: 45px;">--</span>
                                           <br>
                                           <span class="text-white font-weight-bold font-size-h4">E-Defter İmzalama</span>
                                        </span>

                                    </div>
                                    <div id="ekocari_waiting_card"  class="col px-6 py-8 rounded-xl mr-7 mb-7">
                                       <span class="svg-icon svg-icon-2x svg-icon-dark d-block text-center text-white">
                                           <span id="ekocari_waiting_span" style="font-size: 45px;">--</span>
                                           <br>
                                           <span class="text-white font-weight-bold font-size-h4">Ekocari</span>
                                        </span>

                                    </div>
                                </div>

                                <div class="row m-0">
                                    <div id="yedek_waiting_card" class="col px-6 py-8 rounded-xl mr-7 mb-7">
                                       <span class="svg-icon svg-icon-2x svg-icon-dark d-block text-center text-white">
                                           <span id="yedek_waiting_span" style="font-size: 45px;">--</span>
                                           <br>
                                           <span class="text-white font-weight-bold font-size-h4">Yedek</span>
                                        </span>

                                    </div>
                                    <div id="xxx_waiting_card" class="col px-6 py-8 rounded-xl mr-7 mb-7">
                                       <span class="svg-icon svg-icon-2x svg-icon-dark d-block text-center text-white">
                                           <span id="xxx_waiting_span" style="font-size: 45px;"></span>
                                           <br>
                                           <span class="text-white font-weight-bold font-size-h4"></span>
                                        </span>

                                    </div>
                                </div>

                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Body-->
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
                                    <path d="M6.58578644,8 L5.17157288,6.58578644 C4.78104858,6.19526215 4.78104858,5.56209717 5.17157288,5.17157288 C5.56209717,4.78104858 6.19526215,4.78104858 6.58578644,5.17157288 L8,6.58578644 L9.41421356,5.17157288 C9.80473785,4.78104858 10.4379028,4.78104858 10.8284271,5.17157288 C11.2189514,5.56209717 11.2189514,6.19526215 10.8284271,6.58578644 L9.41421356,8 L10.8284271,9.41421356 C11.2189514,9.80473785 11.2189514,10.4379028 10.8284271,10.8284271 C10.4379028,11.2189514 9.80473785,11.2189514 9.41421356,10.8284271 L8,9.41421356 L6.58578644,10.8284271 C6.19526215,11.2189514 5.56209717,11.2189514 5.17157288,10.8284271 C4.78104858,10.4379028 4.78104858,9.80473785 5.17157288,9.41421356 L6.58578644,8 Z" fill="#000000" opacity="0.3"/>
                                    <path d="M13.0799676,14.7839934 L15.2839934,12.5799676 C15.8927139,11.9712471 16.0436229,11.0413042 15.6586342,10.2713269 L15.5337539,10.0215663 C15.1487653,9.25158901 15.2996742,8.3216461 15.9083948,7.71292558 L18.6411989,4.98012149 C18.836461,4.78485934 19.1530435,4.78485934 19.3483056,4.98012149 C19.3863063,5.01812215 19.4179321,5.06200062 19.4419658,5.11006808 L20.5459415,7.31801948 C21.3904962,9.0071287 21.0594452,11.0471565 19.7240871,12.3825146 L13.7252616,18.3813401 C12.2717221,19.8348796 10.1217008,20.3424308 8.17157288,19.6923882 L5.75709327,18.8875616 C5.49512161,18.8002377 5.35354162,18.5170777 5.4408655,18.2551061 C5.46541191,18.1814669 5.50676633,18.114554 5.56165376,18.0596666 L8.21292558,15.4083948 C8.8216461,14.7996742 9.75158901,14.6487653 10.5215663,15.0337539 L10.7713269,15.1586342 C11.5413042,15.5436229 12.4712471,15.3927139 13.0799676,14.7839934 Z" fill="#000000"/>
                                </g>
                            </svg>
                        </span>
                        &nbsp;&nbsp;
                        Kayıplar
                    </h1>
                </div>

                <div class="card-body">

                    <div class="card card-custom bg-gray-100 card-stretch gutter-b mt-n9">
                        <!--begin::Header-->
                        <div id="kt_mixed_widget_3_chart_top" class="card-header text-center border-0 pt-10">
                            <h1 style="font-size: 30px; color: white"></h1>
                            <div>
                                <h2 style="float: left;color: white; font-size: 36px">Toplam: &nbsp;</h2>
                                <h1 id="total_lost_span" style="font-size: 40px; color: white;float: left">-</h1>
                            </div>
                            <h1 style="font-size: 30px; color: white"></h1>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body p-0 position-relative overflow-hidden">
                            <!--begin::Chart-->
                            <div id="kt_mixed_widget_3_chart_bottom" class="card-rounded-bottom" style="height: 20px"></div>
                            <!--end::Chart-->
                            <!--begin::Stats-->
                            <div class="card-spacer">

                                <div class="row m-0">
                                    <div id="iuyum_lost_card"  class="col px-6 py-8 rounded-xl mr-7 mb-7">
                                       <span class="svg-icon svg-icon-2x svg-icon-dark d-block text-center text-white">
                                           <span id="iuyum_lost_span" style="font-size: 45px;">--</span>
                                           <br>
                                           <span class="text-white font-weight-bold font-size-h4">I-Uyum</span>
                                        </span>

                                    </div>
                                    <div id="efaturaearsiv_lost_card"  class="col px-6 py-8 rounded-xl mr-7 mb-7">
                                       <span class="svg-icon svg-icon-2x svg-icon-dark d-block text-center text-white">
                                           <span id="efaturaearsiv_lost_span" style="font-size: 45px;">--</span>
                                           <br>
                                           <span class="text-white font-weight-bold font-size-h4">E-Fatura | E-Arşiv</span>
                                        </span>

                                    </div>
                                </div>

                                <div class="row m-0">
                                    <div id="hesapaktivasyon_lost_card"  class="col px-6 py-8 rounded-xl mr-7 mb-7">
                                       <span class="svg-icon svg-icon-2x svg-icon-dark d-block text-center text-white">
                                           <span id="hesapaktivasyon_lost_span" style="font-size: 45px;">--</span>
                                           <br>
                                           <span class="text-white font-weight-bold font-size-h4">Hesap Aktivasyon</span>
                                        </span>

                                    </div>
                                    <div id="eirsaliyehesapacilis_lost_card"  class="col px-6 py-8 rounded-xl mr-7 mb-7">
                                       <span class="svg-icon svg-icon-2x svg-icon-dark d-block text-center text-white">
                                           <span id="eirsaliyehesapacilis_lost_span" style="font-size: 45px;">--</span>
                                           <br>
                                           <span class="text-white font-weight-bold font-size-h4">İrsaliye Aktivasyon</span>
                                        </span>

                                    </div>
                                </div>

                                <div class="row m-0">
                                    <div id="eirsaliyedestek_lost_card"  class="col px-6 py-8 rounded-xl mr-7 mb-7">
                                       <span class="svg-icon svg-icon-2x svg-icon-dark d-block text-center text-white">
                                           <span id="eirsaliyedestek_lost_span" style="font-size: 45px;">--</span>
                                           <br>
                                           <span class="text-white font-weight-bold font-size-h4">E-İrsaliye Destek</span>
                                        </span>

                                    </div>
                                    <div id="edefter_lost_card" class="col px-6 py-8 rounded-xl mr-7 mb-7">
                                       <span class="svg-icon svg-icon-2x svg-icon-dark d-block text-center text-white">
                                           <span id="edefter_lost_span" style="font-size: 45px;">--</span>
                                           <br>
                                           <span class="text-white font-weight-bold font-size-h4">E-Defter</span>
                                        </span>

                                    </div>
                                </div>

                                <div class="row m-0">
                                    <div id="edefterimzalama_lost_card" class="col px-6 py-8 rounded-xl mr-7 mb-7">
                                       <span class="svg-icon svg-icon-2x svg-icon-dark d-block text-center text-white">
                                           <span id="edefterimzalama_lost_span" style="font-size: 45px;">--</span>
                                           <br>
                                           <span class="text-white font-weight-bold font-size-h4">E-Defter İmzalama</span>
                                        </span>

                                    </div>
                                    <div id="ekocari_lost_card" class="col px-6 py-8 rounded-xl mr-7 mb-7">
                                       <span class="svg-icon svg-icon-2x svg-icon-dark d-block text-center text-white">
                                           <span id="ekocari_lost_span" style="font-size: 45px;">--</span>
                                           <br>
                                           <span class="text-white font-weight-bold font-size-h4">Ekocari</span>
                                        </span>

                                    </div>
                                </div>

                                <div class="row m-0">
                                    <div id="yedek_lost_card" class="col px-6 py-8 rounded-xl mr-7 mb-7">
                                       <span class="svg-icon svg-icon-2x svg-icon-dark d-block text-center text-white">
                                           <span id="yedek_lost_span" style="font-size: 45px;">--</span>
                                           <br>
                                           <span class="text-white font-weight-bold font-size-h4">Yedek</span>
                                        </span>

                                    </div>
                                    <div id="xxx_lost_card" class="col px-6 py-8 rounded-xl mr-7 mb-7">
                                       <span class="svg-icon svg-icon-2x svg-icon-dark d-block text-center text-white">
                                           <span id="xxx_lost_span" style="font-size: 45px;"></span>
                                           <br>
                                           <span class="text-white font-weight-bold font-size-h4"></span>
                                        </span>

                                    </div>
                                </div>

                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Body-->
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
                        <!--begin::Header-->
                        <div id="kt_mixed_widget_4_chart_top" class="card-header text-center border-0 bg-dark-75 pt-10">
                            <h1 style="font-size: 30px; color: white"></h1>
                            <div>
                                <h2 style="float: left;color: white; font-size: 36px">Toplam: &nbsp;</h2>
                                <h1 id="total_job_span" style="font-size: 40px; color: white;float: left">--</h1>
                            </div>
                            <h1 style="font-size: 30px; color: white"></h1>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body p-0">
                            <!--begin::Chart-->
                            <div id="kt_mixed_widget_4_chart_bottom" class="card-rounded-bottom bg-dark-75" style="height: 20px"></div>
                            <!--end::Chart-->
                            <!--begin::Stats-->
                            <div class="card-spacer">

                                <div class="row" id="all_jobs_row">

                                </div>

                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Body-->
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

        function callApi()
        {
            $.ajax({
                type: "post",
                url: "{{ route('ajax.monitoring.CallQueues') }}",
                dataType: 'json',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (result) {

                    var iuyum = result.kuyruklar.filter(quee => quee.ad == "Iuyum")[0];
                    var efaturaearsiv = result.kuyruklar.filter(quee => quee.ad == "EfaturaEarsiv")[0];
                    var hesapaktivasyon = result.kuyruklar.filter(quee => quee.ad == "HesapAktivasyon")[0];
                    var eirsaliyehesapacilis = result.kuyruklar.filter(quee => quee.ad == "eIsaliyeHesapAcilis")[0];
                    var eirsaliyedestek = result.kuyruklar.filter(quee => quee.ad == "eIrsaliyeDestek")[0];
                    var edefter = result.kuyruklar.filter(quee => quee.ad == "Edefter")[0];
                    var edefterimzalama = result.kuyruklar.filter(quee => quee.ad == "EdefterImzalama")[0];
                    var ekocari = result.kuyruklar.filter(quee => quee.ad == "EkoCari")[0];
                    var yedek = result.kuyruklar.filter(quee => quee.ad == "Yedek")[0];

                    // Iuyum
                    $("#iuyum_waiting_span").html(iuyum.bekleyen);
                    $("#iuyum_lost_span").html(iuyum.terkedilmis - iuyum.callback);
                    if (iuyum.bekleyen > 5) {
                        $("#iuyum_waiting_card").css('background-color','#cc0000');
                    } else if (iuyum.bekleyen > 0) {
                        $("#iuyum_waiting_card").css('background-color','#ff5900');
                    } else {
                        $("#iuyum_waiting_card").css('background-color','#505050');
                    }
                    if (iuyum.terkedilmis - iuyum.callback > 5) {
                        $("#iuyum_lost_card").css('background-color','#cc0000');
                    } else if (iuyum.terkedilmis - iuyum.callback > 0) {
                        $("#iuyum_lost_card").css('background-color','#ff5900');
                    } else {
                        $("#iuyum_lost_card").css('background-color','#505050');
                    }

                    // Efatura Earsiv
                    $("#efaturaearsiv_waiting_span").html(efaturaearsiv.bekleyen);
                    $("#efaturaearsiv_lost_span").html(efaturaearsiv.terkedilmis - efaturaearsiv.callback);
                    if (efaturaearsiv.bekleyen > 5) {
                        $("#efaturaearsiv_waiting_card").css('background-color','#cc0000');
                    } else if (efaturaearsiv.bekleyen > 0) {
                        $("#efaturaearsiv_waiting_card").css('background-color','#ff5900');
                    } else {
                        $("#efaturaearsiv_waiting_card").css('background-color','#505050');
                    }
                    if (efaturaearsiv.terkedilmis - efaturaearsiv.callback > 5) {
                        $("#efaturaearsiv_lost_card").css('background-color','#cc0000');
                    } else if (efaturaearsiv.terkedilmis - efaturaearsiv.callback > 0) {
                        $("#efaturaearsiv_lost_card").css('background-color','#ff5900');
                    } else {
                        $("#efaturaearsiv_lost_card").css('background-color','#505050');
                    }

                    // Hesap Aktivasyon
                    $("#hesapaktivasyon_waiting_span").html(hesapaktivasyon.bekleyen);
                    $("#hesapaktivasyon_lost_span").html(hesapaktivasyon.terkedilmis - hesapaktivasyon.callback);
                    if (hesapaktivasyon.bekleyen > 5) {
                        $("#hesapaktivasyon_waiting_card").css('background-color','#cc0000');
                    } else if (hesapaktivasyon.bekleyen > 0) {
                        $("#hesapaktivasyon_waiting_card").css('background-color','#ff5900');
                    } else {
                        $("#hesapaktivasyon_waiting_card").css('background-color','#505050');
                    }
                    if (hesapaktivasyon.terkedilmis - hesapaktivasyon.callback > 5) {
                        $("#hesapaktivasyon_lost_card").css('background-color','#cc0000');
                    } else if (hesapaktivasyon.terkedilmis - hesapaktivasyon.callback > 0) {
                        $("#hesapaktivasyon_lost_card").css('background-color','#ff5900');
                    } else {
                        $("#hesapaktivasyon_lost_card").css('background-color','#505050');
                    }

                    // E-irsaliye Hesap Açılış
                    $("#eirsaliyehesapacilis_waiting_span").html(eirsaliyehesapacilis.bekleyen);
                    $("#eirsaliyehesapacilis_lost_span").html(eirsaliyehesapacilis.terkedilmis - eirsaliyehesapacilis.callback);
                    if (eirsaliyehesapacilis.bekleyen > 5) {
                        $("#eirsaliyehesapacilis_waiting_card").css('background-color','#cc0000');
                    } else if (eirsaliyehesapacilis.bekleyen > 0) {
                        $("#eirsaliyehesapacilis_waiting_card").css('background-color','#ff5900');
                    } else {
                        $("#eirsaliyehesapacilis_waiting_card").css('background-color','#505050');
                    }
                    if (eirsaliyehesapacilis.terkedilmis - eirsaliyehesapacilis.callback > 5) {
                        $("#eirsaliyehesapacilis_lost_card").css('background-color','#cc0000');
                    } else if (eirsaliyehesapacilis.terkedilmis - eirsaliyehesapacilis.callback > 0) {
                        $("#eirsaliyehesapacilis_lost_card").css('background-color','#ff5900');
                    } else {
                        $("#eirsaliyehesapacilis_lost_card").css('background-color','#505050');
                    }

                    // E-irsaliye Destek
                    $("#eirsaliyedestek_waiting_span").html(eirsaliyedestek.bekleyen);
                    $("#eirsaliyedestek_lost_span").html(eirsaliyedestek.terkedilmis - eirsaliyedestek.callback);
                    if (eirsaliyedestek.bekleyen > 5) {
                        $("#eirsaliyedestek_waiting_card").css('background-color','#cc0000');
                    } else if (eirsaliyedestek.bekleyen > 0) {
                        $("#eirsaliyedestek_waiting_card").css('background-color','#ff5900');
                    } else {
                        $("#eirsaliyedestek_waiting_card").css('background-color','#505050');
                    }
                    if (eirsaliyedestek.terkedilmis - eirsaliyedestek.callback > 5) {
                        $("#eirsaliyedestek_lost_card").css('background-color','#cc0000');
                    } else if (eirsaliyedestek.terkedilmis - eirsaliyedestek.callback > 0) {
                        $("#eirsaliyedestek_lost_card").css('background-color','#ff5900');
                    } else {
                        $("#eirsaliyedestek_lost_card").css('background-color','#505050');
                    }

                    // E-Defter
                    $("#edefter_waiting_span").html(edefter.bekleyen);
                    $("#edefter_lost_span").html(edefter.terkedilmis - edefter.callback);
                    if (edefter.bekleyen > 5) {
                        $("#edefter_waiting_card").css('background-color','#cc0000');
                    } else if (edefter.bekleyen > 0) {
                        $("#edefter_waiting_card").css('background-color','#ff5900');
                    } else {
                        $("#edefter_waiting_card").css('background-color','#505050');
                    }
                    if (edefter.terkedilmis - edefter.callback > 5) {
                        $("#edefter_lost_card").css('background-color','#cc0000');
                    } else if (edefter.terkedilmis - edefter.callback > 0) {
                        $("#edefter_lost_card").css('background-color','#ff5900');
                    } else {
                        $("#edefter_lost_card").css('background-color','#505050');
                    }

                    // E-Defter İmzalama
                    $("#edefterimzalama_waiting_span").html(edefterimzalama.bekleyen);
                    $("#edefterimzalama_lost_span").html(edefterimzalama.terkedilmis - edefterimzalama.callback);
                    if (edefterimzalama.bekleyen > 5) {
                        $("#edefterimzalama_waiting_card").css('background-color','#cc0000');
                    } else if (edefterimzalama.bekleyen > 0) {
                        $("#edefterimzalama_waiting_card").css('background-color','#ff5900');
                    } else {
                        $("#edefterimzalama_waiting_card").css('background-color','#505050');
                    }
                    if (edefterimzalama.terkedilmis - edefterimzalama.callback > 5) {
                        $("#edefterimzalama_lost_card").css('background-color','#cc0000');
                    } else if (edefterimzalama.terkedilmis - edefterimzalama.callback > 0) {
                        $("#edefterimzalama_lost_card").css('background-color','#ff5900');
                    } else {
                        $("#edefterimzalama_lost_card").css('background-color','#505050');
                    }

                    // Ekocari
                    $("#ekocari_waiting_span").html(ekocari.bekleyen);
                    $("#ekocari_lost_span").html(ekocari.terkedilmis - ekocari.callback);
                    if (ekocari.bekleyen > 5) {
                        $("#ekocari_waiting_card").css('background-color','#cc0000');
                    } else if (ekocari.bekleyen > 0) {
                        $("#ekocari_waiting_card").css('background-color','#ff5900');
                    } else {
                        $("#ekocari_waiting_card").css('background-color','#505050');
                    }
                    if (ekocari.terkedilmis - ekocari.callback > 5) {
                        $("#ekocari_lost_card").css('background-color','#cc0000');
                    } else if (ekocari.terkedilmis - ekocari.callback > 0) {
                        $("#ekocari_lost_card").css('background-color','#ff5900');
                    } else {
                        $("#ekocari_lost_card").css('background-color','#505050');
                    }

                    // Yedek
                    $("#yedek_waiting_span").html(yedek.bekleyen);
                    $("#yedek_lost_span").html(yedek.terkedilmis - yedek.callback);
                    if (yedek.bekleyen > 5) {
                        $("#yedek_waiting_card").css('background-color','#cc0000');
                    } else if (yedek.bekleyen > 0) {
                        $("#yedek_waiting_card").css('background-color','#ff5900');
                    } else {
                        $("#yedek_waiting_card").css('background-color','#505050');
                    }
                    if (yedek.terkedilmis - yedek.callback > 5) {
                        $("#yedek_lost_card").css('background-color','#cc0000');
                    } else if (yedek.terkedilmis - yedek.callback > 0) {
                        $("#yedek_lost_card").css('background-color','#ff5900');
                    } else {
                        $("#yedek_lost_card").css('background-color','#505050');
                    }

                    var total_quee =
                        iuyum.bekleyen +
                        efaturaearsiv.bekleyen +
                        hesapaktivasyon.bekleyen +
                        eirsaliyehesapacilis.bekleyen +
                        eirsaliyedestek.bekleyen +
                        edefter.bekleyen +
                        edefterimzalama.bekleyen +
                        ekocari.bekleyen +
                        yedek.bekleyen;

                    var total_lost = (iuyum.terkedilmis - iuyum.callback) +
                        (efaturaearsiv.terkedilmis - efaturaearsiv.callback) +
                        (hesapaktivasyon.terkedilmis - hesapaktivasyon.callback) +
                        (eirsaliyehesapacilis.terkedilmis - eirsaliyehesapacilis.callback) +
                        (eirsaliyedestek.terkedilmis - eirsaliyedestek.callback) +
                        (edefter.terkedilmis - edefter.callback) +
                        (edefterimzalama.terkedilmis - edefterimzalama.callback) +
                        (ekocari.terkedilmis - ekocari.callback) +
                        (yedek.terkedilmis - yedek.callback);

                    $("#total_quee_span").html(total_quee);
                    $("#kt_mixed_widget_1_chart_bottom").removeClass('bg-dark-75 mydisco');
                    $("#kt_mixed_widget_1_chart_top").removeClass('bg-dark-75 mydisco');
                    if (total_quee >= 10) {
                        $("#kt_mixed_widget_1_chart_bottom").addClass('mydisco');
                        $("#kt_mixed_widget_1_chart_top").addClass('mydisco');
                    } else {
                        $("#kt_mixed_widget_1_chart_bottom").addClass('bg-dark-75');
                        $("#kt_mixed_widget_1_chart_top").addClass('bg-dark-75');
                    }

                    $("#total_lost_span").html(total_lost);
                    $("#kt_mixed_widget_3_chart_bottom").removeClass('bg-dark-75 mydisco');
                    $("#kt_mixed_widget_3_chart_top").removeClass('bg-dark-75 mydisco');
                    if (total_lost >= 50) {
                        $("#kt_mixed_widget_3_chart_bottom").addClass('mydisco');
                        $("#kt_mixed_widget_3_chart_top").addClass('mydisco');
                    } else {
                        $("#kt_mixed_widget_3_chart_bottom").addClass('bg-dark-75');
                        $("#kt_mixed_widget_3_chart_top").addClass('bg-dark-75');
                    }

                    console.log('Tamamlandı');

                },
                error: function () {
                    console.log('Veriler Alınamadı');
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
                    $.each(result.responseBody, function (index) {
                        if (
                            result.responseBody[index].baslik == "İ-Dönüşüm Yeni" ||
                            result.responseBody[index].baslik == "Eko Cari Yeni" ||
                            result.responseBody[index].baslik == "İys Yeni" ||
                            result.responseBody[index].baslik == "Uyum Yedek Yeni"
                        ) {
                            if (result.responseBody[index].sayi > 0) {
                                var cardbgcolor = '#ff5900';
                            } else {
                                var cardbgcolor = '#505050';
                            }
                        } else {
                            var cardbgcolor = '#505050';
                        }
                        $("#all_jobs_row").append('<div class="col-xl-6">\n' +
                            '    <div id="job_1_card" style="background-color: ' + cardbgcolor + '" class="col px-6 py-8 rounded-xl mr-7 mb-7 col-xl-12 float-left">\n' +
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
        }, 10000);

    </script>

@stop
