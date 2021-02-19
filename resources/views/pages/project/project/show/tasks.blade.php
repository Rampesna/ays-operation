@extends('layouts.master')
@section('title', 'Proje Görevleri')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    @include('pages.project.project.show.components.subheader')

    <div class="row mt-15">
        <div class="col-xl-6">
            <a href="{{ route('project.project.show', ['project' => $project, 'tab' => 'tasks', 'sub' => 'kanban']) }}" class="btn btn-primary">Kanban Board</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <table class="table" id="tasks">
                                <thead>
                                <tr>
                                    <th></th>
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
                                @foreach($project->tasks()->with('timesheets')->get() as $task)
                                    <tr>
                                        <td>
                                            @if($timesheet = auth()->user()->timesheets()->where('task_id', $task->id)->where('end_time', null)->first())
                                                <a href="#" onclick="document.getElementById('stop_form_{{ $task->id }}').submit();">
                                                    <i class="fa fa-stop text-danger"></i>
                                                </a>
                                                <form method="post" id="stop_form_{{ $task->id }}" action="{{ route('project.project.timesheet.stop') }}">
                                                    @csrf
                                                    <input type="hidden" name="timesheet_id" value="{{ $timesheet->id }}">
                                                </form>
                                            @else
                                                <a href="#" onclick="document.getElementById('start_form_{{ $task->id }}').submit();">
                                                    <i class="fa fa-play text-success"></i>
                                                </a>
                                                <form method="post" id="start_form_{{ $task->id }}" action="{{ route('project.project.timesheet.start') }}">
                                                    @csrf
                                                    <input type="hidden" name="task_id" value="{{ $task->id }}">
                                                </form>
                                            @endif
                                        </td>
                                        <td><a href="#" data-id="{{ $task->id }}" data-toggle="modal" data-target="#ShowTask" class="showTask">#{{ $task->id }}</a></td>
                                        <td>
                                            <a href="#" data-id="{{ $task->id }}" data-toggle="modal" data-target="#ShowTask" class="showTask">
                                                {{ $task->name }}
                                            </a>
                                        </td>
                                        <td>{{ $task->status }}</td>
                                        <td data-sort="{{ date('Y-m-d', strtotime($task->start_date)) }}">{{ strftime("%d %B, %Y", strtotime($task->start_date)) }}</td>
                                        <td data-sort="{{ date('Y-m-d', strtotime($task->end_date)) }}">{{ strftime("%d %B, %Y", strtotime($task->end_date)) }}</td>
                                        <td>
                                            @foreach(collect($task->timesheets()->with('starter')->get())->groupBy(['starter_type','starter_id'])->all() as $group)
                                                @foreach($group as $starters)
                                                    <a class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="{{ @$starters->first()->starter->name }}">
                                                        <img alt="Pic" src="{{ @$starters->first()->starter->image ? asset($starters->first()->starter->image) : asset('assets/media/logos/avatar.jpg') }}" />
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
                                        <td>{{ $task->priority->name }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th></th>
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
            background: rgb(255,139,0);
            background: linear-gradient(90deg, rgba(255,139,0,1) 0%, rgba(181,77,0,1) 100%);
        }
    </style>
@stop

@section('page-script')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
    <script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>
    <script src="{{ asset('assets/js/pages/crud/forms/editors/summernote.js') }}"></script>

    <script>
        // Class definition
        var KTTagifyDemos = function() {
            // Private functions
            var tags = function() {
                var input = document.getElementById('task_tags'),
                    // init Tagify script on the above inputs
                    tagify = new Tagify(input, {

                    })

                // Chainable event listeners
                tagify.on('add', onAddTag)
                    .on('remove', onRemoveTag)
                    .on('input', onInput)
                    .on('edit', onTagEdit)
                    .on('invalid', onInvalidTag)
                    .on('click', onTagClick)
                    .on('dropdown:show', onDropdownShow)
                    .on('dropdown:hide', onDropdownHide)

                // tag added callback
                function onAddTag(e) {
                    console.log("onAddTag: ", e.detail);
                    console.log("original input value: ", input.value)
                    tagify.off('add', onAddTag) // exmaple of removing a custom Tagify event
                }

                // tag remvoed callback
                function onRemoveTag(e) {
                    console.log(e.detail);
                    console.log("tagify instance value:", tagify.value)
                }

                // on character(s) added/removed (user is typing/deleting)
                function onInput(e) {
                    console.log(e.detail);
                    console.log("onInput: ", e.detail);
                }

                function onTagEdit(e) {
                    console.log("onTagEdit: ", e.detail);
                }

                // invalid tag added callback
                function onInvalidTag(e) {
                    console.log("onInvalidTag: ", e.detail);
                }

                // invalid tag added callback
                function onTagClick(e) {
                    console.log(e.detail);
                    console.log("onTagClick: ", e.detail);
                }

                function onDropdownShow(e) {
                    console.log("onDropdownShow: ", e.detail)
                }

                function onDropdownHide(e) {
                    console.log("onDropdownHide: ", e.detail)
                }
            }

            return {
                // public functions
                init: function() {
                    tags();
                }
            };
        }();

        jQuery(document).ready(function() {
            KTTagifyDemos.init();
        });

    </script>


    <script>
        var KTFormRepeater = function() {

            // Private functions
            var repeater1 = function() {
                $('#kt_repeater_1').repeater({
                    initEmpty: false,

                    defaultValues: {
                        'text-input': 'foo'
                    },

                    show: function () {
                        $(this).slideDown();
                    },

                    hide: function (deleteElement) {
                        $(this).slideUp(deleteElement);
                    }
                });
            }

            return {
                // public functions
                init: function() {
                    repeater1();
                }
            };
        }();

        jQuery(document).ready(function() {
            KTFormRepeater.init();
        });
    </script>

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
                    width: "3%",
                    orderable: false,
                    searchable: false
                },
                {
                    targets: 1,
                    width: "3%"
                },
                {
                    targets: 2,
                    width: "22%"
                },
                {
                    targets: 3,
                    width: "5%"
                },
                {
                    targets: 4,
                    width: "10%"
                },
                {
                    targets: 5,
                    width: "10%"
                },
                {
                    targets: 6,
                    width: "8%"
                },
                {
                    targets: 8,
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
            var checklistItemCreateIcon = $("#checklistItemCreate");
            var taskProgressSelector = $("#task_progress");

            $.ajax({
                type: 'get',
                url: '{{ route('ajax.project.task.edit') }}',
                data: {
                    task_id: task_id
                },
                success: function (task) {
                    checklistItemCreateIcon.data('id',task.id);

                    var exists = timesheetExistControl(task.id,'{{ auth()->user()->getId() }}');
                    var progress = calculateTaskProgress(task.id);

                    taskProgressSelector.html(progress + '%');
                    taskProgressSelector.css({'width': progress + '%'});

                    $("#showTaskHeaderTitle").html(task.name);

                    if (task.milestone_id == null) {
                        $("#milestone_card").html(' -- ');
                    } else {
                        $("#milestone_card").html(task.milestone.name);
                    }

                    $("#description_card").html(task.description);

                    checklistCardSelector.html('');
                    $.each(task.checklist_items, function (index) {
                        var checkedControl = '';
                        if (task.checklist_items[index].checked == 1) {
                            checkedControl = 'checked';
                        }

                        if (exists === "1") {
                            checklistItemCreateIcon.show();
                            checklistCardSelector.append('' +
                                '<div class="row" id="checklist_item_row_' + task.checklist_items[index].id + '">' +
                                '<div class="col-xl-1">' +
                                '<label class="checkbox checkbox-circle checkbox-success checkbox-lg mr-2">' +
                                '<input ' + checkedControl + ' type="checkbox" class="checklistItemCheckbox" data-id="' + task.checklist_items[index].id + '" />' +
                                '<span></span>' +
                                '</label>' +
                                '</div>' +
                                '<div class="col-xl-9 mt-3">' +
                                '<label style="width: 100%">' +
                                '<input type="text" class="form-control checklistItemInput" data-id="' + task.checklist_items[index].id + '" value="' + task.checklist_items[index].name + '">' +
                                '</label>' +
                                '</div>' +
                                '<div class="col-xl-2 mt-6 ml-n5">' +
                                '<i class="fa fa-times-circle text-danger cursor-pointer checklistItemDelete" data-id="' + task.checklist_items[index].id + '"></i>' +
                                '</div>' +
                                '</div>' +
                                '');
                        } else {
                            checklistItemCreateIcon.hide();
                            checklistCardSelector.append('' +
                                '<div class="row" id="checklist_item_row_' + task.checklist_items[index].id + '">' +
                                '<div class="col-xl-1">' +
                                '<label class="checkbox checkbox-circle checkbox-success checkbox-lg mr-2">' +
                                '<input disabled ' + checkedControl + ' type="checkbox" class="checklistItemCheckbox" data-id="' + task.checklist_items[index].id + '" />' +
                                '<span></span>' +
                                '</label>' +
                                '</div>' +
                                '<div class="col-xl-9 mt-3">' +
                                '<label style="width: 100%">' +
                                '<input disabled type="text" class="form-control checklistItemInput" data-id="' + task.checklist_items[index].id + '" value="' + task.checklist_items[index].name + '">' +
                                '</label>' +
                                '</div>' +
                                '</div>' +
                                '');
                        }


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

                    $(".checklistItemCheckbox").click(function () {
                        var checklist_item_id = $(this).data('id');
                        if ($(this).is(':checked')) {
                            $.ajax({
                                type: 'post',
                                url: '{{ route('ajax.project.task.checkChecklistItem') }}',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    checklist_item_id: checklist_item_id
                                }
                            });
                        } else {
                            $.ajax({
                                type: 'post',
                                url: '{{ route('ajax.project.task.uncheckChecklistItem') }}',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    checklist_item_id: checklist_item_id
                                }
                            });
                        }

                        var progress = calculateTaskProgress(task.id);

                        taskProgressSelector.html(progress + '%');
                        taskProgressSelector.css({'width': progress + '%'});
                    });

                    $(".checklistItemInput").focusout(function () {
                        var checklist_item_id = $(this).data('id');
                        var name = $(this).val();

                        $.ajax({
                            type: 'post',
                            url: '{{ route('ajax.project.task.updateChecklistItem') }}',
                            data: {
                                _token: '{{ csrf_token() }}',
                                checklist_item_id: checklist_item_id,
                                name: name
                            },
                            success: function () {

                            },
                            error: function (error) {
                                console.log(error);

                            }
                        });
                    });

                    $(".checklistItemDelete").click(function () {
                        var checklist_item_id = $(this).data('id');

                        $.ajax({
                            type: 'post',
                            url: '{{ route('ajax.project.task.deleteChecklistItem') }}',
                            data: {
                                _token: '{{ csrf_token() }}',
                                checklist_item_id: checklist_item_id
                            },
                            success: function () {
                                $("#checklist_item_row_" + checklist_item_id).remove();

                                var progress = calculateTaskProgress(task.id);

                                taskProgressSelector.html(progress + '%');
                                taskProgressSelector.css({'width': progress + '%'});
                            },
                            error: function (error) {
                                console.log(error);

                            }
                        });
                    });
                },
                error: function (error) {
                    console.log(error);

                }
            });
        });

        $("#checklistItemCreate").click(function () {
            var task_id = $(this).data('id');
            var taskProgressSelector = $("#task_progress");

            $.ajax({
                type: 'post',
                url: '{{ route('ajax.project.task.createChecklistItem') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    task_id: task_id,
                    creator_id: '{{ auth()->user()->getId() }}'
                },
                success: function (checklistItem) {
                    $("#checklist_card").append('' +
                        '<div class="row" id="checklist_item_row_' + checklistItem.id + '">' +
                        '<div class="col-xl-1">' +
                        '<label class="checkbox checkbox-circle checkbox-success checkbox-lg mr-2">' +
                        '<input type="checkbox" class="checklistItemCheckbox" data-id="' + checklistItem.id + '" />' +
                        '<span></span>' +
                        '</label>' +
                        '</div>' +
                        '<div class="col-xl-9 mt-3">' +
                        '<label style="width: 100%">' +
                        '<input type="text" class="form-control checklistItemInput" data-id="' + checklistItem.id + '">' +
                        '</label>' +
                        '</div>' +
                        '<div class="col-xl-2 mt-6 ml-n5">' +
                        '<i class="fa fa-times-circle text-danger cursor-pointer checklistItemDelete" data-id="' + checklistItem.id + '"></i>' +
                        '</div>' +
                        '</div>' +
                        '');

                    $(".checklistItemCheckbox").click(function () {
                        var checklist_item_id = $(this).data('id');
                        if ($(this).is(':checked')) {
                            $.ajax({
                                type: 'post',
                                url: '{{ route('ajax.project.task.checkChecklistItem') }}',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    checklist_item_id: checklist_item_id
                                }
                            });
                        } else {
                            $.ajax({
                                type: 'post',
                                url: '{{ route('ajax.project.task.uncheckChecklistItem') }}',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    checklist_item_id: checklist_item_id
                                }
                            });
                        }

                        var progress = calculateTaskProgress(task_id);

                        taskProgressSelector.html(progress + '%');
                        taskProgressSelector.css({'width': progress + '%'});
                    });

                    $(".checklistItemInput").focusout(function () {
                        var checklist_item_id = $(this).data('id');
                        var name = $(this).val();

                        $.ajax({
                            type: 'post',
                            url: '{{ route('ajax.project.task.updateChecklistItem') }}',
                            data: {
                                _token: '{{ csrf_token() }}',
                                checklist_item_id: checklist_item_id,
                                name: name
                            },
                            success: function () {

                            },
                            error: function (error) {
                                console.log(error);

                            }
                        });
                    });

                    $(".checklistItemDelete").click(function () {
                        var checklist_item_id = $(this).data('id');

                        $.ajax({
                            type: 'post',
                            url: '{{ route('ajax.project.task.deleteChecklistItem') }}',
                            data: {
                                _token: '{{ csrf_token() }}',
                                checklist_item_id: checklist_item_id
                            },
                            success: function () {
                                $("#checklist_item_row_" + checklist_item_id).remove();

                                var progress = calculateTaskProgress(task_id);

                                taskProgressSelector.html(progress + '%');
                                taskProgressSelector.css({'width': progress + '%'});
                            },
                            error: function (error) {
                                console.log(error);

                            }
                        });


                    });

                    var progress = calculateTaskProgress(task_id);

                    taskProgressSelector.html(progress + '%');
                    taskProgressSelector.css({'width': progress + '%'});

                },
                error: function (error) {
                    console.log(error);
                }
            });
        });

        function timesheetExistControl(task_id, starter_id)
        {
            var result = null;
            $.ajax({
                async: false,
                type: 'get',
                url: '{{ route('ajax.project.timesheet.exists') }}',
                data: {
                    task_id: task_id,
                    starter_type: 'App\\Models\\User',
                    starter_id: starter_id
                },
                success: function (response) {
                    result = response;
                }
            });
            return result;
        }

        function calculateTaskProgress(task_id)
        {
            var progress = null;
            $.ajax({
                async: false,
                type: 'get',
                url: '{{ route('ajax.project.task.calculateTaskProgress') }}',
                data: {
                    task_id: task_id
                },
                success: function (response) {
                    progress = response;
                }
            });
            return progress;
        }
    </script>

@stop
