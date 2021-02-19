<div class="modal fade" id="EditProject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:900px;">
        <form action="{{ route('project.project.update') }}" method="post" class="modal-content">
            @csrf
            <input type="hidden" name="project_id" value="{{ $project->id }}">
            <div class="modal-header">
                <h5 class="modal-title">Projeyi Düzenle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="name">Proje Adı</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $project->name }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="description">Proje Açıklaması</label>
                            <textarea class="form-control" name="description" id="description" rows="5">{!! $project->description !!}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="start_date">Başlangıç Tarihi</label>
                            <input type="date" class="form-control" name="start_date" id="start_date" value="{{ $project->start_date }}" required>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="end_date">Bitiş Tarihi</label>
                            <input type="date" class="form-control" name="end_date" id="end_date" value="{{ $project->end_date }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label for="tags">Etiketler</label>
                            <input type="text" class="form-control tagify" name="tags" id="tags" value="{{ $project->tags }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Güncelle</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Vazgeç</button>
            </div>
        </form>
    </div>
</div>
