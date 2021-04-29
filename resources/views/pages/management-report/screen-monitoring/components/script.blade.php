<script>

    var selectedEmployee = $("#selectedEmployee");
    var showImageSelector = $("#showImageSelector");

    function showImage() {
        var guid = selectedEmployee.val();
        var image = $("#employee_" + guid).data('image');
        $("#ShowImageModal").modal('show');
        showImageSelector.attr('src', image);
    }

    function showDetail() {
        var guid = selectedEmployee.val();

        window.open('{{ route('management-report.screen-monitoring.details') }}/' + guid, '_blank');
        console.log(guid)
    }

    $("#name-searching").keyup(function () {
        var keyword = $(this).val().toLowerCase();
        console.log(keyword);
        $('.each_employee').each(function (i) {
            var name = $(this).find(".employee-name").html().toLowerCase();
            if (name.includes(keyword)) {
                $(this).show();
            } else {
                $(this).fadeOut(250);
            }
        });
    });

    $('.each_employee').on('contextmenu', function (e) {
        var guid = $(this).data('guid');
        selectedEmployee.val(guid);

        console.log(guid);

        var top = e.pageY - 10;
        var left = e.pageX - 10;

        $("#context-menu").css({
            display: "block",
            top: top,
            left: left
        });

        return false;
    }).on("click", function () {
        $("#context-menu").hide();
    });

    $('body').on("click", function () {
        $("#context-menu").hide();
    });

    console.log({!! collect($guidList) !!});

</script>
