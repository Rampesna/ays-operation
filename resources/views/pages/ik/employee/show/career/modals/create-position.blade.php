<div class="modal fade" id="CreatePositionModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <form action="{{ route('ik.employee.career.position.create') }}" method="post" class="modal-content">
            @csrf
            <input type="hidden" name="employee_id" value="{{ $employee->id }}">
            <div class="modal-header">
                <h5 class="modal-title">Yeni Posizyon Ekle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-7">
                        <div class="form-group">
                            <label for="old_end_date">Aktif Pozisyon İçin Sonlanma Tarihini Belirleyin</label>
                            <input type="date" id="old_end_date" name="old_end_date" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xl-5">
                        <div class="form-group">
                            <label for="leaving_reason_id">Aktif Pozisyon Sonlanma Nedeni</label>
                            <select class="form-control" id="leaving_reason_id" name="leaving_reason_id">
                                @foreach($leavingReasons as $leavingReason)
                                    <option value="{{ $leavingReason->id }}">{{ $leavingReason->id . ' - ' . $leavingReason->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="companySelector">Şirket</label>
                            <select id="companySelector" name="ik_company_id" class="form-control" required>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="branchSelector">Şube</label>
                            <select id="branchSelector" name="ik_branch_id" class="form-control" required>

                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="departmentSelector">Departman</label>
                            <select id="departmentSelector" name="ik_department_id" class="form-control" required>

                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="titleSelector">Ünvan</label>
                            <select id="titleSelector" name="ik_title_id" class="form-control" required>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="start_date">Yeni Pozisyon Başlangıç Tarihi</label>
                            <input type="date" class="form-control" id="start_date" name="start_date">
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
