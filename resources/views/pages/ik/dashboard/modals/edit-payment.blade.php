<div class="modal fade" id="EditPaymentModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <form action="{{ route('ik.application.payment.update') }}" method="post" class="modal-content">
            @csrf
            <input type="hidden" name="payment_id" id="payment_id_edit_payment_payment">
            <input type="hidden" name="employee_id" id="employee_id_edit_payment">
            <div class="modal-header">
                <h5 class="modal-title">Fazla Mesai Düzenle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="type_id_edit_payment">Ödeme Türü</label>
                            <select id="type_id_edit_payment" name="type_id" class="form-control" required>
                                @foreach($paymentTypes as $paymentType)
                                    <option value="{{ $paymentType->id }}">{{ $paymentType->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="status_id_edit_payment">Durum</label>
                            <select class="form-control" id="status_id_edit_payment" name="status_id">
                                @foreach($paymentStatuses as $paymentStatus)
                                    <option value="{{ $paymentStatus->id }}">{{ $paymentStatus->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="date_edit_payment">Ödeme Tarihi</label>
                            <input type="date" id="date_edit_payment" name="date" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="amount_edit_payment">Ödenen Miktar</label>
                            <input type="text" id="amount_edit_payment" name="amount" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="payroll_edit_payment">Bordroya Dahil Edilsin</label>
                            <select class="form-control" id="payroll_edit_payment" name="payroll" required>
                                <option value="0">Hayır</option>
                                <option value="1">Evet</option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <label for="description_edit_payment">Açıklama</label>
                        <textarea id="description_edit_payment" class="form-control" name="description" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Kapat</button>
                <button type="submit" class="btn btn-round btn-info">Güncelle</button>
            </div>
        </form>
    </div>
</div>
