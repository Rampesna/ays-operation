@extends('layouts.master')
@section('title', 'Proje Yorumları')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    @include('pages.project.project.show.components.subheader')

    <div class="row mt-15">
        <div class="col-xl-12 text-right">
            <button class="btn btn-success" data-toggle="modal" data-target="#CreateComment">Yorum Ekle</button>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <table class="table" id="comments">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Yorum Tarihi</th>
                                    <th>Yorumu Yapan</th>
                                    <th>Yorum</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($project->comments as $comment)
                                    <tr id="row_id_{{ $comment->id }}">
                                        <td>
                                            @if($comment->creator_type == 'App\Models\User' && $comment->creator_id == auth()->user()->getId())
                                                <div class="dropdown dropdown-inline">
                                                    <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ki ki-bold-more-ver"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                        <ul class="navi navi-hover">
                                                            <li class="navi-item">
                                                                <a href="#"
                                                                   data-id="{{ $comment->id }}"
                                                                   data-toggle="modal"
                                                                   data-target="#EditComment"
                                                                   class="navi-link edit">
                                                                    <span class="navi-icon">
                                                                        <i class="fa fa-edit"></i>
                                                                    </span>
                                                                    <span class="navi-text">Düzenle</span>
                                                                </a>
                                                            </li>
                                                            <li class="navi-item">
                                                                <a href="#"
                                                                   data-id="{{ $comment->id }}"
                                                                   data-toggle="modal"
                                                                   data-target="#DeleteComment"
                                                                   class="navi-link delete">
                                                                    <span class="navi-icon">
                                                                        <i class="fa fa-trash-alt text-danger"></i>
                                                                    </span>
                                                                    <span class="navi-text text-danger">Sil</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                        <td>{{ $comment->created_at }}</td>
                                        <td>{{ @$comment->creator->name }}</td>
                                        <td><textarea class="form-control" rows="2" disabled>{!! $comment->comment !!}</textarea></td>
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

    @include('pages.project.project.show.modals.create-comment')
    @include('pages.project.project.show.modals.edit-comment')
    @include('pages.project.project.show.modals.delete-comment')

@endsection

@section('page-styles')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.3') }}" rel="stylesheet" type="text/css"/>

@stop

@section('page-script')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
    <script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

    <script>
        var table = $('#comments').DataTable({
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
        $("#create_comment").click(function () {
            var comment = $("#comment_create").val();
            var creator_type = 'App\\Models\\User';
            var creator_id = '{{ auth()->user()->getId() }}';
            var relation_type = 'App\\Models\\Project';
            var relation_id = '{{ $project->id }}';

            $.ajax({
                async: false,
                type: 'post',
                url: '{{ route('ajax.project.comment.create') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    creator_type: creator_type,
                    creator_id: creator_id,
                    relation_type: relation_type,
                    relation_id: relation_id,
                    comment: comment
                },
                success: function (comment) {
                    table.row.add([
                        '<div class="dropdown dropdown-inline"><a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ki ki-bold-more-ver"></i></a><div class="dropdown-menu dropdown-menu-sm dropdown-menu-right"><ul class="navi navi-hover"><li class="navi-item"><a href="#" data-id="' + comment.id + '" data-toggle="modal" data-target="#EditComment" class="navi-link edit"><span class="navi-icon"><i class="fa fa-edit"></i></span><span class="navi-text">Düzenle</span></a></li><li class="navi-item"><a href="#" data-id="' + comment.id + '" data-toggle="modal" data-target="#DeleteComment" class="navi-link delete"><span class="navi-icon"><i class="fa fa-trash-alt text-danger"></i></span><span class="navi-text text-danger">Sil</span></a></li></ul></div></div>',
                        moment(new Date(comment.created_at)).format('YYYY-MM-DD HH:mm:ss'),
                        comment.creator.name,
                        '<textarea class="form-control" rows="2" disabled>' + comment.comment + '</textarea>'
                    ]).node().id = 'row_id_' + comment.id;
                    table.draw(false);
                    $("#comment_create").val('');
                    $("#CreateComment").modal('hide');
                },
                error: function (error) {
                    console.log(error);

                }
            }).done();
        });

        $("#cancelCreateComment").click(function () {
            $("#comment_create").val('');
        });

        $(document).delegate(".edit", "click", function (e) {
            var comment_id = $(this).data('id');
            $("#updated_comment_id").val(comment_id);
            $.ajax({
                async: false,
                type: 'get',
                url: '{{ route('ajax.project.comment.edit') }}',
                data: {
                    comment_id: comment_id
                },
                success: function (comment) {
                    $("#comment_edit").val(comment.comment);
                },
                error: function (error) {
                    console.log(error);

                }
            }).done();
        });

        $("#update_comment").click(function () {
            var comment_id = $("#updated_comment_id").val();
            var comment = $("#comment_edit").val();
            var creator_type = 'App\\Models\\User';
            var creator_id = '{{ auth()->user()->getId() }}';
            var relation_type = 'App\\Models\\Project';
            var relation_id = '{{ $project->id }}';

            $.ajax({
                async: false,
                type: 'post',
                url: '{{ route('ajax.project.comment.update') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    comment_id: comment_id,
                    creator_type: creator_type,
                    creator_id: creator_id,
                    relation_type: relation_type,
                    relation_id: relation_id,
                    comment: comment
                },
                success: function (comment) {
                    table.row("#row_id_" + comment_id).remove().draw();
                    table.row.add([
                        '<div class="dropdown dropdown-inline"><a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ki ki-bold-more-ver"></i></a><div class="dropdown-menu dropdown-menu-sm dropdown-menu-right"><ul class="navi navi-hover"><li class="navi-item"><a href="#" data-id="' + comment.id + '" data-toggle="modal" data-target="#EditComment" class="navi-link edit"><span class="navi-icon"><i class="fa fa-edit"></i></span><span class="navi-text">Düzenle</span></a></li><li class="navi-item"><a href="#" data-id="' + comment.id + '" data-toggle="modal" data-target="#DeleteComment" class="navi-link delete"><span class="navi-icon"><i class="fa fa-trash-alt text-danger"></i></span><span class="navi-text text-danger">Sil</span></a></li></ul></div></div>',
                        moment(new Date(comment.created_at)).format('YYYY-MM-DD HH:mm:ss'),
                        comment.creator.name,
                        '<textarea class="form-control" rows="2" disabled>' + comment.comment + '</textarea>'
                    ]).node().id = 'row_id_' + comment.id;
                    table.draw(false);
                    $("#comment_edit").val('');
                    $("#EditComment").modal('hide');
                },
                error: function (error) {
                    console.log(error);

                }
            }).done();
        });

        $(document).delegate(".delete", "click", function (e) {
            var comment_id = $(this).data('id');
            $("#deleted_comment_id").val(comment_id);
        });

        $(document).delegate("#delete_comment", "click", function (e) {
            var comment_id = $("#deleted_comment_id").val();

            $.ajax({
                async: false,
                type: 'post',
                url: '{{ route('ajax.project.comment.delete') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    comment_id: comment_id
                },
                success: function () {
                    table.row('#row_id_' + comment_id).remove().draw();
                    $("#DeleteComment").modal('hide');
                    $("#deleted_comment_id").val('');
                },
                error: function (error) {
                    console.log(error);

                }
            }).done();
        });
    </script>
@stop
