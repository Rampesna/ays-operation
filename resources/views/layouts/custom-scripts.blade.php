<script>
    @if(session()->has('type') && session()->has('data'))
    toastr.{{ session()->get('type') }}("{{ session()->get('data') }}");
    @endif
</script>

<script>

    function getTimesheets () {
        $.ajax({
            type: 'get',
            url: '{{ route('ajax.project.timesheet.getOpenTimesheets') }}',
            success: function (response) {
                console.log(response)
            }
        });
    }

    // setInterval(getTimesheets(), 5000);
</script>
