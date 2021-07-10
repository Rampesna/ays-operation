<div class="subheader subheader-solid" id="kt_subheader">
    <div class="container-fluid align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <ul class="nav nav-tabs nav-tabs-line mb-n4">

            @Authority(59)
            <li class="nav-item">
                <a class="nav-link @if($tab == 'overview') active @endif" href="{{ route('project.project.show', ['project' => $project, 'tab' => 'overview']) }}">
                    <span class="nav-icon"><i class="fas fa-th"></i></span>
                    <span class="nav-text">Genel Bakış</span>
                </a>
            </li>
            @endAuthority

            @Authority(60)
            <li class="nav-item">
                <a class="nav-link @if($tab == 'dashboard') active @endif" href="{{ route('project.project.show', ['project' => $project, 'tab' => 'dashboard']) }}">
                    <span class="nav-icon"><i class="fas fa-chart-pie"></i></span>
                    <span class="nav-text">Kontrol Paneli</span>
                </a>
            </li>
            @endAuthority

            @Authority(61)
            <li class="nav-item">
                <a class="nav-link @if($tab == 'tasks') active @endif" href="{{ route('project.project.show', ['project' => $project, 'tab' => 'tasks', 'sub' => 'kanban']) }}">
                    <span class="nav-icon"><i class="fas fa-clipboard-list"></i></span>
                    <span class="nav-text">Görevler</span>
                </a>
            </li>
            @endAuthority

            @Authority(62)
            <li class="nav-item">
                <a class="nav-link @if($tab == 'management-tasks') active @endif" href="{{ route('project.project.show', ['project' => $project, 'tab' => 'management-tasks', 'sub' => 'kanban']) }}">
                    <span class="nav-icon"><i class="fas fa-clipboard-list"></i></span>
                    <span class="nav-text">Yönetim İşleri</span>
                </a>
            </li>
            @endAuthority

            @Authority(63)
            <li class="nav-item">
                <a class="nav-link @if($tab == 'calendar') active @endif" href="{{ route('project.project.show', ['project' => $project, 'tab' => 'calendar']) }}">
                    <span class="nav-icon"><i class="far fa-calendar-alt"></i></span>
                    <span class="nav-text">Takvim</span>
                </a>
            </li>
            @endAuthority

            @Authority(64)
            <li class="nav-item">
                <a class="nav-link @if($tab == 'timesheets') active @endif" href="{{ route('project.project.show', ['project' => $project, 'tab' => 'timesheets']) }}">
                    <span class="nav-icon"><i class="fas fa-hourglass-half"></i></span>
                    <span class="nav-text">Hareketler</span>
                </a>
            </li>
            @endAuthority

            @Authority(65)
            <li class="nav-item">
                <a class="nav-link @if($tab == 'milestones') active @endif" href="{{ route('project.project.show', ['project' => $project, 'tab' => 'milestones']) }}">
                    <span class="nav-icon"><i class="fas fa-flag"></i></span>
                    <span class="nav-text">Kilometre Taşları</span>
                </a>
            </li>
            @endAuthority

            @Authority(66)
            <li class="nav-item">
                <a class="nav-link @if($tab == 'files') active @endif" href="{{ route('project.project.show', ['project' => $project, 'tab' => 'files']) }}">
                    <span class="nav-icon"><i class="fas fa-folder-open"></i></span>
                    <span class="nav-text">Dosyalar</span>
                </a>
            </li>
            @endAuthority

            @Authority(67)
            <li class="nav-item">
                <a class="nav-link @if($tab == 'comments') active @endif" href="{{ route('project.project.show', ['project' => $project, 'tab' => 'comments']) }}">
                    <span class="nav-icon"><i class="fas fa-comments"></i></span>
                    <span class="nav-text">Yorumlar</span>
                </a>
            </li>
            @endAuthority

            @Authority(68)
            <li class="nav-item">
                <a class="nav-link @if($tab == 'tickets') active @endif" href="{{ route('project.project.show', ['project' => $project, 'tab' => 'tickets']) }}">
                    <span class="nav-icon"><i class="far fa-life-ring"></i></span>
                    <span class="nav-text">Destek Talepleri</span>
                </a>
            </li>
            @endAuthority

            @Authority(69)
            <li class="nav-item">
                <a class="nav-link @if($tab == 'notes') active @endif" href="{{ route('project.project.show', ['project' => $project, 'tab' => 'notes']) }}">
                    <span class="nav-icon"><i class="fas fa-sticky-note"></i></span>
                    <span class="nav-text">Notlar</span>
                </a>
            </li>
            @endAuthority
        </ul>
    </div>
</div>
