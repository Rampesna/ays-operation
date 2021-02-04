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

    var KTApexChartsDemo = function () {
        var _demo00 = function (employees) {
            const reportsChartSelector = "#chart_00";
            var options = {
                series: [
                    {
                        name: 'Çağrı Sayısı',
                        data: [
                            @foreach($employees as $employee)
                            {{ $employee->total_success_call }}{{ !$loop->last ? ',' : null }}
                            @endforeach
                        ]
                    },
                    {
                        name: 'Faaliyet Sayısı',
                        data: [
                            @foreach($employees as $employee)
                            {{ $employee->job_activity_count }}{{ !$loop->last ? ',' : null }}
                            @endforeach
                        ]
                    },
                    {
                        name: 'Tamamlanan İş',
                        data: [
                            @foreach($employees as $employee)
                            {{ $employee->job_complete_count }}{{ !$loop->last ? ',' : null }}
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
                        @foreach($employees as $employee)
                        '{{ $employee->name }}'{{ !$loop->last ? ',' : null }}
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
                colors: [
                    primary,
                    success,
                    warning,
                    info,
                    danger
                ]
            };

            var reportsChart = new ApexCharts(document.querySelector(reportsChartSelector), options);
            reportsChart.render();
        }

        return {
            // public functions
            init: function () {
                _demo00();
            }
        };
    }();

    jQuery(document).ready(function () {
        KTApexChartsDemo.init();
    });
</script>
