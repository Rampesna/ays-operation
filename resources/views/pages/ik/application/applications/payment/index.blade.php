@extends('layouts.master')
@section('title', 'Ödemeler')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))
@php(setlocale(LC_TIME, 'Turkish'))

@section('content')

    @include('pages.ik.application.applications.payment.modals.create')
    @include('pages.ik.application.applications.payment.modals.edit')
    @include('pages.ik.application.applications.payment.modals.delete')

    <div class="row">
        <div class="col-xl-12 text-right">
            <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#CreatePaymentModal">Yeni Ödeme Oluştur</button>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <table class="table" id="payments">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Personel</th>
                            <th>Tutar</th>
                            <th>Durum</th>
                            <th>Ödeme Türü</th>
                            <th>Ödeme Tarihi</th>
                            <th>Açıklama</th>
                            <th>Bordro</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($payments as  $payment)
                            <tr>
                                <td>
                                    <div class="dropdown dropdown-inline">
                                        <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ki ki-bold-more-ver"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <ul class="navi navi-hover">
                                                <li class="navi-item">
                                                    <a data-id="{{ $payment->id }}" class="navi-link cursor-pointer edit">
                                                        <span class="navi-icon">
                                                            <i class="fa fa-edit"></i>
                                                        </span>
                                                        <span class="navi-text">Düzenle</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a data-id="{{ $payment->id }}" class="navi-link cursor-pointer delete">
                                                        <span class="navi-icon">
                                                            <i class="fa fa-trash-alt text-danger"></i>
                                                        </span>
                                                        <span class="navi-text text-danger">Sil</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $payment->employee->name }}</td>
                                <td>{{ number_format($payment->amount, 2) }}</td>
                                <td><span class="btn btn-pill btn-sm btn-{{ $payment->status->color }}" style="font-size: 11px; height: 20px; padding-top: 2px">{{ $payment->status->name }}</span></td>
                                <td>{{ $payment->type->name }}</td>
                                <td>{{ strftime("%d %B %Y", strtotime($payment->date)) }}</td>
                                <td><label style="width: 100%"><textarea class="form-control" rows="2" disabled>{{ $payment->description }}</textarea></label></td>
                                <td>
                                    @if($payment->payroll === 1)
                                        <i class="fa fa-check-circle text-success"></i> Dahil Edilecek
                                    @else
                                        <i class="fa fa-times-circle text-danger"></i> Dahil Edilmeyecek
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')
    @include('pages.ik.application.applications.payment.components.style')
@stop

@section('page-script')
    @include('pages.ik.application.applications.payment.components.script')
@stop
