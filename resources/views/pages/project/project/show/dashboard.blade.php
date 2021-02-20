@extends('layouts.master')
@section('title', 'Proje Kontrol Paneli')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    @include('pages.project.project.show.components.subheader')

    <div class="row mt-15">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-3 border-right pb-4 pt-4">
                            <label class="mb-0 mr-5">Tamamlanan Görevler</label>
                            <span class="svg-icon svg-icon-3x svg-icon-success">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M3.5,3 L5,3 L5,19.5 C5,20.3284271 4.32842712,21 3.5,21 L3.5,21 C2.67157288,21 2,20.3284271 2,19.5 L2,4.5 C2,3.67157288 2.67157288,3 3.5,3 Z" fill="#000000"/>
                                        <path d="M6.99987583,2.99995344 L19.754647,2.99999303 C20.3069317,2.99999474 20.7546456,3.44771138 20.7546439,3.99999613 C20.7546431,4.24703684 20.6631995,4.48533385 20.497938,4.66895776 L17.5,8 L20.4979317,11.3310353 C20.8673908,11.7415453 20.8341123,12.3738351 20.4236023,12.7432941 C20.2399776,12.9085564 20.0016794,13 19.7546376,13 L6.99987583,13 L6.99987583,2.99995344 Z" fill="#000000" opacity="0.3"/>
                                    </g>
                                </svg>
                            </span>
                            <h4 class="font-30 font-weight-bold text-col-blue" style="font-size: 30px">{{ $project->completed_tasks }}</h4>
                        </div>
                        <div class="col-3 pb-4 pt-4">
                            <label class="mb-0 mr-5">Devam Eden Görevler</label>
                            <span class="svg-icon svg-icon-3x svg-icon-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M10.9630156,7.5 L11.0475062,7.5 C11.3043819,7.5 11.5194647,7.69464724 11.5450248,7.95024814 L12,12.5 L15.2480695,14.3560397 C15.403857,14.4450611 15.5,14.6107328 15.5,14.7901613 L15.5,15 C15.5,15.2109164 15.3290185,15.3818979 15.1181021,15.3818979 C15.0841582,15.3818979 15.0503659,15.3773725 15.0176181,15.3684413 L10.3986612,14.1087258 C10.1672824,14.0456225 10.0132986,13.8271186 10.0316926,13.5879956 L10.4644883,7.96165175 C10.4845267,7.70115317 10.7017474,7.5 10.9630156,7.5 Z" fill="#000000"/>
                                        <path d="M7.38979581,2.8349582 C8.65216735,2.29743306 10.0413491,2 11.5,2 C17.2989899,2 22,6.70101013 22,12.5 C22,18.2989899 17.2989899,23 11.5,23 C5.70101013,23 1,18.2989899 1,12.5 C1,11.5151324 1.13559454,10.5619345 1.38913364,9.65805651 L3.31481075,10.1982117 C3.10672013,10.940064 3,11.7119264 3,12.5 C3,17.1944204 6.80557963,21 11.5,21 C16.1944204,21 20,17.1944204 20,12.5 C20,7.80557963 16.1944204,4 11.5,4 C10.54876,4 9.62236069,4.15592757 8.74872191,4.45446326 L9.93948308,5.87355717 C10.0088058,5.95617272 10.0495583,6.05898805 10.05566,6.16666224 C10.0712834,6.4423623 9.86044965,6.67852665 9.5847496,6.69415008 L4.71777931,6.96995273 C4.66931162,6.97269931 4.62070229,6.96837279 4.57348157,6.95710938 C4.30487471,6.89303938 4.13906482,6.62335149 4.20313482,6.35474463 L5.33163823,1.62361064 C5.35654118,1.51920756 5.41437908,1.4255891 5.49660017,1.35659741 C5.7081375,1.17909652 6.0235153,1.2066885 6.2010162,1.41822583 L7.38979581,2.8349582 Z" fill="#000000" opacity="0.3"/>
                                    </g>
                                </svg>
                            </span>
                            <h4 class="font-30 font-weight-bold text-col-blue" style="font-size: 30px">{{ $project->tasks()->count() - $project->completed_tasks }}</h4>
                        </div>
                        <div class="col-3 border-right pb-4 pt-4">
                            <label class="mb-0 mr-5">Tamamlanan Alt İşler</label>
                            <span class="svg-icon svg-icon-3x svg-icon-success">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
                                        <path d="M10.875,15.75 C10.6354167,15.75 10.3958333,15.6541667 10.2041667,15.4625 L8.2875,13.5458333 C7.90416667,13.1625 7.90416667,12.5875 8.2875,12.2041667 C8.67083333,11.8208333 9.29375,11.8208333 9.62916667,12.2041667 L10.875,13.45 L14.0375,10.2875 C14.4208333,9.90416667 14.9958333,9.90416667 15.3791667,10.2875 C15.7625,10.6708333 15.7625,11.2458333 15.3791667,11.6291667 L11.5458333,15.4625 C11.3541667,15.6541667 11.1145833,15.75 10.875,15.75 Z" fill="#000000"/>
                                        <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
                                    </g>
                                </svg>
                            </span>
                            <h4 class="font-30 font-weight-bold text-col-blue" style="font-size: 30px">{{ $project->checklistItems()->where('checked', 1)->count() }}</h4>
                        </div>
                        <div class="col-3 pb-4 pt-4">
                            <label class="mb-0 mr-5">Devam Eden Alt İşler</label>
                            <span class="svg-icon svg-icon-3x svg-icon-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
                                        <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
                                        <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1"/>
                                        <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1"/>
                                        <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1"/>
                                        <rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1"/>
                                        <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1"/>
                                        <rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1"/>
                                    </g>
                                </svg>
                            </span>
                            <h4 class="font-30 font-weight-bold text-col-blue" style="font-size: 30px">{{ $project->checklistItems()->where('checked', 0)->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    Pano Görev Dağılımları
                </div>
                <div class="card-body">
                    <div id="taskCountByStatusColumnChart" style="height: 370px"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    Personel Görev Dağılımları
                </div>
                <div class="card-body">
                    <div id="taskCountByEmployeeColumnChart" style="height: 370px"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    Öncelik Durumuna Göre Görev Dağılımı
                </div>
                <div class="card-body">
                    <div id="taskCountByPriorityPieChart" style="height: 350px"></div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')
    <style>

    </style>
@stop

@section('page-script')

    <script>
        "use strict";

        // Shared Colors Definition
        const primary = '#6993FF';
        const success = '#1BC5BD';
        const info = '#8950FC';
        const warning = '#FFA800';
        const danger = '#F64E60';

        // Class definition
        function generateBubbleData(baseval, count, yrange) {
            var i = 0;
            var series = [];
            while (i < count) {
                var x = Math.floor(Math.random() * (750 - 1 + 1)) + 1;
                ;
                var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
                var z = Math.floor(Math.random() * (75 - 15 + 1)) + 15;

                series.push([x, y, z]);
                baseval += 86400000;
                i++;
            }
            return series;
        }

        function generateData(count, yrange) {
            var i = 0;
            var series = [];
            while (i < count) {
                var x = 'w' + (i + 1).toString();
                var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

                series.push({
                    x: x,
                    y: y
                });
                i++;
            }
            return series;
        }

        const taskCountByStatusColumnChart = "#taskCountByStatusColumnChart";
        var taskCountByStatusColumnChartOptions = {
            series: [
                {
                    name: 'Görev Sayısı',
                    data: [
                        @foreach($project->taskStatuses()->orderBy('order','asc')->get() as $status)
                        {{ $status->tasks()->where('project_id', $project->id)->count() }}{{ $loop->last ? null : ',' }}
                        @endforeach
                    ]
                }
            ],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: [
                    @foreach($project->taskStatuses()->orderBy('order','asc')->get() as $status)
                        '{{ $status->name }}'{{ $loop->last ? null : ',' }}
                    @endforeach
                ],
            },
            yaxis: {
                title: {
                    text: ''
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val
                    }
                }
            },
            colors: [success, danger, warning]
        };
        var taskCountByStatusColumnChartChart = new ApexCharts(document.querySelector(taskCountByStatusColumnChart), taskCountByStatusColumnChartOptions);
        taskCountByStatusColumnChartChart.render();

        const taskCountByEmployeeColumnChart = "#taskCountByEmployeeColumnChart";
        var taskCountByEmployeeColumnChartOptions = {
            series: [
                {
                    name: 'Görev Sayısı',
                    data: [
                        @foreach($project->employees as $employee)
                        {{ $project->tasks()->where('employee_id', $employee->id)->count() }}{{ $loop->last ? null : ',' }}
                        @endforeach
                    ]
                }
            ],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: [
                    @foreach($project->employees as $employee)
                    '{{ $employee->name }}'{{ $loop->last ? null : ',' }}
                    @endforeach
                ],
            },
            yaxis: {
                title: {
                    text: ''
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val
                    }
                }
            },
            colors: [success, danger, warning]
        };
        var taskCountByEmployeeColumnChartChart = new ApexCharts(document.querySelector(taskCountByEmployeeColumnChart), taskCountByEmployeeColumnChartOptions);
        taskCountByEmployeeColumnChartChart.render();

        const taskCountByPriorityPieChart = "#taskCountByPriorityPieChart";
        var taskCountByPriorityPieChartOptions = {
            series: [
                @foreach($taskPriorities as $taskPriority)
                {{ $project->tasks()->where('priority_id', $taskPriority->id)->count() }}{{ $loop->last ? null : ',' }}
                @endforeach
            ],
            chart: {
                type: 'pie',
            },
            labels: [
                @foreach($taskPriorities as $taskPriority)
                '{{ $taskPriority->name }}'{{ $loop->last ? null : ',' }}
                @endforeach
            ],
            legend: {
                show: false,
                position: 'bottom',
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200,
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }],
            colors: [success, warning, info, danger]
        };
        var taskCountByPriorityPieChartChart = new ApexCharts(document.querySelector(taskCountByPriorityPieChart), taskCountByPriorityPieChartOptions);
        taskCountByPriorityPieChartChart.render();
    </script>
@stop
