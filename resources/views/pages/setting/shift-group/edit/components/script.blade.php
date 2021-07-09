<script>

    var addType = $('#add_type');
    var perDayColumn = $('#perDayColumn');
    var perDay = $('#per_day');

    var UpdateButton = $('#UpdateButton');

    @if($shiftGroup->add_type === 1)
    perDayColumn.hide();
    perDay.prop('required', false);
    @endif


    addType.change(function () {
        if ($(this).val() === 1 || $(this).val() === '1') {
            perDayColumn.hide();
            perDay.prop('required', false);
        } else {
            perDayColumn.show();
            perDay.prop('required', true);
        }
    });

    UpdateButton.click(function () {
        var id = $('#id').val();
        var order = $('#order').val();
        var company_id = 1;
        var name = $('#name').val();
        var add_type = $('#add_type').val();
        var per_day = $('#per_day').val();
        var break_duration = $('#break_duration').val();
        var description = $('#description').val();
        var delete_if_exist = $('#delete_if_exist').is(':checked') ? 1 : 0;
        var after_sunday = $('#after_sunday').is(':checked') ? 1 : 0;
        var set_group_weekly = $('#set_group_weekly').is(':checked') ? 1 : 0;
        var day0 = $('#day0').is(':checked') ? 1 : 0;
        var day0_start_time = $('#day0_start_time').val();
        var day0_end_time = $('#day0_end_time').val();
        var day1 = $('#day1').is(':checked') ? 1 : 0;
        var day1_start_time = $('#day1_start_time').val();
        var day1_end_time = $('#day1_end_time').val();
        var day2 = $('#day2').is(':checked') ? 1 : 0;
        var day2_start_time = $('#day2_start_time').val();
        var day2_end_time = $('#day2_end_time').val();
        var day3 = $('#day3').is(':checked') ? 1 : 0;
        var day3_start_time = $('#day3_start_time').val();
        var day3_end_time = $('#day3_end_time').val();
        var day4 = $('#day4').is(':checked') ? 1 : 0;
        var day4_start_time = $('#day4_start_time').val();
        var day4_end_time = $('#day4_end_time').val();
        var day5 = $('#day5').is(':checked') ? 1 : 0;
        var day5_start_time = $('#day5_start_time').val();
        var day5_end_time = $('#day5_end_time').val();
        var day6 = $('#day6').is(':checked') ? 1 : 0;
        var day6_start_time = $('#day6_start_time').val();
        var day6_end_time = $('#day6_end_time').val();
        var employees = $('#employees').val();

        if (name == null || name === '') {
            toastr.warning('Grup Adı Boş Olamaz!');
        } else if (break_duration == null || break_duration === '') {
            toastr.warning('Mola Süresi Girmediniz!');
        } else {
            $.ajax({
                type: 'post',
                url: '{{ route('setting.shift-groups.store') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    order: order,
                    company_id: company_id,
                    name: name,
                    add_type: add_type,
                    per_day: per_day,
                    break_duration: break_duration,
                    description: description,
                    delete_if_exist: delete_if_exist,
                    after_sunday: after_sunday,
                    set_group_weekly: set_group_weekly,
                    day0: day0,
                    day0_start_time: day0_start_time,
                    day0_end_time: day0_end_time,
                    day1: day1,
                    day1_start_time: day1_start_time,
                    day1_end_time: day1_end_time,
                    day2: day2,
                    day2_start_time: day2_start_time,
                    day2_end_time: day2_end_time,
                    day3: day3,
                    day3_start_time: day3_start_time,
                    day3_end_time: day3_end_time,
                    day4: day4,
                    day4_start_time: day4_start_time,
                    day4_end_time: day4_end_time,
                    day5: day5,
                    day5_start_time: day5_start_time,
                    day5_end_time: day5_end_time,
                    day6: day6,
                    day6_start_time: day6_start_time,
                    day6_end_time: day6_end_time,
                    employees: employees,
                },
                success: function () {
                    toastr.success('Başarıyla Güncellendi');
                },
                error: function (error) {
                    toastr.error('Güncellenirken Sistemsel Bir Hata Oluştu!');
                    console.log(error)
                }
            });
        }
    });
</script>
