@extends('layouts.master')
@section('title', $name . ' - Sınav Cevapları')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    <form action="{{ route('exams.setExamResults') }}" method="post" class="row" id="setResultsForm">
        @csrf
        <input type="hidden" name="employee_id" value="{{ $employeeId }}">
        <input type="hidden" name="exam_id" value="{{ $examId }}">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6">
                            <h4>{{ $name }} - Sınav Cevapları</h4>
                        </div>
                        <div class="col-xl-6 text-right">
                            <button type="submit" class="btn btn-success">Kaydet</button>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xl-12">
                            <table class="table" id="list">
                                <thead>
                                <tr>
                                    <th>Soru</th>
                                    <th>Cevap</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($results as $result)
                                    <tr>
                                        <td>{{ $result['soru'] }}</td>
                                        <td>{{ $result['cevapStr'] }}</td>
                                        <td class="text-center">
                                            <div class="form-group">
                                                <label class="radio radio-success">
                                                    <input type="radio" value="1" name="answer_{{ $result['id'] }}" @if($result['durum'] == 1) checked @endif required />Doğru
                                                    <span></span></label>
                                                <label class="radio radio-danger">
                                                    <input type="radio" value="0" name="answer_{{ $result['id'] }}" @if($result['durum'] === 0) checked @endif />Yanlış
                                                    <span></span></label>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

@section('page-styles')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.3') }}" rel="stylesheet" type="text/css"/>

@stop

@section('page-script')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
    <script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

    <script>
        let table = $('#list').DataTable({
            language: {
                info: "_TOTAL_ Kayıttan _START_ - _END_ Arasındaki Kayıtlar Gösteriliyor.",
                infoEmpty: "Gösterilecek Hiç Kayıt Yok.",
                loadingRecords: "Kayıtlar Yükleniyor.",
                zeroRecords: "Tablo Boş",
                search: "Arama:",
                infoFiltered: "(Toplam _MAX_ Kayıttan Filtrelenenler)",
                lengthMenu: "Sayfa Başı _MENU_ Kayıt Göster",
                sProcessing: "Yükleniyor...",
                paginate: {
                    first: "İlk",
                    previous: "Önceki",
                    next: "Sonraki",
                    last: "Son"
                },
                select: {
                    rows: {
                        "_": "%d kayıt seçildi",
                        "0": "",
                        "1": "1 kayıt seçildi"
                    }
                }
            },
            dom: 'frtipl',

            columnDefs: [
                {
                    width: "40%",
                    targets: 0
                },
                {
                    width: "40%",
                    targets: 1
                }
            ],

            responsive: true,
            select: false
        });
    </script>

    <script>
        $('#setResultsForm').on('submit', function(e){
            var form = this;
            table.$('input[type="radio"]').each(function(){
                if(!$.contains(document, this)){
                    if(this.checked){
                        $(form).append(
                            $('<input>')
                                .attr('type', 'hidden')
                                .attr('name', this.name)
                                .val(this.value)
                        );
                    }
                }
            });
        });
    </script>

@stop
