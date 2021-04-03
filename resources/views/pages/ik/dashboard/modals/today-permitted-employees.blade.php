<div class="modal fade" id="TodayPermittedEmployeesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Bugün İzinli Çalışanlar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="card-body pt-2 pb-0">
                        <div class="col-xl-12">
                            <table class="table table-borderless table-vertical-center">
                                <tbody>
                                @foreach($todayPermittedEmployees as $employeePermits)
                                    <tr>
                                        <td class="pl-0 py-5">
                                            <div class="symbol symbol-50 symbol-light mr-2">
                                                <span class="symbol-label">
                                                    <img src="{{ asset('assets/media/svg/misc/015-telegram.svg') }}" class="h-50 align-self-center" alt="" />
                                                </span>
                                            </div>
                                        </td>
                                        <td class="pl-0">
                                            <a class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ @ucwords($employeePermits->first()->employee->name) }}</a>
                                            @foreach($employeePermits as $employeePermit)
                                                <span class="text-muted font-weight-bold d-block">
                                                    {{ @$employeePermit->description }} <br>
                                                    {{ @strftime("%d %B, %H:%M", strtotime($employeePermit->start_date)) . ' - ' . @strftime("%d %B, %H:%M", strtotime($employeePermit->end_date)) }}
                                                </span>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
