<div class="modal fade" id="EditAnswer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
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
                <input type="hidden" id="updated_answer_id">
                <div class="row">
                    <div class="col-xl-9">
                        <div class="form-group">
                            <label for="answer_edit">Cevap</label>
                            <input type="text" id="answer_edit" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="form-group">
                            <label for="order_number_edit">Sıra</label>
                            <input type="text" id="order_number_edit" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="groups_edit">Kategoriler</label>
                            <input type="text" class="form-control tagify" name="groups_create" id="groups_edit">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="questions_edit">Cevaba Bağlanılacak Alt Sorular</label>
                            <select id="questions_edit" class="form-control selectpicker" data-live-search="true" multiple>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="products_edit">Ürünler</label>
                            <select id="products_edit" class="form-control selectpicker" data-live-search="true" multiple>

                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="columns_edit">Zorunlu Kolon Adları</label>
                            <select id="columns_edit" class="form-control selectpicker" data-live-search="true" multiple>
                                <option value="RandevuNotu">Randevu Notu Alanı</option>
                                <option value="SeciliSehir">Şehir Alanı</option>
                                <option value="SeciliIlce">İlçe Alanı</option>
                                <option value="Email">E-Mail Alanı</option>
                                <option value="YetkiliTel">Yetkili Telefon Alanı</option>
                                <option value="MaliMusavirTel">Mali Müşavir Telefon Alanı</option>
                                <option value="TicariYazilimAdi">Ticari Yazılım Alanı</option>
                                <option value="EntegratorKodu">Entegratör Adı Alanı</option>
                                <option value="KvkkIysIzni">Kvkk ve İys İzni Alanı</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="updateAnswerButton">Güncelle</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Vazgeç</button>
            </div>
        </div>
    </div>
</div>
