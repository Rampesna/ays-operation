@extends('layouts.master')
@section('title', 'Proje Detayı')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    @include('pages.project.project.show.components.subheader')

    <div class="row mt-15">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <table class="table" id="tasks">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Görev Adı</th>
                                    <th>Durum</th>
                                    <th>Başlangıç Tarihi</th>
                                    <th>Bitiş Tarihi</th>
                                    <th>İşlem Yapanlar</th>
                                    <th>Etiketler</th>
                                    <th>Öncelik</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($project->tasks as $task)
                                    <tr>
                                        <td><a href="#" data-id="{{ $task->id }}" data-toggle="modal" data-target="#ShowTask" class="showTask">#{{ $task->id }}</a></td>
                                        <td><a href="#" data-id="{{ $task->id }}" data-toggle="modal" data-target="#ShowTask" class="showTask">{{ $task->name }}</a></td>
                                        <td>{{ $task->status }}</td>
                                        <td data-sort="{{ date('Y-m-d', strtotime($task->start_date)) }}">{{ strftime("%d %B, %Y", strtotime($task->start_date)) }}</td>
                                        <td data-sort="{{ date('Y-m-d', strtotime($task->end_date)) }}">{{ strftime("%d %B, %Y", strtotime($task->end_date)) }}</td>
                                        <td>
                                            @foreach(collect($task->timesheets()->with('starter')->get())->groupBy(['starter_type','starter_id'])->all() as $group)
                                                @foreach($group as $starters)
                                                    <a class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="{{ $starters->first()->starter->name }}">
                                                        <img alt="Pic" src="{{ $starters->first()->starter->image ? asset($starters->first()->starter->image) : asset('assets/media/logos/avatar.jpg') }}" />
                                                    </a>
                                                    @if($loop->iteration % 3 == 0)
                                                        <br>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($task->tags)
                                                @foreach(explode(',',$task->tags) as $tag)
                                                    <span class="btn btn-outline-secondary btn-hover-secondary btn-sm" style="cursor: context-menu">{{ $tag }}</span>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>{{ $task->priority }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Görev Adı</th>
                                    <th>Durum</th>
                                    <th>Başlangıç Tarihi</th>
                                    <th>Bitiş Tarihi</th>
                                    <th>İşlem Yapanlar</th>
                                    <th>Etiketler</th>
                                    <th>Öncelik</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('pages.project.project.show.modals.show-task')

@endsection

@section('page-styles')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.3') }}" rel="stylesheet" type="text/css"/>

    <style>
        .showTaskHeaderTitleBackground{
            background: rgb(181,77,0);
            background: linear-gradient(90deg, rgba(181,77,0,1) 0%, rgba(255,139,0,1) 100%);
        }
    </style>
@stop

@section('page-script')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
    <script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>
    <script src="{{ asset('assets/js/pages/crud/forms/editors/summernote.js') }}"></script>

    <script>
        var table = $('#tasks').DataTable({
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

            dom: 'rtipl',

            initComplete: function () {
                var r = $('#tasks tfoot tr');
                $('#tasks thead').append(r);
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

            columnDefs: [
                {
                    targets: 0,
                    width: "3%"
                },
                {
                    targets: 1,
                    width: "22%"
                },
                {
                    targets: 2,
                    width: "5%"
                },
                {
                    targets: 3,
                    width: "10%"
                },
                {
                    targets: 4,
                    width: "10%"
                },
                {
                    targets: 5,
                    width: "8%"
                },
                {
                    targets: 7,
                    width: "5%"
                }
            ],

            responsive: true
        });
    </script>

    <script>
        $(".showTask").click(function () {
            var task_id = $(this).data('id');
            var checklistCardSelector = $("#checklist_card");
            var commentsCardSelector = $("#comments_card");

            $.ajax({
                type: 'get',
                url: '{{ route('ajax.project.task.edit') }}',
                data: {
                    task_id: task_id
                },
                success: function (task) {
                    console.log(task);
                    if (task.milestone_id == null) {
                        $("#milestone_card").html(' -- ');
                    } else {
                        $("#milestone_card").html(task.milestone.name);
                    }

                    $("#description_card").html(task.description);

                    checklistCardSelector.html('');
                    $.each(task.checklist_items, function (index) {
                        checklistCardSelector.append('' +
                            '<div class="row">' +
                            '<div class="col-xl-1">' +
                            '<label class="checkbox checkbox-circle checkbox-success checkbox-lg mr-2">' +
                            '<input type="checkbox" />' +
                            '<span></span>' +
                            '</label>' +
                            '</div>' +
                            '<div class="col-xl-9 mt-3">' +
                            '<label style="width: 100%">' +
                            '<input type="text" class="form-control" value="' + task.checklist_items[index].name + '">' +
                            '</label>' +
                            '</div>' +
                            '<div class="col-xl-2 mt-6 ml-n5">' +
                            '<i class="fa fa-times-circle text-danger cursor-pointer"></i>' +
                            '</div>' +
                            '</div>' +
                            '');
                    });

                    commentsCardSelector.html('');
                    $.each(task.comments, function (index) {
                        commentsCardSelector.append('' +
                            '<div class="col-xl-12">' +
                            '<span style="font-size: 12px">' + task.comments[index].created_at + '</span>' +
                            '<h6>' + task.comments[index].creator.name + '</h6>' +
                            '</div>' +
                            '<div class="col-xl-12">' +
                            '<p>' + task.comments[index].comment + '</p>' +
                            '</div>' +
                            '');
                    });

                    $("#created_at_card").html('Oluşturulma Tarihi: ' + task.created_at);
                    $("#status_card").html('Durum: ' + task.status);
                    $("#start_date_card").html('Başlangıç Tarihi: ' + task.start_date);
                    $("#end_date_card").html('Bitiş Tarihi: ' + task.end_date);
                    $("#priority_card").html('Öncelik: ' + task.priority);

                },
                error: function (error) {
                    console.log(error);
                    toastr.error('Sistemsel Bir Hata Oluştu');
                }
            });
        });
    </script>
@stop
