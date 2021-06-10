<div class="modal fade" id="CreateSurvey" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:1200px;">
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
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="name_create">Adı</label>
                            <input type="text" id="name_create" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="form-group">
                            <label for="status_create">Durum</label>
                            <select id="status_create" class="form-control">
                                <option value="Beklemede">Beklemede</option>
                                <option value="Arama Listesi Bekleniyor">Arama Listesi Bekleniyor</option>
                                <option value="Oto Arama Aktif Edildi | Devam Ediyor">Oto Arama Aktif Edildi | Devam Ediyor</option>
                                <option value="Otomatik Arama Durdu | Devam Ediyor">Otomatik Arama Durdu | Devam Ediyor</option>
                                <option value="Yeniden Taranıyor">Yeniden Taranıyor</option>
                                <option value="İptal Edildi">İptal Edildi</option>
                                <option value="Tamamlandı">Tamamlandı</option>
                            </select>
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
                            <label for="tags_create">Etiketler</label>
                            <input type="text" id="tags_create" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="description_create">Bilgi Notu (Müşteri Ek Bilgi İsterse)</label>
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
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="opportunity_create">Fırsat</label>
                            <select id="opportunity_create" class="form-control">
                                <option value="0">Hayır</option>
                                <option value="1">Evet</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="call_create">Çağrı</label>
                            <select id="call_create" class="form-control">
                                <option value="0">Hayır</option>
                                <option value="1">Evet</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="dial_plan_create">Arama Planı</label>
                            <select id="dial_plan_create" class="form-control">
                                <option value="0">Hayır</option>
                                <option value="1">Evet</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="opportunity_redirect_to_seller_create">Satıcıya Yönlendir Durumunda Fırsat Gönderilsin mi?</label>
                            <select id="opportunity_redirect_to_seller_create" class="form-control">
                                <option value="0">Hayır</option>
                                <option value="1">Evet</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="dial_plan_redirect_to_seller_create">Satıcıya Yönlendir Durumunda Arama Planı Gönderilsin mi?</label>
                            <select id="dial_plan_redirect_to_seller_create" class="form-control">
                                <option value="0">Hayır</option>
                                <option value="1">Evet</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="seller_redirection_type_create">Satıcı Yönlendirme Tipi</label>
                            <select id="seller_redirection_type_create" class="form-control">
                                <option value="1">Şehire Göre Satıcı Yönlendirme</option>
                                <option value="2">Özelden Satıcı Yönlendirme</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="job_resource_create">İş Kaynağı</label>
                            <input type="text" id="job_resource_create" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="email_title_create">E-posta Başlığı</label>
                            <input id="email_title_create" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="file_selector_create">Mail İçerik Dosyası Seçimi</label>
                            <input id="file_selector_create" type="file" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="call_file_selector_create">Aranacak Liste Dosyası Seçimi</label>
                            <input id="call_file_selector_create" type="file" class="form-control">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xl-12">
                        <h5>Scripte Bağlanacak Yeni Satıcı Oluştur <i class="fa fa-plus-circle text-success ml-4 cursor-pointer" id="createSellecIcon"></i></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <table class="table" id="sellers">
                            <thead>
                            <tr>
                                <th>Yeni Satıcı Kodu</th>
                                <th>Yeni Satıcı Adı</th>
                                <th>Yeni Satıcı Ürün Bağlantıları</th>
                            </tr>
                            </thead>
                        </table>
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
