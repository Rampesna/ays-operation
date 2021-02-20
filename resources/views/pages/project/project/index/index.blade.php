@extends('layouts.master')
@section('title', 'Projeler')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    @include('pages.project.project.index.components.subheader')

    <style>
        .xxx{
            color: darkslateblue;
        }
    </style>

    <div class="row mt-15">
        <div class="col-xl-12">
            <div class="row">
                @foreach($projects as $project)
                    <div class="col-xl-4">
                        <!--begin::Card-->
                        <div class="card card-custom gutter-b card-stretch">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Section-->
                                <div class="d-flex align-items-center">

                                    <div class="d-flex flex-column mr-auto">
                                        <a href="{{ route('project.project.show', ['project' => $project,'tab' => 'overview']) }}" class="card-title text-hover-primary font-weight-bolder font-size-h5 text-dark mb-1">
                                            {{ $project->name }}
                                        </a>
                                    </div>

                                    <div class="card-toolbar mb-auto">
                                        <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Proje Detayları" data-placement="left">
                                            <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ki ki-bold-more-hor"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                <!--begin::Navigation-->
                                                <ul class="navi navi-hover">
                                                    @Authority(33)
                                                    <li class="navi-item">
                                                        <a href="{{ route('project.project.show', ['project' => $project, 'tab' => 'overview']) }}" class="navi-link">
                                                            <span class="navi-icon">
                                                                <i class="fas fa-th"></i>
                                                            </span>
                                                            <span class="navi-text">Genel Bakış</span>
                                                        </a>
                                                    </li>
                                                    @endAuthority

                                                    @Authority(43)
                                                    <li class="navi-item">
                                                        <a href="{{ route('project.project.show', ['project' => $project, 'tab' => 'dashboard', 'sub' => 'kanban']) }}" class="navi-link">
                                                            <span class="navi-icon">
                                                                <i class="fas fa-chart-pie"></i>
                                                            </span>
                                                            <span class="navi-text">Kontrol Paneli</span>
                                                        </a>
                                                    </li>
                                                    @endAuthority

                                                    @Authority(34)
                                                    <li class="navi-item">
                                                        <a href="{{ route('project.project.show', ['project' => $project, 'tab' => 'tasks', 'sub' => 'kanban']) }}" class="navi-link">
                                                            <span class="navi-icon">
                                                                <i class="fas fa-clipboard-list"></i>
                                                            </span>
                                                            <span class="navi-text">Görevler</span>
                                                        </a>
                                                    </li>
                                                    @endAuthority

                                                    @Authority(42)
                                                    <li class="navi-item">
                                                        <a href="{{ route('project.project.show', ['project' => $project, 'tab' => 'calendar']) }}" class="navi-link">
                                                            <span class="navi-icon">
                                                                <i class="far fa-calendar-alt"></i>
                                                            </span>
                                                            <span class="navi-text">Takvim</span>
                                                        </a>
                                                    </li>
                                                    @endAuthority

                                                    @Authority(35)
                                                    <li class="navi-item">
                                                        <a href="{{ route('project.project.show', ['project' => $project, 'tab' => 'timesheets']) }}" class="navi-link">
                                                            <span class="navi-icon">
                                                                <i class="fas fa-hourglass-half"></i>
                                                            </span>
                                                            <span class="navi-text">Hareketler</span>
                                                        </a>
                                                    </li>
                                                    @endAuthority

                                                    @Authority(36)
                                                    <li class="navi-item">
                                                        <a href="{{ route('project.project.show', ['project' => $project, 'tab' => 'milestones']) }}" class="navi-link">
                                                            <span class="navi-icon">
                                                                <i class="fas fa-flag"></i>
                                                            </span>
                                                            <span class="navi-text">Kilometre Taşları</span>
                                                        </a>
                                                    </li>
                                                    @endAuthority

                                                    @Authority(37)
                                                    <li class="navi-item">
                                                        <a href="{{ route('project.project.show', ['project' => $project, 'tab' => 'files']) }}" class="navi-link">
                                                            <span class="navi-icon">
                                                                <i class="fas fa-folder-open"></i>
                                                            </span>
                                                            <span class="navi-text">Dosyalar</span>
                                                        </a>
                                                    </li>
                                                    @endAuthority

                                                    @Authority(38)
                                                    <li class="navi-item">
                                                        <a href="{{ route('project.project.show', ['project' => $project, 'tab' => 'comments']) }}" class="navi-link">
                                                            <span class="navi-icon">
                                                                <i class="fas fa-comments"></i>
                                                            </span>
                                                            <span class="navi-text">Yorumlar</span>
                                                        </a>
                                                    </li>
                                                    @endAuthority

                                                    @Authority(39)
                                                    <li class="navi-item">
                                                        <a href="{{ route('project.project.show', ['project' => $project, 'tab' => 'tickets']) }}" class="navi-link">
                                                            <span class="navi-icon">
                                                                <i class="far fa-life-ring"></i>
                                                            </span>
                                                            <span class="navi-text">Destek Talepleri</span>
                                                        </a>
                                                    </li>
                                                    @endAuthority

                                                    @Authority(40)
                                                    <li class="navi-item">
                                                        <a href="{{ route('project.project.show', ['project' => $project, 'tab' => 'notes']) }}" class="navi-link">
                                                            <span class="navi-icon">
                                                                <i class="fas fa-sticky-note"></i>
                                                            </span>
                                                            <span class="navi-text">Notlar</span>
                                                        </a>
                                                    </li>
                                                    @endAuthority

                                                    @Authority(22)
                                                    <hr>
                                                    <li class="navi-item">
                                                        <a href="#" data-toggle="modal" data-target="#DeleteProject" data-id="{{ $project->id }}" class="navi-link deleteProject">
                                                            <span class="navi-icon">
                                                                <i class="fa fa-trash text-danger"></i>
                                                            </span>
                                                            <span class="navi-text">Projeyi Sil</span>
                                                        </a>
                                                    </li>
                                                    @endAuthority
                                                </ul>
                                                <!--end::Navigation-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Toolbar-->
                                </div>
                                <!--end::Section-->
                                <!--begin::Content-->
                                <div class="d-flex flex-wrap mt-14">
                                    <div class="mr-12 d-flex flex-column mb-7">
                                        <span class="d-block font-weight-bold mb-4">Başlangıç Tarihi</span>
                                        <span class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">{{ strftime("%d %B, %Y", strtotime($project->start_date)) }}</span>
                                    </div>
                                    <div class="mr-12 d-flex flex-column mb-7">
                                        <span class="d-block font-weight-bold mb-4">Bitiş Tarihi</span>
                                        <span class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text">{{ strftime("%d %B, %Y", strtotime($project->end_date)) }}</span>
                                    </div>
                                    <!--begin::Progress-->
                                    <div class="flex-row-fluid mb-7">
                                        <span class="d-block font-weight-bold mb-4">İlerleme</span>
                                        <div class="d-flex align-items-center pt-2">
                                            <div class="progress progress-xs mt-2 mb-2 w-100">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $project->progress }}%;"></div>
                                            </div>
                                            <span class="ml-3 font-weight-bolder">
                                                {{ $project->progress }}%
                                            </span>
                                        </div>
                                    </div>
                                    <!--end::Progress-->
                                </div>
                                <!--end::Content-->
                                <!--begin::Text-->
                                <p class="mb-7 mt-3">
                                    {!! $project->description !!}
                                </p>
                                <!--end::Text-->
                                <!--begin::Blog-->
                                <div class="d-flex flex-wrap">
                                    <!--begin::Item-->
                                    <div class="d-flex flex-column flex-lg-fill float-left mb-7">
                                        <span class="font-weight-bolder mb-4">Personeller</span>
                                        <div class="symbol-group symbol-hover">
                                            @foreach($project->employees as $employee)
                                                @if($loop->iteration <= 5)
                                                    <a href="{{ route('employee.edit', $employee) }}" target="_blank" class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="{{ $employee->name }}">
                                                        <img alt="Pic" src="{{ $employee->image ? asset($employee->image) : asset('assets/media/logos/avatar.jpg') }}" />
                                                    </a>
                                                @else
                                                    <div class="symbol symbol-30 symbol-circle symbol-light">
                                                        <span class="symbol-label font-weight-bold">+{{ $project->employees->count() - 5 }}</span>
                                                    </div>
                                                    @break
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Blog-->
                            </div>
                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer d-flex align-items-center">
                                <div class="d-flex">
                                    <div class="d-flex align-items-center mr-7">
                                        <span class="svg-icon svg-icon-gray-500">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Text/Bullet-list.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M10.5,5 L19.5,5 C20.3284271,5 21,5.67157288 21,6.5 C21,7.32842712 20.3284271,8 19.5,8 L10.5,8 C9.67157288,8 9,7.32842712 9,6.5 C9,5.67157288 9.67157288,5 10.5,5 Z M10.5,10 L19.5,10 C20.3284271,10 21,10.6715729 21,11.5 C21,12.3284271 20.3284271,13 19.5,13 L10.5,13 C9.67157288,13 9,12.3284271 9,11.5 C9,10.6715729 9.67157288,10 10.5,10 Z M10.5,15 L19.5,15 C20.3284271,15 21,15.6715729 21,16.5 C21,17.3284271 20.3284271,18 19.5,18 L10.5,18 C9.67157288,18 9,17.3284271 9,16.5 C9,15.6715729 9.67157288,15 10.5,15 Z" fill="#000000" />
                                                    <path d="M5.5,8 C4.67157288,8 4,7.32842712 4,6.5 C4,5.67157288 4.67157288,5 5.5,5 C6.32842712,5 7,5.67157288 7,6.5 C7,7.32842712 6.32842712,8 5.5,8 Z M5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 C6.32842712,10 7,10.6715729 7,11.5 C7,12.3284271 6.32842712,13 5.5,13 Z M5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 C6.32842712,15 7,15.6715729 7,16.5 C7,17.3284271 6.32842712,18 5.5,18 Z" fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <a href="{{ route('project.project.show', ['project' => $project, 'tab' => 'tasks']) }}" class="font-weight-bolder text-primary ml-2">{{ $project->tasks->count() }} Görev</a>
                                    </div>
                                    <div class="d-flex align-items-center mr-7">
                                        <span class="svg-icon svg-icon-gray-500">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000" />
                                                    <path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <a href="{{ route('project.project.show', ['project' => $project, 'tab' => 'comments']) }}" class="font-weight-bolder text-primary ml-2">{{ $project->comments->count() }} Yorum</a>
                                    </div>
                                </div>
                            </div>
                            <!--end::Footer-->
                        </div>
                        <!--end::Card-->
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @include('pages.project.project.index.modals.create-project')
    @include('pages.project.project.index.modals.delete-project')

@endsection

@section('page-styles')
    @include('pages.project.project.index.components.style')
@stop

@section('page-script')
    @include('pages.project.project.index.components.script')
@stop

