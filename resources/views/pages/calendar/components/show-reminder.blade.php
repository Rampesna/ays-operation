<div id="show_reminder" style="width: 700px" class="offcanvas offcanvas-right p-10">
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-7">

    </div>
    <div class="offcanvas-content">
        <input type="hidden" id="showReminder">
        <div class="offcanvas-wrapper mb-5 scroll-pull">
            <div class="row">
                <div class="col-xl-10">
                    <label for="showReminderTitle" style="display: none"></label>
                    <input class="form-control font-weight-bold" type="text" style="border: none; background: transparent; font-size: 18px" id="showReminderTitle">
                </div>
                <div class="col-xl-2 text-right">
                    <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-danger" data-toggle="modal" data-target="#DeleteReminderModal">
                        <i class="fa fa-trash text-danger"></i>
                    </a>
                </div>
            </div>
            <hr>
            <div class="row mt-6">
                <div class="col-xl-3 mt-8">
                    <span class="font-weight-bold">Hatırlatıcı Zamanı: </span>
                </div>
                <div class="col-xl-9">
                    <div class="form-group">
                        <label for="showReminderDate"></label>
                        <input type="datetime-local" class="form-control" id="showReminderDate">
                    </div>
                </div>
            </div>
            <div class="row mt-6">
                <div class="col-xl-3 mt-7">
                    <span class="font-weight-bold">Hatırlatıcı İçeriği: </span>
                </div>
                <div class="col-xl-9">
                    <div class="form-group">
                        <label for="showReminderNote"></label>
                        <textarea id="showReminderNote" class="form-control" rows="10"></textarea>
                    </div>
                </div>
            </div>
            <div class="row mt-6">
                <div class="col-xl-12">
                    <div class="form-group">
                        <label>Hatırlatma Seçenekleri: </label>
                        <div class="checkbox-inline">
                            <label class="checkbox checkbox-success">
                                <input id="showReminderNotification" type="checkbox">Sistem Bildirimi
                                <span></span>
                            </label>
                            <label class="checkbox checkbox-success ml-3">
                                <input id="showReminderMail" type="checkbox">Mail
                                <span></span>
                            </label>
                            <label class="checkbox checkbox-success ml-3">
                                <input id="showReminderSms" type="checkbox" disabled>SMS (Aktif Değil)
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="offcanvas-footer">
            <div class="row">
                <div class="col-xl-12 text-right">
                    <button type="button" class="btn btn-sm btn-success" id="updateReminder">Güncelle</button>
                </div>
            </div>
        </div>
    </div>
</div>
