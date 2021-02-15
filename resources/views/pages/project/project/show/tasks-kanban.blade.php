@extends('layouts.master')
@section('title', 'Proje Detayı')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    @include('pages.project.project.show.components.subheader')
    <input type="hidden" id="kt_quick_cart_toggle">
    <input type="hidden" id="loaderControl" value="0">
    <input type="hidden" id="sublistControl" value="0">
    <div class="row mt-15">
        <div class="col-xl-6">
            <a href="{{ route('project.project.show', ['project' => $project, 'tab' => 'tasks']) }}" class="btn btn-primary">Liste Görünümüne Geç</a>
        </div>
    </div>
    <hr>
    <div id="tasks"></div>

    @include('pages.project.project.show.modals.show-task')
    @include('pages.project.project.show.modals.create-task')
    @include('pages.project.project.show.components.task-rightbar')

@endsection

@section('page-styles')
    <link href="{{ asset('assets/plugins/custom/kanban/kanban.bundle.css') }}" rel="stylesheet" type="text/css"/>

    <style>
        .showTaskHeaderTitleBackground{
            background: rgb(255,139,0);
            background: linear-gradient(90deg, rgba(255,139,0,1) 0%, rgba(181,77,0,1) 100%);
        }

        .kanban-board-header {
            margin-bottom: -20px;
        }

        .kanban-container .kanban-board {
            float: none;
            -ms-flex-negative: 0;
            flex-shrink: 0;
            margin-bottom: 1.25rem;
            margin-right: 1.25rem !important;
            background-color: transparent;
            border-radius: 0.42rem;
        }

        .kanban-container .kanban-board .kanban-drag .kanban-item {
            border-radius: 1rem;
            -webkit-box-shadow: 0px 0px 13px 0px rgba(0, 0, 0, 0.05);
            box-shadow: 0px 0px 13px 0px rgba(0, 0, 0, 0.05);
        }
    </style>
@stop

@section('page-script')
    <script src="{{ asset('assets/plugins/custom/kanban/kanban.bundle.js') }}"></script>
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
        var taskAdder = $(".taskAdder");

        taskAdder.click(function () {
            alert();
        });
    </script>

    <script>
        "use strict";

        var kanban = new jKanban({
            element: '#tasks',
            gutter: '0',
            widthBoard: '290px',
            dragBoards: true,
            click: function(el) {
                // var loaderControlSelector = $("#loaderControl");
                // if (loaderControlSelector.val() === 0 || loaderControlSelector.val() === "0") {
                //     $("#ShowTask").modal('show');
                //     showTask(el.dataset.eid);
                // }
            },
            dropEl: function (el, source) {
                $.ajax({
                    type: 'post',
                    url: '{{ route('ajax.project.task.updateStatus') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        task_id: el.dataset.eid,
                        status_id: el.parentNode.parentNode.dataset.id
                    }
                });
            },
            dragendBoard: function (el) {
                var allBoards = document.querySelectorAll('.kanban-board');
                if (allBoards.length > 0) {
                    var list = [];
                    for (var i = 0; i < allBoards.length; i++) {
                        list[allBoards[i].dataset.id] = allBoards[i].dataset.order
                    }
                    $.ajax({
                        type: 'post',
                        url: '{{ route('ajax.project.task-status.order-update') }}',
                        data: {
                            _token: '{{ csrf_token() }}',
                            list: list
                        }
                    });
                }
            },
            boards: [
                @foreach($project->taskStatuses()->orderBy('order','asc')->get() as $status)
                {
                    'id': '{{ $status->id }}',
                    'title': '<div class="row"><div class="col-xl-1"><i class="fas fa-arrows-alt mt-4 moveTaskIcon"></i></div><div class="col-xl-9"><input data-id="{{ $status->id }}" class="form-control font-weight-bold editBoardTitle" type="text" value="{{ $status->name }}" style="color:gray; font-size: 15px; border: none; background: transparent"></div><div class="col-xl-1 text-right"><i class="fa fa-plus mt-3 cursor-pointer taskAdder" data-id="{{ $status->id }}"></i></div></div>',
                    'item': [
                            @foreach($status->tasks()->where('project_id', $project->id)->get() as $task)
                        {
                            'id': '{{ $task->id }}',
                            'title': '<div class="row">' +
                                '<div class="col-xl-10">' +
                                '   <i class="@if($task->progress == '100') fa fa-check-circle text-success @else far fa-check-circle @endif mr-3"></i><span data-id="{{ $task->id }}" class="taskItemTitle cursor-pointer">{{ $task->name }}</span>' +
                                '</div>' +
                                '<div class="col-xl-2 text-right">' +
                                @if($timesheet = auth()->user()->timesheets()->where('task_id', $task->id)->where('end_time', null)->first())
                                    '   <a href="#" onclick="document.getElementById(\'stop_form_{{ $task->id }}\').submit(); $(\'#loaderControl\').val(1);">' +
                                '       <i class="fa fa-stop text-danger"></i>' +
                                '   </a>' +
                                '<form style="visibility: hidden" id="stop_form_{{ $task->id }}" method="post" action="{{ route('project.project.timesheet.stop') }}">' +
                                '@csrf' +
                                '<input type="hidden" name="timesheet_id" value="{{ $timesheet->id }}">' +
                                '</form>' +
                                '</div>' +
                                @else
                                    '   <a href="#" onclick="document.getElementById(\'start_form_{{ $task->id }}\').submit(); $(\'#loaderControl\').val(1);">' +
                                '       <i class="fa fa-play text-success"></i>' +
                                '   </a>' +
                                '<form style="visibility: hidden" id="start_form_{{ $task->id }}" method="post" action="{{ route('project.project.timesheet.start') }}">' +
                                '@csrf' +
                                '<input type="hidden" name="task_id" value="{{ $task->id }}">' +
                                '</form>' +
                                '</div>' +
                                @endif
                                    '</div>' +
                                '<br><br>' +
                                '<div class="row mt-n3">' +
                                '<div class="col-xl-12">' +
                                '<span class="btn btn-pill btn-sm btn-dark-75" style="font-size: 11px; height: 20px; padding-top: 2px">{{ $task->priority }}</span>@if($task->milestone) <span class="btn btn-pill btn-sm btn-{{ $task->milestone->color }}" style="font-size: 11px; height: 20px; padding-top: 2px">{{ $task->milestone->name }}</span> @endif' +
                                '</div>' +
                                '</div>' +
                                '<br><br>' +
                                '<div class="row"><div class="col-xl-6"><span class="font-weight-bold" style="font-size: 10px">{{ strftime('%d %B, %Y', strtotime($task->end_date)) }}</span></div><div class="col-xl-6 text-right"><i class="fas fa-sort-amount-down cursor-pointer" onclick="runSublistChecker({{ $task->id }}); $(\'#sublistControl\').val(1)" data-id="{{ $task->id }}"></i></div></div>' +
                                '<div id="sublist_{{ $task->id }}" class="taskSublist">' +
                                '<hr>' +
                                '<div class="row">' +
                                @foreach($task->checklistItems as $checklistItem)
                                '<div class="col-xl-12 m-1">' +
                                '<i class="@if($checklistItem->checked == 1) fa fa-check-circle text-success @else far fa-check-circle @endif mr-3"></i>{{ $checklistItem->name }}' +
                                '</div>' +
                                @endforeach
                                '</div>' +
                                '</div>'
                        }
                        {{ !$loop->last ? ',' : null }}
                        @endforeach
                    ]
                }
                {{ !$loop->last ? ',' : null }}
                @endforeach
                ,{
                    'id': '0',
                    'order': 99999,
                    'title': '<div class="row"><div id="addNewBoard" class="col-xl-12 bg-dark-75-o-25 bg-hover-secondary text-center cursor-pointer" style="border-radius: 2rem"><span class="form-control mt-1 font-weight-bold text-dark-75 editBoardTitle" style="font-size: 12px; border: none; background: transparent"><i class="fa fa-plus fa-sm mr-2"></i>Yeni Pano</span></div></div>',
                    'class': '',
                    'dragBoards': false
                }
            ]
        });
    </script>

    <script>
        function showTask(task_id)
        {
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
                },
                error: function (error) {
                    console.log(error);

                }
            });
        }

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

        $(document).delegate('.checklistItemCheckbox', 'click', function () {
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

        $(document).delegate('.checklistItemInput', 'focusout', function () {
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

        $(document).delegate('.checklistItemDelete', 'click', function () {
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

        function timesheetExistControl(task_id, starter_id) {
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

        function calculateTaskProgress(task_id) {
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

    <script>
        $(".taskAdder").click(function () {
            $("#CreateTask").modal('show');
            $("#status_id").val($(this).data('id'));
            // kanban.addElement($(this).data('id'), {
            //     title: "Test Add"
            // });
        });

        $(".taskItemTitle").click(function () {
            $("#kt_quick_cart_toggle").click();
            showTask($(this).data('id'));
            $("#ShowTask").modal('show');
        });

        $(".taskSublist").hide();

        function runSublistChecker(id) {
            $("#sublist_" + id).slideToggle();
        }

        $(document).delegate('.editBoardTitle','focusout',function () {
            var task_id = $(this).data('id');
            var name = $(this).val();

            $.ajax({
                type: 'post',
                url: '{{ route('ajax.project.task-status.name-update') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    task_id: task_id,
                    name: name
                }
            });
        });

        $(document).delegate("#addNewBoard", "click", function (e) {
            var project_id = '{{ $project->id }}';
            $.ajax({
                type: 'post',
                url: '{{ route('ajax.project.task-status.create') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    project_id: project_id
                },
                success: function (taskStatus) {
                    kanban.removeBoard('0');
                    kanban.addBoards([
                        {
                            id: '' + taskStatus.id + '',
                            title: '<div class="row"><div class="col-xl-1 mr-n4"><i class="fas fa-arrows-alt mt-4 moveTaskIcon"></i></div><div class="col-xl-10"><input data-id="' + taskStatus.id + '" class="form-control font-weight-bold editBoardTitle" type="text" value="' + taskStatus.name + '" style="color:gray; font-size: 15px; border: none; background: transparent"></div><div class="col-xl-1 text-right"><i class="fa fa-plus mt-3 cursor-pointer taskAdder" data-id="' + taskStatus.id + '"></i></div></div>',
                            item: [],
                            order: taskStatus.order
                        }
                    ]);
                    kanban.addBoards([
                        {
                            id: '0',
                            order: 99999,
                            title: '<div class="row"><div id="addNewBoard" class="col-xl-12 bg-dark-75-o-25 bg-hover-secondary text-center cursor-pointer" style="border-radius: 2rem"><span class="form-control mt-1 font-weight-bold text-dark-75 editBoardTitle" type="text" style="font-size: 12px; border: none; background: transparent"><i class="fa fa-plus fa-sm mr-2"></i>Yeni Pano</span></div></div>',
                            dragBoards: false
                        }
                    ]);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    </script>
@stop
