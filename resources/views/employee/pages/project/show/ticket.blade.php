@extends('layouts.master')
@section('title', 'Proje Destek Talebi İçeriği')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    @include('employee.pages.project.show.components.subheader')

    <div class="row mt-15">
        <div class="col-xl-12">
            <div class="d-flex flex-column-fluid">
                <div class="container">
                    <div class="card card-custom gutter-b">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-shrink-0 mr-7">
                                    <div class="symbol symbol-50 symbol-lg-120">
                                        <img alt="Pic" src="{{ asset('assets/media/logos/avatar.jpg') }}" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                                        <div class="mr-3">
                                            <div class="d-flex align-items-center mr-3">
                                                <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{ $ticket->title }}</a>
                                            </div>
                                            <div class="d-flex flex-wrap my-2">

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
                                            Detaylar
                                        </h3>
                                    </div>
                                </div>
                                <div class="card-body py-4">
                                    <div class="form-group row my-2">
                                        <label class="col-6 col-form-label">Oluşturan:</label>
                                        <div class="col-6 text-right">
                                            <span class="form-control-plaintext font-weight-bolder">
                                                {{ $ticket->creator->name }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row my-2">
                                        <label class="col-6 col-form-label">Oluşturulma Tarihi:</label>
                                        <div class="col-6 text-right">
                                            <span class="form-control-plaintext font-weight-bolder">
                                                {{ strftime('%d %B %Y, %H:%M', strtotime($ticket->created_at)) }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row my-2">
                                        <label class="col-6 col-form-label">Öncelik:</label>
                                        <div class="col-6 text-right">
                                            <span class="form-control-plaintext font-weight-bolder">
                                                <span class="label label-light-{{ $ticket->priority->color }} label-inline font-weight-bolder mr-1">{{ $ticket->priority->name }}</span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row my-2">
                                        <label class="col-6 col-form-label">Durum:</label>
                                        <div class="col-6 text-right">
                                            <span class="form-control-plaintext font-weight-bolder">
                                                <span class="label label-light-dark-75 label-inline font-weight-bolder mr-1">{{ $ticket->status->name }}</span>
                                            </span>
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
                                            @if($ticket->status_id != 3)
                                                <form action="{{ route('employee-panel.project.ticket.ticket-message.create') }}" method="post" class="form">
                                                    @csrf
                                                    <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                                    <input type="hidden" name="creator_id" value="{{ auth()->user()->getId() }}">
                                                    <input type="hidden" name="creator_type" value="App\Models\Employee">
                                                    <input type="hidden" name="status_id" value="1">
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
                                            @endif
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
