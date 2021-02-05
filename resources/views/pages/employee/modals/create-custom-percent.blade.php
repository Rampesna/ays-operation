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
                    <div class="col-xl-3">
                        <div class="form-group">
                            <label for="year">Yıl</label>
                            <select name="year" id="year" class="form-control">
                                @for($year = date('Y') ; $year <= date('Y') + 5 ; $year++)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="form-group">
                            <label for="month">Ay</label>
                            <select name="month" id="month" class="form-control">
                                @for($month = 1 ; $month <= 12 ; $month++)
                                    <option value="{{ $month }}">{{ $month . ' - ' . strftime("%B", strtotime('2020-' . $month)) }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="percent">Yüzde</label>
                            <input type="text" name="percent" id="percent" class="form-control onlyNumber">
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
