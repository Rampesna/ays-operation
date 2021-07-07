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
                                <div class="card">
                                    <div class="card-header" id="headingTwo3">
                                        <div class="card-title collapsed" data-toggle="collapse" data-target="#iys">IYS</div>
                                    </div>
                                    <div id="iys" class="collapse" data-parent="#accordionExample3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <table class="table">
                                                        <tbody id="iys_row">

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
            $('#loader').fadeIn(250);
            $.ajax({
                type: "get",
                url: "{{ route('ajax.monitoring.Abandon') }}",
                dataType: 'json',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    console.log(response);

                    $("#iuyum_row").empty();
                    $.each(response.Iuyum, function (index) {
                        $("#iuyum_row").append('<tr><td><strong>' + response.Iuyum[index].callerNumber + '</strong></td><td>Son Durum: ' + response.Iuyum[index].status + ' | Sonuç: ' + response.Iuyum[index].result + '</td></tr>');
                    });

                    $("#efaturaearsiv_row").empty();
                    $.each(response.EfaturaEarsiv, function (index) {
                        $("#efaturaearsiv_row").append('<tr><td><strong>' + response.EfaturaEarsiv[index].callerNumber + '</strong></td><td>Son Durum: ' + response.EfaturaEarsiv[index].status + ' | Sonuç: ' + response.EfaturaEarsiv[index].result + '</td></tr>');
                    });

                    $("#hesapaktivasyon_row").empty();
                    $.each(response.HesapAktivasyon, function (index) {
                        $("#hesapaktivasyon_row").append('<tr><td><strong>' + response.HesapAktivasyon[index].callerNumber + '</strong></td><td>Son Durum: ' + response.HesapAktivasyon[index].status + ' | Sonuç: ' + response.HesapAktivasyon[index].result + '</td></tr>');
                    });

                    $("#eirsaliyeaktivasyon_row").empty();
                    $.each(response.eIsaliyeHesapAcilis, function (index) {
                        $("#eirsaliyeaktivasyon_row").append('<tr><td><strong>' + response.eIsaliyeHesapAcilis[index].callerNumber + '</strong></td><td>Son Durum: ' + response.eIsaliyeHesapAcilis[index].status + ' | Sonuç: ' + response.eIsaliyeHesapAcilis[index].result + '</td></tr>');
                    });

                    $("#eirsaliyedestek_row").empty();
                    $.each(response.eIrsaliyeDestek, function (index) {
                        $("#eirsaliyedestek_row").append('<tr><td><strong>' + response.eIrsaliyeDestek[index].callerNumber + '</strong></td><td>Son Durum: ' + response.eIrsaliyeDestek[index].status + ' | Sonuç: ' + response.eIrsaliyeDestek[index].result + '</td></tr>');
                    });

                    $("#ekocari_row").empty();
                    $.each(response.EkoCari, function (index) {
                        $("#ekocari_row").append('<tr><td><strong>' + response.EkoCari[index].callerNumber + '</strong></td><td>Son Durum: ' + response.EkoCari[index].status + ' | Sonuç: ' + response.EkoCari[index].result + '</td></tr>');
                    });

                    $("#edefter_row").empty();
                    $.each(response.Edefter, function (index) {
                        $("#edefter_row").append('<tr><td><strong>' + response.Edefter[index].callerNumber + '</strong></td><td>Son Durum: ' + response.Edefter[index].status + ' | Sonuç: ' + response.Edefter[index].result + '</td></tr>');
                    });

                    $("#edefterimzalama_row").empty();
                    $.each(response.Edefterimzalama, function (index) {
                        $("#edefterimzalama_row").append('<tr><td><strong>' + response.Edefterimzalama[index].callerNumber + '</strong></td><td>Son Durum: ' + response.Edefterimzalama[index].status + ' | Sonuç: ' + response.Edefterimzalama[index].result + '</td></tr>');
                    });

                    $("#yedek_row").empty();
                    $.each(response.Yedek, function (index) {
                        $("#yedek_row").append('<tr><td><strong>' + response.Yedek[index].callerNumber + '</strong></td><td>Son Durum: ' + response.Yedek[index].status + ' | Sonuç: ' + response.Yedek[index].result + '</td></tr>');
                    });

                    $("#iys_row").empty();
                    $.each(response.IYS, function (index) {
                        $("#iys_row").append('<tr><td><strong>' + response.IYS[index].callerNumber + '</strong></td><td>Son Durum: ' + response.IYS[index].status + ' | Sonuç: ' + response.IYS[index].result + '</td></tr>');
                    });

                    $("#reload_abandons").attr('disabled', false);
                    $('#loader').fadeOut(250);
                },
                error: function (error) {
                    toastr.error('Kayıp Çağrılar Alınırken Sistemsel Bir Hata Oluştu!');
                    console.log(error);
                    $('#loader').fadeOut(250);
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
