<script>

    $(document).ready(function () {
        var input = document.getElementById('tags'),
            tagify = new Tagify(input, {})

        tagify.on('add', onAddTag)

        function onAddTag(e) {
            tagify.off('add', onAddTag)
        }
    });

</script>

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

    var KTApexChartsDemo = function () {
        var _demo5 = function () {
            const apexChart = "#task_completes";
            var options = {
                series: [
                    {
                        name: 'Tamamlanan Görev',
                        type: 'column',
                        data: [2, 5, 1, 4, 3, 0, 1, 7]
                    }
                ],
                chart: {
                    height: 350,
                    type: 'line',
                    stacked: false
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: [1, 1, 4]
                },
                title: {
                    text: '',
                    align: 'left',
                    offsetX: 110
                },
                xaxis: {
                    categories: [
                        1,
                        2,
                        3,
                        4,
                        5,
                        6,
                        7,
                        8
                    ],
                },
                yaxis: [
                    {
                        axisTicks: {
                            show: true,
                        },
                        axisBorder: {
                            show: true,
                            color: primary
                        },
                        labels: {
                            style: {
                                colors: primary,
                            }
                        },
                        title: {
                            text: "",
                            style: {
                                color: primary,
                            }
                        },
                        tooltip: {
                            enabled: true
                        }
                    }
                ],
                tooltip: {
                    fixed: {
                        enabled: true,
                        position: 'topLeft', // topRight, topLeft, bottomRight, bottomLeft
                        offsetY: 30,
                        offsetX: 60
                    },
                },
                legend: {
                    horizontalAlign: 'left',
                    offsetX: 40
                }
            };

            var chart = new ApexCharts(document.querySelector(apexChart), options);
            chart.render();
        }

        return {
            // public functions
            init: function () {
                _demo5();
            }
        };
    }();

    jQuery(document).ready(function () {
        KTApexChartsDemo.init();
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

</script>
