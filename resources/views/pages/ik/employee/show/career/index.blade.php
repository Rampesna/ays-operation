@extends('layouts.master')
@section('title', $employee->name . ' - Kariyer Bilgileri')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))
@php(setlocale(LC_TIME, 'Turkish'))

@section('content')

    @include('pages.ik.employee.components.subheader')
    <div class="row mt-15">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-12 text-right">
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#CreatePositionModal">Yeni Pozisyon Ekle</button>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table" id="positions">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Başlangıç</th>
                                    <th>Bitiş</th>
                                    <th>Şirket</th>
                                    <th>Şube</th>
                                    <th>Departman</th>
                                    <th>Ünvan</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($positions as $position)
                                    <tr>
                                        <td></td>
                                        <td data-sort="{{ $position->start_date }}">{{ strftime("%d %B %Y", strtotime($position->start_date)) }}</td>
                                        @if($position->end_date)
                                            <td data-sort="{{ $position->end_date }}">{{ strftime("%d %B %Y", strtotime($position->end_date)) }}</td>
                                        @else
                                            <td>--</td>
                                        @endif
                                        <td>{{ $position->company->name }}</td>
                                        <td>{{ $position->branch->name }}</td>
                                        <td>{{ $position->department->name }}</td>
                                        <td>{{ $position->title->name }}</td>
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
    <hr>
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-12 text-right">
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#CreatePositionModal">Yeni Maaş Ekle</button>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table" id="salaries">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Başlangıç</th>
                                    <th>Bitiş</th>
                                    <th>Maaş</th>
                                    <th>Periyot</th>
                                    <th>Tür</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($salaries as $salary)
                                    <tr>
                                        <td></td>
                                        <td data-sort="{{ $salary->start_date }}">{{ strftime("%d %B %Y", strtotime($salary->start_date)) }}</td>
                                        @if($salary->end_date)
                                            <td data-sort="{{ $salary->end_date }}">{{ strftime("%d %B %Y", strtotime($salary->end_date)) }}</td>
                                        @else
                                            <td>--</td>
                                        @endif
                                        <td>{{ $salary->amount }}</td>
                                        <td>{{ $salary->period }}</td>
                                        <td>{{ $salary->pay_type }}</td>
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
    @include('pages.ik.employee.show.career.components.style')
@stop

@section('page-script')
    @include('pages.ik.employee.show.career.components.script')
@stop
