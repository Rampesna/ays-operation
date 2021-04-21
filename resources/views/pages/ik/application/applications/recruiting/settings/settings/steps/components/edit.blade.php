<div id="edit_rightbar" style="width: 800px" class="offcanvas offcanvas-right p-10">
    <form id="editRecruitingStepForm">
        <input type="hidden" id="edit_toggle">
        <input type="hidden" id="editing_recruiting_step_id">
        <div class="offcanvas-content">
            <div class="offcanvas-wrapper mb-5 scroll-pull">
                <div class="row">
                    <div class="col-xl-10">
                        <h5>Düzenle</h5>
                    </div>
                </div>
                <hr>
                <div class="row mt-6">
                    <div class="col-xl-3 mt-2">
                        <span class="font-weight-bold">Adı: </span>
                    </div>
                    <div class="col-xl-9">
                        <label style="width: 100%">
                            <input type="text" class="form-control" id="editing_recruiting_step_name">
                        </label>
                    </div>
                </div>
                <div class="row mt-6">
                    <div class="col-xl-3 mt-2">
                        <span class="font-weight-bold">Rengi: </span>
                    </div>
                    <div class="col-xl-9">
                        <label style="width: 100%">
                            <select id="editing_recruiting_step_color" class="form-control">
                                <option class="text-center" value="primary" data-content="<i class='btn btn-block btn-primary'></i>"></option>
                                <option class="text-center" value="secondary" data-content="<i class='btn btn-block btn-secondary'></i>"></option>
                                <option class="text-center" value="success" data-content="<i class='btn btn-block btn-success'></i>"></option>
                                <option class="text-center" value="warning" data-content="<i class='btn btn-block btn-warning'></i>"></option>
                                <option class="text-center" value="danger" data-content="<i class='btn btn-block btn-danger'></i>"></option>
                                <option class="text-center" value="info" data-content="<i class='btn btn-block btn-info'></i>"></option>
                                <option class="text-center" value="dark-75" data-content="<i class='btn btn-block btn-dark-75'></i>"></option>
                            </select>
                        </label>
                    </div>
                </div>
                <div class="row mt-6">
                    <div class="col-xl-3 mt-2">
                        <span class="font-weight-bold">Bağlı Olduğu Departman: </span>
                    </div>
                    <div class="col-xl-9">
                        <label style="width: 100%">
                            <select id="editing_recruiting_step_management_department_id" class="form-control">
                                @foreach($managementDepartments as $managementDepartment)
                                    <option value="{{ $managementDepartment->id }}">{{ $managementDepartment->name }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                </div>
                <hr>
                <div class="row mt-6">
                    <div class="col-xl-3 mt-2">
                        <span class="font-weight-bold">Otomatik SMS: </span>
                    </div>
                    <div class="col-xl-9">
                        <label style="width: 100%">
                            <select id="editing_recruiting_step_sms" class="form-control">
                                <option value="0">Hayır</option>
                                <option value="1">Evet</option>
                            </select>
                        </label>
                    </div>
                </div>
                <div class="row mt-6">
                    <div class="col-xl-3 mt-2">
                        <span class="font-weight-bold">Otomatik SMS Mesajı: </span>
                    </div>
                    <div class="col-xl-9">
                        <label style="width: 100%">
                            <textarea id="editing_recruiting_step_message" class="form-control" rows="4"></textarea>
                        </label>
                    </div>
                </div>
            </div>
            <hr>
            <div class="offcanvas-footer">
                <div class="row">
                    <div class="col-xl-12 text-right">
                        <button type="button" class="btn btn-success" id="updateRecruitingStepButton">Güncelle</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
