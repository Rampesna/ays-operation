<div class="modal fade" id="CreateSalaryModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <form action="{{ route('ik.employee.career.salary.create') }}" method="post" class="modal-content">
            @csrf
            <input type="hidden" name="employee_id" value="{{ $employee->id }}">
            <div class="modal-header">
                <h5 class="modal-title">Yeni Maaş Ekle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="old_salary_end_date">Mevcut Maaş Var İse Sonlanma Tarihi</label>
                            <input type="date" class="form-control" id="old_salary_end_date" name="old_salary_end_date" required>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xl-8">
                        <div class="form-group">
                            <label for="amount">Maaş</label>
                            <input type="text" id="amount" name="amount" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="period">Periyod</label>
                            <select class="form-control" id="period" name="period" required>
                                <option value="Aylık">Aylık</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="salary_start_date">Başlangıç Tarihi</label>
                            <input type="date" id="salary_start_date" name="start_date" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="pay_type">Ödeme Türü</label>
                            <select class="form-control" id="pay_type" name="pay_type" required>
                                <option value="Net">Net</option>
                                <option value="Brüt">Brüt</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="minimum_living_allowance">AGİ</label>
                            <select class="form-control" id="minimum_living_allowance" name="minimum_living_allowance" required>
                                <option value="1">Dahil</option>
                                <option value="0">Dahil Değil</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-round btn-default" data-dismiss="modal">İptal Et</button>
                <button type="submit" class="btn btn-round btn-info">Oluştur</button>
            </div>
        </form>
    </div>
</div>
