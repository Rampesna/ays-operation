<div class="modal fade" id="CreateEmployeeModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <form action="{{ route('ik.employee.create') }}" method="post" class="modal-content">
            @csrf
            <input type="hidden" name="company_id" value="1">
            <div class="modal-header">
                <h5 class="modal-title">Yeni Personel Oluştur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="name">Personel Adı Soyadı</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="email">E-posta Adresi</label>
                            <input type="email" id="email" name="email" class="form-control email-input-mask" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="identification_number">Kimlik Numarası</label>
                            <input type="text" maxlength="11" class="form-control" id="identification_number" name="identification_number" required>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="phone_number">Telefon Numarası</label>
                            <input type="text" class="form-control mobile-phone-number" id="phone_number" name="phone_number">
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
                <hr>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="start_date">İş Başlangıç Tarihi</label>
                            <input type="date" id="start_date" name="start_date" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Kapat</button>
                <button type="submit" class="btn btn-round btn-info">Oluştur</button>
            </div>
        </form>
    </div>
</div>
