<div class="modal fade" id="CreateTask" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:900px;">
        <form action="{{ route('project.project.task.create') }}" method="post" class="modal-content">
            @csrf
            <input type="hidden" name="project_id" value="{{ $project->id }}">
            <div class="modal-header">
                <h5 class="modal-title">Yeni Görev Ekle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="name">Görev Adı</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="description">Proje Açıklaması</label>
                            <textarea class="form-control summernote" name="description" id="description" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="start_date">Başlangıç Tarihi</label>
                            <input type="date" class="form-control" name="start_date" id="start_date" required>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="end_date">Bitiş Tarihi</label>
                            <input type="date" class="form-control" name="end_date" id="end_date" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="milestone_id">Kilometre Taşı</label>
                            <select class="form-control" name="milestone_id" id="milestone_id">
                                @foreach($project->milestones as $milestone)
                                    <option value="{{ $milestone->id }}">{{ $milestone->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="task_tags">Etiketler</label>
                            <input type="text" class="form-control tagify" name="tags" id="task_tags">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div id="kt_repeater_1">
                            <div class="row">
                                <div class="col-xl-12">
                                    <h5>
                                        Alt İşlemler
                                        <a href="javascript:;" data-repeater-create="" class="btn btn-sm font-weight-bolder btn-light-primary">
                                            <i class="la la-plus"></i>
                                        </a>
                                    </h5>
                                </div>
                            </div>
                            <div class="row">
                                <div data-repeater-list="checklist" class="col-lg-10">
                                    <div data-repeater-item="" class="form-group row align-items-center">
                                        <div class="col-md-8">
                                            <label style="width: 100%">
                                                <input type="text" name="checklist" class="form-control" placeholder="Alt İş Başlığı" />
                                            </label>
                                            <div class="d-md-none mb-2"></div>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
                                                <i class="la la-trash-o"></i>Sil</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Oluştur</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Vazgeç</button>
            </div>
        </form>
    </div>
</div>
