<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#profile_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
            $("#is_delete_profile_image").val(0);
        }
    }

    $("#select_profile_image").change(function() {
        readURL(this);

        var data = new FormData();
        data.append('_token', '{{ csrf_token() }}');
        data.append('employee_id', '{{ $employee->id }}');
        data.append('image', $('#select_profile_image')[0].files[0] ?? null);

        $.ajax({
            async: false,
            processData: false,
            contentType: false,
            type: 'post',
            url: '{{ route('ajax.ik.employee.updateImage') }}',
            data: data,
            success: function (response) {
                toastr.success('Fotoğraf Başarıyla Güncellendi');
                console.log(response)
            },
            error: function (error) {
                toastr.error('Fotoğraf Güncellenirken Sistemsel Bir Hata Oluştu!');
                console.log(error)
            }
        });
    });

    $("#image_selector").click(function () {
        $("#select_profile_image").trigger('click');
    });

    $("#delete_profile_image").click(function () {
        $('#profile_image').attr('src', '{{ asset('assets/media/logos/avatar.jpg') }}');
        $.ajax({
            type: 'post',
            url: '{{ route('ajax.ik.employee.deleteImage') }}',
            data: {
                _token: '{{ csrf_token() }}',
                employee_id: '{{ $employee->id }}'
            },
            success: function (response) {
                toastr.success('Fotoğraf Başarıyla Silindi');
                console.log(response)
            },
            error: function (error) {
                toastr.error('Fotoğraf Silinirken Sistemsel Bir Hata Oluştu!');
                console.log(error)
            }
        });
    });
</script>
