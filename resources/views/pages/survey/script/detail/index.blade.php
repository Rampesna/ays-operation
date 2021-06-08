@extends('layouts.master')
@section('title', 'Script Detayları')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <table class="table" id="surveyList">
                                <thead>
                                <tr>
                                    <th>Kodu</th>
                                    <th>Adı</th>
                                    <th>Çağrı Nedeni</th>
                                    <th>Açıklaması</th>
                                    <th>Müşteri Bilgilendirmesi 1</th>
                                    <th>Müşteri Bilgilendirmesi 2</th>
                                    <th>Hizmet/Ürün</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($surveyList as $survey)
                                    <tr>
                                        <td class="details-control cursor-pointer">{{ @$survey['kodu'] }}</td>
                                        <td class="details-control cursor-pointer">{{ @$survey['adi'] }}</td>
                                        <td class="details-control cursor-pointer">{{ @$survey['uyumCrmCagriNedeni'] }}</td>
                                        <td class="details-control cursor-pointer"><textarea class="form-control" rows="2" style="width: 240px" disabled>{{ @$survey['aciklama'] }}</textarea></td>
                                        <td class="details-control cursor-pointer"><textarea class="form-control" rows="2" style="width: 240px" disabled>{{ @$survey['musteriBilgilendirme'] }}</textarea></td>
                                        <td class="details-control cursor-pointer"><textarea class="form-control" rows="2" style="width: 240px" disabled>{{ @$survey['musteriBilgilendirme2'] }}</textarea></td>
                                        <td class="details-control cursor-pointer"><textarea class="form-control" rows="2" style="width: 240px" disabled>{{ @$survey['uyumCrmHizmetUrun'] }}</textarea></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')
    @include('pages.survey.script.detail.components.style')
@stop

@section('page-script')
    @include('pages.survey.script.detail.components.script')
@stop
