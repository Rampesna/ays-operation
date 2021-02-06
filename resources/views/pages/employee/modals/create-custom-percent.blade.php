<div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:900px;">
        <div class="modal-content" style="margin-top: 25%">
            <div class="modal-header">
                <h5 class="modal-title">Yeni Yüzde Tanımla</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="year_create">Yıl</label>
                            <select name="year_create" id="year_create" class="form-control">
                                @for($year = date('Y') ; $year <= date('Y') + 5 ; $year++)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="month_create">Ay</label>
                            <select name="month_create" id="month_create" class="form-control">
                                @for($month = 1 ; $month <= 12 ; $month++)
                                    <option value="{{ $month }}">{{ $month . ' - ' . strftime("%B", strtotime('2020-' . $month)) }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="percent_create">Yüzde</label>
                            <div class="input-group">
                                <input type="text" name="percent_create" id="percent_create" class="form-control onlyNumber">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-percent fa-sm"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="custom_percent_create">Oluştur</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Vazgeç</button>
            </div>
        </div>
    </div>
</div>
