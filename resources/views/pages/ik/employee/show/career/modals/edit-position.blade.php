<div class="modal fade" id="EditPositionModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <form action="{{ route('ik.employee.career.position.update') }}" method="post" class="modal-content">
            @csrf
            <input type="hidden" name="position_id" id="updated_position_id">
            <input type="hidden" name="employee_id" value="{{ $employee->id }}">
            <div class="modal-header">
                <h5 class="modal-title">Posizyon Düzenle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="companySelectorEdit">Şirket</label>
                            <select id="companySelectorEdit" name="ik_company_id" class="form-control" required>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="branchSelectorEdit">Şube</label>
                            <select id="branchSelectorEdit" name="ik_branch_id" class="form-control" required>

                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="departmentSelectorEdit">Departman</label>
                            <select id="departmentSelectorEdit" name="ik_department_id" class="form-control" required>

                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="titleSelectorEdit">Ünvan</label>
                            <select id="titleSelectorEdit" name="ik_title_id" class="form-control" required>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="start_date_edit">Pozisyon Başlangıç Tarihi</label>
                            <input type="date" class="form-control" id="start_date_edit" name="start_date">
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
