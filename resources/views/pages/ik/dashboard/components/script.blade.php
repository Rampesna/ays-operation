<script>
    "use strict";

    // Shared Colors Definition
    const primary = '#6993FF';
    const success = '#1BC5BD';
    const info = '#8950FC';
    const warning = '#FFA800';
    const danger = '#F64E60';

    var KTApexChartsDemo = function () {

        var _demo11 = function () {
            const apexChart = "#chart_11";
            var options = {
                total: {
                    show: true
                },
                series: [
                    @foreach(collect($employees)->groupBy('ik_company_id') as $company)
                        {{ count($company) }},
                    @endforeach
                ],
                chart: {
                    width: 380,
                    type: 'pie',
                },
                labels: [
                    @foreach(collect($employees)->groupBy('ik_company_id') as $company)
                        '{{ $company->first()->company->name }}',
                    @endforeach
                ],
                dataLabels: {
                    formatter: function (val, opts) {
                        return opts.w.config.series[opts.seriesIndex]
                    },
                },
                legend: {
                    position: 'bottom'
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }],
                colors: [primary, success, warning, danger, info]
            };

            var chart = new ApexCharts(document.querySelector(apexChart), options);
            chart.render();
        }

        return {
            init: function () {
                _demo11();
            }
        };
    }();

    jQuery(document).ready(function () {
        KTApexChartsDemo.init();
    });

    function dateReCreator(getDate) {
        var date = new Date(getDate);
        return `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}-${String(date.getDate()).padStart(2, '0')}T${String(date.getHours()).padStart(2, '0')}:${String(date.getMinutes()).padStart(2, '0')}`
    }

    $(document).delegate('.edit-permit', 'click', function () {
        var id = $(this).data('id');
        $("#permit_id_edit_permit").val(id);

        $.ajax({
            type: 'get',
            url: '{{ route('ajax.ik.permit.getPermit') }}',
            data: {
                id: id
            },
            success: function (permit) {
                $("#employee_id_edit_permit").val(permit.employee_id);
                $("#type_id_edit_permit").val(permit.type_id).selectpicker('refresh');
                $("#status_id_edit_permit").val(permit.status_id).selectpicker('refresh');
                $("#start_date_edit_permit").val(dateReCreator(permit.start_date));
                $("#end_date_edit_permit").val(dateReCreator(permit.end_date));
                $("#description_edit_permit").val(permit.description);
                $("#EditPermitModal").modal('show');
            },
            error: function (error) {
                console.log(error)
            }
        });
    });

</script>
