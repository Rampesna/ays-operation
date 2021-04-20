<div id="create_rightbar" style="width: 800px" class="offcanvas offcanvas-right p-10">
    <form id="createRecruitingStepSubStepForm">
        <input type="hidden" id="create_toggle">
        <div class="offcanvas-content">
            <div class="offcanvas-wrapper mb-5 scroll-pull">
                <div class="row">
                    <div class="col-xl-10">
                        <h5>Alt Adım Oluştur</h5>
                    </div>
                </div>
                <hr>
                <div class="row mt-6">
                    <div class="col-xl-3 mt-2">
                        <span class="font-weight-bold">Adı: </span>
                    </div>
                    <div class="col-xl-9">
                        <label style="width: 100%">
                            <input type="text" class="form-control" id="creating_recruiting_step_sub_step_name">
                        </label>
                    </div>
                </div>
                <div class="row mt-6">
                    <div class="col-xl-3 mt-2">
                        <span class="font-weight-bold">Bağlı Olacağı Aşama: </span>
                    </div>
                    <div class="col-xl-9">
                        <label style="width: 100%">
                            <select id="creating_recruiting_step_sub_step_recruiting_step_id" class="form-control">
                                @foreach($recruitingSteps as $recruitingStep)
                                    <option value="{{ $recruitingStep->id }}">{{ $recruitingStep->name }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                </div>
            </div>
            <hr>
            <div class="offcanvas-footer">
                <div class="row">
                    <div class="col-xl-12 text-right">
                        <button type="button" class="btn btn-success" id="createRecruitingStepSubStepButton">Oluştur</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
