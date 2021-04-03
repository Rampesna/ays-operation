<div class="modal fade" id="CreateManagerialReportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="{{ route('ik.report.managerialReport') }}" method="post" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">İdari Raporlar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="report_type_selector">Rapor Seçin</label>
                            <select id="report_type_selector" name="report_type" class="form-control" required>
                                <option selected hidden disabled></option>
                                <option value="1">Aylık İzin Raporu</option>
                                <option value="2">Aylık Fazla Mesai Raporu</option>
                                <option value="3">Aylık Toplam İzin Raporu</option>
                                <option value="4">Aylık Toplam Fazla Mesai Raporu</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row" style="display: none" id="overtimeReasonsRow">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="overtimeReasons">Rapora Dahil Edilecek Mesai Nedenleri</label>
                            <select class="form-control" id="overtimeReasons" name="overtime_reasons[]" multiple>
                                @foreach($overtimeReasons as $overtimeReason)
                                    <option value="{{ $overtimeReason->id }}">{{ $overtimeReason->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row" style="display: none" id="permitTypesRow">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="permitTypes">Rapora Dahil Edilecek İzin Türleri</label>
                            <select class="form-control" id="permitTypes" name="permit_types[]" multiple>
                                @foreach($permitTypes as $permitType)
                                    <option value="{{ $permitType->id }}">{{ $permitType->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xl-12">
                        <label for="date"></label>
                        <input type="month" id="date" name="date" class="form-control" value="{{ date('Y-m') }}" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Kapat</button>
                <button type="submit" class="btn btn-primary font-weight-bold">Oluştur</button>
            </div>
        </form>
    </div>
</div>
