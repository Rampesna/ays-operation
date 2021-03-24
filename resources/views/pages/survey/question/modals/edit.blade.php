<div class="modal fade" id="EditQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:900px;">
        <div class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Yeni Oluştur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="updated_question_id">
                <input type="hidden" id="group_code_edit">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="question_edit">Soru</label>
                            <input type="text" id="question_edit" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="form-group">
                            <label for="question_type_id_edit">Soru Türü</label>
                            <select id="question_type_id_edit" class="form-control">
                                <option value="1">1</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="form-group">
                            <label for="order_number_edit">Sıra</label>
                            <input type="text" id="order_number_edit" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="updateQuestionButton">Güncelle</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Vazgeç</button>
            </div>
        </div>
    </div>
</div>
