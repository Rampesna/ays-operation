@extends('employee.layouts.master')
@section('title', 'Proje Detayı')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    @include('employee.pages.project.show.components.subheader')

    <div class="row mt-15">
        <div class="col-xl-12 text-right">
            <button class="btn btn-success" data-toggle="modal" data-target="#CreateNote">Not Ekle</button>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <table class="table" id="notes">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Not Tarihi</th>
                                    <th>Notu Oluşturan</th>
                                    <th>Not</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($project->notes as $note)
                                    <tr id="row_id_{{ $note->id }}">
                                        <td>
                                            @if($note->creator_type == 'App\Models\Employee' && $note->creator_id == auth()->user()->getId())
                                                <div class="dropdown dropdown-inline">
                                                    <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ki ki-bold-more-ver"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                        <ul class="navi navi-hover">
                                                            <li class="navi-item">
                                                                <a href="#"
                                                                   data-id="{{ $note->id }}"
                                                                   data-toggle="modal"
                                                                   data-target="#EditNote"
                                                                   class="navi-link edit">
                                                                    <span class="navi-icon">
                                                                        <i class="fa fa-edit"></i>
                                                                    </span>
                                                                    <span class="navi-text">Düzenle</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                        <td>{{ $note->created_at }}</td>
                                        <td>{{ @$note->creator->name }}</td>
                                        <td><textarea class="form-control" rows="2" disabled>{!! $note->note !!}</textarea></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('employee.pages.project.show.modals.create-note')
    @include('employee.pages.project.show.modals.edit-note')

@endsection

@section('page-styles')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.3') }}" rel="stylesheet" type="text/css"/>

@stop

@section('page-script')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
    <script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

    <script>
        var table = $('#notes').DataTable({
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
                },
                buttons: {
                    print: {
                        title: 'Yazdır'
                    }
                }
            },

            dom: 'frtipl',

            columnDefs: [
                {
                    targets: 0,
                    width: "3%",
                    orderable: false,
                    order: false
                },
            ],

            responsive: true
        });
    </script>

    <script>
        $("#create_note").click(function () {
            var note = $("#note_create").val();
            var creator_type = 'App\\Models\\Employee';
            var creator_id = '{{ auth()->user()->getId() }}';
            var relation_type = 'App\\Models\\Project';
            var relation_id = '{{ $project->id }}';

            $.ajax({
                async: false,
                type: 'post',
                url: '{{ route('ajax.project.note.create') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    creator_type: creator_type,
                    creator_id: creator_id,
                    relation_type: relation_type,
                    relation_id: relation_id,
                    note: note
                },
                success: function (note) {
                    table.row.add([
                        '<div class="dropdown dropdown-inline"><a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ki ki-bold-more-ver"></i></a><div class="dropdown-menu dropdown-menu-sm dropdown-menu-right"><ul class="navi navi-hover"><li class="navi-item"><a href="#" data-id="' + note.id + '" data-toggle="modal" data-target="#EditNote" class="navi-link edit"><span class="navi-icon"><i class="fa fa-edit"></i></span><span class="navi-text">Düzenle</span></a></li></ul></div></div>',
                        moment(new Date(note.created_at)).format('YYYY-MM-DD HH:mm:ss'),
                        note.creator.name,
                        '<textarea class="form-control" rows="2" disabled>' + note.note + '</textarea>'
                    ]).node().id = 'row_id_' + note.id;
                    table.draw(false);
                    $("#note_create").val('');
                    $("#CreateNote").modal('hide');

                    $(".edit").click(function () {
                        var note_id = $(this).data('id');
                        $("#updated_note_id").val(note_id);

                        $.ajax({
                            async: false,
                            type: 'get',
                            url: '{{ route('ajax.project.note.edit') }}',
                            data: {
                                note_id: note_id
                            },
                            success: function (note) {
                                $("#note_edit").val(note.note);
                            },
                            error: function (error) {
                                console.log(error);

                            }
                        }).done();
                    });

                    $("#update_note").click(function () {
                        var note_id = $("#updated_note_id").val();
                        var note = $("#note_edit").val();
                        var creator_type = 'App\\Models\\Employee';
                        var creator_id = '{{ auth()->user()->getId() }}';
                        var relation_type = 'App\\Models\\Project';
                        var relation_id = '{{ $project->id }}';

                        $.ajax({
                            async: false,
                            type: 'post',
                            url: '{{ route('ajax.project.note.update') }}',
                            data: {
                                _token: '{{ csrf_token() }}',
                                note_id: note_id,
                                creator_type: creator_type,
                                creator_id: creator_id,
                                relation_type: relation_type,
                                relation_id: relation_id,
                                note: note
                            },
                            success: function (note) {
                                location.reload();
                            },
                            error: function (error) {
                                console.log(error);

                            }
                        }).done();
                    });

                    $(".delete").click(function () {
                        var note_id = $(this).data('id');
                        $("#deleted_note_id").val(note_id);
                    });

                    $("#delete_note").click(function () {
                        var note_id = $("#deleted_note_id").val();

                        $.ajax({
                            async: false,
                            type: 'post',
                            url: '{{ route('ajax.project.note.delete') }}',
                            data: {
                                _token: '{{ csrf_token() }}',
                                note_id: note_id
                            },
                            success: function () {
                                table.row('#row_id_' + note_id).remove().draw();
                                $("#DeleteNote").modal('hide');
                                $("#deleted_note_id").val('');
                            },
                            error: function (error) {
                                console.log(error);

                            }
                        }).done();
                    });
                },
                error: function (error) {
                    console.log(error);

                }
            }).done();
        });

        $("#cancelCreateNote").click(function () {
            $("#note_create").val('');
        });
    </script>

    <script>
        $(".edit").click(function () {
            var note_id = $(this).data('id');
            $("#updated_note_id").val(note_id);

            $.ajax({
                async: false,
                type: 'get',
                url: '{{ route('ajax.project.note.edit') }}',
                data: {
                    note_id: note_id
                },
                success: function (note) {
                    $("#note_edit").val(note.note);
                },
                error: function (error) {
                    console.log(error);

                }
            }).done();
        });

        $("#update_note").click(function () {
            var note_id = $("#updated_note_id").val();
            var note = $("#note_edit").val();
            var creator_type = 'App\\Models\\Employee';
            var creator_id = '{{ auth()->user()->getId() }}';
            var relation_type = 'App\\Models\\Project';
            var relation_id = '{{ $project->id }}';

            $.ajax({
                async: false,
                type: 'post',
                url: '{{ route('ajax.project.note.update') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    note_id: note_id,
                    creator_type: creator_type,
                    creator_id: creator_id,
                    relation_type: relation_type,
                    relation_id: relation_id,
                    note: note
                },
                success: function (note) {
                    location.reload();
                },
                error: function (error) {
                    console.log(error);

                }
            }).done();
        });

        $(".delete").click(function () {
            var note_id = $(this).data('id');
            $("#deleted_note_id").val(note_id);
        });

        $("#delete_note").click(function () {
            var note_id = $("#deleted_note_id").val();

            $.ajax({
                async: false,
                type: 'post',
                url: '{{ route('ajax.project.note.delete') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    note_id: note_id
                },
                success: function () {
                    table.row('#row_id_' + note_id).remove().draw();
                    $("#DeleteNote").modal('hide');
                    $("#deleted_note_id").val('');
                },
                error: function (error) {
                    console.log(error);

                }
            }).done();
        });
    </script>
@stop
