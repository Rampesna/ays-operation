<script src="{{ asset('assets/js/pages/crud/forms/editors/summernote.js') }}"></script>
<script src="{{ asset('assets/js/pages/crud/forms/widgets/tagify.js') }}"></script>

<script>
    var companySelector = $("#company_id");
    var employeesSelector = $("#employees");

    function getEmployeesByCompanyId(company_id) {
        console.log(company_id);
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
</script>
