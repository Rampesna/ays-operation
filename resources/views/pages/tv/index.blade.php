@extends('layouts.master')
@section('title', 'TV Ekranları')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    <div class="modal fade" id="AddTvModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="{{ route('tv.store') }}" method="post" class="modal-content">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Yeni TV Ekle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Televizyon Adı</label>
                                <input required name="name" type="text" class="form-control" placeholder="Televizyon Adını Giriniz...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Televizyonda Gösterilecek Alan</label>
                                <select required name="section_id" class="form-control">
                                    @foreach($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Kapat</button>
                    <button type="submit" class="btn btn-round btn-primary">Ekle</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 text-right">
            <a href="#" data-toggle="modal" data-target="#AddTvModal" class="btn btn-primary">Yeni TV Ekle</a>
        </div>
    </div>
    <hr>
    <div class="row">

        @foreach($televisions as $television)
            <div class="col-xl-3">

                <div class="card card-custom card-stretch gutter-b">

                    <div class="card-header d-flex flex-column pt-5">
                        <div class="row">
                            <div class="col-xl-12 text-right">
                                <a href="#"><i class="fa fa-cog"></i></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 mt-3" style="border: solid 0.5px #999999"></div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 text-center">
                                <a href="{{ route($television->section->route) }}">
                                    <div class="card-spacer">
                                        <img style="width: auto; height: 160px; opacity: 100%" src="{{ asset('assets/media/svg/television/monitor.svg') }}">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body ">

                        <div class="row">
                            <div class="col-xl-6 text-left">
                                <h5>
                                    {{ $television->name }}
                                </h5>
                            </div>
                            <div class="col-xl-6 text-right">
                                <h5>
                                    {{ $television->section->name }}
                                </h5>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        @endforeach

    </div>

@endsection

@section('page-styles')

@stop

@section('page-script')

@stop
