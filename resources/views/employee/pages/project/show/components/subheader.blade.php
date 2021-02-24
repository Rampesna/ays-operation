<div class="subheader subheader-solid" id="kt_subheader">
    <div class="container-fluid align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="row">
            <div class="col-xl-10">
                <ul class="nav nav-tabs nav-tabs-line mb-n4">
                    <li class="nav-item">
                        <a class="nav-link @if($tab == 'overview') active @endif" href="{{ route('employee-panel.project.show', ['project' => $project, 'tab' => 'overview']) }}">
                            <span class="nav-icon"><i class="fas fa-th"></i></span>
                            <span class="nav-text">Genel Bakış</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($tab == 'tasks') active @endif" href="{{ route('employee-panel.project.show', ['project' => $project, 'tab' => 'tasks']) }}">
                            <span class="nav-icon"><i class="fas fa-clipboard-list"></i></span>
                            <span class="nav-text">Görevler</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($tab == 'milestones') active @endif" href="{{ route('employee-panel.project.show', ['project' => $project, 'tab' => 'milestones']) }}">
                            <span class="nav-icon"><i class="fas fa-flag"></i></span>
                            <span class="nav-text">Kilometre Taşları</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($tab == 'files') active @endif" href="{{ route('employee-panel.project.show', ['project' => $project, 'tab' => 'files']) }}">
                            <span class="nav-icon"><i class="fas fa-folder-open"></i></span>
                            <span class="nav-text">Dosyalar</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($tab == 'comments') active @endif" href="{{ route('employee-panel.project.show', ['project' => $project, 'tab' => 'comments']) }}">
                            <span class="nav-icon"><i class="fas fa-comments"></i></span>
                            <span class="nav-text">Yorumlar</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($tab == 'tickets') active @endif" href="{{ route('employee-panel.project.show', ['project' => $project, 'tab' => 'tickets']) }}">
                            <span class="nav-icon"><i class="far fa-life-ring"></i></span>
                            <span class="nav-text">Destek Talepleri</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($tab == 'notes') active @endif" href="{{ route('employee-panel.project.show', ['project' => $project, 'tab' => 'notes']) }}">
                            <span class="nav-icon"><i class="fas fa-sticky-note"></i></span>
                            <span class="nav-text">Notlar</span>
                        </a>
                    </li>
                </ul>
            </div>
            @if($tab == 'tickets')
            <div class="col-xl-2 text-right">
                <button type="button" class="btn btn-sm btn-success mt-1 mb-n2" data-toggle="modal" data-target="#CreateTicketModal">
                    <i class="fas fa-plus fa-sm text-white"></i> &nbsp;&nbsp; Yeni Destek Talebi
                </button>
            </div>
            @endif
        </div>
    </div>
</div>
