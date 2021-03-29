@extends('layouts.master')
@section('title', 'Proje Personel Zaman Çizelgesi')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    @include('pages.project.project.show.components.subheader')

    <div class="row mt-15">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div id="chartdiv" style="height: 500px"></div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.3') }}" rel="stylesheet" type="text/css"/>

@stop

@section('page-script')
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/plugins/timeline.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/plugins/bullets.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

    <script>
        am4core.ready(function () {

            am4core.useTheme(am4themes_animated);

            var chart = am4core.create("chartdiv", am4plugins_timeline.SerpentineChart);
            chart.curveContainer.padding(100, 20, 50, 20);
            chart.levelCount = 6;
            chart.yAxisRadius = am4core.percent(20);
            chart.yAxisInnerRadius = am4core.percent(2);
            chart.maskBullets = false;

            var colorSet = new am4core.ColorSet();

            chart.dateFormatter.inputDateFormat = "yyyy-MM-dd HH:mm";
            chart.dateFormatter.dateFormat = "HH";

            chart.data = [
                    @foreach($project->timesheets()->where('starter_type', $getTimesheet->starter_type)->where('starter_id', $getTimesheet->starter_id)->get() as $timesheet)
                {
                    "category": "",
                    "start": "{{ date('Y-m-d H:i', strtotime($timesheet->start_time)) }}",
                    "end": "{{ date('Y-m-d H:i', strtotime($timesheet->end_time ?? date('Y-m-d H:i:s'))) }}",
                    "color": colorSet.getIndex({{ $loop->iteration }}),
                    "text": "{{ $timesheet->starter->name }}",
                    "textDisabled": false,
                    "icon": "https://www.amcharts.com//wp-content/uploads/assets/timeline/timeline7.svg"
                },
                @endforeach
            ];

            chart.fontSize = 10;
            chart.tooltipContainer.fontSize = 10;

            var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "category";
            categoryAxis.renderer.grid.template.disabled = true;
            categoryAxis.renderer.labels.template.paddingRight = 25;
            categoryAxis.renderer.minGridDistance = 10;

            var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
            dateAxis.renderer.minGridDistance = 200;
            dateAxis.baseInterval = {count: 1, timeUnit: "minute"};
            dateAxis.renderer.tooltipLocation = 0;
            dateAxis.renderer.line.strokeDasharray = "1,4";
            dateAxis.renderer.line.strokeOpacity = 0.5;
            dateAxis.tooltip.background.fillOpacity = 0.2;
            dateAxis.tooltip.background.cornerRadius = 5;
            dateAxis.tooltip.label.fill = new am4core.InterfaceColorSet().getFor("alternativeBackground");
            dateAxis.tooltip.label.paddingTop = 7;


            var labelTemplate = dateAxis.renderer.labels.template;
            labelTemplate.verticalCenter = "middle";
            labelTemplate.fillOpacity = 0.4;
            labelTemplate.background.fill = new am4core.InterfaceColorSet().getFor("background");
            labelTemplate.background.fillOpacity = 1;
            labelTemplate.padding(7, 7, 7, 7);

            var series = chart.series.push(new am4plugins_timeline.CurveColumnSeries());
            series.columns.template.height = am4core.percent(15);

            series.dataFields.openDateX = "start";
            series.dataFields.dateX = "end";
            series.dataFields.categoryY = "category";
            series.baseAxis = categoryAxis;
            series.columns.template.propertyFields.fill = "color"; // get color from data
            series.columns.template.propertyFields.stroke = "color";
            series.columns.template.strokeOpacity = 0;
            series.columns.template.fillOpacity = 0.6;

            var imageBullet1 = series.bullets.push(new am4plugins_bullets.PinBullet());
            imageBullet1.locationX = 1;
            imageBullet1.propertyFields.stroke = "color";
            imageBullet1.background.propertyFields.fill = "color";
            imageBullet1.image = new am4core.Image();
            imageBullet1.image.propertyFields.href = "icon";
            imageBullet1.image.scale = 0.5;
            imageBullet1.circle.radius = am4core.percent(100);
            imageBullet1.dy = -5;


            var textBullet = series.bullets.push(new am4charts.LabelBullet());
            textBullet.label.propertyFields.text = "text";
            textBullet.disabled = true;
            textBullet.propertyFields.disabled = "textDisabled";
            textBullet.label.strokeOpacity = 0;
            textBullet.locationX = 1;
            textBullet.dy = -100;
            textBullet.label.textAlign = "middle";

            chart.scrollbarX = new am4core.Scrollbar();
            chart.scrollbarX.align = "center"
            chart.scrollbarX.width = am4core.percent(75);
            chart.scrollbarX.opacity = 0.5;

            var cursor = new am4plugins_timeline.CurveCursor();
            chart.cursor = cursor;
            cursor.xAxis = dateAxis;
            cursor.yAxis = categoryAxis;
            cursor.lineY.disabled = true;
            cursor.lineX.strokeDasharray = "1,4";
            cursor.lineX.strokeOpacity = 1;

            dateAxis.renderer.tooltipLocation2 = 0;
            categoryAxis.cursorTooltipEnabled = true;


        });
    </script>
@stop
