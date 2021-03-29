@extends('layouts.master')
@section('title', 'Yemek Listesi')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))


@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <table class="table" id="foods">
                        <thead>
                        <tr>
                            <th>Tarih</th>
                            <th>Yemek Adı</th>
                            <th>Açıklamalar</th>
                            <th>Yiyecek Kişi Sayısı</th>
                            <th>Yiyecek Kişiler</th>
                            <th>Yemeyecek Kişi Sayısı</th>
                            <th>Yemeyecek Kişiler</th>
                            <th>Cevap Vermeyen Kişi Sayısı</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($foodList as $food)
                            <tr>
                                <td><a href="{{ route('applications.food-list.report-detail', ['date' => $food->date]) }}" target="_blank">{{ $food->date }}</a></td>
                                <td>{{ $food->name }}</td>
                                <td><textarea class="form-control" rows="2" disabled>{{ $food->description }}</textarea></td>
                                <td>{{ $food->foodListChecks()->where('checked', 1)->count() }}</td>
                                <td>
                                    <textarea class="form-control" disabled>@foreach($food->foodListChecks()->with('employee')->where('checked', 1)->get() as $foodListCheck){{ ucwords($foodListCheck->employee->name) . ' ' . strtoupper($foodListCheck->employee->surname) }}@endforeach</textarea>
                                </td>
                                <td>{{ $food->foodListChecks()->where('checked', 0)->count() }}</td>
                                <td>
                                    <textarea class="form-control" disabled>@foreach($food->foodListChecks()->with('employee')->where('checked', 0)->get() as $foodListCheck){{ ucwords($foodListCheck->employee->name) . ' ' . strtoupper($foodListCheck->employee->surname) }}@endforeach</textarea>
                                </td>
                                <td>{{ $food->foodListChecks()->where('checked', null)->count() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div id="chart_3"></div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.3') }}" rel="stylesheet" type="text/css"/>

@stop

@section('page-script')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
    <script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

    <script>
        var table = $('#foods').DataTable({
            language: {
                info: "_TOTAL_ Kayıttan _START_ - _END_ Arasındaki Kayıtlar Gösteriliyor.",
                infoEmpty: "Gösterilecek Hiç Kayıt Yok.",
                loadingRecords: "Kayıtlar Yükleniyor.",
                zeroRecords: "Tablo Boş",
                search: "Arama:",
                infoFiltered: "(Toplam _MAX_ Kayıttan Filtrelenenler)",
                lengthMenu: "Sayfa Başı _MENU_ Kayıt Göster",
                sProcessing: "Yükleniyor...",
                paginate: {
                    first: "İlk",
                    previous: "Önceki",
                    next: "Sonraki",
                    last: "Son"
                },
                select: {
                    rows: {
                        "_": "%d kayıt seçildi",
                        "0": "",
                        "1": "1 kayıt seçildi"
                    }
                }
            },

            dom: 'Brtipl',

            buttons: [
                {
                    extend: 'collection',
                    text: '<i class="fa fa-download"></i> Dışa Aktar',
                    buttons: [
                        {
                            extend: 'pdf',
                            text: '<i class="fa fa-file-pdf"></i> PDF İndir'
                        },
                        {
                            extend: 'excel',
                            text: '<i class="fa fa-file-excel"></i> Excel İndir'
                        }
                    ]
                },
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i> Yazdır'
                }
            ],

            responsive: true
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

        const apexChart = "#chart_3";
        var options = {
            series: [{
                name: 'Yiyecekler',
                data: [
                    @foreach($foodList as $food)
                    {{ $food->foodListChecks()->where('checked', 1)->count() }}{{ $loop->last ? null : ',' }}
                    @endforeach
                ]
            }, {
                name: 'Yemeyecekler',
                data: [
                    @foreach($foodList as $food)
                    {{ $food->foodListChecks()->where('checked', 0)->count() }}{{ $loop->last ? null : ',' }}
                    @endforeach
                ]
            }, {
                name: 'Cevap Vermeyenler',
                data: [
                    @foreach($foodList as $food)
                    {{ $food->foodListChecks()->where('checked', null)->count() }}{{ $loop->last ? null : ',' }}
                    @endforeach
                ]
            }],
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
                    @foreach($foodList as $food)
                        '{{ $food->date }}'{{ $loop->last ? null : ',' }}
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

        var chart = new ApexCharts(document.querySelector(apexChart), options);
        chart.render();
    </script>

@stop
