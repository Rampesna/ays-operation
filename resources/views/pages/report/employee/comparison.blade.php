@extends('layouts.master')
@section('title', 'Karşılaştırma Raporu')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    <form id="comparison_form" action="{{ route('report.comparison-report.show') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-xl-12 text-right">
                <button type="button" id="comparison" class="btn btn-primary btn-pill">Karşılaştır</button>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="company_id">Firmayı Seçin</label>
                                    <select id="company_id" name="company_id" class="form-control selectpicker" required>
                                        @foreach($companies as $company)
                                            <option value="{{ $company->id }}">{{ $company->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="employees">Karşılaştırılacak Çalışanları Seçin</label>
                                    <select id="employees" name="employees[]" class="form-control selectpicker" multiple required>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <button type="button" id="select_all" class="btn btn-success">Tümünü Seç</button>
                                <button type="button" id="deselect_all" class="btn btn-secondary">Tümünü Kaldır</button>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="start_date">Başlangıç Tarihi</label>
                                    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ date('Y-m-01') }}">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="end_date">Bitiş Tarihi</label>
                                    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ date('Y-m-d') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="reports">Karşılaştırma Yapılacak Durumları Belirleyin</label>
                                    <select name="reports[]" id="reports" class="form-control selectpicker" multiple required>
                                        <option value="1">Çağrı Raporları Karşılaştırmaya Dahil Edilsin</option>
                                        <option value="2">İş Raporları Karşılaştırmaya Dahil Edilsin</option>
                                    </select>
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
        var employees = $("#employees");
        var comparison = $("#comparison");
        var comparison_form = $("#comparison_form");

        employees.hide();

        function getEmployeesByCompanyId(company_id) {
            employees.hide();
            $.ajax({
                type: 'get',
                url: '{{ route('ajax.employees-by-company-id') }}',
                dataType: 'json',
                data: {
                    company_id: company_id
                },
                success: function (response) {
                    employees.empty().selectpicker('refresh');
                    $.each(response, function (index) {
                        employees.append('<option value="' + response[index].id + '">' + response[index].name + '</option>');
                    });
                    employees.selectpicker('refresh').fadeIn(250);
                },
                error: function () {
                    employees.empty().selectpicker('refresh');
                    toastr.warning('Personeller Alınırken Bir Hata Oluştu! Sayfayı Yenilemeyi Deneyin.');
                }
            });
        }

        comparison.click(function () {
            var company_id = $("#company_id").val();
            var employees = $("#employees").val();
            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();
            var reports = $("#reports").val();

            if (company_id == null) {
                toastr.warning('Firma Seçiminde Hata Oluştu! Sayfayı Yenilemeyi Deneyin.');
            } else if (employees.length < 2) {
                toastr.warning('Karşılaştırma İçin En Az 2 Personel Seçilmelidir!');
            } else if (start_date == null) {
                toastr.warning('Başlangıç Tarihi Boş Olamaz!');
            } else if (end_date == null) {
                toastr.warning('Bitiş Tarihi Boş Olamaz!');
            } else if (reports.length < 1) {
                toastr.warning('En Az 1 Rapor Türü Seçilmelidir!');
            } else {
                comparison_form.submit();
            }
        });

        getEmployeesByCompanyId(company.val());

        company.change(function () {
            getEmployeesByCompanyId(company.val());
        });

        $("#select_all").click(function () {
            $('#employees option').each(function () {
                if ($(this).is(':selected') === false) {
                    $(this).prop('selected', true)
                }
            });
            $("#employees").selectpicker('refresh');
        });

        $("#deselect_all").click(function () {
            $('#employees').selectpicker('val', '');
        });

        comparison.click(function () {
            $("#loader").fadeIn(250);
        });
    </script>

@stop
