<div class="modal fade" id="CreatePaymentModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <form action="{{ route('employee.payment.store') }}" method="post" class="modal-content">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $loggedUser->id }}">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Ödeme Talep Et</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body demo-masked-input">

                <div class="row">
                    <div class="col-lg-6">
                        <label>Tutar</label>
                        <input required name="amount" class="form-control">
                    </div>
                    <div class="col-lg-6">
                        <label>Tarih</label>
                        <div class="input-group">
                            <input required name="payment_date" value="{{ date('d/m/Y') }}"
                                   data-provide="datepicker" data-date-autoclose="true" class="form-control"
                                   data-date-format="dd/mm/yyyy">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-6">
                        <label>Ödeme Türü</label>
                        <select required name="payment_type_id" class="form-control">
                            @foreach($paymentTypes as $paymentType)
                                @php($list = explode(',',$paymentType->user_types))
                                @if(in_array($loggedUser->user_type_id, $list))
                                    <option value="{{ $paymentType->id }}">{{ $paymentType->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label>Açıklama</label>
                        <input name="description" class="form-control">
                    </div>
                </div>
                <hr>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Kapat</button>
                <button type="submit" class="btn btn-round btn-primary">Kaydet</button>
            </div>
        </form>
    </div>
</div>
