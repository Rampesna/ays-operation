<div id="show_meeting" style="width: 700px" class="offcanvas offcanvas-right p-10">
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-7">
        <input type="hidden" id="selectedTaskIdSelector">
    </div>
    <div class="offcanvas-content">
        <input type="hidden" id="showMeeting">
        <input type="hidden" id="showMeetingCompany">
        <div class="offcanvas-wrapper mb-5 scroll-pull">
            <div class="row">
                <div class="col-xl-10">
                    <label for="showMeetingName" style="display: none"></label>
                    <input class="form-control font-weight-bold" type="text" style="border: none; background: transparent; font-size: 18px" id="showMeetingName">
                </div>
                <div class="col-xl-2 text-right">
                    <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-danger" id="showMeetingDeleteButton" data-toggle="modal" data-target="#DeleteMeetingModal">
                        <i class="fa fa-trash text-danger"></i>
                    </a>
                </div>
            </div>
            <hr>
            <div class="row mt-6">
                <div class="col-xl-3 mt-2">
                    <span class="font-weight-bold">Toplantı Tarihi: </span>
                </div>
                <div class="col-xl-9">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="showMeetingStartDate">Başlangıç</label>
                                <input type="datetime-local" class="form-control" id="showMeetingStartDate">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="showMeetingEndDate">Bitiş</label>
                                <input type="datetime-local" class="form-control" id="showMeetingEndDate">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-6">
                <div class="col-xl-3 mt-6">
                    <span class="font-weight-bold">Toplantı Açıklaması: </span>
                </div>
                <div class="col-xl-9">
                    <label for="showMeetingDescription"></label>
                    <textarea class="form-control" id="showMeetingDescription" rows="4"></textarea>
                </div>
            </div>
            <div class="row mt-8" id="showMeetingVisibilityControl">
                <div class="col-xl-3 mt-8">
                    <span class="font-weight-bold">Erişim Türü: </span>
                </div>
                <div class="col-xl-9">
                    <label for="showMeetingVisibility"></label>
                    <select class="selectpicker form-control" id="showMeetingVisibility">
                        <option value="0">Dahil Olanlar Görebilsin</option>
                        <option value="1">Herkes Görebilsin</option>
                    </select>
                </div>
            </div>
            <div id="employeesAndUsersEdit">
                <div class="row mt-8" id="showMeetingVisibilityControl">
                    <div class="col-xl-3 mt-8">
                        <span class="font-weight-bold">Katılacak Personeller: </span>
                    </div>
                    <div class="col-xl-9">
                        <label for="showMeetingEmployees"></label>
                        <select class="selectpicker form-control" id="showMeetingEmployees" data-live-search="true" multiple>

                        </select>
                    </div>
                </div>
                <div class="row mt-8" id="showMeetingVisibilityControl">
                    <div class="col-xl-3 mt-8">
                        <span class="font-weight-bold">Katılacak Yöneticiler: </span>
                    </div>
                    <div class="col-xl-9">
                        <label for="showMeetingUsers"></label>
                        <select class="selectpicker form-control" id="showMeetingUsers" data-live-search="true" multiple>

                        </select>
                    </div>
                </div>
            </div>
            <div id="employeesAndUsersShow">
                <div class="row mt-8">
                    <div class="col-xl-3 mt-2">
                        <span class="font-weight-bold">Katılacak Personeller: </span>
                    </div>
                    <div class="col-xl-9">
                        <div class="d-flex flex-column flex-lg-fill float-left mb-7">
                            <div class="symbol-group symbol-hover" id="employeesAndUsersShowEmployees">
                                <a href="#" target="_blank" class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="Test"><img alt="Pic" src="{{ asset('assets/media/logos/avatar.jpg') }}" /></a>
                                <a href="#" target="_blank" class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="Test">
                                    <img alt="Pic" src="{{ asset('assets/media/logos/avatar.jpg') }}" />
                                </a>
                                <a href="#" target="_blank" class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="Test">
                                    <img alt="Pic" src="{{ asset('assets/media/logos/avatar.jpg') }}" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-8">
                    <div class="col-xl-3 mt-2">
                        <span class="font-weight-bold">Katılacak Yöneticiler: </span>
                    </div>
                    <div class="col-xl-9">
                        <div class="d-flex flex-column flex-lg-fill float-left mb-7">
                            <div class="symbol-group symbol-hover" id="employeesAndUsersShowUsers">
                                <a href="#" target="_blank" class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="Test">
                                    <img alt="Pic" src="{{ asset('assets/media/logos/avatar.jpg') }}" />
                                </a>
                                <a href="#" target="_blank" class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="Test">
                                    <img alt="Pic" src="{{ asset('assets/media/logos/avatar.jpg') }}" />
                                </a>
                                <a href="#" target="_blank" class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="Test">
                                    <img alt="Pic" src="{{ asset('assets/media/logos/avatar.jpg') }}" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-8">
                <div class="col-xl-3 mt-8">
                    <span class="font-weight-bold">Toplantı Türü: </span>
                </div>
                <div class="col-xl-9">
                    <label for="showMeetingType"></label>
                    <select class="selectpicker form-control" id="showMeetingType">
                        <option value="0">Yüzyüze</option>
                        <option value="1">Online</option>
                    </select>
                </div>
            </div>
            <div class="row mt-6" id="showMeetingLinkControl">
                <div class="col-xl-3 mt-9">
                    <span class="font-weight-bold">Toplantı Linki: </span>
                </div>
                <div class="col-xl-9">
                    <label for="showMeetingLink"></label>
                    <input type="text" id="showMeetingLink" class="form-control" style="border: none; background: transparent;">
                </div>
            </div>
        </div>
        <hr>
        <div class="offcanvas-footer">
            <div class="row">
                <div class="col-xl-12 text-right">
                    <button type="button" class="btn btn-sm btn-success" id="updateMeeting">Güncelle</button>
                </div>
            </div>
        </div>
    </div>
</div>
