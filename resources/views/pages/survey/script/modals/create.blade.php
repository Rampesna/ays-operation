<div class="modal fade" id="CreateSurvey" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
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
                <div class="row">
                    <div class="col-xl-3">
                        <div class="form-group">
                            <label for="code_create">Kodu</label>
                            <input type="text" id="code_create" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-9">
                        <div class="form-group">
                            <label for="name_create">Adı</label>
                            <input type="text" id="name_create" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="service_or_product_create">Hizmet / Ürün</label>
                            <input type="text" id="service_or_product_create" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="call_reason_create">Çağrı Nedeni</label>
                            <input type="text" id="call_reason_create" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="description_create">Açıklama</label>
                            <textarea id="description_create" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="customer_information_1_create">Müşteri Bilgilendirmesi 1</label>
                            <textarea id="customer_information_1_create" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="customer_information_2_create">Müşteri Bilgilendirmesi 2</label>
                            <textarea id="customer_information_2_create" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="ays-col-5">
                        <div class="form-group">
                            <label for="opportunity_create">Fırsat</label>
                            <select id="opportunity_create" class="form-control">
                                <option value="0">Hayır</option>
                                <option value="1">Evet</option>
                            </select>
                        </div>
                    </div>
                    <div class="ays-col-5">
                        <div class="form-group">
                            <label for="call_create">Çağrı</label>
                            <select id="call_create" class="form-control">
                                <option value="0">Hayır</option>
                                <option value="1">Evet</option>
                            </select>
                        </div>
                    </div>
                    <div class="ays-col-5">
                        <div class="form-group">
                            <label for="dial_plan_create">Arama Planı</label>
                            <select id="dial_plan_create" class="form-control">
                                <option value="0">Hayır</option>
                                <option value="1">Evet</option>
                            </select>
                        </div>
                    </div>
                    <div class="ays-col-5">
                        <div class="form-group">
                            <label for="opportunity_redirect_to_seller_create">Fırsat Satıcıya Yönlendir</label>
                            <select id="opportunity_redirect_to_seller_create" class="form-control">
                                <option value="0">Hayır</option>
                                <option value="1">Evet</option>
                            </select>
                        </div>
                    </div>
                    <div class="ays-col-5">
                        <div class="form-group">
                            <label for="dial_plan_redirect_to_seller_create">Arama Planı Satıcıya Yönlendir</label>
                            <select id="dial_plan_redirect_to_seller_create" class="form-control">
                                <option value="0">Hayır</option>
                                <option value="1">Evet</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="createSurveyButton">Oluştur</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Vazgeç</button>
            </div>
        </div>
    </div>
</div>
