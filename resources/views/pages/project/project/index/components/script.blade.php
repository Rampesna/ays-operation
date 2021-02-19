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
    var companySelector = $("#company_id");
    var employeesSelector = $("#employees");

    function getEmployeesByCompanyId(company_id) {
        $.ajax({
            type: 'get',
            url: '{{ route('ajax.all-employees-by-company-id') }}',
            data: {
                company_id: company_id
            },
            success: function (employees) {
                employeesSelector.empty().selectpicker('refresh');
                $.each(employees, function (index) {
                    employeesSelector.append('<option value="' + employees[index].id + '">' + employees[index].name + '</option>');
                });
                employeesSelector.selectpicker('refresh').fadeIn(250);
            },
            error: function (error) {
                console.log(error);
                toastr.error('Sistemsel Bir Hata Oluştu!');
            }
        });
    }

    companySelector.change(function () {
        getEmployeesByCompanyId($(this).val());
    });

    getEmployeesByCompanyId(companySelector.val());

    $(".deleteProject").click(function () {
        $("#deleted_project_id").val($(this).data('id'));
    });
</script>
