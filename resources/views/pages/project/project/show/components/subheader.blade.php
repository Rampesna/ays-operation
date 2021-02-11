<div class="subheader subheader-solid" id="kt_subheader">
    <div class="container-fluid align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <ul class="nav nav-tabs nav-tabs-line mb-n4">
            <li class="nav-item">
                <a class="nav-link @if($tab == 'overview') active @endif" href="{{ route('project.project.show', ['project' => $project, 'tab' => 'overview']) }}">
                    <span class="nav-icon"><i class="fas fa-th"></i></span>
                    <span class="nav-text">Genel Bakış</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($tab == 'tasks') active @endif" href="{{ route('project.project.show', ['project' => $project, 'tab' => 'tasks', 'sub' => 'kanban']) }}">
                    <span class="nav-icon"><i class="fas fa-clipboard-list"></i></span>
                    <span class="nav-text">Görevler</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($tab == 'timesheets') active @endif" href="{{ route('project.project.show', ['project' => $project, 'tab' => 'timesheets']) }}">
                    <span class="nav-icon"><i class="fas fa-hourglass-half"></i></span>
                    <span class="nav-text">Hareketler</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($tab == 'milestones') active @endif" href="{{ route('project.project.show', ['project' => $project, 'tab' => 'milestones']) }}">
                    <span class="nav-icon"><i class="fas fa-flag"></i></span>
                    <span class="nav-text">Kilometre Taşları</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($tab == 'files') active @endif" href="{{ route('project.project.show', ['project' => $project, 'tab' => 'files']) }}">
                    <span class="nav-icon"><i class="fas fa-folder-open"></i></span>
                    <span class="nav-text">Dosyalar</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($tab == 'comments') active @endif" href="{{ route('project.project.show', ['project' => $project, 'tab' => 'comments']) }}">
                    <span class="nav-icon"><i class="fas fa-comments"></i></span>
                    <span class="nav-text">Yorumlar</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($tab == 'tickets') active @endif" href="{{ route('project.project.show', ['project' => $project, 'tab' => 'tickets']) }}">
                    <span class="nav-icon"><i class="far fa-life-ring"></i></span>
                    <span class="nav-text">Destek Talepleri</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($tab == 'notes') active @endif" href="{{ route('project.project.show', ['project' => $project, 'tab' => 'notes']) }}">
                    <span class="nav-icon"><i class="fas fa-sticky-note"></i></span>
                    <span class="nav-text">Notlar</span>
                </a>
            </li>
        </ul>
    </div>
</div>
