@extends('layouts.master')
@section('title', 'Yıllık İzin Hakedişleri')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))
{{--@php(setlocale(LC_TIME, 'Turkish'))--}}

@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <table class="table table-hover" id="permitProgresses">
                                <thead>
                                <tr>
                                    <th>Ad Soyad</th>
                                    <th>İş Başlangıç Tarihi</th>
                                    <th>Toplam İzin Süresi</th>
                                    <th>Hakedilen Yıllık İzin Süresi</th>
                                    <th>Kullanılan Yıllık İzin Süresi</th>
                                    <th>Sıradaki İzin Haketiş Tarihi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employeePermitProgresses as $employeePermitProgress)
                                    <tr>
                                        <td>{{ $employeePermitProgress['name'] }}</td>
                                        <td>{{ date("d.m.Y", strtotime($employeePermitProgress['job_start_date'])) }}</td>
                                        <td>{{ $employeePermitProgress['total_permit_day'] }}</td>
                                        <td>{{ $employeePermitProgress['deserved_yearly_permit_day'] }} Gün</td>
                                        <td>{{ $employeePermitProgress['used_yearly_permit_day'] }} Gün</td>
                                        <td>{{ date("d.m.Y", strtotime($employeePermitProgress['permit_can_start_date'])) }}</td>
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
    @include('pages.ik.application.applications.permit-progress.report.componets.style')
@stop

@section('page-script')
    @include('pages.ik.application.applications.permit-progress.report.componets.script')
@stop
