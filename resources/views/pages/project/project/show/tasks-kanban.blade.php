@extends('layouts.master')
@section('title', 'Proje Görevleri')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    @include('pages.project.project.show.components.subheader')
    <input type="hidden" id="kt_quick_cart_toggle">
    <input type="hidden" id="loaderControl" value="0">
    <div class="row mt-15">
        <div class="col-xl-6">
            <a href="{{ route('project.project.show', ['project' => $project, 'tab' => 'tasks']) }}" class="btn btn-primary">Liste Görünümüne Geç</a>
        </div>
    </div>
    <hr>
    <div id="tasks"></div>

    @include('pages.project.project.show.modals.stop-timesheet')
    @include('pages.project.project.show.modals.delete-task')
    @include('pages.project.project.show.modals.create-task')
    @include('pages.project.project.show.modals.delete-board')
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
        $(document).ready(function () {
            var input = document.getElementById('task_tags'),
                tagify = new Tagify(input, {})
            tagify.on('add', onAddTag)
            function onAddTag(e) {
                tagify.off('add', onAddTag)
            }
        });
    </script>

    <script>
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
                    'title': '' +
                        '<div class="row">' +
                        '   <div class="col-xl-1">' +
                        '       <i class="fas fa-arrows-alt mt-4 moveTaskIcon"></i>' +
                        '   </div>' +
                        '   <div class="col-xl-9">' +
                        '       <input data-id="{{ $status->id }}" class="form-control font-weight-bold editBoardTitle" type="text" value="{{ $status->name }}" style="color:gray; font-size: 15px; border: none; background: transparent">' +
                        '   </div>' +
                        '   <div class="col-xl-1 text-right">' +
                        '       <div class="dropdown dropdown-inline">' +
                        '       	<a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                        '       		<i class="ki ki-bold-more-hor"></i>' +
                        '       	</a>' +
                        '       	<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">' +
                        '       		<ul class="navi navi-hover">' +
                        '       			<li class="navi-item">' +
                        '       				<a class="navi-link cursor-pointer taskAdder" data-id="{{ $status->id }}">' +
                        '       					<span class="navi-icon">' +
                        '       						<i class="fas fa-plus"></i>' +
                        '       					</span>' +
                        '       					<span class="navi-text">Görev Ekle</span>' +
                        '       				</a>' +
                        '       			</li>' +
                        '                   <hr>' +
                        '       			<li class="navi-item">' +
                        '       				<a href="#" class="navi-link boardDeleter" data-id="{{ $status->id }}">' +
                        '       					<span class="navi-icon">' +
                        '       						<i class="fas fa-trash text-danger"></i>' +
                        '       					</span>' +
                        '       					<span class="navi-text">Panoyu Sil</span>' +
                        '       				</a>' +
                        '       			</li>' +
                        '       		</ul>' +
                        '       	</div>' +
                        '       </div>' +
                        '   </div>' +
                        '</div>',
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
                                '   <a class="stopTimesheet" href="#" data-toggle="modal" data-target="#StopTimesheetModal" data-id="{{ $timesheet->id }}" onclick="$(\'#loaderControl\').val(1);">' +
                                '       <i class="fa fa-stop text-danger"></i>' +
                                '   </a>' +
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
                                '<span id="task_priority_span_id_{{ $task->id }}" class="btn btn-pill btn-sm btn-{{ $task->priority->color }}" style="font-size: 11px; height: 20px; padding-top: 2px">{{ $task->priority->name }}</span>@if($task->milestone) <span class="btn btn-pill btn-sm btn-{{ $task->milestone->color }}" style="font-size: 11px; height: 20px; padding-top: 2px">{{ $task->milestone->name }}</span> @endif' +
                                '</div>' +
                                '</div>' +
                                '<br>' +
                                'Görevli: {{ $task->assigned ? $task->assigned->name : 'Yok' }}' +
                                '<br><br>' +
                                '<div class="row">' +
                                @foreach($task->timesheets()->with(['starter'])->where('end_time', null)->get() as $timesheet)
                                '<div class="col-xl-12 m-1">' +
                                '<i class="fa fa-user text-success mr-3"></i><span>{{ $timesheet->starter->name }}</span><span style="font-size: 10px"> (Çalışıyor)</span>' +
                                '</div>' +
                                @endforeach
                                '</div>' +
                                '<br>' +
                                '<div class="row"><div class="col-xl-6"><span class="font-weight-bold" style="font-size: 10px">{{ strftime('%d %B, %Y', strtotime($task->end_date)) }}</span></div><div class="col-xl-6 text-right"><i class="fas fa-sort-amount-down cursor-pointer sublistToggleIcon" data-id="{{ $task->id }}"></i></div></div>' +
                                '<div id="sublist_{{ $task->id }}" class="taskSublist">' +
                                '<hr>' +
                                '<div class="row" id="task_sublist_control_{{ $task->id }}">' +
                                @foreach($task->checklistItems as $checklistItem)
                                '<div class="col-xl-12 m-1" id="checklist_item_id_{{ $checklistItem->id }}">' +
                                '<i id="checklist_item_icon_id_{{ $checklistItem->id }}" class="@if($checklistItem->checked == 1) fa fa-check-circle text-success @else far fa-check-circle @endif mr-3"></i><span id="checklist_item_name_id_{{ $checklistItem->id }}">{{ $checklistItem->name }}</span>' +
                                '</div>' +
                                @endforeach
                                '</div>' +
                                '</div>'
                        }
                        {{ !$loop->last ? ',' : null }}
                        @endforeach
                    ]
                },
                @endforeach
                {
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
        $(".taskSublist").hide();

        const monthNames = [
            "Ocak",
            "Şubat",
            "Mart",
            "Nisan",
            "Mayıs",
            "Haziran",
            "Temmuz",
            "Ağustos",
            "Eylül",
            "Ekim",
            "Kasım",
            "Aralık"
        ];

        var selectedTaskIdSelector = $("#selectedTaskIdSelector");
        var taskNameSelector = $("#taskNameSelector");
        var timesheetersSelector = $("#timesheetersSelector");
        var taskDateSelector = $("#taskDateSelector");
        var taskPrioritySelector = $("#taskPrioritySelector");
        var taskStatusSelector = $("#taskStatusSelector");
        var taskMilestoneSelector = $("#taskMilestoneSelector");
        var taskDescriptionSelector = $("#taskDescriptionSelector");
        var checklistItemsSelector = $("#checklistItemsSelector");
        var taskEmployeeSelector = $("#taskEmployeeSelector");
        var createTaskButtonSelector = $("#createTaskButton");
        var checklistItemCreateIcon = $("#checklistItemCreate");
        var taskProgressSelector = $("#task_progress");
        var commentsSelector = $("#commentsSelector");

        function handleDate(dataD) {
            let data = new Date(dataD)
            let month = data.getMonth()
            let day = data.getDate()
            let year = data.getFullYear()
            if (day <= 9)
                day = '0' + day
            if (month < 10)
                month = '0' + month
            return day + ' ' + monthNames[parseInt(month)] + ' ' + year
        }

        function showTask(task_id)
        {
            $("#kt_quick_cart").hide();
            $.ajax({
                type: 'get',
                url: '{{ route('ajax.project.task.edit') }}',
                data: {
                    task_id: task_id
                },
                success: function (task) {
                    console.log(task);
                    selectedTaskIdSelector.val(task.id);
                    checklistItemCreateIcon.data('id',task.id);

                    var exists = timesheetExistControl(task.id,'{{ auth()->user()->getId() }}');

                    if (exists === "1") {
                        checklistItemCreateIcon.show();
                    } else {
                        checklistItemCreateIcon.hide();
                    }
                    var progress = calculateTaskProgress(task.id);

                    taskProgressSelector.html(progress + '%');
                    taskProgressSelector.css({'width': progress + '%'});

                    taskNameSelector.html(task.name);
                    timesheetersSelector.html('');
                    $.each(task.timesheeters, function (timesheeter) {
                        var image = task.timesheeters[timesheeter].starter.image ?? '{{ asset('assets/media/logos/avatar.jpg') }}';
                        timesheetersSelector.append('' +
                            '<a class="symbol symbol-35 symbol-circle m-1" data-toggle="tooltip" title="' + task.timesheeters[timesheeter].starter.name + '">' +
                            '<img alt="' + task.timesheeters[timesheeter].starter.name + '" src="' + image + '" />' +
                            '</a>');
                    });
                    taskDateSelector.html(handleDate(task.start_date) + '  ,  ' + handleDate(task.end_date));

                    taskPrioritySelector.val(task.priority_id);
                    taskPrioritySelector.selectpicker('refresh');
                    taskStatusSelector.html(task.status);

                    taskMilestoneSelector.removeClass();
                    taskMilestoneSelector.html('');
                    if (task.milestone_id != null) {
                        taskMilestoneSelector.html(task.milestone.name);
                        taskMilestoneSelector.addClass('btn btn-pill btn-sm btn-' + task.milestone.color);
                    }

                    taskEmployeeSelector.val(task.employee_id);
                    taskEmployeeSelector.selectpicker('refresh');

                    taskDescriptionSelector.val(task.description);

                    checklistItemsSelector.html('');
                    $.each(task.checklist_items, function (item) {
                        var checkedControl = '';
                        if (task.checklist_items[item].checked === 1) {
                            checkedControl = 'checked';
                        }

                        if (exists === "1") {
                            checklistItemsSelector.append('' +
                                '<div class="row mt-n3" id="checklist_item_row_' + task.checklist_items[item].id + '">' +
                                '	<div class="col-xl-1">' +
                                '		<label class="checkbox checkbox-circle checkbox-success">' +
                                '			<input ' + checkedControl + ' type="checkbox" class="checklistItemCheckbox" data-id="' + task.checklist_items[item].id + '" />' +
                                '			<span></span>' +
                                '		</label>' +
                                '	</div>' +
                                '	<div class="col-xl-9 ml-n8 mt-2">' +
                                '		<input style="color:gray; font-size: 15px; border: none; background: transparent" type="text" class="form-control form-control-sm checklistItemInput" data-id="' + task.checklist_items[item].id + '" value="' + task.checklist_items[item].name + '">' +
                                '	</div>' +
                                '   <div class="col-xl-2 mt-6 ml-n5">' +
                                '       <i class="fa fa-times-circle text-danger cursor-pointer checklistItemDelete" data-id="' + task.checklist_items[item].id + '"></i>' +
                                '   </div>' +
                                '</div>' +
                                '');
                        } else {
                            checklistItemsSelector.append('' +
                                '<div class="row mt-n3" id="checklist_item_row_' + task.checklist_items[item].id + '">' +
                                '	<div class="col-xl-1">' +
                                '		<label class="checkbox checkbox-circle checkbox-success">' +
                                '			<input ' + checkedControl + ' disabled type="checkbox" class="checklistItemCheckbox" data-id="' + task.checklist_items[item].id + '" />' +
                                '			<span></span>' +
                                '		</label>' +
                                '	</div>' +
                                '	<div class="col-xl-9 ml-n8 mt-2">' +
                                '		<input disabled style="color:gray; font-size: 15px; border: none; background: transparent" type="text" class="form-control form-control-sm checklistItemInput" data-id="' + task.checklist_items[item].id + '" value="' + task.checklist_items[item].name + '">' +
                                '	</div>' +
                                '</div>' +
                                '');
                        }
                    });

                    commentsSelector.html('');
                    if (task.comments.length > 0) {
                        $.each(task.comments, function (comment) {
                            commentsSelector.append('' +
                                '<div class="mb-10">' +
                                '	<div class="d-flex align-items-center">' +
                                '		<div class="symbol symbol-45 symbol-light mr-5">' +
                                '			<img src="{{ asset('assets/media/logos/avatar.jpg') }}" class="h-50 align-self-center" alt="" />' +
                                '		</div>' +
                                '		<div class="d-flex flex-column flex-grow-1">' +
                                '			<a href="#" class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">' + task.comments[comment].creator.name + '</a>' +
                                '			<span class="text-muted font-weight-bold">' + moment(new Date(task.comments[comment].created_at)).format('YYYY-MM-DD HH:mm') + '</span>' +
                                '		</div>' +
                                '	</div>' +
                                '	<p class="text-dark-50 m-0 pt-5 font-weight-normal">' + task.comments[comment].comment + '</p>' +
                                '</div>' +
                                '');
                        });
                    }
                    $("#comment_relation_id").val(task.id);

                    $("#kt_quick_cart").fadeIn();
                },
                error: function (error) {
                    console.log(error);
                    $("#kt_quick_cart_toggle").click();
                    toastr.error('Görev Bilgileri Alınırken Bir Hata Oluştu! Sayfayı Yenilemeyi Deneyin');
                }
            });
        }

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

        createTaskButtonSelector.click(function () {
            var checklist = [];
            var list = $('.checklistItemsList');
            $.each(list, function (index) {
                checklist.push(list[index].value);
            });
            var status_id = $("#status_id").val();
            var project_id = '{{ $project->id }}';
            var employee_id = $("#employee_id").val();
            var creator_id = '{{ auth()->user()->getId() }}';
            var milestone_id = $("#milestone_id").val();
            var priority_id = $("#priority_id").val();
            var name = $("#name").val();
            var description = $("#description").val();
            var tags = $("#task_tags").val();
            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();

            if (status_id == null || status_id === '') {
                toastr.error('Pano Seçiminde Bir Hata Oluştu. Sayfayı Yenileyip Tekrar Deneyin');
            } else if (project_id === '') {
                toastr.error('Bir Hata Oluştu! Sayfayı Yenilemeyi Deneyin');
            } else if (creator_id === '') {
                toastr.error('Bir Hata Oluştu! Sayfayı Yenilemeyi Deneyin');
            } else if (name == null || name === '') {
                toastr.warning('Görev Adı Girilmesi Zorunludur');
            } else if (start_date == null || start_date === '') {
                toastr.warning('Başlangıç Tarihi Zorunludur');
            } else if (end_date == null || end_date === '') {
                toastr.warning('Bitiş Tarihi Zorunludur');
            } else if (priority_id == null || priority_id === '') {
                toastr.warning('Öncelik Durumu Seçilmesi Zorunludur');
            } else {
                $.ajax({
                    type: 'get',
                    url: '{{ route('ajax.project.task.create') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        status_id: status_id,
                        project_id: project_id,
                        employee_id: employee_id,
                        creator_id: creator_id,
                        milestone_id: milestone_id,
                        priority_id: priority_id,
                        name: name,
                        description: description,
                        tags: tags,
                        start_date: start_date,
                        end_date: end_date,
                        checklist: checklist
                    },
                    success: function (task) {
                        console.log(task);
                        var assigned = 'Yok';
                        if (task.assigned != null) {
                            assigned = task.assigned.name;
                        }
                        var checklistString = '';
                        $.each(task.checklist_items, function (item) {
                            checklistString = checklistString + '<div class="col-xl-12 m-1"><i class="far fa-check-circle mr-3"></i>' + task.checklist_items[item].name + '</div>';
                        });
                        kanban.addElement(status_id, {
                            'id': task.id,
                            'title': '<div class="row">' +
                                '<div class="col-xl-10">' +
                                '   <i class="far fa-check-circle mr-3"></i><span data-id="' + task.id + '" class="taskItemTitle cursor-pointer">' + task.name + '</span>' +
                                '</div>' +
                                '<div class="col-xl-2 text-right">' +
                                '   <a href="#" onclick="document.getElementById(\'start_form_' + task.id + '\').submit(); $(\'#loaderControl\').val(1);">' +
                                '       <i class="fa fa-play text-success"></i>' +
                                '   </a>' +
                                '<form style="visibility: hidden" id="start_form_' + task.id + '" method="post" action="{{ route('project.project.timesheet.start') }}">' +
                                '@csrf' +
                                '<input type="hidden" name="task_id" value="' + task.id + '">' +
                                '</form>' +
                                '</div>' +
                                '</div>' +
                                '<br><br>' +
                                '<div class="row mt-n3">' +
                                '<div class="col-xl-12">' +
                                '<span id="task_priority_span_id_' + task.id + '" class="btn btn-pill btn-sm btn-' + task.priority.color + '" style="font-size: 11px; height: 20px; padding-top: 2px">' + task.priority.name + '</span>' +
                                '</div>' +
                                '</div>' +
                                '<br>' +
                                'Görevli: ' + assigned + '' +
                                '<br><br>' +
                                '<div class="row"><div class="col-xl-6"><span class="font-weight-bold" style="font-size: 10px;">' + task.end_date + '</span></div><div class="col-xl-6 text-right"><i class="fas fa-sort-amount-down cursor-pointer sublistToggleIcon" data-id="' + task.id + '"></i></div></div>' +
                                '<div id="sublist_' + task.id + '" class="taskSublist" style="display: none">' +
                                '<hr>' +
                                '<div class="row">' +
                                checklistString +
                                '</div>' +
                                '</div>'
                        });
                        $.each(list, function (index) {
                            $(this).parent().parent().parent().remove();
                        });
                        $("#newTaskCreateForm")[0].reset();
                        $("#CreateTask").modal('hide');
                    }
                });
            }
        });

        checklistItemCreateIcon.click(function () {
            var task_id = $(this).data('id');
            var sublistSelector = $("#task_sublist_control_" + task_id);

            $.ajax({
                type: 'post',
                url: '{{ route('ajax.project.task.createChecklistItem') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    task_id: task_id,
                    creator_id: '{{ auth()->user()->getId() }}'
                },
                success: function (checklistItem) {
                    checklistItemsSelector.append('' +
                        '<div class="row mt-n3" id="checklist_item_row_' + checklistItem.id + '">' +
                        '	<div class="col-xl-1">' +
                        '		<label class="checkbox checkbox-circle checkbox-success">' +
                        '			<input type="checkbox" class="checklistItemCheckbox" data-id="' + checklistItem.id + '" />' +
                        '			<span></span>' +
                        '		</label>' +
                        '	</div>' +
                        '	<div class="col-xl-9 ml-n8 mt-2">' +
                        '		<input style="color:gray; font-size: 15px; border: none; background: transparent" type="text" class="form-control form-control-sm checklistItemInput" data-id="' + checklistItem.id + '" value="">' +
                        '	</div>' +
                        '   <div class="col-xl-2 mt-6 ml-n5">' +
                        '       <i class="fa fa-times-circle text-danger cursor-pointer checklistItemDelete" data-id="' + checklistItem.id + '"></i>' +
                        '   </div>' +
                        '</div>' +
                        '');

                    var progress = calculateTaskProgress(checklistItem.task_id);

                    taskProgressSelector.html(progress + '%');
                    taskProgressSelector.css({'width': progress + '%'});
                    sublistSelector.append('<div class="col-xl-12 m-1" id="checklist_item_id_' + checklistItem.id + '">' + '<i class="far fa-check-circle mr-3"></i><span id="checklist_item_name_id_' + checklistItem.id + '"></span></div>');
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });

        taskPrioritySelector.change(function () {
            var task_id = selectedTaskIdSelector.val();
            var priority_id = $(this).val();
            var taskPrioritySpanSelector = $("#task_priority_span_id_" + task_id);
            var taskPrioritySpanSelectorSelected = $("#taskPrioritySelector option:selected");

            var priorityName = taskPrioritySpanSelectorSelected.text();
            var priorityColor = taskPrioritySpanSelectorSelected.data('color');

            taskPrioritySpanSelector.html(priorityName);
            taskPrioritySpanSelector.removeClass();
            taskPrioritySpanSelector.addClass('btn btn-pill btn-sm btn-' + priorityColor);
            $.ajax({
                type: 'post',
                url: '{{ route('ajax.project.task.updatePriority') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    task_id: task_id,
                    priority_id: priority_id
                }
            });
        });

        $(document).delegate('.checklistItemCheckbox', 'click', function () {
            var checklist_item_id = $(this).data('id');
            var checklistItemIconSelector = $("#checklist_item_icon_id_" + checklist_item_id);

            if ($(this).is(':checked')) {
                $.ajax({
                    type: 'post',
                    url: '{{ route('ajax.project.task.checkChecklistItem') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        checklist_item_id: checklist_item_id,
                        checker_type: 'App\\Models\\User',
                        checker_id: '{{ auth()->user()->getId() }}'
                    },
                    success: function () {
                        checklistItemIconSelector.removeClass();
                        checklistItemIconSelector.addClass('fa fa-check-circle text-success mr-3');
                    }
                });
            } else {
                $.ajax({
                    type: 'post',
                    url: '{{ route('ajax.project.task.uncheckChecklistItem') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        checklist_item_id: checklist_item_id
                    },
                    success: function () {
                        checklistItemIconSelector.removeClass();
                        checklistItemIconSelector.addClass('far fa-check-circle mr-3');
                    }
                });
            }

            var progress = calculateTaskProgress($("#selectedTaskIdSelector").val());

            taskProgressSelector.html(progress + '%');
            taskProgressSelector.css({'width': progress + '%'});
        });

        $(document).delegate('.checklistItemInput', 'focusout', function () {
            var checklist_item_id = $(this).data('id');
            var checklistItemNameSelector = $("#checklist_item_name_id_" + checklist_item_id);
            var name = $(this).val();

            $.ajax({
                type: 'post',
                url: '{{ route('ajax.project.task.updateChecklistItem') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    checklist_item_id: checklist_item_id,
                    name: name
                },
                success: function (checklistItem) {
                    checklistItemNameSelector.html(checklistItem.name);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });

        $(document).delegate('.checklistItemDelete', 'click', function () {
            var checklist_item_id = $(this).data('id');
            var checklistItemSelector = $("#checklist_item_id_" + checklist_item_id);

            $.ajax({
                type: 'post',
                url: '{{ route('ajax.project.task.deleteChecklistItem') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    checklist_item_id: checklist_item_id
                },
                success: function () {
                    $("#checklist_item_row_" + checklist_item_id).remove();

                    var progress = calculateTaskProgress($("#selectedTaskIdSelector").val());

                    taskProgressSelector.html(progress + '%');
                    taskProgressSelector.css({'width': progress + '%'});
                    checklistItemSelector.remove();
                },
                error: function (error) {
                    console.log(error);

                }
            });
        });

        $(document).delegate(".taskAdder","click", function () {
            $("#CreateTask").modal('show');
            $("#status_id").val($(this).data('id'));
        });

        $(document).delegate(".taskItemTitle", "click", function () {
            $("#kt_quick_cart_toggle").click();
            showTask($(this).data('id'));
            // $("#ShowTask").modal('show');
        });

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
            console.log(project_id);
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
                            title: '' +
                                '<div class="row">' +
                                '   <div class="col-xl-1">' +
                                '       <i class="fas fa-arrows-alt mt-4 moveTaskIcon"></i>' +
                                '   </div>' +
                                '   <div class="col-xl-9">' +
                                '       <input data-id="' + taskStatus.id + '" class="form-control font-weight-bold editBoardTitle" type="text" value="" style="color:gray; font-size: 15px; border: none; background: transparent">' +
                                '   </div>' +
                                '   <div class="col-xl-1 text-right">' +
                                '       <div class="dropdown dropdown-inline">' +
                                '       	<a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                                '       		<i class="ki ki-bold-more-hor"></i>' +
                                '       	</a>' +
                                '       	<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">' +
                                '       		<ul class="navi navi-hover">' +
                                '       			<li class="navi-item">' +
                                '       				<a class="navi-link cursor-pointer taskAdder" data-id="' + taskStatus.id + '">' +
                                '       					<span class="navi-icon">' +
                                '       						<i class="fas fa-plus"></i>' +
                                '       					</span>' +
                                '       					<span class="navi-text">Görev Ekle</span>' +
                                '       				</a>' +
                                '       			</li>' +
                                '                   <hr>' +
                                '       			<li class="navi-item">' +
                                '       				<a href="#" class="navi-link boardDeleter" data-id="' + taskStatus.id + '">' +
                                '       					<span class="navi-icon">' +
                                '       						<i class="fas fa-trash text-danger"></i>' +
                                '       					</span>' +
                                '       					<span class="navi-text">Panoyu Sil</span>' +
                                '       				</a>' +
                                '       			</li>' +
                                '       		</ul>' +
                                '       	</div>' +
                                '       </div>' +
                                '   </div>' +
                                '</div>',
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

        $(document).delegate(".checklistItemInput", "click", function (e) {
            $(this).css({
                'border-bottom': '1px solid #ccc'
            });
        });

        $(document).delegate(".checklistItemInput", "focusout", function (e) {
            $(this).css({
                'border-bottom': 'none'
            });
        });

        $(document).delegate("#taskDescriptionSelector", "click", function (e) {
            $(this).css({
                'border': '1px solid #ccc'
            });
        });

        $(document).delegate("#taskDescriptionSelector", "focusout", function (e) {
            $(this).css({
                'border': 'none'
            });
            var task_id = $("#selectedTaskIdSelector").val();
            var description = $(this).val();
            $.ajax({
                type: 'post',
                url: '{{ route('ajax.project.task.updateDescription') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    task_id: task_id,
                    description: description
                }
            });
        });

        $(document).delegate("#deleteTask", "click", function () {
            var task_id = $("#selectedTaskIdSelector").val();
            $.ajax({
                type: 'post',
                url: '{{ route('ajax.project.task.delete') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    task_id: task_id
                },
                success: function () {
                    kanban.removeElement("" + task_id + "");
                    $("#DeleteTaskModal").modal('hide');
                    $("#kt_quick_cart_toggle").click();
                }
            });
        })

        $(document).delegate("#taskEmployeeSelector", "change", function () {
            var task_id = $("#selectedTaskIdSelector").val();
            var employee_id = $(this).val();

            $.ajax({
                type: 'post',
                url: '{{ route('ajax.project.task.updateEmployee') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    task_id: task_id,
                    employee_id: employee_id
                }
            });
        })

        $(document).delegate(".sublistToggleIcon", "click", function () {
            $("#sublist_" + $(this).data('id')).slideToggle();
        });

        $(document).delegate(".stopTimesheet", "click", function () {
            var timesheet_id = $(this).data('id');
            $("#stopped_timesheet_id").val(timesheet_id);
        });

        $(document).delegate(".boardDeleter", "click", function (e) {
            var project_id = '{{ $project->id }}';
            var task_status_id = $(this).data('id');
            $("#deleted_task_status_id").val(task_status_id);
            var taskCount = 0;

            $.ajax({
                type: 'get',
                async: false,
                url: '{{ route('ajax.project.task-status.taskCount') }}',
                data: {
                    task_status_id: task_status_id
                },
                success: function (response) {
                    taskCount = response;
                },
                error: function (error) {
                    console.log(error);
                }
            });

            $.ajax({
                type: 'get',
                url: '{{ route('ajax.project.taskStatuses') }}',
                data: {
                    project_id: project_id,
                    task_status_id: task_status_id
                },
                success: function (taskStatuses) {
                    var newBoardIdSelector = $("#new_board_id_selector");
                    var deletingBoardTasksCountSelector = $("#deletingBoardTasksCountSelector");

                    if (taskCount > 0) {
                        $("#deletingBoardTasksSelector").show();
                        newBoardIdSelector.html('');
                        newBoardIdSelector.append('<optgroup label=""><option value="0">Görevler Silinsin</option></optgroup>>');
                        $.each(taskStatuses, function (status) {
                            newBoardIdSelector.append('<option value="' + taskStatuses[status].id + '">' + taskStatuses[status].name + ' - Panosuna Aktarılsın</option>');
                        });
                        newBoardIdSelector.selectpicker('refresh');
                        deletingBoardTasksCountSelector.html(`(${taskCount})`);
                    } else {
                        $("#deletingBoardTasksSelector").hide();
                        newBoardIdSelector.html('');
                        newBoardIdSelector.append('<optgroup label=""><option value="0">Görevler Silinsin</option></optgroup>>');
                        newBoardIdSelector.selectpicker('refresh');
                        deletingBoardTasksCountSelector.html(`(${taskCount})`);
                    }
                    $("#DeleteBoardModal").modal('show');
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });

        $(document).delegate("#deleteBoard", "click", function () {
            var task_status_id = $("#deleted_task_status_id").val();
            var new_board_id = $("#new_board_id_selector").val();

            $.ajax({
                type: 'post',
                url: '{{ route('ajax.project.task-status.delete') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    task_status_id: task_status_id,
                    new_board_id: new_board_id
                },
                success: function (tasks) {
                    $.each(tasks, function (task) {
                        var assigned = 'Yok';
                        if (tasks[task].assigned != null) {
                            assigned = tasks[task].assigned.name;
                        }
                        var checklistString = '';
                        $.each(tasks[task].checklist_items, function (item) {
                            checklistString = checklistString + '<div class="col-xl-12 m-1"><i class="far fa-check-circle mr-3"></i>' + tasks[task].checklist_items[item].name + '</div>';
                        });
                        kanban.addElement(new_board_id, {
                            'id': tasks[task].id,
                            'title': '<div class="row">' +
                                '<div class="col-xl-10">' +
                                '   <i class="far fa-check-circle mr-3"></i><span data-id="' + tasks[task].id + '" class="taskItemTitle cursor-pointer">' + tasks[task].name + '</span>' +
                                '</div>' +
                                '<div class="col-xl-2 text-right">' +
                                '   <a href="#" onclick="document.getElementById(\'start_form_' + tasks[task].id + '\').submit(); $(\'#loaderControl\').val(1);">' +
                                '       <i class="fa fa-play text-success"></i>' +
                                '   </a>' +
                                '<form style="visibility: hidden" id="start_form_' + tasks[task].id + '" method="post" action="{{ route('project.project.timesheet.start') }}">' +
                                '@csrf' +
                                '<input type="hidden" name="task_id" value="' + tasks[task].id + '">' +
                                '</form>' +
                                '</div>' +
                                '</div>' +
                                '<br><br>' +
                                '<div class="row mt-n3">' +
                                '<div class="col-xl-12">' +
                                '<span id="task_priority_span_id_' + tasks[task].id + '" class="btn btn-pill btn-sm btn-' + tasks[task].priority.color + '" style="font-size: 11px; height: 20px; padding-top: 2px">' + tasks[task].priority.name + '</span>' +
                                '</div>' +
                                '</div>' +
                                '<br>' +
                                'Görevli: ' + assigned + '' +
                                '<br><br>' +
                                '<div class="row"><div class="col-xl-6"><span class="font-weight-bold" style="font-size: 10px;">' + tasks[task].end_date + '</span></div><div class="col-xl-6 text-right"><i class="fas fa-sort-amount-down cursor-pointer sublistToggleIcon" data-id="' + tasks[task].id + '"></i></div></div>' +
                                '<div id="sublist_' + tasks[task].id + '" class="taskSublist" style="display: none">' +
                                '<hr>' +
                                '<div class="row">' +
                                checklistString +
                                '</div>' +
                                '</div>'
                        });
                    });
                    kanban.removeBoard(task_status_id);
                    $("#DeleteBoardModal").modal('hide');
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });

        $(document).delegate("#submitComment", "click", function () {
            var relation_id = $("#comment_relation_id").val();
            var relation_type = 'App\\Models\\Task';
            var creator_id = '{{ auth()->user()->getId() }}';
            var creator_type = 'App\\Models\\User';
            var comment = $("#comment").val();

            $.ajax({
                type: 'post',
                url: '{{ route('ajax.project.comment.create') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    relation_id: relation_id,
                    relation_type: relation_type,
                    creator_id: creator_id,
                    creator_type: creator_type,
                    comment: comment
                },
                success: function (comment) {
                    var oldComments = commentsSelector.html();
                    var newComments = '' +
                        '<div class="mb-10">' +
                        '	<div class="d-flex align-items-center">' +
                        '		<div class="symbol symbol-45 symbol-light mr-5">' +
                        '			<img src="{{ asset('assets/media/logos/avatar.jpg') }}" class="h-50 align-self-center" alt="" />' +
                        '		</div>' +
                        '		<div class="d-flex flex-column flex-grow-1">' +
                        '			<a href="#" class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">' + comment.creator.name + '</a>' +
                        '			<span class="text-muted font-weight-bold">' + moment(new Date(comment.created_at)).format('YYYY-MM-DD HH:mm') + '</span>' +
                        '		</div>' +
                        '	</div>' +
                        '	<p class="text-dark-50 m-0 pt-5 font-weight-normal">' + comment.comment + '</p>' +
                        '</div>' + oldComments;
                    commentsSelector.html(newComments);
                    $("#comment").val(null);
                    toastr.success('Başarıyla Yorum Yapıldı');
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });

        $(document).ready(function () {
            var list = $('.checklistItemsList');
            $.each(list, function (index) {
                if (index !== 1) {
                    $(this).parent().parent().parent().remove();
                }
            });
        });
    </script>
@stop
