@extends('layouts.master')
@section('title', $recruiting->name . ' - İşlem Geçmişi')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    @include('pages.ik.application.applications.recruiting.history.modals.show-recruiting-step-sub-step-check-activities')

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header pt-5 pb-3">
                    <h5>Alt Aşama Durumları</h5>
                </div>
                <div class="card-body">
                    <table class="table" id="recruitingSteps">
                        <thead>
                        <tr>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($recruitingStepSubStepChecks as $recruitingStepSubStepCheck)
                            <tr>
                                <td>
                                    <i class="fa fa-check-circle @if($recruitingStepSubStepCheck->check == 1) text-success @endif"></i>
                                    <span data-check-id="{{ $recruitingStepSubStepCheck->id }}" class="cursor-pointer ml-3 showRecruitingStepSubStepCheckActivities">{{ $recruitingStepSubStepCheck->subStep->name }}</span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header pt-5 pb-3">
                    <h5>Aşama Geçmişi</h5>
                </div>
                <div class="card-body">
                    <table class="table" id="activities">
                        <thead>
                        <tr>
                            <th>İşlem Tarihi</th>
                            <th>İşlemi Yapan</th>
                            <th>Durum</th>
                            <th>Açıklamalar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($recruiting->activities as $activity)
                            <tr>
                                <td>{{ date('d.m.Y, H:i', strtotime($activity->created_at)) }}</td>
                                <td>{{ $activity->user->name }}</td>
                                <td><span class="btn btn-pill btn-sm btn-{{ $activity->step->color }} mt-3" style="font-size: 11px; height: 20px; padding-top: 2px">{{ $activity->step->name }}</span></td>
                                <td><label style="width: 100%"><textarea class="form-control" rows="1" disabled>{{ $activity->description }}</textarea></label></td>
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
    @include('pages.ik.application.applications.recruiting.history.components.style')
@stop

@section('page-script')
    @include('pages.ik.application.applications.recruiting.history.components.script')
@stop
