@extends('layouts.master')
@section('title', 'Proje Destek Talebi İçeriği')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    @include('pages.project.project.show.components.subheader')

    <div class="row mt-15">
        <div class="col-xl-12">
            <div class="d-flex flex-column-fluid">
                <!--begin::Container-->
                <div class="container">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b">
                        <div class="card-body">
                            <div class="d-flex">
                                <!--begin::Pic-->
                                <div class="flex-shrink-0 mr-7">
                                    <div class="symbol symbol-50 symbol-lg-120">
                                        <img alt="Pic" src="{{ asset('assets/media/logos/avatar.jpg') }}" />
                                    </div>
                                </div>
                                <!--end::Pic-->
                                <!--begin: Info-->
                                <div class="flex-grow-1">
                                    <!--begin::Title-->
                                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                                        <!--begin::User-->
                                        <div class="mr-3">
                                            <div class="d-flex align-items-center mr-3">
                                                <!--begin::Name-->
                                                <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{ $ticket->title }}</a>
                                                <!--end::Name-->
                                                <span class="label label-light-dark-75 label-inline font-weight-bolder mr-1">{{ $ticket->status->name }}</span>
                                                <span class="label label-light-{{ $ticket->priority->color }} label-inline font-weight-bolder mr-1">{{ $ticket->priority->name }}</span>
                                            </div>
                                            <div class="d-flex flex-wrap my-2">
                                                <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                    <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" />
                                                                <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    {{ $ticket->creator->name }}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="mb-10">
                                            <div class="dropdown dropdown-inline">
                                                <a href="#" class="btn btn-primary btn-sm font-weight-bolder text-uppercase dropdown-toggle" data-toggle="dropdown" aria-expanded="false">İşlem Yap</a>
                                                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center flex-wrap justify-content-between">
                                        <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">{!! $ticket->description !!}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="card card-custom">
                                <div class="card-header h-auto py-4">
                                    <div class="card-title">
                                        <h3 class="card-label">
                                            Kart Başlık
                                        </h3>
                                    </div>
                                </div>
                                <div class="card-body py-4">
                                    <div class="form-group row my-2">
                                        <label class="col-6 col-form-label">Oluşturulma Tarihi:</label>
                                        <div class="col-6 text-right">
                                            <span class="form-control-plaintext font-weight-bolder">--</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-pane active" id="kt_apps_contacts_view_tab_1" role="tabpanel">
                                        <div class="container">
                                            <form action="{{ route('project.project.ticket.ticket-message.create') }}" method="post" class="form">
                                                @csrf
                                                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                                <input type="hidden" name="creator_id" value="{{ auth()->user()->getId() }}">
                                                <input type="hidden" name="creator_type" value="App\Models\User">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="form-group">
                                                            <label style="width: 100%">
                                                                <textarea class="form-control form-control-lg form-control-solid" id="message" name="message" rows="3" placeholder="Mesajınız..."></textarea>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-12 text-right mt-n5">
                                                        <button type="submit" class="btn btn-light-success font-weight-bold">Yanıtla</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="separator separator-dashed my-10"></div>
                                            <!--begin::Timeline-->
                                            <div class="timeline timeline-3">
                                                <div class="timeline-items">
                                                    @foreach($ticket->messages()->orderBy('created_at', 'desc')->get() as $message)
                                                    <div class="timeline-item">
                                                        <div class="timeline-media">
                                                            <img alt="Pic" src="{{ asset($message->creator->image ?? 'assets/media/logos/avatar.jpg') }}" />
                                                        </div>
                                                        <div class="timeline-content">
                                                            <div class="d-flex align-items-center justify-content-between mb-3">
                                                                <div class="mr-2">
                                                                    <a href="#" class="text-dark-75 text-hover-primary font-weight-bold">{{ ucwords($message->creator->name) }}</a>
                                                                    <span class="text-muted ml-2">{{ strftime('%d %B %Y,%H:%M', strtotime($message->created_at)) }}</span>
                                                                </div>
                                                            </div>
                                                            <p class="p-0">{!! $message->message !!}</p>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <!--end::Timeline-->
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

@stop
