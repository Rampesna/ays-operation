<div class="modal fade" id="CreateEmployeeReportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="{{ route('ik.report.employeeReport') }}" method="post" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Personel Raporu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="report_type">Rapor Türü</label>
                        <select id="report_type" name="report_type" required class="form-control">
                            <option value="1">Yaş & Cinsiyet Dağılımı</option>
                            <option value="2">Eğitim Durumu</option>
                            <option value="3">Çalışan Pozisyonları Durumu</option>
                            <option value="4">Kan Grubu Dağılımı</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Kapat</button>
                <button type="submit" class="btn btn-info font-weight-bold">Oluştur</button>
            </div>
        </form>
    </div>
</div>
