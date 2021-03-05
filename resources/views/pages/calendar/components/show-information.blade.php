<div id="show_information" style="width: 700px" class="offcanvas offcanvas-right p-10">
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-7">

    </div>
    <div class="offcanvas-content">
        <input type="hidden" id="showInformation">
        <div class="offcanvas-wrapper mb-5 scroll-pull">
            <div class="row">
                <div class="col-xl-10">
                    <label for="showInformationTitle" style="display: none"></label>
                    <input class="form-control font-weight-bold" type="text" style="border: none; background: transparent; font-size: 18px" id="showInformationTitle">
                </div>
                <div class="col-xl-2 text-right">
                    <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-danger" data-toggle="modal" data-target="#DeleteInformationModal">
                        <i class="fa fa-trash text-danger"></i>
                    </a>
                </div>
            </div>
            <hr>
            <div class="row mt-6">
                <div class="col-xl-3 mt-8">
                    <span class="font-weight-bold">Bilgilendirme Tarihi: </span>
                </div>
                <div class="col-xl-9">
                    <div class="form-group">
                        <label for="showInformationDate"></label>
                        <input type="datetime-local" class="form-control" id="showInformationDate">
                    </div>
                </div>
            </div>
            <div class="row mt-6">
                <div class="col-xl-2 mt-7">
                    <span class="font-weight-bold">Bilgilendirme: </span>
                </div>
                <div class="col-xl-10">
                    <div class="form-group">
                        <label for="showInformationInformation"></label>
                        <textarea id="showInformationInformation" class="form-control" rows="10"></textarea>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <div class="offcanvas-footer">
            <div class="row">
                <div class="col-xl-12 text-right">
                    <button type="button" class="btn btn-sm btn-success" id="updateInformation">Güncelle</button>
                </div>
            </div>
        </div>
    </div>
</div>
