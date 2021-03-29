@extends('layouts.master')
@section('title', 'Proje Takvimi')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    @include('pages.project.project.show.components.subheader')

    <div class="row mt-15">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')
    <style>
        /*.fc-day:hover{*/
        /*    background: lightgrey;*/
        /*}*/

        /*!*Allow pointer-events through*!*/
        /*.fc-slats, !*horizontals*!*/
        /*.fc-content-skeleton, !*day numbers*!*/
        /*.fc-bgevent-skeleton !*events container*!{*/
        /*    pointer-events:none*/
        /*}*/

        /*!*Turn pointer events back on*!*/
        /*.fc-bgevent,*/
        /*.fc-event-container{*/
        /*    pointer-events:auto; !*events*!*/
        /*}*/
    </style>
@stop

@section('page-script')
    <script src="{{ asset('assets/bundles/fullcalendarscripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/vendor/fullcalendar/locale/tr.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>

    <script>
        $('#calendar').fullCalendar({
            defaultView: 'month',
            lang: {
                month : 'Ay'
            },
            header: {
                left: 'month, agendaWeek, listMonth, _prev, _next, today',
                center: '',
                right: 'title',
            },
            contentHeight: 'auto',
            defaultDate: '{{ date('Y-m-d') }}',
            editable: false,
            eventLimit: false,
            nowIndicator: true,
            displayEventTime: false,
            customButtons: {
                _next: {
                    text: 'İleri',
                    click: function() {
                        $('#calendar').fullCalendar('next');
                    }
                },
                _prev: {
                    text: 'Geri',
                    click: function() {
                        $('#calendar').fullCalendar('prev');
                    }
                }
            },

            dayClick: function(date, jsEvent, view) {

            },

            eventClick: function (calEvent, jsEvent, view) {

            },

            events: [
                @foreach($project->tasks()->with(['priority'])->get() as $task)
                {
                    id: '{{ $task->id }}',
                    title: '{{ $task->name }}',
                    start: '{{ strftime("%Y-%m-%dT%H:%M:%S",strtotime($task->start_date)) }}',
                    end: '{{ strftime("%Y-%m-%dT%H:%M:%S",strtotime($task->end_date)) }}',
                    url: 'javascript:void(0);',
                    className: 'fc-event-solid-{{ $task->priority->color }}',
                    taskPriority: '{{ $task->priority->name }}',
                    taskDescription: "{{ $task->description }}"
                }{{ $loop->last ? null : ',' }}
                @endforeach
            ]


        });
    </script>
@stop
