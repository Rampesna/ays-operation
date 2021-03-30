<div class="modal fade" id="CreateFoodListModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <form action="{{ route('ik.applications.food-list.create') }}" method="post" class="modal-dialog" style="max-width:900px;">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Yeni Yemek Girişi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="date">Tarih</label>
                            <input class="form-control" type="date" name="date" id="date" required>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="name">Yemek Adı</label>
                            <input class="form-control" type="text" name="name" id="name" required>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="form-group">
                            <label for="name">Yemek Sayısı</label>
                            <input class="form-control" type="text" name="count" id="count">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="description">Açıklama</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Kapat</button>
                <button type="submit" class="btn btn-round btn-success">Oluştur</button>
            </div>
        </div>
    </form action="#" method="post">
</div>
