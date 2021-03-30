@extends('layouts.master')
@section('title', 'Yemek Listesi')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    @include('pages.ik.application.applications.food-list.modals.create')
    @include('pages.ik.application.applications.food-list.modals.edit')

    <form action="{{ route('ik.applications.food-list.report') }}" method="post" class="row text-right">
        @csrf
        <div class="col-xl-6"></div>
        <div class="col-xl-2 text-right">
            <div class="form-group">
                <label for="start_date">Başlangıç Tarihi</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ date('Y-m-01') }}" required>
            </div>
        </div>
        <div class="col-xl-2 text-right">
            <div class="form-group">
                <label for="end_date">Bitiş Tarihi</label>
                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ date('Y-m-t') }}" required>
            </div>
        </div>
        <div class="col-xl-2 text-right">
            <button type="submit" class="btn btn-success btn-block btn-sm mt-9">Rapor Oluştur</button>
        </div>
    </form>

    <div class="row">
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
    <link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css?v=7.0.3') }}" rel="stylesheet" type="text/css" />

    <style>
        .fc-day:hover{
            background: lightgrey;
        }

        /*Allow pointer-events through*/
        .fc-slats, /*horizontals*/
        .fc-content-skeleton, /*day numbers*/
        .fc-bgevent-skeleton /*events container*/{
            pointer-events:none
        }

        /*Turn pointer events back on*/
        .fc-bgevent,
        .fc-event-container{
            pointer-events:auto; /*events*/
        }
    </style>
@stop

@section('page-script')
    <script src="{{ asset('assets/bundles/fullcalendarscripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/bundles/fullcalendar/locale/tr.js') }}"></script>

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
            droppable: false,
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

            events: [
                @foreach($foodList as $food)
                {
                    foodID: '{{ $food->id }}',
                    title: '{{ $food->name }}',
                    start: '{{ strftime("%Y-%m-%dT%H:%M:00",strtotime($food->date)) }}',
                    end: '{{ strftime("%Y-%m-%dT%H:%M:00",strtotime($food->date)) }}',
                    url: 'javascript:void(0);',
                    className: 'fc-event-light fc-event-solid-primary'
                }{{ $loop->last ? null : ',' }}
                @endforeach
            ],


            dayClick: function(date, jsEvent, view) {
                $("#CreateFoodListModal").modal('show');
                $("#date").val(date.format('YYYY-MM-DD'));
            },

            eventClick: function (calEvent, jsEvent, view) {
                var food_list_id = calEvent.foodID;
                $.ajax({
                    type: 'get',
                    url: '{{ route('ik.applications.food-list.edit') }}',
                    data: {
                        food_list_id: food_list_id
                    },
                    success: function (foodList) {
                        $("#updated_food_list_id").val(foodList.id);
                        $("#name_edit").val(foodList.name);
                        $("#description_edit").val(foodList.description);
                        $("#count_edit").val(foodList.count);
                        $("#EditFoodList").modal('show');
                    }
                });
            }
        });
    </script>
@stop
