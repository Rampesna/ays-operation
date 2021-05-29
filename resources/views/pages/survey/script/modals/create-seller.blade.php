<div class="modal fade" id="CreateSeller" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
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
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="code_create_seller">Kodu</label>
                            <input type="text" id="code_create_seller" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="name_create_seller">Adı</label>
                            <input type="text" id="name_create_seller" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="products_create_seller">Ürünleri Seçin</label>
                            <select id="products_create_seller" class="form-control selectpicker" multiple>
                                @foreach($products as $product)
                                    <option value="{{ $product['kodu'] }}">{{ $product['adi'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="createSellerButton">Oluştur</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancelCreateSellerButton">Vazgeç</button>
            </div>
        </div>
    </div>
</div>
