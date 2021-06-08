@extends('layouts.master')
@section('title', 'Script İnceleme')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    <div class="row">
        <div class="col-xl-5">
            <div class="card">
                <div class="card-body">
                    <h6 class="mt-3 mb-0">{{ @$survey['adi'] }}</h6>
                    <span>Durum: ({{ @$survey['durum'] }})</span>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <div>ID</div>
                        <div>{{ @$survey['id'] }}</div>
                    </div>
                    <br>
                    <div class="d-flex justify-content-between">
                        <div>Kodu</div>
                        <div>{{ @$survey['kodu'] }}</div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <div class="font-weight-bolder">Açıklama: </div>
                    </div>
                    <br>
                    <div class="d-flex justify-content-between">
                        <div>{!! @$survey['aciklama'] !!}</div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <div class="font-weight-bolder">Müşteri Bilgilendirme: </div>
                    </div>
                    <br>
                    <div class="d-flex justify-content-between">
                        <div>{!! @$survey['musteriBilgilendirme'] !!}</div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <div class="font-weight-bolder">Müşteri Bilgilendirme 2: </div>
                    </div>
                    <br>
                    <div class="d-flex justify-content-between">
                        <div>{!! @$survey['musteriBilgilendirme2'] !!}</div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <div>Hizmet / Ürün</div>
                        <div>{{ @$survey['uyumCrmHizmetUrun'] }}</div>
                    </div>
                    <br>
                    <div class="d-flex justify-content-between">
                        <div>Fırsat</div>
                        <div>{{ @$survey['uyumCrmFirsat'] == 1 ? 'Evet' : 'Hayır' }}</div>
                    </div>
                    <br>
                    <div class="d-flex justify-content-between">
                        <div>Çağrı</div>
                        <div>{{ @$survey['uyumCrmCagri'] == 1 ? 'Evet' : 'Hayır' }}</div>
                    </div>
                    <br>
                    <div class="d-flex justify-content-between">
                        <div>Arama Planı</div>
                        <div>{{ @$survey['uyumCrmAramaPlani'] == 1 ? 'Evet' : 'Hayır' }}</div>
                    </div>
                    <br>
                    <div class="d-flex justify-content-between">
                        <div>Fırsat Satıcıya Yönlendir</div>
                        <div>{{ @$survey['uyumCrmFirsatSaticiyaYonlendir'] == 1 ? 'Evet' : 'Hayır' }}</div>
                    </div>
                    <br>
                    <div class="d-flex justify-content-between">
                        <div>Arama Planı Satıcıya Yönlendir</div>
                        <div>{{ @$survey['uyumCrmAramaPlaniSaticiyaYonlendir'] == 1 ? 'Evet' : 'Hayır' }}</div>
                    </div>
                    <br>
                    <div class="d-flex justify-content-between">
                        <div>Satıcı Yönlendirme Tipi</div>
                        <div>{{ @$survey['uyumCrmSaticiKoduTurKodu'] == 1 ? 'Şehire Göre Satıcı Yönlendirme' : (@$survey['uyumCrmSaticiKoduTurKodu'] == 2 ? 'Özelden Satıcı Yönlendirme' : '--') }}</div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <div>E-posta Başlık</div>
                        <div>{{ @$survey['epostaBaslik'] }}</div>
                    </div>
                    <br>
                    <div class="d-flex justify-content-between">
                        <div>E-posta İçerik</div>
                        <div>
                            @if(@$survey['epostaIcerik'] != '')
                                Yok
                            @else
                                <a href="#">Mail Önizlemesini Görüntüle</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-7">
            <div class="card">
                <div class="card-header pt-4 pb-2">
                    <h5>Script Soruları</h5>
                </div>
                <div class="card-body" id="questionsCard">

                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')
    @include('pages.survey.script.diagram.components.style')
@stop

@section('page-script')
    @include('pages.survey.script.diagram.components.script')
@stop
