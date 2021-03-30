<div class="modal fade" id="ShowFoodModal" tabindex="-1" role="dialog" data-backgrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="mySmallModalLabel">Yemek Detayları</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <button type="button" id="update_description" class="btn btn-success">Güncelle</button>
            </div>
            <input type="hidden" id="selected_food_list_check_id">
            <div class="modal-body">
                <div class="row text-center">
                    <div class="col-6 border-right pb-4 pt-4">
                        <label class="radio radio-outline radio-outline-2x radio-success">
                            <input id="food_checked_success" name="checked" type="radio" />Yiyeceğim
                            <span></span></label>
                    </div>
                    <div class="col-6 pb-4 pt-4">
                        <label class="radio radio-outline radio-outline-2x radio-danger">
                            <input id="food_checked_danger" name="checked" type="radio" />Yemeyeceğim
                            <span></span></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <label for="food_list_check_description">Açıklamalar</label>
                        <textarea class="form-control" rows="3" id="food_list_check_description"></textarea>
                    </div>
                </div>
                <div>
                    <hr>
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <div class="mt-2">Yemek Adı</div>
                            <div id="food_name" style="margin-top: 5px"></div>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="row text-center">
                    <div class="col-12 pb-4 pt-4">
                        <label class="mb-0">
                            Detaylar
                            <hr>
                        </label>

                        <p id="food_description">

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
