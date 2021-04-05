<div class="modal fade" id="CreatePunishmentModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <form action="{{ route('ik.employee.punishment.create') }}" method="post" class="modal-content">
            @csrf
            <input type="hidden" name="employee_id" value="{{ $employee->id }}">
            <div class="modal-header">
                <h5 class="modal-title">Ceza Oluştur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="category_id">Ceza Kategorisi</label>
                            <select id="category_id" name="category_id" class="form-control" required>
                                @foreach($punishmentCategories as $punishmentCategory)
                                    <option value="{{ $punishmentCategory->id }}">{{ $punishmentCategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="date">Ceza Tarihi</label>
                            <input type="date" id="date" name="date" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="amount">Para Kesintisi</label>
                            <input type="text" id="amount" name="amount" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="description">Açıklama</label>
                            <textarea id="description" name="description" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Kapat</button>
                <button type="submit" class="btn btn-round btn-info">Oluştur</button>
            </div>
        </form>
    </div>
</div>
