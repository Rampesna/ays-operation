@extends('layouts.master')
@section('title', 'Proje Destek Talepleri')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    @include('pages.project.project.show.components.subheader')

    <div class="row mt-15">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row text-center">
                        <a href="{{ route('project.project.show', ['project' => $project, 'tab' => 'tickets']) }}" class="col-xl-3 border-right pb-4 pt-4 text-dark-75">
                            <i class="fas fa-ticket-alt fa-2x text-danger"></i><br>
                            <label class="mb-0 mr-5 cursor-pointer">Tüm Destek Talepleri</label>
                            <h4 class="font-30 font-weight-bold text-col-blue" style="font-size: 30px">{{ $project->tickets->count() }}</h4>
                        </a>
                        <a href="{{ route('project.project.show', ['project' => $project, 'tab' => 'tickets', 'sub' => 1]) }}" class="col-xl-3 border-right pb-4 pt-4 text-dark-75">
                            <i class="fas fa-clock fa-2x text-warning"></i><br>
                            <label class="mb-0 mr-5 cursor-pointer">Cevap Bekleyen</label>
                            <h4 class="font-30 font-weight-bold text-col-blue" style="font-size: 30px">{{ $project->tickets()->where('status_id', 1)->count() }}</h4>
                        </a>
                        <a href="{{ route('project.project.show', ['project' => $project, 'tab' => 'tickets', 'sub' => 2]) }}" class="col-xl-3 border-right pb-4 pt-4 text-dark-75">
                            <i class="fab fa-font-awesome-flag fa-2x text-primary"></i><br>
                            <label class="mb-0 mr-5 cursor-pointer">Cevaplanan</label>
                            <h4 class="font-30 font-weight-bold text-col-blue" style="font-size: 30px">{{ $project->tickets()->where('status_id', 2)->count() }}</h4>
                        </a>
                        <a href="{{ route('project.project.show', ['project' => $project, 'tab' => 'tickets', 'sub' => 3]) }}" class="col-xl-3 pb-4 pt-4 text-dark-75">
                            <i class="fas fa-check-circle fa-2x text-success"></i><br>
                            <label class="mb-0 mr-5 cursor-pointer">Tamamlanan</label>
                            <h4 class="font-30 font-weight-bold text-col-blue" style="font-size: 30px">{{ $project->tickets()->where('status_id', 3)->count() }}</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <table class="table" id="tickets">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Başlık</th>
                            <th>Bağlantı</th>
                            <th>Oluşturulma Tarihi</th>
                            <th>Öncelik</th>
                            <th>Son İşlem</th>
                            <th>Durum</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($tickets as $ticket)
                            <tr>
                                <td>
                                    <a href="{{ route('project.project.tickets.ticket', ['project' => $project, 'ticket' => $ticket]) }}">
                                        #{{ $ticket->id }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('project.project.tickets.ticket', ['project' => $project, 'ticket' => $ticket]) }}">
                                        {{ $ticket->title }}
                                    </a>
                                </td>
                                <td>
                                    {{ $ticket->reference }}
                                </td>
                                <td data-sort="{{ date('Y-m-d H:i:s', strtotime($ticket->created_at)) }}">
                                    {{ strftime("%d %B %Y, %H:%M", strtotime($ticket->created_at)) }}
                                </td>
                                <td>
                                    <div class="btn btn-pill btn-sm btn-{{ $ticket->priority->color }}" style="font-size: 11px; height: 20px; padding-top: 2px">{{ $ticket->priority->name }}</div>
                                </td>
                                <td data-sort="{{ date('Y-m-d H:i:s', strtotime($ticket->updated_at)) }}">
                                    {{ strftime("%d %B %Y, %H:%M", strtotime($ticket->updated_at)) }}
                                </td>
                                <td>
                                    <div class="btn btn-pill btn-sm btn-dark-75" style="font-size: 11px; height: 20px; padding-top: 2px">{{ $ticket->status->name }}</div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Başlık</th>
                            <th>Bağlantı</th>
                            <th>Oluşturulma Tarihi</th>
                            <th>Öncelik</th>
                            <th>Son İşlem</th>
                            <th>Durum</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('page-styles')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.3') }}" rel="stylesheet" type="text/css"/>

@stop

@section('page-script')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
    <script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

    <script>
        // $.fn.dataTable.ext.errMode = 'none';
        var table = $('#tickets').DataTable({
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
            dom: 'rtipl',

            initComplete: function () {
                var r = $('#tickets tfoot tr');
                $('#tickets thead').append(r);
                this.api().columns().every(function () {
                    var column = this;
                    var input = document.createElement('input');
                    input.className = 'form-control';
                    $(input).appendTo($(column.footer()).empty())
                        .on('change', function () {
                            column.search($(this).val(), false, false, true).draw();
                        });
                });
            },

            responsive: true,

            columnDefs: [
                {
                    width: "8%",
                    targets: 0
                }
            ],
        });
    </script>
@stop
