@extends('layouts.master')
@section('title', 'Proje Detayı')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    @include('pages.project.project.show.components.subheader')

    <div class="row mt-15">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div id="milestones"></div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')
    <link href="{{ asset('assets/plugins/custom/kanban/kanban.bundle.css') }}" rel="stylesheet" type="text/css"/>
@stop

@section('page-script')
    <script src="{{ asset('assets/plugins/custom/kanban/kanban.bundle.js') }}"></script>

    <script>
        "use strict";

        // Class definition

        var KTKanbanBoardDemo = function () {
            // Private functions
            var _demo1 = function () {
                var kanban = new jKanban({
                    element: '#milestones',
                    gutter: '0',
                    widthBoard: '350px',
                    boards: [
                        @foreach($project->milestones as $milestone)
                        {
                            'id': '{{ $milestone->id }}',
                            'title': '{{ $milestone->name }}',
                            'item': [
                                @foreach($milestone->tasks as $task)
                                {
                                    'title': '<span class="font-weight-bold">{{ $task->name }}</span>'
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
@stop
