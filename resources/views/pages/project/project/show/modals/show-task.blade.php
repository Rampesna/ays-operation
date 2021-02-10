<div class="modal fade" id="ShowTask" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:1200px;">
        <form action="{{ route('project.project.task.create') }}" method="post" class="modal-content">
            @csrf
            <input type="hidden" name="project_id" value="{{ $project->id }}">
            <div class="modal-header showTaskHeaderTitleBackground">
                <h5 class="modal-title" id="showTaskHeaderTitle">
                    --
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body pr-4">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="row">
                            <div class="col-xl-12">
                                <strong style="font-size: 18px">Proje:</strong>
                                <span class="ml-3" style="font-size: 16px">#{{ $project->id }} - {{ $project->name }}</span>
                            </div>
                            <div class="col-xl-12">
                                <strong style="font-size: 16px">Kilometre Taşı:</strong>
                                <span class="ml-3" style="font-size: 16px" id="milestone_card"></span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-12">
                                <h5 class="text-primary">Görev Açıklaması</h5>
                                <p id="description_card"></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-12 mb-5">
                                <h5 class="text-primary">Alt İşler <i class="fa fa-plus-circle text-success cursor-pointer ml-3" id="checklistItemCreate" data-id=""></i></h5>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" id="task_progress" style="width: 75%;"></div>
                                </div>
                            </div>
                            <div class="col-xl-12" id="checklist_card">

                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-12">
                                <h5 class="text-primary">Yorumlar</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="create_comment"></label>
                                    <textarea class="form-control summernote" name="comment" id="create_comment"></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row" id="comments_card">

                        </div>
                    </div>
                    <div class="col-xl-4 bg-warning-o-20 mt-n8 mb-n8">
                        <div class="row">
                            <div class="col-xl-12 pt-5">
                                <h6>Görev Bilgileri</h6>
                            </div>
                            <div class="col-xl-12 pt-5">
                                <span style="font-size: 14px" id="created_at_card">Oluşturulma Tarihi: --</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-12 m-3">
                                <i class="fa fa-star-half-alt fa-lg mr-3 text-dark-75"></i><span style="font-size: 16px" id="status_card">Durum: --</span>
                            </div>
                            <div class="col-xl-12 m-3">
                                <i class="fa fa-calendar-alt mr-3 fa-lg text-dark-75"></i><span style="font-size: 16px" id="start_date_card">Başlangıç Tarihi: --</span>
                            </div>
                            <div class="col-xl-12 m-3">
                                <i class="fa fa-calendar-alt mr-3 fa-lg text-dark-75"></i><span style="font-size: 16px" id="end_date_card">Bitiş Tarihi: --</span>
                            </div>
                            <div class="col-xl-12 m-3">
                                <i class="fa fa-fire mr-3 fa-lg text-dark-75"></i><span style="font-size: 16px" id="priority_card">Öncelik: --</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-12">

                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-12">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
