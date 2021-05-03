<script>

    var recruitingStepSubStepCheckActivitiesSelector = $("#recruitingStepSubStepCheckActivities");

    $(document).delegate('.showRecruitingStepSubStepCheckActivities', 'click', function () {
        var check_id = $(this).data('check-id');

        $.ajax({
            type: 'get',
            url: '{{ route('ajax.ik.recruiting.recruitingStepSubStepCheckActivities') }}',
            data: {
                check_id: check_id
            },
            success: function (recruitingStepSubStepCheck) {
                recruitingStepSubStepCheckActivitiesSelector.html('');
                $.each(recruitingStepSubStepCheck.activities, function (index) {
                    recruitingStepSubStepCheckActivitiesSelector.append(
                        `<div class="row">
                            <div class="col-xl-3">
                                <label>İşlemi Yapan</label>
                                <input type="text" class="form-control" value="${recruitingStepSubStepCheck.activities[index].user.name}" disabled>
                            </div>
                            <div class="col-xl-3 text-center">
                                <label>Durumu</label><br>
                                <span class="btn btn-pill btn-sm btn-${recruitingStepSubStepCheck.activities[index].check === 1 ? 'success' : 'danger'} mt-3" style="font-size: 11px; height: 20px; padding-top: 2px">${recruitingStepSubStepCheck.activities[index].check === 1 ? 'Onaylandı' : 'İptal Edildi'}</span>
                            </div>
                            <div class="col-xl-6">
                                <label>Açıklamalar</label>
                                <textarea rows="3" class="form-control" disabled>${recruitingStepSubStepCheck.activities[index].description}</textarea>
                            </div>
                        </div>`
                    );
                });

                $("#ShowRecruitingStepSubStepCheckActivitiesModal").modal('show');
            },
            error: function (error) {
                console.log(error)
            }
        });

    });
</script>
