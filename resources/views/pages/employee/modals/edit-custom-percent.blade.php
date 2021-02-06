<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:900px;">
        <div class="modal-content" style="margin-top: 25%">
            <div class="modal-header">
                <h5 class="modal-title">Yüzde Dilimi Düzenle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" id="updated_custom_percent_id">
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="year_edit">Yıl</label>
                            <select name="year_edit" id="year_edit" class="form-control">
                                @for($year = date('Y') ; $year <= date('Y') + 5 ; $year++)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="month_edit">Ay</label>
                            <select name="month_edit" id="month_edit" class="form-control">
                                @for($month = 1 ; $month <= 12 ; $month++)
                                    <option value="{{ $month }}">{{ $month . ' - ' . strftime("%B", strtotime('2020-' . $month)) }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="percent_edit">Yüzde</label>
                            <div class="input-group">
                                <input type="text" name="percent_edit" id="percent_edit" class="form-control onlyNumber">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-percent fa-sm"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="custom_percent_update">Güncelle</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Vazgeç</button>
            </div>
        </div>
    </div>
</div>
