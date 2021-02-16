@extends('layouts.master')
@section('title', 'Proje Detayı')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    @include('pages.project.project.show.components.subheader')
    <div class="row mt-15">
        <div class="col-xxl-6 col-xl-12">
            <div class="card card-custom gutter-b">
                <div class="card-body">
                    <div class="d-flex">
                        <!--begin: Info-->
                        <div class="flex-grow-1">
                            <!--begin: Title-->
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <div class="mr-3">
                                    <a class="d-flex align-items-center text-dark font-size-h5 font-weight-bold mr-3">
                                        {{ $project->name }}
                                    </a>
                                </div>
                                <div class="my-lg-0 my-1">
                                    <a href="#" class="btn btn-sm btn-secondary font-weight-bolder" data-toggle="modal" data-target="#EditProject">Projeyi Düzenle</a>
                                </div>
                            </div>
                            <!--end: Title-->
                            <!--begin: Content-->
                            <div class="separator separator-solid my-7"></div>
                            <div class="d-flex align-items-center flex-wrap justify-content-between">
                                <div class="flex-grow-1 font-weight-bold text-dark-50 py-5 py-lg-2 mr-5">
                                    {!! $project->description !!}
                                </div>
                            </div>
                            <div class="separator separator-solid my-7"></div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <h6><i class="fa fa-tag mr-4"></i>Etiketler</h6>
                                </div>
                                <div class="col-xl-12">
                                    @if($project->tags)
                                        @foreach(explode(',',$project->tags) as $tag)
                                            <span class="btn btn-outline-secondary btn-hover-secondary btn-sm" style="cursor: context-menu">{{ $tag }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="separator separator-solid my-7"></div>
                            <div class="d-flex align-items-center flex-wrap justify-content-between">
                                <div class="d-flex flex-wrap align-items-center py-2">
                                    <div class="d-flex align-items-center mr-10">
                                        <div class="mr-6">
                                            <div class="font-weight-bold mb-2">Başlangıç Tarihi</div>
                                            <span class="btn btn-sm btn-text btn-light-primary text-uppercase font-weight-bold">{{ strftime("%d %B, %Y", strtotime($project->start_date)) }}</span>
                                        </div>
                                        <div class="">
                                            <div class="font-weight-bold mb-2">Bitiş Tarihi</div>
                                            <span class="btn btn-sm btn-text btn-light-danger text-uppercase font-weight-bold">{{ strftime("%d %B, %Y", strtotime($project->end_date)) }}</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 flex-shrink-0 w-150px w-xl-300px mt-4 mt-sm-0">
                                        <span class="font-weight-bold">İlerleme</span>
                                        <div class="progress progress-xs mt-2 mb-2">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $project->progress }}%;"></div>
                                        </div>
                                        <span class="font-weight-bolder text-dark">{{ $project->progress }}%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="separator separator-solid my-7"></div>
                            <div class="row">
                                <div class="col-xl-10">
                                    <h6><i class="fa fa-users mr-4"></i>Personeller</h6>
                                </div>
                                <div class="col-xl-2 text-right">
                                    <i class="fa fa-cog cursor-pointer" data-toggle="modal" data-target="#EditProjectEmployees"></i>
                                </div>
                            </div>
                            <div class="row">
                                @foreach($project->employees as $employee)
                                    <div class="col-xl-6">
                                        <div class="d-flex align-items-center m-5">
                                            <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                                <div class="symbol-label" style="background-image: url({{ asset($employee->image ?? 'assets/media/logos/avatar.jpg') }})"></div>
                                            </div>
                                            <div>
                                                <a href="{{ route('employee.edit', $employee) }}" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ $employee->name }}</a>
                                                <span class="text-muted font-weight-bold d-block">{{ $employee->title }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!--end: Content-->
                        </div>
                        <!--end: Info-->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-6 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6 border-right pb-4 pt-4">

                            <label class="mb-0 mr-5">Görevler</label>
                            <span class="svg-icon svg-icon-3x svg-icon-success">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M17.9284376,4.46474822 C19.1973992,5.56488124 20,7.18871188 20,9 L20,16 C20,19.3137085 17.3137085,22 14,22 L10,22 C6.6862915,22 4,19.3137085 4,16 L4,9 C4,7.18871188 4.80260084,5.56488124 6.07156236,4.46474822 C6.51827272,5.90091027 9.0024302,7 12,7 C14.9975698,7 17.4817273,5.90091027 17.9284376,4.46474822 Z" fill="#000000" opacity="0.3"/>
                                        <path d="M15.3482135,3.66753404 C14.5236045,3.25522953 13.3167437,3 12,3 C10.6832563,3 9.47639552,3.25522953 8.6517865,3.66753404 C8.42616493,3.78034482 8.24918686,3.89542836 8.12520418,4 C8.24918686,4.10457164 8.42616493,4.21965518 8.6517865,4.33246596 C9.47639552,4.74477047 10.6832563,5 12,5 C13.3167437,5 14.5236045,4.74477047 15.3482135,4.33246596 C15.5738351,4.21965518 15.7508131,4.10457164 15.8747958,4 C15.7508131,3.89542836 15.5738351,3.78034482 15.3482135,3.66753404 Z" fill="#000000"/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <h4 class="font-30 font-weight-bold text-col-blue" style="font-size: 30px">
                                {{ $project->completed_tasks . ' / ' . $project->tasks()->count() }}
                            </h4>

                        </div>
                        <div class="col-6 pb-4 pt-4">
                            <label class="mb-0 mr-5">Deadline</label>
                            <span class="svg-icon svg-icon-3x svg-icon-dark-75">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M3.5,3 L5,3 L5,19.5 C5,20.3284271 4.32842712,21 3.5,21 L3.5,21 C2.67157288,21 2,20.3284271 2,19.5 L2,4.5 C2,3.67157288 2.67157288,3 3.5,3 Z" fill="#000000"/>
                                        <path d="M6.99987583,2.99995344 L19.754647,2.99999303 C20.3069317,2.99999474 20.7546456,3.44771138 20.7546439,3.99999613 C20.7546431,4.24703684 20.6631995,4.48533385 20.497938,4.66895776 L17.5,8 L20.4979317,11.3310353 C20.8673908,11.7415453 20.8341123,12.3738351 20.4236023,12.7432941 C20.2399776,12.9085564 20.0016794,13 19.7546376,13 L6.99987583,13 L6.99987583,2.99995344 Z" fill="#000000" opacity="0.3"/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <h4 class="font-30 font-weight-bold text-col-blue" style="font-size: 30px">
                                @if($project->start_date > date('Y-m-d'))
                                    <span style="font-size: 18px">
                                        Proje Başlangıcına<br>
                                        {{ \Illuminate\Support\Carbon::createFromDate($project->start_date)->diffInDays(date('Y-m-d')) }}
                                        Gün Var
                                    </span>
                                @else
                                    @if($project->end_date < date('Y-m-d'))
                                        @if($project->complete_date)
                                            Proje Tamamlandı
                                        @else
                                            <span style="font-size: 18px">
                                                {{ \Illuminate\Support\Carbon::createFromDate($project->end_date)->diffInDays(date('Y-m-d')) }}
                                                Gün Gecikti
                                            </span>
                                        @endif
                                    @else
                                        {{ \Illuminate\Support\Carbon::createFromDate($project->start_date)->diffInDays(date('Y-m-d')) + 1 }}
                                        <span style="font-size: 18px">. Gün</span>
                                        /
                                        {{ \Illuminate\Support\Carbon::createFromDate($project->start_date)->diffInDays($project->end_date) + 1 }}
                                        <span style="font-size: 18px">Gün</span>
                                    @endif
                                @endif
                            </h4>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xl-12">
                            <div id="task_completes"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('pages.project.project.show.modals.employees')
    @include('pages.project.project.show.modals.edit-project')

@endsection

@section('page-styles')
    @include('pages.project.project.show.components.style')
@stop

@section('page-script')
    @include('pages.project.project.show.components.script')
@stop
