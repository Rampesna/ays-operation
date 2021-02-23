<div class="modal fade" id="DeleteBoardModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:900px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Panoyu Sil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12">
                        <input type="hidden" id="deleted_task_status_id">
                        <p>
                            Bu panoyu silmek istediğinize emin misiniz?
                        </p>
                    </div>
                </div>
                <div id="deletingBoardTasksSelector" style="display: none">
                    <hr>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label for="new_board_id_selector">Bu Panoya Ait <span id="deletingBoardTasksCountSelector"></span> Adet Görev Var</label>
                                <select id="new_board_id_selector" class="form-control selectpicker">

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="deleteBoard">Sil</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Vazgeç</button>
            </div>
        </div>
    </div>
</div>
