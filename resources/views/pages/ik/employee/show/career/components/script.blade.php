<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3') }}"></script>
<script src="{{ asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.3') }}"></script>

<script>
    var positions = $('#positions').DataTable({
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
            },
            buttons: {
                print: {
                    title: 'Yazdır'
                }
            }
        },

        dom: 'frtipl',

        columnDefs: [
            {
                targets: 0,
                width: "3%",
                orderable: false,
                order: false
            },
        ],

        responsive: true
    });

    var salaries = $('#salaries').DataTable({
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
            },
            buttons: {
                print: {
                    title: 'Yazdır'
                }
            }
        },

        dom: 'frtipl',

        columnDefs: [
            {
                targets: 0,
                width: "3%",
                orderable: false,
                order: false
            },
        ],

        responsive: true
    });

    var CompanySelector = $("#companySelector");
    var BranchSelector = $("#branchSelector");
    var DepartmentSelector = $("#departmentSelector");
    var TitleSelector = $("#titleSelector");

    var CompanySelectorEdit = $("#companySelectorEdit");
    var BranchSelectorEdit = $("#branchSelectorEdit");
    var DepartmentSelectorEdit = $("#departmentSelectorEdit");
    var TitleSelectorEdit = $("#titleSelectorEdit");

    getBranchesByCompany();

    function getBranchesByCompany()
    {
        var ik_company_id = CompanySelector.val();
        $.ajax({
            type: 'get',
            url: '{{ route('ajax.ik.getBranchesByCompany') }}',
            data: {
                ik_company_id: ik_company_id
            },
            success: function (branches) {
                BranchSelector.empty();
                $.each(branches, function (index) {
                    BranchSelector.append(`<option value="${branches[index].id}">${branches[index].name}</option>`);
                });
                BranchSelector.selectpicker('refresh');
                getDepartmentsByBranch();
            },
            error: function (error) {
                console.log(error)
            }
        });
    }

    function getDepartmentsByBranch()
    {
        var ik_branch_id = BranchSelector.val();
        $.ajax({
            type: 'get',
            url: '{{ route('ajax.ik.getDepartmentsByBranch') }}',
            data: {
                ik_branch_id: ik_branch_id
            },
            success: function (departments) {
                DepartmentSelector.empty();
                $.each(departments, function (index) {
                    DepartmentSelector.append(`<option value="${departments[index].id}">${departments[index].name}</option>`);
                });
                DepartmentSelector.selectpicker('refresh');
                getTitlesByDepartment();
            },
            error: function (error) {
                console.log(error)
            }
        });
    }

    function getTitlesByDepartment()
    {
        var ik_department_id = DepartmentSelector.val();
        $.ajax({
            type: 'get',
            url: '{{ route('ajax.ik.getTitlesByDepartment') }}',
            data: {
                ik_department_id: ik_department_id
            },
            success: function (titles) {
                TitleSelector.empty();
                $.each(titles, function (index) {
                    TitleSelector.append(`<option value="${titles[index].id}">${titles[index].name}</option>`);
                });
                TitleSelector.selectpicker('refresh');
            },
            error: function (error) {
                console.log(error)
            }
        });
    }

    CompanySelector.change(function () {
        getBranchesByCompany();
    });

    BranchSelector.change(function () {
        getDepartmentsByBranch();
    });

    DepartmentSelector.change(function () {
        getTitlesByDepartment();
    });

    //////////////////////////////////////////////////////////////////

    function getBranchesByCompanyEdit()
    {
        var ik_company_id = CompanySelectorEdit.val();
        $.ajax({
            type: 'get',
            url: '{{ route('ajax.ik.getBranchesByCompany') }}',
            data: {
                ik_company_id: ik_company_id
            },
            success: function (branches) {
                BranchSelectorEdit.empty();
                $.each(branches, function (index) {
                    BranchSelectorEdit.append(`<option value="${branches[index].id}">${branches[index].name}</option>`);
                });
                BranchSelectorEdit.selectpicker('refresh');
                getDepartmentsByBranchEdit();
            },
            error: function (error) {
                console.log(error)
            }
        });
    }

    function getDepartmentsByBranchEdit()
    {
        var ik_branch_id = BranchSelectorEdit.val();
        $.ajax({
            type: 'get',
            url: '{{ route('ajax.ik.getDepartmentsByBranch') }}',
            data: {
                ik_branch_id: ik_branch_id
            },
            success: function (departments) {
                DepartmentSelectorEdit.empty();
                $.each(departments, function (index) {
                    DepartmentSelectorEdit.append(`<option value="${departments[index].id}">${departments[index].name}</option>`);
                });
                DepartmentSelectorEdit.selectpicker('refresh');
                getTitlesByDepartmentEdit();
            },
            error: function (error) {
                console.log(error)
            }
        });
    }

    function getTitlesByDepartmentEdit()
    {
        var ik_department_id = DepartmentSelectorEdit.val();
        $.ajax({
            type: 'get',
            url: '{{ route('ajax.ik.getTitlesByDepartment') }}',
            data: {
                ik_department_id: ik_department_id
            },
            success: function (titles) {
                TitleSelectorEdit.empty();
                $.each(titles, function (index) {
                    TitleSelectorEdit.append(`<option value="${titles[index].id}">${titles[index].name}</option>`);
                });
                TitleSelectorEdit.selectpicker('refresh');
            },
            error: function (error) {
                console.log(error)
            }
        });
    }

    CompanySelectorEdit.change(function () {
        getBranchesByCompanyEdit();
    });

    BranchSelectorEdit.change(function () {
        getDepartmentsByBranchEdit();
    });

    DepartmentSelectorEdit.change(function () {
        getTitlesByDepartmentEdit();
    });

    //////////////////////////////////////////////////////////////////

    $(document).delegate('.edit-position', 'click', function () {
        var position_id = $(this).data('id');
        $("#updated_position_id").val(position_id);
        $.ajax({
            type: 'get',
            url: '{{ route('ajax.ik.career.position.getPosition') }}',
            data: {
                position_id: position_id
            },
            success: function (position) {
                $("#start_date_edit").val(position.start_date);
                CompanySelectorEdit.val(position.ik_company_id);
                getBranchesByCompanyEdit();
            },
            error: function (error) {
                console.log(error)
            }
        });
    });

    $(document).delegate('.edit-salary', 'click', function () {
        var salary_id = $(this).data('id');
        $("#updated_salary_id").val(salary_id);
        $.ajax({
            type: 'get',
            url: '{{ route('ajax.ik.career.salary.getSalary') }}',
            data: {
                salary_id: salary_id
            },
            success: function (salary) {
                console.log(salary)

                $("#amount_edit").val(salary.amount);
                $("#period_edit").val(salary.period).selectpicker('refresh');
                $("#salary_start_date_edit").val(salary.start_date);
                $("#salary_end_date_edit").val(salary.end_date);
                $("#minimum_living_allowance_edit").val(salary.minimum_living_allowance).selectpicker('refresh');
            },
            error: function (error) {
                console.log(error)
            }
        });
    });
</script>
