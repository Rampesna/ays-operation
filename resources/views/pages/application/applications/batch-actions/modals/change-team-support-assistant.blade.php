<div class="modal fade" id="ChangeTeamSupportAssistantPermission" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <form id="change_team_support_assistant_permission_form" method="post" class="modal-content">
            {{ csrf_field() }}
            <div class="modal-header">
                <h5 class="modal-title">Takım Destek Lider Yardımcısı Yetkilendirmesi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12">
                        <label for="team_support_assistant_type">İşlem Türü</label>
                        <select id="team_support_assistant_type" name="team_support_assistant_type" class="form-control">
                            <option value="1">Yetilendirme Aç</option>
                            <option value="0">Yetilendirme Kapat</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Kapat</button>
                <button type="button" class="btn btn-round btn-success" data-dismiss="modal" id="change_team_support_assistant_permission_button">Kaydet</button>
            </div>
        </form>
    </div>
</div>
