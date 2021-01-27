@extends('layouts.master')
@section('title', 'Kayıp Çağrılar')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    <div class="row">
        <div class="col-xl-12 text-right">
            <button type="button" id="reload_abandons" class="btn btn-primary" disabled>Kontrol Et</button>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row" id="accordionExample3">
                        <div class="col-xl-6">
                            <div class="accordion accordion-solid accordion-toggle-plus">
                                <div class="card">
                                    <div class="card-header" id="headingOne3">
                                        <div class="card-title collapsed" data-toggle="collapse" data-target="#iuyum">I-Uyum - Kayıplar</div>
                                    </div>
                                    <div id="iuyum" class="collapse" data-parent="#accordionExample3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <table class="table">
                                                        <tbody id="iuyum_row">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo3">
                                        <div class="card-title collapsed" data-toggle="collapse" data-target="#efaturaearsiv">E-Fatura | E-Arşiv - Kayıplar</div>
                                    </div>
                                    <div id="efaturaearsiv" class="collapse" data-parent="#accordionExample3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <table class="table">
                                                        <tbody id="efaturaearsiv_row">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree3">
                                        <div class="card-title collapsed" data-toggle="collapse" data-target="#hesapaktivasyon">Hesap Aktivasyon - Kayıplar</div>
                                    </div>
                                    <div id="hesapaktivasyon" class="collapse" data-parent="#accordionExample3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <table class="table">
                                                        <tbody id="hesapaktivasyon_row">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingOne3">
                                        <div class="card-title collapsed" data-toggle="collapse" data-target="#eirsaliyeaktivasyon">İrsaliye Aktivasyon - Kayıplar</div>
                                    </div>
                                    <div id="eirsaliyeaktivasyon" class="collapse" data-parent="#accordionExample3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <table class="table">
                                                        <tbody id="eirsaliyeaktivasyon_row">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo3">
                                        <div class="card-title collapsed" data-toggle="collapse" data-target="#yedek">Yedekleme - Kayıplar</div>
                                    </div>
                                    <div id="yedek" class="collapse" data-parent="#accordionExample3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <table class="table">
                                                        <tbody id="yedek_row">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="accordion accordion-solid accordion-toggle-plus">
                                <div class="card">
                                    <div class="card-header" id="headingTwo3">
                                        <div class="card-title collapsed" data-toggle="collapse" data-target="#eirsaliyedestek">E-İrsaliye - Destek</div>
                                    </div>
                                    <div id="eirsaliyedestek" class="collapse" data-parent="#accordionExample3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <table class="table">
                                                        <tbody id="eirsaliyedestek_row">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree3">
                                        <div class="card-title collapsed" data-toggle="collapse" data-target="#ekocari">Ekocari - Kayıplar</div>
                                    </div>
                                    <div id="ekocari" class="collapse" data-parent="#accordionExample3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <table class="table">
                                                        <tbody id="ekocari_row">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingOne3">
                                        <div class="card-title collapsed" data-toggle="collapse" data-target="#edefter">E-Defter - Kayıplar</div>
                                    </div>
                                    <div id="edefter" class="collapse" data-parent="#accordionExample3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <table class="table">
                                                        <tbody id="edefter_row">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo3">
                                        <div class="card-title collapsed" data-toggle="collapse" data-target="#edefterimzalama">E-Defter İmzalama - Kayıplar</div>
                                    </div>
                                    <div id="edefterimzalama" class="collapse" data-parent="#accordionExample3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <table class="table">
                                                        <tbody id="edefterimzalama_row">

                                                        </tbody>
                                                    </table>
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
        </div>
    </div>

@endsection

@section('page-styles')

@stop

@section('page-script')

    <script>

        function CallApi()
        {
            $.ajax({
                type: "get",
                url: "/Abandon",
                dataType: 'json',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    console.log(response);

                    $("#iuyum_row").empty();
                    $.each(response.iuyum, function (index) {
                        $("#iuyum_row").append('<tr><td><strong>' + response.iuyum[index].callerNumber + '</strong></td><td>Son Durum: ' + response.iuyum[index].status + ' | Sonuç: ' + response.iuyum[index].result + '</td></tr>');
                    });

                    $("#efaturaearsiv_row").empty();
                    $.each(response.efaturaearsiv, function (index) {
                        $("#efaturaearsiv_row").append('<tr><td><strong>' + response.efaturaearsiv[index].callerNumber + '</strong></td><td>Son Durum: ' + response.efaturaearsiv[index].status + ' | Sonuç: ' + response.efaturaearsiv[index].result + '</td></tr>');
                    });

                    $("#hesapaktivasyon_row").empty();
                    $.each(response.hesapaktivasyon, function (index) {
                        $("#hesapaktivasyon_row").append('<tr><td><strong>' + response.hesapaktivasyon[index].callerNumber + '</strong></td><td>Son Durum: ' + response.hesapaktivasyon[index].status + ' | Sonuç: ' + response.hesapaktivasyon[index].result + '</td></tr>');
                    });

                    $("#eirsaliyeaktivasyon_row").empty();
                    $.each(response.eirsaliyehesapacilis, function (index) {
                        $("#eirsaliyeaktivasyon_row").append('<tr><td><strong>' + response.eirsaliyehesapacilis[index].callerNumber + '</strong></td><td>Son Durum: ' + response.eirsaliyehesapacilis[index].status + ' | Sonuç: ' + response.eirsaliyehesapacilis[index].result + '</td></tr>');
                    });

                    $("#eirsaliyedestek_row").empty();
                    $.each(response.eirsaliyedestek, function (index) {
                        $("#eirsaliyedestek_row").append('<tr><td><strong>' + response.eirsaliyedestek[index].callerNumber + '</strong></td><td>Son Durum: ' + response.eirsaliyedestek[index].status + ' | Sonuç: ' + response.eirsaliyedestek[index].result + '</td></tr>');
                    });

                    $("#ekocari_row").empty();
                    $.each(response.ekocari, function (index) {
                        $("#ekocari_row").append('<tr><td><strong>' + response.ekocari[index].callerNumber + '</strong></td><td>Son Durum: ' + response.ekocari[index].status + ' | Sonuç: ' + response.ekocari[index].result + '</td></tr>');
                    });

                    $("#edefter_row").empty();
                    $.each(response.edefter, function (index) {
                        $("#edefter_row").append('<tr><td><strong>' + response.edefter[index].callerNumber + '</strong></td><td>Son Durum: ' + response.edefter[index].status + ' | Sonuç: ' + response.edefter[index].result + '</td></tr>');
                    });

                    $("#edefterimzalama_row").empty();
                    $.each(response.edefterimzalama, function (index) {
                        $("#edefterimzalama_row").append('<tr><td><strong>' + response.edefterimzalama[index].callerNumber + '</strong></td><td>Son Durum: ' + response.edefterimzalama[index].status + ' | Sonuç: ' + response.edefterimzalama[index].result + '</td></tr>');
                    });

                    $("#yedek_row").empty();
                    $.each(response.yedek, function (index) {
                        $("#yedek_row").append('<tr><td><strong>' + response.yedek[index].callerNumber + '</strong></td><td>Son Durum: ' + response.yedek[index].status + ' | Sonuç: ' + response.yedek[index].result + '</td></tr>');
                    });

                    $("#reload_abandons").attr('disabled', false);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        CallApi();

        $("#reload_abandons").click(function () {
            CallApi();
            $(this).attr('disabled', true);
        });

    </script>

@stop
