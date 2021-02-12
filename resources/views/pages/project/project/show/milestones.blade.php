@extends('layouts.master')
@section('title', 'Proje Detayı')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    @include('pages.project.project.show.components.subheader')

    <div class="row mt-15">
        <div class="col-xl-12 text-right">
            <a href="#" class="btn btn-success font-weight-bolder" data-toggle="modal" data-target="#CreateMilestone">Kilometre Taşı Oluştur</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div id="milestones"></div>
                </div>
            </div>
        </div>
    </div>

    @include('pages.project.project.show.modals.create-milestone')
    @include('pages.project.project.show.modals.show-task')
    @include('pages.project.project.show.modals.delete-milestone')

@endsection

@section('page-styles')
    <link href="{{ asset('assets/plugins/custom/kanban/kanban.bundle.css') }}" rel="stylesheet" type="text/css"/>

    <style>
        .showTaskHeaderTitleBackground{
            background: rgb(255,139,0);
            background: linear-gradient(90deg, rgba(255,139,0,1) 0%, rgba(181,77,0,1) 100%);
        }
    </style>
@stop

@section('page-script')
    <script src="{{ asset('assets/plugins/custom/kanban/kanban.bundle.js') }}"></script>

    <script>
        "use strict";
        var kanban = new jKanban({
            element: '#milestones',
            gutter: '0',
            widthBoard: '350px',
            dragBoards: false,
            click: function(el) {
                $("#ShowTask").modal('show');
                showTask(el.dataset.eid);
            },
            dropEl: function (el, source) {
                $.ajax({
                    type: 'post',
                    url: '{{ route('ajax.project.task.updateMilestone') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        task_id: el.dataset.eid,
                        milestone_id: el.parentNode.parentNode.dataset.id
                    }
                });
            },
            buttonClick: function(el, boardId) {
                console.log(el);
                console.log(boardId);
            },
            boards: [
                {
                    'id': '0',
                    'title': 'Kilometre Taşsız Görevler',
                    'class' : 'dark-75',
                    'item': [
                        @foreach($project->tasks()->where('milestone_id', null)->get() as $task)
                        {
                            'id' : '{{ $task->id }}',
                            'title': '{{ $task->name }}'
                        }
                        {{ !$loop->last ? ',' : null }}
                        @endforeach
                    ]
                },
                    @foreach($project->milestones()->orderBy('order','asc')->get() as $milestone)
                {
                    'id': '{{ $milestone->id }}',
                    'title': '<div class="row"><div class="col-xl-10">{{ $milestone->name }}</div><div class="col-xl-2 text-right"><a href="#" data-id="{{ $milestone->id }}" class="deleteBoard" data-toggle="modal" data-target="#DeleteMilestoneModal"><i class="fa fa-trash text-white"></i></a></div></div>',
                    'class' : '{{ $milestone->color }}',
                    'item': [
                            @foreach($milestone->tasks as $task)
                        {
                            'id' : '{{ $task->id }}',
                            'title': '{{ $task->name }}'
                        }
                        {{ !$loop->last ? ',' : null }}
                        @endforeach
                    ]
                }
                {{ !$loop->last ? ',' : null }}
                @endforeach
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

    <script>

        $(".deleteBoard").click(function () {
            var milestone_id = $(this).data('id');
            $("#deleted_milestone_id").val(milestone_id);
        });

        $("#cancelDeleteMilestone").click(function () {
            $("#deleted_milestone_id").val('');
        });

    </script>
@stop
