@extends('layouts.master')
@section('title', 'Genel İş Raporu')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    <form action="{{ route('report.general') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="company_id">Rapor İçin Şirketi Seçin</label>
                                    <select name="company_id" id="company_id" class="form-control selectpicker" data-live-search="true" required>
                                        @foreach($companies as $company)
                                            <option value="{{ $company->id }}">{{ $company->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="start_date">Başlangıç Tarihi</label>
                                    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ date('Y-m-01') }}" required>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="end_date">Bitiş Tarihi</label>
                                    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-12 text-right">
                                <div class="form-group">
                                    <button type="submit" id="report" class="btn btn-primary btn-pill">Sorgula</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

@section('page-styles')

@stop

@section('page-script')
    <script>

        var company = $("#company_id");
        var queues = $("#queues");

        function getQueuesByCompany(company_id) {
            $.ajax({
                type: 'get',
                url: '{{ route('ajax.queue.getQueuesByCompany') }}',
                data: {
                    company_id: company_id
                },
                success: function (response) {
                    queues.empty().selectpicker('refresh');
                    $.each(response, function (index) {
                        queues.append('<option value="' + response[index].id + '">' + response[index].name + '</option>');
                    });
                    queues.selectpicker('refresh');
                },
                error: function () {
                    queues.empty().selectpicker('refresh');
                    toastr.warning('Kuyruklar Seçilirken Bir Hata Oluştu! Sayfayı Yenilemeyi Deneyin.');
                }
            });
        }

        getQueuesByCompany(company.val());

        company.change(function () {
            getQueuesByCompany(company.val());
        });

    </script>
@stop
