<div class="modal fade" id="EditSalaryModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <form action="{{ route('ik.employee.career.salary.update') }}" method="post" class="modal-content">
            @csrf
            <input type="hidden" id="updated_salary_id" name="salary_id" required>
            <input type="hidden" name="employee_id" value="{{ $employee->id }}">
            <div class="modal-header">
                <h5 class="modal-title">Maaş Düzenle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="form-group">
                            <label for="amount_edit">Maaş</label>
                            <input type="text" id="amount_edit" name="amount" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="period_edit">Periyod</label>
                            <select class="form-control" id="period_edit" name="period" required>
                                <option value="Aylık">Aylık</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3">
                        <div class="form-group">
                            <label for="salary_start_date_edit">Başlangıç Tarihi</label>
                            <input type="date" id="salary_start_date_edit" name="start_date" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="form-group">
                            <label for="salary_end_date_edit">Bitiş Tarihi</label>
                            <input type="date" id="salary_end_date_edit" name="end_date" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="form-group">
                            <label for="pay_type_edit">Ödeme Türü</label>
                            <select class="form-control" id="pay_type_edit" name="pay_type" required>
                                <option value="Net">Net</option>
                                <option value="Brüt">Brüt</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="form-group">
                            <label for="minimum_living_allowance_edit">AGİ</label>
                            <select class="form-control" id="minimum_living_allowance_edit" name="minimum_living_allowance" required>
                                <option value="1">Dahil</option>
                                <option value="0">Dahil Değil</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-round btn-default" data-dismiss="modal">İptal Et</button>
                <button type="submit" class="btn btn-round btn-info">Güncelle</button>
            </div>
        </form>
    </div>
</div>
