<div class="modal fade" id="SelectEmployeeDataModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Tarama Seçimi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12">
                        <label for="data_scan_group_code">İşlem Türü</label>
                        <select id="data_scan_group_code" class="form-control">
                            @foreach($dataScanList as $data)
                                <option value="{{ $data['grupKodu'] }}">{{ $data['grupAdi'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Kapat</button>
                <button type="button" class="btn btn-round btn-success" id="selectEmployeeDataButton">Kaydet</button>
            </div>
        </div>
    </div>
</div>
