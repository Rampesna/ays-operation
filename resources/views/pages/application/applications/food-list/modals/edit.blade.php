<div class="modal fade" id="EditFoodList" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:900px;">
        <form action="{{ route('applications.food-list.update') }}" method="post" class="modal-content">
            @csrf
            <input type="hidden" name="food_list_id" id="updated_food_list_id" required>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Yemeği Düzenle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <button type="submit" name="delete" value="1" class="btn btn-round btn-danger">Sil</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-9">
                        <div class="form-group">
                            <label for="name_edit">Yemek Adı</label>
                            <input type="text" name="name" id="name_edit" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="form-group">
                            <label for="count_edit">Yemek Sayısı</label>
                            <input type="text" name="count" id="count_edit" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="description_edit">Açıklamalar</label>
                            <textarea name="description" id="description_edit" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-round btn-default" data-dismiss="modal">İptal</button>
                <button type="submit" class="btn btn-round btn-success">Güncelle</button>
            </div>
        </form>
    </div>
</div>
