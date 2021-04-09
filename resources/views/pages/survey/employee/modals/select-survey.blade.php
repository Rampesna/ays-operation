<div class="modal fade" id="SelectEmployeeSurveyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Anket Seçimi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12">
                        <label for="survey_code">İşlem Türü</label>
                        <select id="survey_code" class="form-control">
                            @foreach($surveys as $survey)
                                <option value="{{ $survey['kodu'] }}">{{ $survey['adi'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Kapat</button>
                <button type="button" class="btn btn-round btn-success" id="selectEmployeeSurveyButton">Kaydet</button>
            </div>
        </div>
    </div>
</div>
