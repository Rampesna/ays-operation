<div class="modal fade" id="EditPunishmentModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <form action="{{ route('ik.employee.punishment.update') }}" method="post" class="modal-content">
            @csrf
            <input type="hidden" name="employee_id" id="employee_id_edit" value="{{ $employee->id }}">
            <input type="hidden" name="punishment_id" id="punishment_id_edit">
            <div class="modal-header">
                <h5 class="modal-title">Ceza Düzenle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="category_id_edit">Ceza Kategorisi</label>
                            <select id="category_id_edit" name="category_id" class="form-control" required>
                                @foreach($punishmentCategories as $punishmentCategory)
                                    <option value="{{ $punishmentCategory->id }}">{{ $punishmentCategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="date_edit">Ceza Tarihi</label>
                            <input type="date" id="date_edit" name="date" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="amount_edit">Para Kesintisi</label>
                            <input type="text" id="amount_edit" name="amount" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="description_edit">Açıklama</label>
                            <textarea id="description_edit" name="description" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Kapat</button>
                <button type="submit" class="btn btn-round btn-info">Güncelle</button>
            </div>
        </form>
    </div>
</div>
