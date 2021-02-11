@extends('layouts.master')
@section('title', 'Proje Detayı')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    @include('pages.project.project.show.components.subheader')
    <input type="hidden" id="loaderControl" value="0">
    <div class="row mt-15">
        <div class="col-xl-6">
            <a href="{{ route('project.project.show', ['project' => $project, 'tab' => 'tasks']) }}" class="btn btn-primary">Liste Görünümüne Geç</a>
        </div>
        <div class="col-xl-6 text-right">
            <a href="#" class="btn btn-success font-weight-bolder" data-toggle="modal" data-target="#CreateTask">Yeni Görev</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div id="tasks"></div>
                </div>
            </div>
        </div>
    </div>

    @include('pages.project.project.show.modals.show-task')
    @include('pages.project.project.show.modals.create-task')

@endsection

@section('page-styles')
    <link href="{{ asset('assets/plugins/custom/kanban/kanban.bundle.css') }}" rel="stylesheet" type="text/css"/>

    <style>
        .showTaskHeaderTitleBackground{
            background: rgb(181,77,0);
            background: linear-gradient(90deg, rgba(181,77,0,1) 0%, rgba(255,139,0,1) 100%);
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
        "use strict";

        // Class definition

        var KTKanbanBoardDemo = function () {
            // Private functions
            var _demo1 = function () {
                var kanban = new jKanban({
                    element: '#tasks',
                    gutter: '0',
                    widthBoard: '350px',
                    dragBoards: false,
                    click: function(el) {
                        var loaderControlSelector = $("#loaderControl");
                        if (loaderControlSelector.val() === 0 || loaderControlSelector.val() === "0") {
                            $("#ShowTask").modal('show');
                            showTask(el.dataset.eid);
                        }
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
                    boards: [
                        @foreach(\App\Models\TaskStatus::all() as $status)
                        {
                            'id': '{{ $status->id }}',
                            'title': '{{ $status->name }}',
                            'item': [
                                @foreach($status->tasks as $task)
                                {
                                    'id': '{{ $task->id }}',

                                    'title': '<div class="row" style="margin-bottom: -20px">' +
                                        '<div class="col-xl-8">' +
                                        '   {{ $task->name }}' + '' +
                                        '</div>' +
                                        '<div class="col-xl-4 text-right">' +
                                        @if($timesheet = auth()->user()->timesheets()->where('task_id', $task->id)->where('end_time', null)->first())
                                        '   <a href="#" onclick="document.getElementById(\'stop_form_{{ $task->id }}\').submit(); $(\'#loaderControl\').val(1);">' +
                                        '       <i class="fa fa-stop text-danger"><i>' +
                                        '   </a>' +
                                        '<form style="visibility: hidden" id="stop_form_{{ $task->id }}" method="post" action="{{ route('project.project.timesheet.stop') }}">' +
                                        '@csrf' +
                                        '<input type="hidden" name="timesheet_id" value="{{ $timesheet->id }}">' +
                                        '</form>' +
                                        '</div>' +
                                        @else
                                        '   <a href="#" onclick="document.getElementById(\'start_form_{{ $task->id }}\').submit(); $(\'#loaderControl\').val(1);">' +
                                        '       <i class="fa fa-play text-success"><i>' +
                                        '   </a>' +
                                        '<form style="visibility: hidden" id="start_form_{{ $task->id }}" method="post" action="{{ route('project.project.timesheet.start') }}">' +
                                        '@csrf' +
                                        '<input type="hidden" name="task_id" value="{{ $task->id }}">' +
                                        '</form>' +
                                        '</div>' +
                                        @endif
                                        '</div>'
                                }
                                {{ !$loop->last ? ',' : null }}
                                @endforeach
                            ]
                        }
                        {{ !$loop->last ? ',' : null }}
                        @endforeach
                    ]
                });
            }

            // Public functions
            return {
                init: function () {
                    _demo1();
                }
            };
        }();

        jQuery(document).ready(function () {
            KTKanbanBoardDemo.init();
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

        function timesheetExistControl(task_id, starter_id)
        {
            var result = null;
            $.ajax({
                async: false,
                type: 'get',
                url: '{{ route('ajax.project.timesheet.exists') }}',
                data: {
                    task_id: task_id,
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
