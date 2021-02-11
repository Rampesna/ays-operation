<div class="modal fade" id="CreateMilestone" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:900px;">
        <form action="{{ route('project.project.milestone.create') }}" method="post" class="modal-content">
            @csrf
            <input type="hidden" name="project_id" value="{{ $project->id }}">
            <div class="modal-header">
                <h5 class="modal-title">Kşlometre Taşı Oluştur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="name">Kilometre Taşı Başlığı</label>
                            <input class="form-control" type="text" name="name" id="name" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="description">Açıklama</label>
                            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="color">Başlık Rengi</label>
                            <select class="form-control" name="color" id="color" required>
                                <option selected value="primary">Mavi</option>
                                <option value="success">Yeşil</option>
                                <option value="danger">Kırmızı</option>
                                <option value="warning">Turuncu</option>
                                <option value="info">Mor</option>
                                <option value="secondary">Gri</option>
                                <option value="dark-75">Siyah</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="order">Sıralama (Order)</label>
                            <input type="number" class="form-control" name="order" id="order">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Oluştur</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Vazgeç</button>
            </div>
        </form>
    </div>
</div>
